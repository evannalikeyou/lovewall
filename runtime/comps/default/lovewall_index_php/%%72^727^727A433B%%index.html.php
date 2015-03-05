<?php /* Smarty version 2.6.18, created on 2013-08-31 16:47:41
         compiled from tree/index.html */ ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
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
	<!-- start of the header -->

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
        <a id="cancle4" class="cancleAll"></a>
        <form id="window_content" action = "<?php echo $this->_tpl_vars['url']; ?>
/inserter" method = "post">
            <p>输入你想许的愿望<p>
            <textarea id="iwish_text" name="text"></textarea>
            <p id="checkin">
                <input type="checkbox" name="check" value = "niming" id="check">
                <a id="checkimg"></a>匿名
                <span id="wordsize">( 0/140 )</span>
            </p>
            <div id="info">
                <p>邮箱（选填）</p>
                <input type="text" name="mailbox">
                <p id="info_span"><span>*</span>每人每周限发1条</p>
            </div>   
            <input  type="submit" name="submit" value = "提交" id="window_botton">
        </form>
    </div>
	<?php unset($this->_sections['ls']);
$this->_sections['ls']['loop'] = is_array($_loop=$this->_tpl_vars['arr']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ls']['name'] = 'ls';
$this->_sections['ls']['max'] = (int)9;
$this->_sections['ls']['show'] = true;
if ($this->_sections['ls']['max'] < 0)
    $this->_sections['ls']['max'] = $this->_sections['ls']['loop'];
$this->_sections['ls']['step'] = 1;
$this->_sections['ls']['start'] = $this->_sections['ls']['step'] > 0 ? 0 : $this->_sections['ls']['loop']-1;
if ($this->_sections['ls']['show']) {
    $this->_sections['ls']['total'] = min(ceil(($this->_sections['ls']['step'] > 0 ? $this->_sections['ls']['loop'] - $this->_sections['ls']['start'] : $this->_sections['ls']['start']+1)/abs($this->_sections['ls']['step'])), $this->_sections['ls']['max']);
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
    <div class="watch_wish">
        <a class="cancle3" class="cancleAll"></a>
        <div>
        <h5>查看许愿瓶</h5>
        <p class="text"><?php echo $this->_tpl_vars['arr'][$this->_sections['ls']['index']]['content']; ?>
</p>
        <p  class="user"><?php echo $this->_tpl_vars['arr'][$this->_sections['ls']['index']]['username']; ?>
</p>
        <p  class="information">邮箱：<?php echo $this->_tpl_vars['arr'][$this->_sections['ls']['index']]['email']; ?>
</p>
    </div>
    </div>
	<?php endfor; endif; ?>

    <div id="main">
        <button id="baitian" style="position:absolute;right:0;top:0;">白天</button>
        <div id="tree">
            <div class="buttle"><a class="buttle_no"></a><a class="buttle_light"></a></div>
            <div class="buttle"><a class="buttle_no"></a><a class="buttle_light"></a></div>
            <div class="buttle"><a class="buttle_no"></a><a class="buttle_light"></a></div>
            <div class="buttle"><a class="buttle_no"></a><a class="buttle_light"></a></div>
            <div class="buttle"><a class="buttle_no"></a><a class="buttle_light"></a></div>
            <div class="buttle"><a class="buttle_no"></a><a class="buttle_light"></a></div>
            <div class="buttle"><a class="buttle_no"></a><a class="buttle_light"></a></div>
            <div class="buttle"><a class="buttle_no"></a><a class="buttle_light"></a></div>
            <div class="buttle"><a class="buttle_no"></a><a class="buttle_light"></a></div>
        </div>
        <div id="iwish">
            <a id="iwish_a"></a>
            <a id="iwish_al"></a>
        </div>
        <div id="mywish">
            <a href="<?php echo $this->_tpl_vars['app']; ?>
/myCenter/myWish" id="mywish1"></a>
            <a href="<?php echo $this->_tpl_vars['app']; ?>
/myCenter/myWish" id="mywish2"></a>
        </div>
    </div>
 <!--引入底部版本信息和js文件的公共文件-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "public/footer.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>  
</body>
</html>