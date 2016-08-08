<?php /* Smarty version 2.6.12, created on 2006-10-06 11:57:58
         compiled from catalog.htm */ ?>
<table border="1" cellspacing="0" cellpadding="0" height=100% width=100% bgcolor=#ffffff>
	<tr>
		<td colspan=2 height=15>&nbsp;</td>
	</tr>
<?php $_from = $this->_tpl_vars['catalog']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['catalog']):
?>
	<tr>
		<td nowrap><?php echo $this->_tpl_vars['catalog']['prefix']; ?>
<a href="index.php?showcat=<?php echo $this->_tpl_vars['catalog']['cat_id']; ?>
"><?php echo $this->_tpl_vars['catalog']['cat_name']; ?>
</a></td>
	</tr>
<?php endforeach; endif; unset($_from); ?>

		</td>
	</tr>
</table>