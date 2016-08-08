<?php /* Smarty version 2.6.12, created on 2006-11-09 13:54:50
         compiled from vendors_goods.tpl */ ?>
<table width="100%" height="100%" cellpadding="2" cellspacing="0" border="1">
<tr>
	<td height="20">Каталог:</td>
</tr>
<tr>
	<td colspan="4" height="100%" valign="top">
		<table border="1" cellpadding="2">
			<?php $_from = $this->_tpl_vars['catalog']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
			<tr>
				<td><?php echo $this->_tpl_vars['c']['prefix']; ?>

				<?php if ($this->_tpl_vars['c']['cat_right']-$this->_tpl_vars['c']['cat_left'] == 1): ?>
					<a href="index.php?cmd=show_vendors&cat_id=<?php echo $this->_tpl_vars['c']['cat_id']; ?>
"><?php echo $this->_tpl_vars['c']['cat_name']; ?>
</a>
				<?php else: ?>
					<?php echo $this->_tpl_vars['c']['cat_name']; ?>

				<?php endif; ?>
				</td>
			</tr>
			<?php endforeach; endif; unset($_from); ?>	
		</table>
	</td>
</tr>
</table>