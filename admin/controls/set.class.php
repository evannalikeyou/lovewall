<?php
	class Set{
		function index(){
			$set_info=D('set')->getBase();
			$this->assign('data',$set_info);
			$set_info=array();
			$this->assign('title','网站配置----'.TITLE.'管理系统');
			$this->display();
		}
		
		/**
		  * 修改配置信息
		  */
		public function mod(){
			$set=D('set');
			if($set->modify()){
				$this->success('修改成功！',3,'set/index');
			}else{
				$this->error('修改失败！请联系网站开发者！',5,'index/main');
			}
		}
		
		
		/**
		  * 清除缓存
		  */
		public function clear_cache(){
			if(D('set')->clear_cache()){
				$this->success("缓存已清空！",3,'index/main');
			}else{
				$this->error("清空缓存出错,请联系网站开发者！",3,'index/main');
			}
		}
		
		/**
		  * 数据库优化
		  */
		public function optimize(){	
			if(D('set')->optimize()){
				$this->success("数据库优化成功！",3,'index/main');
			}else{
				$this->error("数据库优化出错,请联系网站开发者！",3,'index/main');
			}
		}
		
		
	}