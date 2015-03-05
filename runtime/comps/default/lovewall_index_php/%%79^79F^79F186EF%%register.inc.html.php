<?php /* Smarty version 2.6.18, created on 2013-08-31 16:47:11
         compiled from public/register.inc.html */ ?>
<div id="register">
        <a id="cancle" class="cancleAll"></a>
        <form action="<?php echo $this->_tpl_vars['app']; ?>
/register/register" method="post">
            <p>用 户 名</p>
            <input type="text" name="username" id="username"/>
            <p>密 码</p>
            <input type="password" name="password" id="password"/>
            <p>密码确认</p>
            <input type="password" name="passwordture" id="passwordsure"/>
            <p>邮 箱</p>
            <input type="text" name="email" id="mailbox"/>
            <input id="register_botton" value="提交" type="submit" />
        </form>
</div>