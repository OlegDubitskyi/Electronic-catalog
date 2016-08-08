<?php /* Smarty version 2.6.12, created on 2006-08-22 21:02:47
         compiled from edit_cat_win.tpl */ ?>
<form method=post>
<table width="400" cellspacing="0" cellpadding="3" border="1">
<?php if ($this->_tpl_vars['cat_size'] > 0): ?>
<?php $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
	<tr>
	    <td><a href="index.php?cmd=edit_cat&cat_id=<?php echo $this->_tpl_vars['category']['cat_id']; ?>
"><?php echo $this->_tpl_vars['category']['cat_name']; ?>
</td>
	    <td><a href="index.php?cmd=del_cat&cat_id=<?php echo $this->_tpl_vars['category']['cat_id']; ?>
">Del</a></td>
	</tr>
<?php endforeach; endif; unset($_from); ?>	
<tr>
    <td align="center" colspan=2><input type="submit" value="Добавить категорию"></td>
</tr>
<?php else: ?>
<tr>
    <td colspan=2 align="center">Список пуст</td>
</tr>
<tr>
    <td align="center"><a href="index.php?cmd=add_cat">Добавить категорию</a></td>
</tr>
<?php endif; ?>
</table>
<input type="hidden" name="cmd" value="add_cat">
</form>