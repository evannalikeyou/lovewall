<?php /* Smarty version 2.6.18, created on 2013-08-31 16:47:53
         compiled from myCenter/index.html */ ?>
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
<!--用来显示个人中心一些弹窗信息-->
<div id="show_info">
	<h2><span class="close">关闭</span></h2>
    <dl class="add"></dl>
</div>
    <div id="shadow_all"></div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "public/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--内容背景-->
<div id="top_background">
    <img id="top_sky" src="<?php echo $this->_tpl_vars['res']; ?>
/images/blue sky.png">
    <img id="left_balloon"src="<?php echo $this->_tpl_vars['res']; ?>
/images/left_balloon.png" alt="love">
    <img id="right_balloon" src="<?php echo $this->_tpl_vars['res']; ?>
/images/right_balloon.png" alt="love">
</div>
<div id="wrapper">
    <div id="left">
        <div id="image"><img src="<?php echo $this->_tpl_vars['res']; ?>
/images/piccc.png" alt="头像">用户名</div>
            <a href="<?php echo $this->_tpl_vars['url']; ?>
/myExpression">我的表白</a>
            <a href="<?php echo $this->_tpl_vars['url']; ?>
/myWish">我的许愿</a>
            <a href="<?php echo $this->_tpl_vars['app']; ?>
/login/logout">退出登录</a>
    </div>
    <div id="right">
        <table id="info">
            <tr>
                <th>编号</th>
                <th>状态</th>
                <th>匿名</th>
                <th>操作</th>
            </tr>
            <?php unset($this->_sections['ls']);
$this->_sections['ls']['loop'] = is_array($_loop=$this->_tpl_vars['expression']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <tr>
                <td>520<?php echo $this->_tpl_vars['expression'][$this->_sections['ls']['index']]['id']; ?>
</td>
                <?php if ($this->_tpl_vars['expression'][$this->_sections['ls']['index']]['audit'] == 0): ?>
                <td>正在审核</td>
                <?php elseif ($this->_tpl_vars['expression'][$this->_sections['ls']['index']]['audit'] == 1): ?>
                <td>审核不通过
                	<span style="font-size:12px; cursor:pointer; color:#03F; margin-left:10px" class="lookDetail">查看详情</span>
                    <input type="hidden" value="<?php echo $this->_tpl_vars['expression'][$this->_sections['ls']['index']]['no_audit_id']; ?>
"</td>
                <?php else: ?>
                <td>审核通过</td>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['expression'][$this->_sections['ls']['index']]['user_type'] == 0): ?>
                <td>YES</td>
                <?php else: ?>
                <td>NO</td>
                <?php endif; ?>
                <td><a id="delete" did="<?php echo $this->_tpl_vars['expression'][$this->_sections['ls']['index']]['id']; ?>
"  onClick="if(confirm('确认删除？')){return true;}else{return false;}">删除</a></td>
            </tr>
			<?php endfor; endif; ?>

        </table>
        <div id="naocan"><?php echo $this->_tpl_vars['fpage']; ?>
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