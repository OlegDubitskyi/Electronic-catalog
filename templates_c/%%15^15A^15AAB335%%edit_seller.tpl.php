<?php /* Smarty version 2.6.12, created on 2006-08-23 18:30:23
         compiled from edit_seller.tpl */ ?>
<form method=post>
<table width="100%" cellspacing="2" cellpadding="2" border="1">
<tr>
    <td align=center><input type=text name=name value='<?php echo $this->_tpl_vars['seller_name']; ?>
' size=50></td>
</tr>
<tr>
    <td align=center><textarea name=comments cols="38" rows="4"><?php echo $this->_tpl_vars['comments']; ?>
</textarea></td>
</tr>
<tr>
    <td align="center"><input type="submit" value="Изменить"></td>
</tr>
</table>
<input type="hidden" name="cmd" value="update_seller">
</form>