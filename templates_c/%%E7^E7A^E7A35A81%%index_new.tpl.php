<?php /* Smarty version 2.6.12, created on 2006-11-04 21:24:36
         compiled from index_new.tpl */ ?>
<html>
<head>
</head>
<body leftmargin=0 topmargin=0>
<table border="1" width="100%" height="100%" cellpadding="2" cellspacing="0">
<!--Cap-->
	<tr>
		<td width="10" rowspan="4"></td>
		<td align="center" height="80">шапка</td>
		<td width="10" rowspan="4"></td>
	</tr>
<!--/Cap-->	
<!--NAVIGATION-->
	<tr>
		<td height="20">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "top_navigation.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>		
		</td>
	</tr>
<!--/NAVIGATION-->	
<!--Third level -->
	<tr>
		<td valign="top">
<!--Основная часть страницы, состоящая из трех частей: левый баннер, центральная часть, правый баннер-->
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['main_win'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--/Основная часть страницы, состоящая из трех частей: левый баннер, центральная часть, правый баннер-->			
		</td>
	</tr>
<!--/Third level -->
	<tr>
		<td valign="top" height="30">
			<table border="2" width="100%" cellpadding="2" cellspacing="0">
				<tr>
					<td align="center">Кнопки и вская разная информация</td>
				</tr>
			</table>
		</td>
	</tr>	
</table>
</body>
</html>