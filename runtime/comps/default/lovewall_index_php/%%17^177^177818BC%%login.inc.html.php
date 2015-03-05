<?php /* Smarty version 2.6.18, created on 2013-08-31 16:47:11
         compiled from public/login.inc.html */ ?>
    <div id="login">
        <a id="cancle2" class="cancleAll"></a>
        <form action="<?php echo $this->_tpl_vars['app']; ?>
/login/login" method="post">
            <p>账 号</p>
            <input type="text" name="username" id="username"/>
            <p>密 码</p>
            <input type="password" name="password" id="password"/>
            <input id="login_botton" value="提交" type="submit" />
        </form>
	</div>