<?php /* Smarty version 2.6.18, created on 2013-08-31 16:47:11
         compiled from public/header.html */ ?>
    <div id="header">
	<div id="header_top"></div>
		<div id="nav">
			<ul>
				<li><a href="<?php echo $this->_tpl_vars['app']; ?>
/index/index">首页</a></li>
				<li><a href="<?php echo $this->_tpl_vars['app']; ?>
/lovewall/index">表白墙</a></li>
				<li><a href="<?php echo $this->_tpl_vars['app']; ?>
/tree/index">许愿树</a></li>
				<li><a href="<?php echo $this->_tpl_vars['app']; ?>
/originality/index">创意表白</a></li>
				<div id="block"></div>
			</ul>
			<?php if ($_SESSION['home_login'] && $_SESSION['home_login'] == 1): ?>
				<p><a href="<?php echo $this->_tpl_vars['app']; ?>
/myCenter/index" id="login_show">个人中心</a></p>
			<?php else: ?>
				<p><a id="login_show">登陆</a>\<a  id="register_show">注册</a></p>
			<?php endif; ?>
		</div>
		<div id="header_line"></div>
    </div>
    <div id="clear"></div>
    <!-- end of the header -->