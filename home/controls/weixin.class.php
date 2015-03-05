<?php
	class Weixin {
		static $wxModel = NULL;
		
		/*
		*微信数据交互接口
		*/
		public function index(){
			//$this->valid();												//第一次网址接入时使用
			self::$wxModel=D('Weixin');										//实例化微信model
			$dataObj=$this->getPost();										//提取传过来的数据
			$myName=$dataObj->ToUserName;									//得到我的名字
			$userName=$dataObj->FromUserName;								//得到发送者的openID
			$reply_cont=$this->contentStr($dataObj);
			$this->response($userName,$myName,'text',$reply_cont);
		}
		
		/*
		*网址接入
		*/
		function valid()
		{
			$signature = $_GET['signature']; 								//微信加密签名
			$timestamp = $_GET['timestamp']; 								//时间戳
			$nonce = $_GET['nonce']; 										//随机数
			$echostr = $_GET['echostr']; 									//随机字符串
			$token = "bravelove";											//签名
			$arr = array($token,$timestamp,$nonce);
			sort($arr);														//将token、timestamp、nonce三个参数进行字典序排序
			$arr = implode($arr);											//将三个参数字符串拼接成一个字符串
			$str = sha1($arr);												//进行sha1加密
			if($str==$signature){											//开发者获得加密后的字符串可与signature对比，标识该请求来源于微信
				echo $echostr;
			}
		}
		
		/*
		*接受用户发送的信息
		*/
		private function getPost(){
			$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];						//得到传过来的数据，但可能是不同的接收环境
			if (!empty($postStr)){
				$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
				return $postObj;
			}
		}
		
		/*
		*构造回复的语句
		*/
		private function contentStr($postObj){
			if($postObj->MsgType=='text'){									//先判断消息是什么类型的
					$open_id=$postObj->FromUserName;							
					$last_content=$this->getLastContent($open_id);	//先取出用户上一次说的什么
					/************把发送过来的消息存到数据库***********/
					$_POST['last_content']=$postObj->Content;
					$_POST['last_time']=time();
					if(!self::$wxModel->where(array('wx_id'=>$postObj->FromUserName))->update()){
						die();
					}
					switch($postObj->Content){
						case '1':											//绑定账号
							return "注意：绑定后不可修改！\n请输入你的账号+密码\n例如：我是傻蛋+123456";
						case '2':											//投稿
							if(!$this->is_bind($open_id)){					//先检查用户绑定过没有
								return '请先绑定账号!';
							}
							$uid=$this->openIdGetUid($open_id);				//通过openID得到绑定的用户id
							if($this->limitTgNum($uid)){					//再查看用户今天的投稿量是否超过限制				
								return '对不起，你一天只能投'.WXTGXZNUM.'次稿！';	
							}									
							return "请输入你的表白\n例如：#tg#+表白内容";
						case '3':											//许愿
							if(!$this->is_bind($open_id)){					//先检查用户绑定过没有
								return '请先绑定账号!';
							}
							$uid=$this->openIdGetUid($open_id);				//通过openID得到绑定的用户id
							if($this->limitXyNum($uid)){					//再查看用户今天的许愿量是否超过限制				
								return '对不起，你一天只能许'.WXXYXZNUM.'次愿！';	
							}								
							return "请输入你的愿望\n例如：#xy#+愿望内容";
						case '4':											//查看人气榜To10
							return $this->LookUpTop10();	
						case '5':											//查看审核结果
							return "请输入需要查询的愿望ID或表白ID！";
						case 'help':
							return "勇敢爱有以下功能：\n1.绑定账号\n2.表白投稿\n3.许愿投稿\n4.查看人气榜To10\n5.查询审核结果\n请回复对应数字进行操作！"; 				
						default:
							return $this->doThinSpeak($postObj,$last_content);		//如果不是上面这些情况，则需要细细判断
					}					
			}else{
					if($postObj->MsgType=='event'){
							if($postObj->Event=='subscribe'){				//如果是刚关注，则把用户的信息存到数据库
								$_POST['wx_id']=$postObj->FromUserName;
								$_POST['me_id']=$postObj->ToUserName;
								$_POST['last_time']=time();
								if(self::$wxModel->insert()){
									return "	欢迎关注勇敢爱公共平台（投稿前，请先绑定网站账号！当然，肯定要先到网站注册账号才可以使用）\n1.绑定账号\n2.表白投稿\n3.表白投稿\n4.查看人气榜To10\n5.查询审核结果\n请回复对应数字进行操作！";
								}
							}elseif($postObj->Event=='unsubscribe'){		//如果取消关注，则删除对应的用户数据
								self::$wxModel->where(array('wx_id'=>$postObj->FromUserName))->delete();
							}
					}else{
						return '抱歉！目前只支持文本信息！请输入文本内容';
					}
					
			}
			
		}
		
		
		
		
		/*
		*
		*细细地判断该该返回的数据
		*/
		private function doThinSpeak($dataObj,$last_content){
			$content=$dataObj->Content;
			$open_id=$dataObj->FromUserName;
			switch($last_content){
					/******执行用户绑定*****/
					case '1':
						if($this->is_bind($open_id)){						//先检查用户绑定过没有
							return '你已经绑定过了还绑定个毛线啊！';
						}
						$user_info=$this->checkBindNorm($content);								
						if(!empty($user_info)){
							$result=$this->doBind($user_info,$open_id);
							if($result=='binded'){
								return '绑定成功！';
							}else{
								return $result;	
							}
						}else{
							return '账号格式输入有误！';
						}
					/******执行表白投稿****/
					case '2':
						if(!$this->is_bind($open_id)){						//先检查用户绑定过没有
							return '请先绑定账号!';
						}
						$tg_content=$this->checkTgNorm($content);			//检查是否符合投稿的规范！
						if(!empty($tg_content)){
							$uid=$this->getUid($open_id);					//获取该用户绑定的用户id
							$result=$this->doTg($tg_content,$uid);
							return $result;	
						}else{
							return '输入有误！请安规定格式输入！';	
						}
						/******执行许愿投稿****/
					case '3':
						if(!$this->is_bind($open_id)){						//先检查用户绑定过没有
							return '请先绑定账号!';
						}
						$tg_content=$this->checkXyNorm($content);			//检查是否符合投稿的规范！
						if(!empty($tg_content)){
							$uid=$this->getUid($open_id);					//获取该用户绑定的用户id
							$result=$this->doXyTg($tg_content,$uid);
							return $result;	
						}else{
							return '输入有误！请按规定格式输入！';	
						}
					case '5':
						$tgId=$this->checkAuditNorm($content);				//检查是否符合审核的规范！
						if(!empty($tgId)){
							$result=$this->doCheckDudit($tgId);
							return $result;
							if(!empty($result)){
								return $result;
							}else{
								return '不存在的稿子ID';	
							}
						}else{
							return '投稿ID格式输入有误！';
						}
					default:
						return "欢迎关注勇敢爱公众平台，请输入对应数字进行操作：\n1.绑定账号\n2.表白投稿\n3.许愿投稿\n4.查看人气榜To10\n5.查询表白审核结果";
			}
			
		}
		
		
		/*
		*回复给用户
		*/
		private function response($toUser,$fromUser,$type,$content)
		{
			//将传递进来的值赋值给变量
			$toUsername=$toUser;
			$fromUsername=$fromUser;
			$time=time();
			$msgType = $type;
			$contentStr = $content;
			
			$textTpl = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[%s]]></MsgType>
						<Content><![CDATA[%s]]></Content>
						<FuncFlag>0</FuncFlag>
						</xml>";
			
			$resultStr = sprintf($textTpl, $toUsername, $fromUsername, $time, $msgType, $contentStr);
			if(!empty($resultStr)){
				echo $resultStr;
			}
		}
		
		
		
		/*
		*获取到用户上一次说的什么
		*/
		private function getLastContent($wx_id){
			$result=self::$wxModel->where(array('wx_id'=>$wx_id))->find();
			return $result['last_content'];
		}
		/*
		*
		*通过openid获取到绑定的用户id
		*
		*/
		private function openIdGetUid($open_id){
			$result=self::$wxModel->where(array('wx_id'=>$open_id))->find();
			return $result['bind_user_id'];
		}
		
		
		/*
		*
		*
		*检查用户今天表白投了几次稿，超过限制条给予提示并限制
		*
		*/
		private function limitTgNum($uid){
			$today_time=date('Y-m-d',time());
			$tg_num=D('Article')->total(array('uid'=>$uid,'today_time'=>$today_time,'type'=>0));
			if($tg_num>=WXTGXZNUM){
				return true;
			}else{
				return false;	
			}
		}
		
		/*
		*
		*
		*检查用户今天许了几次愿，超过限制条给予提示并限制
		*
		*/
		private function limitXyNum($uid){
			$today_time=date('Y-m-d',time());
			$tg_num=D('Article')->total(array('uid'=>$uid,'today_time'=>$today_time,'type'=>1));
			if($tg_num>=WXXYXZNUM){
				return true;
			}else{
				return false;	
			}
		}
		
		
		/*
		*检查用户是否绑定
		*param1 改用户的openid
		*/
		function is_bind($open_id){
			$bind_id=self::$wxModel->field('bind_user_id')->where(array('wx_id'=>$open_id))->find();
			if($bind_id['bind_user_id']!=0){
				return true;
			}else{
				return false;
			}
		}
		
		/*
		检查内容是否是绑定账号的规范
		*/
		private function checkBindNorm($content){
			$pattern = '/^(.+)\+(.+)$/U';
			preg_match_all($pattern,$content,$t_content);
			if(!empty($t_content[0][0])){
				$user_info['username']=$t_content[1][0];
				$user_info['password']=$t_content[2][0];
				return $user_info;
			}else{
				return NULL;
			}
		}
		
		/*
		检查内容是否是投稿的规范
		*/
		private function checkTgNorm($content){
			$pattern = '/^#tg#\+(.*)$/i';
			preg_match_all($pattern,$content,$t_content);
			if(!empty($t_content[1][0])){
				return $t_content[1][0];
			}else{
				return NULL;
			}
		
		}
		
		/*
		检查内容是否是许愿的规范
		*/
		private function checkXyNorm($content){
			$pattern = '/^#xy#\+(.*)$/i';
			preg_match_all($pattern,$content,$t_content);
			if(!empty($t_content[1][0])){
				return $t_content[1][0];
			}else{
				return NULL;
			}
		
		}
		
		/*
		检查内容是否是查询审核的规范
		*/
		private function checkAuditNorm($content){
			$pattern = '/^'.WXTGPREFIX.'([\d]+)$/';
			preg_match_all($pattern,$content,$t_content);
			if(!empty($t_content[1][0])){
				return $t_content[1][0];
			}else{
				return NULL;
			}
		
		}
				
		/*
		*
		*执行账号绑定
		*
		*/
		private function doBind($user_info,$open_id){
				$uid=$this->check_user_info($user_info['username'],$user_info['password']);
				if(is_numeric($uid)){
					if($this->add_bind_info($uid,$open_id)){
						return 'binded';
					}
				}else{
					return $uid;	
				}
		}


		/*
		*
		*执行微信表白投稿
		*
		*/
		private function doTg($tg_content,$user_id){
			$_POST['uid']=$user_id;
			$_POST['content']=$tg_content;
			$_POST['post_type']=0;
			$_POST['type']=0;
			$_POST['ptime']=time();
			$_POST['today_time']=date('Y-m-d',time());
			$loveId=D('Article')->insert();
			if($loveId){
				return "表白成功！等待管理员审核中！\n请牢记你的表白id： [".WXTGPREFIX.$loveId."]";				
			}else{
				return '系统异常！';	
			}
		}
		
		
		/*
		*
		*执行微信许愿投稿
		*
		*/
		private function doXyTg($tg_content,$user_id){
			$_POST['uid']=$user_id;
			$_POST['content']=$tg_content;
			$_POST['post_type']=0;
			$_POST['type']=1;
			$_POST['ptime']=time();
			$_POST['today_time']=date('Y-m-d',time());
			$loveId=D('Article')->insert();
			if($loveId){
				return "许愿成功！等待管理员审核中！\n请牢记你的许愿id： [".WXTGPREFIX.$loveId."]";				
			}else{
				return '系统异常！';	
			}
		}
		
		/*
		*
		*执行查询审核功能
		*
		*/
		private function doCheckDudit($tg_id){
			$info=D('Article')->field('audit,no_audit_id,cross_time')->where(array('id'=>$tg_id))->find();
			if(!empty($info)){
				$state=$info['audit'];
				if($state==1){
					$no_audit_id=$info['no_audit_id'];
					$no_audit_info=D('No_audit')->where(array('id'=>$no_audit_id))->find();
					$reason=$no_audit_info['reason'];
					$detail_time=date('Y-m-d H:i:s',$no_audit_info['detail_time']);
					$result="抱歉！你没有通过审核！\n理由：".$reason."\n处理时间：".$detail_time;
				}else{
					if($state==2){
						$cross_time=date('Y-m-d',$info['cross_time']);
						$result="你的投稿已经通过！\n通过时间：".$cross_time;
					}else{
						$result='抱歉！你的投稿还处于等待审核状态!';
					}	
				}
			}else{
				$result=NULL;	
			}
			return $result;
		}
		
		/*
		*
		*执行查询top10
		*
		*/
		private function LookUpTop10(){
			$user=D('User');
			$art=D('Article');
			$info=$art->field('uid,content')->where(array('support_num>'=>10))->order('ptime desc')->limit('0,10')->select();
			foreach($info as &$vl){
				$vl['username']=$user->user_name($vl['uid']);	//为用户信息附加上名字
			}		
			$result="人气榜TOP10：\n";
			for($i=0;$i<count($info);$i++){
				$result .="	【".$info[$i]['username']."】说：　".$info[$i]['content']."\n\n";
			}
			return $result;
		}
		
		
		
		/*
		*检验用户名和密码
		*param1 用户的账号
		*param2 用户的密码
		*/
		function check_user_info($username,$password){
			$user=D('User');
			$true=$user->field('password,id')->where(array('username'=>$username))->find();
			if(!empty($true['id'])){
				$passmd5=md5($password);
				if(strtolower($passmd5)==strtolower($true['password'])){
					return $true['id'];	
				}else{
					return "密码不正确！";	
				}
			}else{
				return '用户名不存在！';
			}
		}
		
				
		/*
		*把微信表给绑定上用户表的id
		*param1 该用户的openid
		*/
		function add_bind_info($uid,$op_id){
			$_POST['bind_user_id']=$uid;
			$result=self::$wxModel->where(array('wx_id'=>$op_id))->update();
			if($result){
				return true;
			}
		}
		
		
		/*
		*根据发送者的openid得带绑定的用户id号
		*/
		private function getUid($open_id){
			$uid=self::$wxModel->field('bind_user_id')->where(array('wx_id'=>$open_id))->find();
			return $uid['bind_user_id'];
		}
		
	}