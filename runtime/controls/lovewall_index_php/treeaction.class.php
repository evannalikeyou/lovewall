<?php
	class TreeAction extends Common {

		function index() {
			//model里的tree.class.php
			$t = D("Article");
			//取里面的look方法，就是点瓶子查看内容
			$arr = $t->look();
 			$this->assign("arr",$arr);
 			$this->assign('title','许愿树----'.TITLE);
 			$this->assign('script','tree'); 			
 			$this->display("tree/index");
 			
		}
		function inserter() {
			$t = D("Article");	
			$data = $t->inserter();	
			if($data){
 				$this->success("发表成功,你的许愿瓶的编号520".$data,5,"mycenter/index");
			}else {
				$this->error("发表失败",3,"index");
			}
		}
		
		
	}
	