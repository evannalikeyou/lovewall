<?php
	class Originality {
		
		function index(){

			$album = D("Album");
			$pic = D("pic");
			$page = new Pager($album->total(),10);
			$albumData = $album->getAlbum();
			
			$tt = $albumData;
			foreach ($albumData as $key => $value) {
				$photo = $pic->getPic($value["id"]);		//$photo 二维数组
				$data[] = array("explain"=>$value["album_explain"],"photo"=>$photo[0]["pic_url"],"id"=>$value["id"]);//$data 二维数组
			}
			$this->assign("data",$data); //data 二维数组
			$this->assign("albumData",$albumData);//相册 二维数组 带分页
			$this->assign("fpage",$page->fpage(4,5,6));
			$this->assign('title','创意表白----'.TITLE);
			$this->assign('script','originality');
			$this->display();
		}	

		function mail($id) {
			$art = D("Article");
			$info = $art->emailTa($id);
			if (!empty($info["ta_email"])) {
				$link = 'http://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']).'/index.php/lovewall/index';
				$tt = $info["ta_email"];
				$smtpserver = "smtp.163.com";//SMTP服务器
				$smtpserverport =25;//SMTP服务器端口
				$smtpusermail = "register_yty@163.com";//SMTP服务器的用户邮箱
				$smtpemailto = $tt;//发送给谁
				$smtpuser = "register_yty";//SMTP服务器的用户帐号
				$smtppass = "register123456";//SMTP服务器的用户密码
				$mailsubject = "重邮表白墙";//邮件主题
				$mailbody = '<h1>亲。。。在'.'<a href = "'.$link.'" target="_blank">'.'重邮表白墙'.'</a>'.'里有人向你表白了。。。赶快去找到属于你的那个Ta吧！！！</h1>';//邮件内容
				$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
				##########################################
				$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
				$smtp->debug = FALSE;//是否显示发送的调试信息
				$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
					
				$this->success("发表成功，您的表白编号：520".$id."  =>  我们将为您发送一封邮件给Ta！！！",5,"mycenter/index");
			}else {
				$this->success("发表成功，您的表白编号：520".$id,5,"mycenter/index");
			}
		}
		
		function saylove() {
			$art = D("Article");
			$id = $art->saylove();
			if ($id) {
				$this->mail($id);
			}else {
				$this->error("发表失败",3,"index");
			}
		}
		
		function clicker() {

			$album = D("Album");
			$pic = D("pic");
			$albumId = $_GET["data"];
			$picture = $pic->sendAjax($albumId);
			echo json_encode($picture);
		}
		
		
	}