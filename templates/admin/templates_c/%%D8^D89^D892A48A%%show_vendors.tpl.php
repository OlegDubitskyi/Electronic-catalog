<?php /* Smarty version 2.6.12, created on 2007-02-08 21:20:07
         compiled from show_vendors.tpl */ ?>
<table width="100%" height="100%" cellpadding="0" cellspacing="0" border="1">
<tr>
	<td><a href="index.php?cmd=vendors_goods">Вернуться к списку категорий</a></td>
</tr>
<tr>
	<td height="20" align="center"><?php echo $this->_tpl_vars['cat_data']['cat_name']; ?>
</td>
</tr>
<tr>
	<td height="20">Производители:</td>
</tr>
<tr>
<form method="POST">
	<td height="100%" valign="top" align="center">
		<table border="1" cellpadding="2" cellspacing="0">
			<?php if ($this->_tpl_vars['cmd'] == 'del_vendor'): ?>
			<tr>
				<td colspan="4">Кол-во удаленных товаров: <?php echo $this->_tpl_vars['num_deleted_goods']; ?>
</td>
			</tr>
			<?php endif; ?>
			<tr>
				<td>Производитель</td>
				<td>Перенос</td>
				<td>Редактировать</td>
				<td>Удалить</td>
			</tr>
			<?php $_from = $this->_tpl_vars['vendor_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['vl'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['vl']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['vl']):
        $this->_foreach['vl']['iteration']++;
?>
			<tr>
				<?php if ($this->_tpl_vars['vl']['id'] == $this->_tpl_vars['vendor_id']): ?>
				<td><input type="text" name="vendor_name" value="<?php echo $this->_tpl_vars['vl']['vendor_name']; ?>
"></td>
				<td><input type="checkbox" name="transfer[<?php echo ($this->_foreach['vl']['iteration']-1); ?>
]" disabled></td>
				<td><input type="submit" value="сохранить"></a></td>
				<input type="hidden" name="cmd" value="update_vendor">
				<input type="hidden" name="vendor_id" value="<?php echo $this->_tpl_vars['vendor_id']; ?>
">				
				<input type="hidden" name="cat_id" value="<?php echo $this->_tpl_vars['vl']['cat_id']; ?>
">								
				<td>удалить</td>				
				<?php else: ?>
				<td><a href="index.php?cmd=show_models&vid=<?php echo $this->_tpl_vars['vl']['id']; ?>
&cat_id=<?php echo $this->_tpl_vars['vl']['cat_id']; ?>
"><?php echo $this->_tpl_vars['vl']['vendor_name']; ?>
</a></td>
				<td><input type="checkbox" name="transfer[<?php echo ($this->_foreach['vl']['iteration']-1); ?>
]" value="<?php echo $this->_tpl_vars['vl']['id']; ?>
"></td>
				<td><a href="index.php?cmd=show_vendors&vid=<?php echo $this->_tpl_vars['vl']['id']; ?>
&cat_id=<?php echo $this->_tpl_vars['vl']['cat_id']; ?>
">редактировать</a></td>
				<td><a href="index.php?cmd=del_vendor&vid=<?php echo $this->_tpl_vars['vl']['id']; ?>
&cat_id=<?php echo $this->_tpl_vars['vl']['cat_id']; ?>
">удалить</a></td>
				<?php endif; ?>
			</tr>
			<?php endforeach; endif; unset($_from); ?>	

			<?php if (! $this->_tpl_vars['vendor_id']): ?>
			<tr>
				<td colspan="2" align="center">
					<a href="index.php?cmd=add_vendor&cat_id=<?php echo $this->_tpl_vars['cat_data']['cat_id']; ?>
">Добавить</a>
				</td>
				<td colspan="2">
					Перенести в 
					<select name="to_vendor_id">
						<option value="-1" selected>Производитель
					<?php $_from = $this->_tpl_vars['vendor_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['vl'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['vl']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['vl']):
        $this->_foreach['vl']['iteration']++;
?>
						<option value="<?php echo $this->_tpl_vars['vl']['id']; ?>
"><?php echo $this->_tpl_vars['vl']['vendor_name']; ?>

					<?php endforeach; endif; unset($_from); ?>&nbsp;&nbsp;&nbsp;
					<input type="hidden" name="cmd" value="transfer_vendor">
					<input type="hidden" name="cat_id" value="<?php echo $this->_tpl_vars['cat_data']['cat_id']; ?>
">
					<input type="submit" value="Перенести">
					</select>
				</td>
			</tr>
			<?php endif; ?>			
		</table>
	</td>
</form>	
</tr>
</table>