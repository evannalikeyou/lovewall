<?php
	class Index {
		function index(){
			$this->assign('script','index');
			$this->assign('title','首页----'.TITLE);
			$this->display();
		}		
	}