<?php
	class User{
		function index(){
			$user=D('User');
			$page=new Page($user->total(),10);
			$page->set('head','个用户');//更改分页显示的字
			$user_info=$user->field('id,username,email,last_time,reg_time,last_ip,gender,level,login_num')
							->limit($page->limit)
							->select();
			$user_info=$user->attach_gender($user_info);//附加上性别
			$user_info=$user->attach_level($user_info);//附加上身份
			$user_info=$user->attach_ip($user_info);//附加上处理过的ip
			$this->assign('title','用户管理----'.TITLE.'管理系统');
			$this->assign('fpage',$page->fpage(0,4,5,6));//分配分页条
			$this->assign('user_list',$user_info);
			$this->display();
		}
		function add(){
			$this->assign('title','用户添加----'.TITLE.'管理系统');
			$this->display();
		}
		
		function mod(){
			$uid=$_GET['uid'];
			$user_info=D('User')->uid_get_user_info($uid);
			$this->assign('title','编辑用户----'.TITLE.'管理系统');
			$this->assign('user_info',$user_info);
			$this->display();
		}
		
		function delete(){
			$uid=$_GET['uid'];
			if(D('User')->delete($uid)){
				$this->redirect('user/index');	
			}
		}
	
		function insert(){
			$user=D('User');
			if(!empty($_POST['username'])){
				$re=$user->where(array('username'=>$_POST['username']))->find();
				if(empty($re)){
					if(!empty($_POST['password'])){
						if(!empty($_POST['email'])){
							$result=$user->where(array('email'=>$_POST['email']))->find();
							if(empty($result)){
								$_POST['reg_time']=time();
								$_POST['last_time']=time();
								$_POST['last_ip']=ip_to_long($_SERVER['REMOTE_ADDR']);
								$_POST['password']=md5($_POST['password']);
								if($user->insert()){
									$this->success('新增成功！',3,'user/index');	
								}else{
									$this->error('系统错误！请联系网站开发者！');
								}
							}else{
								$this->error('此邮箱已经存在！');
							}
						}else{
							$this->error('邮箱不能为空！');
						}
					}else{
						$this->error('密码不能为空');
					}
				}else{
					$this->error('此用户名已经存在！');
				}
			}else{
				$this->error('用户名不能为空！');
			}
		}
		
		function update(){
			$info['last_time']=time();
			$info['last_ip']=ip_to_long($_SERVER['REMOTE_ADDR']);
			$info['level']=$_POST['level'];
			$info['gender']=$_POST['gender'];
			$re=D('User')->where(array('id'=>$_POST['id']))->update($info);
			if($re){
				$this->success('更新成功！',3,'user/index');	
			}else{
				$this->error('系统错误！请联系网站开发者！');	
			}
		}
		
		function do_mod_pass(){
			$user=D('User');
			$result=$user->where(array('id'=>$_SESSION['user_info']['id'],'password'=>md5($_POST['old_pass'])))->find();
			if(!empty($result)){
				if($_POST['new_pass']==$_POST['new_pass_true']){
					$info['id']=$_SESSION['user_info']['id'];
					$info['password']=md5($_POST['new_pass']);
					$re=$user->where(array('id'=>$info['id']))->update('password='.$info['password']);
					if($re){
						$this->success('密码修改成功');
					}else{
						$this->error('系统错误！请联系网站开发者！');
					}	
				}else{
					$this->error('两次密码输入不一致！');
				}
			}else{
				$this->error('旧密码输入错误！');
			}
		}
		function mod_pass(){
			$this->assign('title','修改密码----'.TITLE.'管理系统');
			$this->display();	
		}
		
		function add_admin(){
			$this->assign('title','增加管理员----'.TITLE.'管理系统');
			$this->display();	
		}
		
		function do_add_admin(){
			$user=D('User');
			$username=$_POST['username'];
			$result=$user->field('level,id')->where(array('username'=>$username))->find();
			if(!empty($result)){
				if($result['level']==0){
					$re=$user->where(array('id'=>$result['id']))->update('level=1');
					if($re){
						$this->success('增加管理员成功！');
					}else{
						$this->error('系统错误！请联系网站开发者！');
					}
				}elseif($result['level']==1){
					$this->error('此用户已经是管理员了！请不要重复操作！');
					}else{
					$this->error('抱歉！你没有权限处理他！');
					}	
			}else{
				$this->error('不存在此用户！');
			}
		}
	}
?>