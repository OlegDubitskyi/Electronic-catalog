<?php /* Smarty version 2.6.12, created on 2006-11-19 06:44:14
         compiled from seller_import.tpl */ ?>
<table width="100%" height="100%" cellpadding="2" cellspacing="0" border="1">
<tr>
	<td height="20"><a href="index.php?cmd=seller_profile">Профиль</td>
	<td><a href="index.php?cmd=edit_seller">Статистика</td>
	<td><a href="index.php?cmd=seller_price">Прайс</a></td>	
	<td><b>Импорт</b></td>	
</tr>
<tr>
	<td colspan="4" height="100%" valign="top">
		<form enctype="multipart/form-data" action="index.php"  method=post>
		<table border="1" width="100%">
		<tr>
			<td>Разделитель между колонками:</td>
			<td><input type="text" name="separator" value=','></td>
		</tr>
		<tr>
			<td>Путь к файлу:</td>
			<td><input type="file" name="userfile"></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" value="Загрузить"></td>
		</tr>
		</table>
		<input type="hidden" name="cmd" value="load_price">
		</form>
	</td>
</tr>
</table>
	