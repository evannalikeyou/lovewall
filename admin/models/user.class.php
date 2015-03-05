<?php
	class User{
		/**
			前后台公用登陆方法
			@param1 string 用户名
			@param2 string 密码
			@param3 string 登陆类型(1=以邮箱登陆 2=以用户id登陆 3=以用户名登陆) 默认name
			@return boolean 
		*/
		public function pub_login(){
			$post_pass= strtolower(md5($_POST['password']));
			$re=$this->field('id')->where(array('username'=>$_POST['username']))->find();
			if(!empty($re)){
				$user_info=$this->where(array('id'=>$re['id'],'username'=>$_POST['username'],'password'=>$post_pass))->find();
				if(!empty($user_info)){
					//后台登陆,自动为前台设置已登陆
					$_SESSION['home_login']=1;
					$user_info['last_time']=time();
					$user_info['last_ip']=ip_to_long($_SERVER['REMOTE_ADDR']);
					$user_info['login_num']+=1;
					$this->update($user_info);
					//给session附上用户信息
					$_SESSION['user_info']=$user_info;
					// 清除验证码
					unset($_SESSION['code']);
					return 1;
				}else{
					return 2;
				}
			}else{
				return 3;	
			}
		}
		
		/*
			前后台公用退出方法
			@return boolean
		*/
		public function pub_logout(){
			unset($_SESSION['user_info']);
			unset($_SESSION['admin_login']);
			unset($_SESSION['home_login']);
			return true;
		}
		
		
				/*
		*
		*附加上身份
		*/
		public function attach_level($arr){
			foreach($arr as &$v){
				if($v['level']==0){
					$v['level_t']='普通用户';	
				}elseif($v['level']==1){
					$v['level_t']='管理员';
					}else{
					$v['level_t']='站长';
					}
			}
			return $arr;
		}
		
		/*
		*
		*附加上名字
		*/
		public function attach_username($arr){
			$user=D('User','home');
			foreach($arr as &$v){
				$v['username']=$user->user_name($v['add_user_id']);
			}
			return $arr;
		}
		
		
		
		/*
		*
		*附加上性别
		*/
		public function attach_gender($arr){
			foreach($arr as &$v){
				if($v['gender']==0){
					$v['gender_t']='不明';	
				}elseif($v['gender']==1){
					$v['gender_t']='男';
					}else{
					$v['gender_t']='女';
					}
			}
			return $arr;
		}
		
		
		/*
		*
		*附加上处理过的ip
		*/
		public function attach_ip($arr){
			foreach($arr as &$v){
				$v['ip_t']=long2ip($v['last_ip']);
			}
			return $arr;
		}
		
		public function uid_get_user_info($uid){
			$info=$this->field('id,gender,email,level,username')->find($uid);
			$info['username']=D('User','home')->user_name($uid);
			return $info;
		}
	
	}
?>