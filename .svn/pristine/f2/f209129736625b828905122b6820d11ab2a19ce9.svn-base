<?php
	class Common extends Action {
		/**
		  * 由于此方法是在执行其他方法之前执行的
		  * 所以在这里验证用户是否登录
		  * 如果没有登录就跳到登录界面
		  */
		function init(){
			if(empty($_SESSION['admin_login']) || $_SESSION['admin_login'] !==1){
				$this->redirect('login/index');
			}
			
		}			
	}