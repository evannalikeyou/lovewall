<?php /* Smarty version 2.6.18, created on 2013-08-31 16:48:04
         compiled from login/index.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//Dtd html 4.0 Transitional//EN">
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<html>
<head>
<title>勇敢爱后台登录</title>
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['res']; ?>
/css/login.css" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->_tpl_vars['res']; ?>
/images/heart.png" media="screen" />
<body>
<div id=div1>
<a href="<?php echo $this->_tpl_vars['root']; ?>
/index.php"><img src="<?php echo $this->_tpl_vars['public']; ?>
/images/logo.png" /></a>

  <table id=login height="100%" cellSpacing=0 cellPadding=0 width="800" 
align=center>
    <tbody>
      <tr id="main">
        <td>
          <table height="100%" cellSpacing=0 cellPadding=0 width="100%">
            <tbody>
              <tr>
                <td colspan="4">&nbsp;</td>
              </tr>
              <tr height="30">
                <td width="380">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <form method="post" action="<?php echo $this->_tpl_vars['url']; ?>
/login">
              <tr height="40">
                <td rowSpan="4">&nbsp;</td>
                <td>用户名：</td>
                <td>
                  <input type="text" name="username" class="textbox" />
                </td>
                <td width="120">&nbsp;</td>
              </tr>
              <tr height="40">
                <td>密　码：</td>
                <td>
                  <input class="textbox" type="password" 
            name="password" />
                </td>
                <td width="120">&nbsp;</td>
              </tr>
              <tr height="40">
                <td>验证码：</td>
                <td aligin="center" colspan="2">
                  <input  size="4" name="code" onkeyup="if(this.value!=this.value.toUpperCase()) this.value=this.value.toUpperCase();" />
                  &nbsp; <img style="vertical-align:-30%;cursor:pointer;" src="<?php echo $this->_tpl_vars['url']; ?>
/code" onclick="this.src='<?php echo $this->_tpl_vars['url']; ?>
/code/'+Math.random()"  />点击图片刷新</td>
              </tr>
              <tr height=40>
                <td></td>
                <td align=right>
                  <input type="submit" value="登 录" class="sub_but" />
                </form>
                </td>
                <td width="120">&nbsp;</td>
              </tr>
              <tr height="110">
                <td colspan=4>&nbsp;</td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
      <tr id=root height=104>
        <td>&nbsp;</td>
      </tr>
    </tbody>
  </table>
</div>
<div id="div2" style="DISPLAY: none"></div>
</CONTENTTEMPLATE>
</body>
</html>