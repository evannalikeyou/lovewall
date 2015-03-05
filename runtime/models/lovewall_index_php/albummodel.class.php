<?php
	class AlbumModel extends Dpdo {
		function getAlbum() {
			$page = new Page($this->total(),10);
			$re = $this	->order("add_time desc")
						->limit($page->limit)
						->select();
			return $re;
		}
		
	}