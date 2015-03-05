<?php

	class Comment{
		/*
			根据表白贴id号得到此主题的评论数量
			@param1 int 主题id号
			@return int
		*/
		public function art_comm_num($aid){
			return $this->where(array('aid'=>$aid))->total();
		}
	
	
	}