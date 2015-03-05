<?php
	class Pic {

		function getPic($id) {
			$data = $this->field("pic_url,pic_explain")
						->where(array("album_id"=>$id))
						->order("add_time asc")
						->select();
			return $data;
		}
		
		function sendAjax($tid) {
			$data = $this->field("pic_url,pic_explain")
							->where(array("album_id"=>$tid))
							->order("add_time desc")
							->select();
			$arr = array();
			foreach ($data as $key => $value) {
				$arr[$key][0] = $value["pic_url"];
				$arr[$key][1] = $value["pic_explain"];
			}
			return $arr;
		}
		
	}