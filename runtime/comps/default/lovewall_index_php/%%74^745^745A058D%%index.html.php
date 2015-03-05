<?php /* Smarty version 2.6.18, created on 2013-08-31 16:47:36
         compiled from lovewall/index.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--引入css和js的公共文件-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "public/title.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</head>
<body>
    <!--[if IE 8]><body class="ie"><![endif]-->
    <!--[if IE 7]><body class="ie"><![endif]-->
    <div id="shadow_all"></div>
    <!--引入注册的公共文件-->
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "public/register.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!--引入登录的公共文件-->
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "public/login.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!--引入导航栏-->
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "public/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
    <div id="small_window">
        <a id="cancle3" class="cancleAll"></a>
        <form action = "<?php echo $this->_tpl_vars['url']; ?>
/saylove" method = "post">
            <textarea id="iwish_text" name="text"></textarea>
            <p id="checkin">
                <input type="checkbox" name="check" id="check" value = "niming">
                <a id="checkimg"></a>匿名
                <span id="wordsize">( 0/140 )</span>
            </p>
            <p id="mail">Ta的邮箱（选填）</p><input type="text" name="mailbox">
            <span>（我们会为你发送一封邮件给Ta）</span>
			<input id="window_button" value="提交" type="submit" name = "submit"/>
        </form>
    </div>

    <!--内容背景-->
    <div id="top_background">
        <img id="top_sky" src="<?php echo $this->_tpl_vars['res']; ?>
/images/blue sky.png">
        <img id="left_balloon"src="<?php echo $this->_tpl_vars['res']; ?>
/images/left_balloon.png" alt="love">
        <img id="right_balloon" src="<?php echo $this->_tpl_vars['res']; ?>
/images/right_balloon.png" alt="love">
        <div class="clear"></div>
        <div id="love_expression">
        <a id="small_show">我要表白</a>
        <a href="<?php echo $this->_tpl_vars['app']; ?>
/myCenter/index" id="my_expression">我的表白</a>
        </div>
        <div id="two_demensional_code">
        <img id="code_img" src="<?php echo $this->_tpl_vars['res']; ?>
/images/2 demensional code.png" alt="扫一扫">“发送‘表白 ’ 到微信，随时随地表白爱”
        </div>
        <div class="clear"></div>
        <img id="top" src="<?php echo $this->_tpl_vars['res']; ?>
/images/top.png">
    </div>
    <!--内容背景结束-->
    <!--瀑布流开始-->
    <div class="wrapper" id="wrapper">
    <?php unset($this->_sections['ls']);
$this->_sections['ls']['loop'] = is_array($_loop=$this->_tpl_vars['data']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ls']['name'] = 'ls';
$this->_sections['ls']['show'] = true;
$this->_sections['ls']['max'] = $this->_sections['ls']['loop'];
$this->_sections['ls']['step'] = 1;
$this->_sections['ls']['start'] = $this->_sections['ls']['step'] > 0 ? 0 : $this->_sections['ls']['loop']-1;
if ($this->_sections['ls']['show']) {
    $this->_sections['ls']['total'] = $this->_sections['ls']['loop'];
    if ($this->_sections['ls']['total'] == 0)
        $this->_sections['ls']['show'] = false;
} else
    $this->_sections['ls']['total'] = 0;
if ($this->_sections['ls']['show']):

            for ($this->_sections['ls']['index'] = $this->_sections['ls']['start'], $this->_sections['ls']['iteration'] = 1;
                 $this->_sections['ls']['iteration'] <= $this->_sections['ls']['total'];
                 $this->_sections['ls']['index'] += $this->_sections['ls']['step'], $this->_sections['ls']['iteration']++):
$this->_sections['ls']['rownum'] = $this->_sections['ls']['iteration'];
$this->_sections['ls']['index_prev'] = $this->_sections['ls']['index'] - $this->_sections['ls']['step'];
$this->_sections['ls']['index_next'] = $this->_sections['ls']['index'] + $this->_sections['ls']['step'];
$this->_sections['ls']['first']      = ($this->_sections['ls']['iteration'] == 1);
$this->_sections['ls']['last']       = ($this->_sections['ls']['iteration'] == $this->_sections['ls']['total']);
?>
        <div class="content">
            <div class="info"><p><?php echo $this->_tpl_vars['data'][$this->_sections['ls']['index']]['name']; ?>
</p><span><?php echo $this->_tpl_vars['data'][$this->_sections['ls']['index']]['today_time']; ?>
</span></div>
            <div class="text">
               <?php echo $this->_tpl_vars['data'][$this->_sections['ls']['index']]['content']; ?>

            </div>
            <div class="source">
            <?php if ($this->_tpl_vars['data'][$this->_sections['ls']['index']]['post_type'] == 0): ?>
            <span><img src="<?php echo $this->_tpl_vars['res']; ?>
/images/weixin.png" alt="from wechat"> 通过微信投稿</span>
            <?php else: ?>
            <span><img src="<?php echo $this->_tpl_vars['res']; ?>
/images/website.png" alt="from website"> 通过网站投稿</span>
            <?php endif; ?>
            <?php if ($_SESSION['home_login'] == 1): ?>
                	<a id="support" xid="<?php echo $this->_tpl_vars['data'][$this->_sections['ls']['index']]['id']; ?>
"><img src="<?php echo $this->_tpl_vars['res']; ?>
/images/heart.png" alt="点赞"><strong style="font-style:normal" class="sup_num"><?php echo $this->_tpl_vars['data'][$this->_sections['ls']['index']]['support_num']; ?>
</strong></a>
            <?php else: ?>
                <a><img src="<?php echo $this->_tpl_vars['res']; ?>
/images/heart.png" alt="点赞"><?php echo $this->_tpl_vars['data'][$this->_sections['ls']['index']]['support_num']; ?>
</a>
            <?php endif; ?>
            </div>
        </div>
	<?php endfor; endif; ?>
                <div id="naocan"><?php echo $this->_tpl_vars['fpage']; ?>
</div><!--每页20个-->
    </div>
    <!--瀑布流结束-->
 <!--引入底部版本信息和js文件的公共文件-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "public/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
    </body>
    </html>