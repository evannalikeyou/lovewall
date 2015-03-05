<?php

	class UserModel extends Dpdo {
		/*
		得到用户名
		@param1 int 用户的id号
		*/
		public function user_name($uid){
			$user_name=$this->field('username')->find($uid);
			if(!empty($user_name)){
				return $user_name['username'];
			}else{
				return '已被删除';
			}
		}
		
		/*
		得到用户的邮箱
		@param1 int 用户的email
		*/
		public function user_email($uid){
			$user=$this->field('email')->find($uid);
			if(!empty($user)){
				return $user['email'];
			}else{
				return	'已被删除';	
			}
		}
		
		/*
			得到用户表白贴数量
			@param1 int 用户的id号
			@return int		
		*/
		public function art_num($uid){
			return D('Article')->where(array('uid'=>$uid))->total();
		}
		
		/*
			得到用户的头像
			@param1 int 用户id
			@return string 头像名称
		*/
		public function user_face($uid){
			$face=$this->field('face_path')->where(array('id'=>$uid))->find();
			return $face['face_path'];
		}
		
		/*
			得到用户的等级
			@param1 int 用户id
			@return string 用户的等级
		*/
		public function get_level($uid){
			$userinfo=$this->field('level')->where(array('id'=>$uid))->find();
			//如果是管理员,就直接返回管理员,如果是版主,就直接返回版主,如果是普通用户,则根据积分到等级表进行查询
			if($userinfo['level']==0){
				return '普通用户';
			}elseif($userinfo['level']==1){
				return '管理员';
			}elseif($userinfo['level']==2){
				return '站长';
			}
		}
		/**
		 * 得到用户的id，email
		 * @return 一维数组
		 */
		function userInfor($uid) {
			$userInfor = $this->field("id,email,username")->find($uid);
			return $userInfor;
		}
		
		
	
	}