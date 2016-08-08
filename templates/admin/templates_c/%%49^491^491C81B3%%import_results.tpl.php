<?php /* Smarty version 2.6.12, created on 2006-11-20 17:31:37
         compiled from import_results.tpl */ ?>
<form name="price" action="index.php" method="POST">
<table width="100%" height="100%" cellpadding="2" cellspacing="0" border="1">
<tr>
	<td height="20"><a href="index.php?cmd=seller_profile">Профиль</td>
	<td><a href="index.php?cmd=edit_seller">Статистика</td>
	<td><a href="index.php?cmd=seller_price">Прайс</a></td>	
	<td><b>Импорт</b></td>	
</tr>
<tr>
	<td colspan="4" valign="top" align="center">
		<table width="" cellpadding="2" cellspacing="0" border="0">
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>		
		<tr>
			<td>&nbsp;</td>
		</tr>				
		<tr>
			<td>Прайс был успешно импортирован в базу</td>
		</tr>
		<tr>
			<td>Кол-во удаленных строк:<?php echo $this->_tpl_vars['num_deleted_rows']; ?>
</td>
		</tr>
		<tr>
			<td>Кол-во импортированных строк:<?php echo $this->_tpl_vars['num_inserted_rows']; ?>
</td>
		</tr>
		</table>
	</td>
</tr>
</table>