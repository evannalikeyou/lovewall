<?php
	class Tg{
		function index(){
			$art=D('Article');
			$page=new Page($art->where('type=0')->total(),10);
			$page->set('head','个表白');
			$pro_info=$art->field('id,uid,content,audit,post_type,ptime')->where('type=0')->limit($page->limit)->select();
			$all_pro_info=$art->get_all_profess_info($pro_info);
			$this->assign('profess_list',$all_pro_info);
			$this->assign('fpage',$page->fpage(0,4,5,6));
			$this->assign('title','表白管理----'.TITLE.'管理系统');
			$this->display();
		}
		function wishing(){
			$art=D('Article');
			$page=new Page($art->where('type=1')->total(),10);
			$page->set('head','个愿望');
			$pro_info=$art->field('id,uid,content,audit,post_type,ptime')->where('type=1')->limit($page->limit)->select();
			$all_pro_info=$art->get_all_profess_info($pro_info);
			$this->assign('profess_list',$all_pro_info);
			$this->assign('fpage',$page->fpage(0,4,5,6));
			$this->assign('title','许愿管理----'.TITLE.'管理系统');
			$this->display();
		}
		
		function delete(){
			$aid=$_GET['aid'];
			if(D('Article')->delete($aid)){
				$this->redirect('tg/index');	
			}
		}

		function profess_audit(){
			$art=D('Article');
			$aid=$_GET['aid'];
			$art_info=$art->find_info($aid);
			$this->assign('title','表白审核----'.TITLE.'管理系统');
			$this->assign('art_info',$art_info);
			$this->display();
		}
		
		function wishing_audit(){
			$art=D('Article');
			$aid=$_GET['aid'];
			$art_info=$art->find_info($aid);
			$this->assign('title','愿望审核----'.TITLE.'管理系统');
			$this->assign('art_info',$art_info);
			$this->display();
		}
		
		function do_profess_audit(){
			$art=D('Article');
			if($_POST['is_cross']==2){
				$info['id']=$_POST['aid'];
				$info['audit']=2;
				$info['cross_time']=time();
				if($art->update($info)){
					$this->success('审核成功！',3,'tg/index');
				}else{
					$this->error('提交失败！请联系网站开发者！');
				}
			}elseif(!empty($_POST['reason'])){
					$no_audit=D('No_audit');
					$info['reason']=$_POST['reason'];
					$info['detail_time']=time();
					$info['detail_admin_id']=$_POST['admin_id'];
					$no_audit_id=$no_audit->insert($info);
					if(!empty($no_audit_id)){
						$arr['id']=$_POST['aid'];
						$arr['audit']=1;
						$arr['no_audit_id']=$no_audit_id;
						if($art->update($arr)){
							$this->success('审核成功！',3,'tg/index');
						}else{
							$this->error('提交失败！请联系网站开发者！');
						}
					}
				}else{
					$this->error('请填写审核不通过的理由！');	
				}
		}
		
		
		function do_wishing_audit(){
			$art=D('Article');
			if($_POST['is_cross']==2){
				$info['id']=$_POST['aid'];
				$info['audit']=2;
				$info['cross_time']=time();
				if($art->update($info)){
					$this->success('审核成功！',3,'tg/wishing');
				}else{
					$this->error('提交失败！请联系网站开发者！');
				}
			}elseif(!empty($_POST['reason'])){
					$no_audit=D('No_audit');
					$info['reason']=$_POST['reason'];
					$info['detail_time']=time();
					$info['detail_admin_id']=$_POST['admin_id'];
					$no_audit_id=$no_audit->insert($info);
					if(!empty($no_audit_id)){
						$arr['id']=$_POST['aid'];
						$arr['audit']=1;
						$arr['no_audit_id']=$no_audit_id;
						if($art->update($arr)){
							$this->success('审核成功！',3,'tg/wishing');
						}else{
							$this->error('提交失败！请联系网站开发者！');
						}
					}				
			}else{
				$this->error('请填写审核不通过的理由！');
			}
		}
		
	}
?>