<?php /* Smarty version 2.6.12, created on 2006-08-23 18:04:25
         compiled from edit_category.tpl */ ?>
<form method=post>
<table width="100%" cellspacing="2" cellpadding="2" border="1">
<tr>
    <td align=center><input type=text name=cat_name value='<?php echo $this->_tpl_vars['cat_name']; ?>
' size=50></td>
</tr>
<tr>
    <td align="center"><input type="submit" value="Изменить"></td>
</tr>
</table>
<input type="hidden" name="cmd" value="update_category">
<input type="hidden" name="cat_id" value=<?php echo $this->_tpl_vars['cat_id']; ?>
>
</form>