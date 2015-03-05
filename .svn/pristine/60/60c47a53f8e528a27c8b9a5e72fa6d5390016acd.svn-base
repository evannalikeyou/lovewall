<?php
	class Article {
		/**
		 * 根据用户的id得到article表中的content
		 * @param int $uid 用户的id
		 * @return 二维数组  文章内容
		 */
		function getContent($type) {
			$content = $this->where(array("type"=>$type,"audit"=>1))
							->select();
			return $content;
		}
		/**
		 * 许愿树页面里的点瓶子查看内容
		 * @return array 返回要取的数据
		 */
		function look() {
			$user = D("user");
			$content = $this->getContent(1);
			foreach ($content as $value) {
				$userInfor = $user->userInfor($value["uid"]);
				if ($value["user_type"] == 1) {
					$name = $userInfor["username"];
				}else {
					$name = "匿名用户";
				}
				$arr[] = array("email"=>$userInfor["email"],
						"username"=>$name,
						"content"=>htmlspecialchars_decode($value["content"])
				);
			}
			return $arr;
		}
		/**
		 * 许愿树页面的我要许愿功能
		 */
		function inserter() {
 			if(isset($_POST["submit"])){
				$_POST["content"] = htmlspecialchars($_POST["text"]);
				$_POST["type"] = 1;
				$_POST["uid"] = $_SESSION["user_info"]["id"];
				$_POST["ptime"] = time();
				$_POST["today_time"] = date("Y-m-d");
				if ($_POST["check"] == "niming") {
					$_POST["user_type"] = 0;
				}else {
					$_POST["user_type"] = 1;
				}
				$data = $this->insert();
				return $data;

			}

		}
		/**
		 * 表白墙的展示功能
		 * @return 二维数组
		 */
		function lister() {
			$user = D("User");
			$page = new Pager($this->where(array("type"=>0,"audit"=>1))->total(),20);
			
			$re = $this->where(array("type"=>0,"audit"=>1))
						->order("ptime desc")
						->limit($page->limit)
						->select();
			$data =$re;
			foreach ($re as $key => &$value) {
				$userInfor = $user->userInfor($value["uid"]);
				if ($value["user_type"] == 1) {
					$name = $userInfor["username"];
				}else {
					$name = "匿名用户";
				}
				$data[$key]["content"] = htmlspecialchars_decode($value["content"]);
				$data[$key]["name"] = $name;
			}
			return $data;
		}
		/**
		 * 表白墙的=>我要表白
		 * @return 插入成功后的id
		 */
		function saylove() {

			$content = htmlspecialchars($_POST["text"]);
			$email = htmlspecialchars($_POST["mailbox"]);
			$_POST["content"] = $content;
			$_POST["ta_email"] = $email;
			$_POST["type"] = 0;
			$_POST["uid"] = $_SESSION["user_info"]["id"];
			$_POST["ptime"] = time();
			$_POST["today_time"] = date("Y-m-d");
			if ($_POST["check"] == "niming") {
				$_POST["user_type"] = 0;
			}else {
				$_POST["user_type"] = 1;
			}
			$data = $this->insert();
			return $data;

		}
		/**
		 * 发送email给ta
		 * @param 文章的id
		 * @return 一维数组，存用户的id和ta的email
		 */
		function emailTa($id) {
			$info = $this->field("ta_email,uid")->find($id);
			return $info;
		}
		/**
		 * 表白墙的点赞功能
		 * @param 文章的id
		 * @return 返回更新后的 行数
		 */
		 
		function support($id) {
			$rows = $this->where(array("id"=>$id))->update("support_num=support_num+1");
			return $rows;
		}
		
	}