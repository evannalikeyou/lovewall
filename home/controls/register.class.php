<?php
	class Register{
		/*
			用户注册
		*/
		public function register(){
			$user=D('user');
			$_POST['reg_time']=time();
			$_POST['last_time']=time();
			$_POST['password']=md5($_POST['pass']);
			$_POST['last_ip']=ip2long($_SERVER['SERVER_ADDR']);			
			if($user->insert()){
				$this->success('注册成功！',3,'index/index');
			}else{
				$this->error('注册失败！',5,'index/index');
			}
		}
	
	}
?>