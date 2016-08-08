<?php /* Smarty version 2.6.12, created on 2006-08-23 18:35:10
         compiled from seller_list.tpl */ ?>
<form method=post>
<table width="400" cellspacing="0" cellpadding="3" border="1">
<?php if ($this->_tpl_vars['seller_list_size'] > 0): ?>
<?php $_from = $this->_tpl_vars['sellers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['seller']):
?>
	<tr>
	    <td><a href="index.php?cmd=edit_seller&seller_id=<?php echo $this->_tpl_vars['seller']['id']; ?>
"><?php echo $this->_tpl_vars['seller']['name']; ?>
</td>
	    <td><a href="index.php?cmd=del_seller&seller_id=<?php echo $this->_tpl_vars['seller']['id']; ?>
">Del</a></td>
	</tr>
<?php endforeach; endif; unset($_from); ?>	
<tr>
    <td align="center" colspan=2><input type="submit" value="Добавить поставщика"></td>
</tr>
<?php else: ?>
<tr>
    <td colspan=2 align="center">Список пуст</td>
</tr>
<tr>
    <td align="center"><a href="index.php?cmd=add_seller">Добавить поставщика</a></td>
</tr>
<?php endif; ?>
</table>
<input type="hidden" name="cmd" value="add_seller">
</form>