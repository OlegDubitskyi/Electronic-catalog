<?php /* Smarty version 2.6.12, created on 2006-11-11 01:02:09
         compiled from add_model.tpl */ ?>
<form method="POST">
<table cellpadding="0" cellspacing="0" border="1">
	<tr>
		<td>Модель:</td>
		<td><input type="text" name="model_name"></td>
	</tr>
	<tr>
		<td colspan=2 align="center"><input type="submit" value="Сохранить"></td>
	</tr>
</table>
<input type="hidden" name="cmd" value="insert_model">
<input type="hidden" name="cat_id" value="<?php echo $this->_tpl_vars['cat_id']; ?>
">
<input type="hidden" name="vendor_id" value="<?php echo $this->_tpl_vars['vendor_id']; ?>
">
</form>	