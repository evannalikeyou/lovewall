<?php /* Smarty version 2.6.18, created on 2013-08-31 16:47:11
         compiled from index/index.html */ ?>
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
    
    <div id="main">
        <div id="tree">
            <a href="<?php echo $this->_tpl_vars['app']; ?>
/tree/index" id="tree1"></a>
            <a href="<?php echo $this->_tpl_vars['app']; ?>
/tree/index" id="tree2"></a>
            <a href="<?php echo $this->_tpl_vars['app']; ?>
/tree/index" id="leaves">
                <span id="leaves1" class="all"></span>
                <span id="leaves2" class="all"></span>
                <span id="leaves3" class="all"></span>
                <span id="leaves4" class="all"></span>
            </a>
        </div>
        <div id="flower">
            <a href="<?php echo $this->_tpl_vars['app']; ?>
/originality/index" id="flower1"></a>
            <a href="<?php echo $this->_tpl_vars['app']; ?>
/originality/index" id="flower2"></a>
            <a href="<?php echo $this->_tpl_vars['app']; ?>
/originality/index" id="flower3"></a>
            <a href="<?php echo $this->_tpl_vars['app']; ?>
/originality/index" id="flower4"></a>
            <a href="<?php echo $this->_tpl_vars['app']; ?>
/originality/index" id="flower5"></a>
        </div>
        <div id="boy">
            <div id="heartAll">
                <a href="<?php echo $this->_tpl_vars['app']; ?>
/lovewall/index" id="heart1"></a>
                <a href="<?php echo $this->_tpl_vars['app']; ?>
/lovewall/index" id="heart2"></a>
                <a href="<?php echo $this->_tpl_vars['app']; ?>
/lovewall/index" id="heart3"></a>
            </div>
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