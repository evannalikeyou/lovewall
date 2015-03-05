<?php
	class Set{
		private $config_file="config.inc.php";
		/**
		  * 用于得到配置文件的内容.
		  * 并将特殊符号转义，然后返回
		  * @return string 配置文件的内容
		  */
		private function getConfig($file=''){
			if($file===''){
				$file=$this->config_file;
			}
			if(!$handle=@fopen($file,"r")){
				return false;
			}
			if(!$content=@fread($handle,filesize($file))){
				return false;
			}
			if(!fclose($handle)){
				return false;
			}
			return $content;	
		}
		
		/**
		  * 修改配置文文件
		  * @return 成功 true 失败 false
		  */
		public function modify(){
			
			$content=$this->getConfig();
			
			/*  循环匹配替换 */
			foreach($_POST as $key=>$val){
				
				$pattern='/(\"'.$key.'\"\,)(.*?)(\)\;)/';
				if(preg_match($pattern,$content)){
			
					$replace_content="\$1\"".$val."\"\$3";
					$content=preg_replace($pattern,$replace_content,$content);
				}
			}
			$headle=@fopen($this->config_file,'w');
			if(@fwrite($headle,$content)){
				return true;
			}else{
				$this->error='写入文件出错！';
				return false;
			}
			
		}
		
		
	
		

		
		/**
		  * 得到所有网站配置需要匹配的数据
		  * @return array 将所有的数据形成数组返回
		  */
		public function getBase(){
			$data['TITLE']=TITLE;					//网站标题
			$data['KEYWORDS']=KEYWORDS;				//网站关键字
			$data['WXTGXZNUM']=WXTGXZNUM;			//设置微信用户表白每天的限制条数
			$data['WXXYXZNUM']=WXXYXZNUM;			//设置微信用户许愿每天的限制条数
			$data['WXTGPREFIX']=WXTGPREFIX;			//设置微信投稿分配的id号前缀
			$data['DESC']=DESC;						//网站简介
			$data['CSTART']=CSTART;
			$data['CTIME']=CTIME;					//缓存时间
			$data['DRIVER']=DRIVER;					//数据库驱动
			$data['DEBUG']=DEBUG;					//调试模式
			
			return $data;
		}
		
		
		
		/**
		  * 清空缓存
		  * @return bool 成功：true 失败 false
		  */
		public function clear_cache(){
			$path='./runtime/cache';
			if($this->del_dir($path)){
				return true;	
			}
			return false;
		}
		
		/**
		  * 删除目录
		  * @return success TRUE error FALSE
		  */
		private function del_dir($dir){
			$dir=rtrim($dir,'/');
			$handle=opendir($dir);
			//过滤两个特殊目录
			readdir();
			readdir();
			
			//将路径与文件名组合
			while(false!==($file=readdir())){
				$sub_file=$dir.'/'.$file;
				if(is_file($sub_file)){
					unlink($sub_file);
				}elseif(is_dir($sub_file)){
					$this->del_dir($sub_file);
					rmdir($sub_file);
				}
			}
			return true;
		}
		
		/**
		  * 数据库优化
		  */
		public function optimize(){
			$tab=D("Album");
			$tab->query("OPTIMIZE TABLE {$tab->tabName}");
			
			$tab=D("Article");
			$tab->query("OPTIMIZE TABLE {$tab->tabName}");
			
			$tab=D("No_audit");
			$tab->query("OPTIMIZE TABLE {$tab->tabName}");
			
			$tab=D("Pic");
			$tab->query("OPTIMIZE TABLE {$tab->tabName}");
			
			$tab=D("User");
			$tab->query("OPTIMIZE TABLE {$tab->tabName}");
			
			$tab=D("Video");
			$tab->query("OPTIMIZE TABLE {$tab->tabName}");
			
			$tab=D("Weixin");
			$tab->query("OPTIMIZE TABLE {$tab->tabName}");
			
		
		}
	
	}
?>