<?php
	class Login{
		/*
			前台登录
		*/
		public function login(){
			$user=D('User','admin');
			if($user->pub_login()){
				$this->success('登录成功！',4,'myCenter/index');
			}else{
				$this->error('账号不正确！');
			}
		}
		
		/*
		*
		*注销登录
		*/
		public function logout(){
			$user=D('User','admin');
			if($user->pub_logout()){
				$this->success('退出成功！',3,'index/index');	
			}else{
				$this->error('系统异常！退出失败！');
			}
			
		}
	
	}
?>