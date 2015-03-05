<?php
	class Index {
		function index(){
			$this->assign('title',TITLE.'管理系统');
			$this->display();
		}
		function top(){
			$this->assign('login_num',$_SESSION['user_info']['login_num']);//为网站分配登陆者的登录次数
			$this->assign('level',$_SESSION['user_info']['grade_name']);//为网站分配登录者的身份
			$this->assign('admin_name',$_SESSION['user_info']['username']);//为网站分配登陆者的用户名
			$this->display();
		}
		function left(){
			$this->display();
		}
		function main(){
			$this->assign('server_name',$_SERVER['SERVER_NAME']);			//服务器主机名称
			$this->assign('OS',$_ENV['OS']);								//服务器版本
			$this->assign('SERVER_PROTOCOL',$_SERVER['SERVER_PROTOCOL']);	//通信协议名称/版本
			$this->assign('SERVER_ADDR',$_SERVER['SERVER_ADDR']);			//服务器IP
			$this->assign('REMOTE_ADDR',$_SERVER['REMOTE_ADDR']);			//客户端IP
			$this->assign('SERVER_PORT',$_SERVER['SERVER_PORT']);			//服务器端口
			$this->assign('REMOTE_PORT',$_SERVER['REMOTE_PORT']);			//客户端端口
			$this->assign('SERVER_ADMIN',$_SERVER['SERVER_ADMIN']);			//管理员邮箱
			$this->assign('HTTP_HOST',$_SERVER['HTTP_HOST']);				//Host头部的内容
			$this->assign('DOCUMENT_ROOT',$_SERVER['DOCUMENT_ROOT']);		//服务器主目录
			$this->assign('SystemRoot',$_ENV['SystemRoot']);				//服务器系统盘
			$this->assign('SCRIPT_FILENAME',$_SERVER['SCRIPT_FILENAME']);	//脚本执行的绝对路径
			$this->assign('SERVER_SOFTWARE',$_SERVER['SERVER_SOFTWARE']);	//Apache及PHP版本
			
			$this->assign('title','首页----'.TITLE.'管理系统');
			$this->display();
		}		
	}