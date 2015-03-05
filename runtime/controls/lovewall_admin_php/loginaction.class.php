<?php
	class LoginAction extends Action {
		/**
		  *	登陆页面
		  */
        function index(){
			if(!empty($_SESSION['admin_login'])){
				if($_SESSION['admin_login']===1){
					$this->redirect('index/index');
				}
			}
			$this->assign('title',TITLE.'后台登陆');
            $this->display();
        }
	
		/*
			输出验证码
		*/
		function code(){
			echo new Vcode(80,30,4);
		}
		
		
		/*
			调用自定义的user模型的pub_login()方法登陆,登陆成功后则调到后台首页
			如果验证码错误,或者登陆失败,则返回登陆页
		*/
		function login(){
			$user=D('User');
			if($_POST['code']==$_SESSION['code']){
				$result=$user->pub_login();
				if($result==1){
					//如果不是管理员
					if($_SESSION['user_info']['level']==0){
						$_SESSION['user_info']=array();
						$this->error('抱歉！你不能登录网站后台！');
					}else{
						if($_SESSION['user_info']['level']==1){
							$_SESSION['user_info']['grade_name']='管理员';
						}else{
							$_SESSION['user_info']['grade_name']='网站站长';
						}
						$_SESSION['admin_login']=1;
						$this->redirect('index/index');
					}
				}elseif($result==2){
						$this->error('密码不正确！');
					}else{
						$this->error('账号不存在！');
						}
			}else{
				$this->error('验证码错误！');
			}
		}
		
		/*
		*
		*注销登录
		*/
		public function logout(){
			$user=D('User');
			if($user->pub_logout()){
				$this->success('退出成功！',3,'login/index');	
			}else{
				$this->error('系统异常！退出失败请联系网站开发者！');
			}
			
		}
	
	}
?>
