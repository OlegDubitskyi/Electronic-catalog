<?php /* Smarty version 2.6.12, created on 2006-11-09 00:25:50
         compiled from add_vendor.tpl */ ?>
<form method="POST">
<table cellpadding="0" cellspacing="0" border="1">
	<tr>
		<td>Название производителя:</td>
		<td><input type="text" name="vendor_name"></td>
	</tr>
	<tr>
		<td colspan=2 align="center"><input type="submit" value="Сохранить"></td>
	</tr>
</table>
<input type="hidden" name="cmd" value="insert_vendor">
<input type="hidden" name="cat_id" value="<?php echo $this->_tpl_vars['cat_id']; ?>
">
</form>	