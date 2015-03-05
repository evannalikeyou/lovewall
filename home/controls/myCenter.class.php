<?php
	class MyCenter {
		function index(){
			if(empty($_SESSION['home_login']) || $_SESSION['home_login']!=1){
					$this->error('请先登录！');
			}
			$art = D("Article");
			$page = new Pager($art->total(),22);
				
			$expression = $art->where(array("uid"=>$_SESSION["user_info"]["id"],"type"=>0))
			->order("ptime desc")
			->limit($page->limit)
			->select();
			$this->assign("expression",$expression);
			$this->assign("fpage",$page->fpage(4,5,6));
			$this->assign('title','个人中心----'.TITLE);
			$this->assign('script','myCenter');
			$this->display();
		}	

		function myExpression() {
			$art = D("Article");
			$page = new Pager($art->total(),22);
			
			$expression = $art->where(array("uid"=>$_SESSION["user_info"]["id"],"type"=>0))
								->order("ptime desc")
								->limit($page->limit)
								->select();
			$this->assign("expression",$expression);
 			$this->assign("fpage",$page->fpage(4,5,6));
			$this->assign('title','个人中心----'.TITLE);
			$this->assign('script','myCenter');
			$this->display("index");
		}
		
		function myWish() {
			$art = D("Article");
			$page = new Pager($art->total(),22);
				
			$expression = $art->where(array("uid"=>$_SESSION["user_info"]["id"],"type"=>1))
			->order("ptime desc")
			->limit($page->limit)
			->select();
			$this->assign("expression",$expression);
			$this->assign("fpage",$page->fpage(4,5,6));
			$this->assign('title','个人中心----'.TITLE);
			$this->assign('script','myCenter');
			$this->display("index");
		}
		
		function delete_wish_or_profess(){
			$did=$_POST['id'];
			$result=D('Article')->delete($did);
			if($result){
				echo 1;
			}else{
				echo 0;
			}
		}
		
		function lookDetail(){
			$no_audi_id=$_POST['no_audit'];
			$no_au=D('No_audit');
			$result=$no_au->where('id='.$no_audi_id)->find();
			echo json_encode($result);
		}
		
		
	}