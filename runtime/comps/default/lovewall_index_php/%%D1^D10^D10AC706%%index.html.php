<?php /* Smarty version 2.6.18, created on 2013-08-31 16:47:47
         compiled from originality/index.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "public/register.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "public/login.inc.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "public/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    
    <div id="photobox">
        <div id="photo">
            <div id="turnleft" class="turnppt"></div>
            <div id="photos">
                <img src="<?php echo $this->_tpl_vars['res']; ?>
/images/img1.jpg" id="placeholder"/>
            </div>
            <div id="turnright" class="turnppt"></div>
        </div>
        <div id="smallphotos">
        <div id="smallleft" class="smallppt"></div>
        <div id="ppt">
            <a id="cancle4" class="cancleAll"></a>
                <div id="ppt_image">
                    <ul id="image">
                        <li>
                            <img src="<?php echo $this->_tpl_vars['res']; ?>
/images/img1.jpg" class="ppt_smallphotos" title="A fireworks display" id="photo_on"/>
                        </li>
                        <li>
                            <img src="<?php echo $this->_tpl_vars['res']; ?>
/images/img2.jpg" class="ppt_smallphotos"  title="A cup of black coffee"/>
                        </li>
                        <li>
                            <img src="<?php echo $this->_tpl_vars['res']; ?>
/images/img3.jpg" class="ppt_smallphotos"  title="A red, red rose"/>
                        </li>
                        <li>
                            <img src="<?php echo $this->_tpl_vars['res']; ?>
/images/img4.jpg" class="ppt_smallphotos"  title="The famous clock"/>
                        </li>
                        <li>
                            <img src="<?php echo $this->_tpl_vars['res']; ?>
/images/img5.jpg" class="ppt_smallphotos"/>
                        </li>
                        <li>
                            <img src="<?php echo $this->_tpl_vars['res']; ?>
/images/img1.jpg" class="ppt_smallphotos"/>
                        </li>
                    </ul>
                </div>
        </div>
        <div id="smallright" class="smallppt"></div>
        </div>
        <p id="description">请选择图片</p>
    </div>

    <div id="small_window">
        <a id="cancle3" class="cancleAll"></a>
        <form action = "<?php echo $this->_tpl_vars['url']; ?>
/saylove" method = "post">
            <textarea id="iwish_text" name="text"></textarea>
            <p id="checkin">
                <input type="checkbox" name="check" id="check">
                <a id="checkimg" style=""></a>匿名
                <span id="wordsize">( 0/140 )</span>
            </p>
            <p id="mail">Ta的邮箱（选填）</p><input type="text" name="mailbox">
            <span>（我们会为你发送一封邮件给Ta）</span>
            <input id="window_button" value="提交" type="submit" name = "submit" />
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
/myCenter/index" id="my_expression">我的表白</a>    </div>
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
        <div class="info">
            <img src="<?php echo $this->_tpl_vars['public']; ?>
/uploads/<?php echo $this->_tpl_vars['data'][$this->_sections['ls']['index']]['photo']; ?>
" xid="<?php echo $this->_tpl_vars['data'][$this->_sections['ls']['index']]['id']; ?>
" alt="pic"><?php echo $this->_tpl_vars['data'][$this->_sections['ls']['index']]['explain']; ?>

        </div>
    </div>
	<?php endfor; endif; ?>
                <div id="naocan"><?php echo $this->_tpl_vars['fpage']; ?>
</div><!--每页20个-->
</div>

<script type="text/javascript" src="<?php echo $this->_tpl_vars['res']; ?>
/js/<?php echo $this->_tpl_vars['script']; ?>
.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['res']; ?>
/js/common.js"></script>
</body>
</html>