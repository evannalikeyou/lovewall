<?php
	class Lovewall {
		function index(){
			$art = D("Article");
			$page = new Pager($art->where(array("type"=>0,"audit"=>1))->total(),20);
			$data = $art->lister();

			$this->assign("fpage",$page->fpage(4,5,6));
			$this->assign("data",$data);
			$this->assign('title','表白墙----'.TITLE);
			$this->assign('script','lovewall');
			$this->display();
		}
		
// 		function mail($id) {
// 			$art = D("Article");
// 			$info = $art->emailTa($id);
// 			if (!empty($info["ta_email"])) {
// 				$link = 'http://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']).'/index.php/lovewall/index';
// 				$tt = $info["ta_email"];
// 				$smtpserver = "smtp.163.com";//SMTP服务器
// 				$smtpserverport =25;//SMTP服务器端口
// 				$smtpusermail = "register_yty@163.com";//SMTP服务器的用户邮箱
// 				$smtpemailto = $tt;//发送给谁
// 				$smtpuser = "register_yty";//SMTP服务器的用户帐号
// 				$smtppass = "register123456";//SMTP服务器的用户密码
// 				$mailsubject = "重邮表白墙";//邮件主题
// 				$mailbody = '<h1>亲。。。在'.'<a href = "'.$link.'" target="_blank">'.'重邮表白墙'.'</a>'.'里有人向你表白了。。。赶快去找到属于你的那个Ta吧！！！</h1>';//邮件内容
// 				$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
// 				##########################################
// 				$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
// 				$smtp->debug = FALSE;//是否显示发送的调试信息
// 				$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
					
// 				$this->success("发表成功，您的表白编号：520".$id."  =>  我们将为您发送一封邮件给Ta！！！",5,"mycenter/index");
// 			}else {
// 				$this->success("发表成功，您的表白编号：520".$id,5,"mycenter/index");
// 			}
// 		}

		function saylove() {
			$art = D("Article");
			$id = $art->saylove();
			if (!empty($id)) {
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
						
					$this->success("发表成功，您的表白编号：520".$id."  =>  我们将为您发送一封邮件给Ta！！！",5,"myCenter/index");
				}else {
					$this->success("发表成功，您的表白编号：520".$id,5,"myCenter/index");
				}
			}else {
				$this->error("发表失败",3,"index");
			}
		}
		
		function support() {
			$art = D("Article");
			$id = $_POST['id'];
			if(!$_SESSION['support'][$id]==1){
				$support_num = $art->support($id);
				if($support_num){
					echo $support_num;
					$_SESSION['support'][$id]=1;
				}
			}
		}
		
	}
	