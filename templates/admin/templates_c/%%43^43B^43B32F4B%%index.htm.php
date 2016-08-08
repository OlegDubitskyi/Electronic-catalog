<?php /* Smarty version 2.6.12, created on 2007-01-06 18:37:09
         compiled from index.htm */ ?>
<html>
<head>
	<title>WebCat Administration</title>
	<link rel="stylesheet" href="../lib/style.css">	
	<script language="Javascript" src="../js/subpage.js"></script>
	<META content="text/html; charset=windows-1251" http-equiv=Content-Type>			
</head>

<body leftmargin="0" topmargin="0">
<table cellspacing="0" cellpadding="2" height="100%" width="100%" border="0">
<tr>
    <td valign=top width="120">
	    <table cellspacing="0" cellpadding="2" height="100%" width="100%" border="0">
			<tr>
				<td height="100">
					&nbsp;
				</td>
			</tr>
			<tr>
				<td valign="top">
    				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>								
				</td>
			</tr>			
		</table>
    </td>
    <td valign=top ><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['main_win'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
</tr>
</table>
</body>
</html>