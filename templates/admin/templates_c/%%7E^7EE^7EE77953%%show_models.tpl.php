<?php /* Smarty version 2.6.12, created on 2006-11-11 17:19:53
         compiled from show_models.tpl */ ?>
<table width="100%" height="100%" cellpadding="0" cellspacing="0" border="1">
<tr>
	<td><a href="index.php?cmd=show_vendors&cat_id=<?php echo $this->_tpl_vars['cat_data']['cat_id']; ?>
">Вернуться к списку производителей</a></td>
</tr>
<tr>
	<td height="20" align="center"><?php echo $this->_tpl_vars['cat_data']['cat_name']; ?>
</td>
</tr>
<tr>
	<td height="20" align="center"><?php echo $this->_tpl_vars['vendor']['vendor_name']; ?>
</td>
</tr>
<tr>
	<td height="20">Модели:</td>
</tr>
<tr>
<form name="details" method="POST">
	<td height="100%" valign="top" align="center">
		<table border="1" cellpadding="2" cellspacing="0">
			<tr>
				<td>Наименование</td>
				<td>Перенос</td>
				<td>Редактировать</td>
				<td>Удалить</td>
			</tr>
			<?php $_from = $this->_tpl_vars['model_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ml'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ml']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ml']):
        $this->_foreach['ml']['iteration']++;
?>
			<tr>
				<?php if ($this->_tpl_vars['ml']['id'] == $this->_tpl_vars['model_id']): ?>
				<td><input type="text" name="model_name" value="<?php echo $this->_tpl_vars['ml']['name']; ?>
"></td>
				<td><input type="checkbox" name="transfer[<?php echo ($this->_foreach['ml']['iteration']-1); ?>
]" disabled></td>
				<td><input type="button" value="сохранить" onclick="javascript:subPage('update_model',<?php echo $this->_tpl_vars['ml']['cat_id']; ?>
,<?php echo $this->_tpl_vars['ml']['vendor_id']; ?>
,<?php echo $this->_tpl_vars['model_id']; ?>
)"></a></td>

				<td>удалить</td>				
				<?php else: ?>
				<td><?php echo $this->_tpl_vars['ml']['name']; ?>
</a></td>
				<td><input type="checkbox" name="transfer[<?php echo ($this->_foreach['ml']['iteration']-1); ?>
]" value="<?php echo $this->_tpl_vars['ml']['id']; ?>
"></td>
				<td><a href="index.php?cmd=show_models&vendor_id=<?php echo $this->_tpl_vars['ml']['vendor_id']; ?>
&cat_id=<?php echo $this->_tpl_vars['ml']['cat_id']; ?>
&model_id=<?php echo $this->_tpl_vars['ml']['id']; ?>
">редактировать</a></td>
				<td><a href="index.php?cmd=del_model&model_id=<?php echo $this->_tpl_vars['ml']['id']; ?>
&cat_id=<?php echo $this->_tpl_vars['ml']['cat_id']; ?>
&vendor_id=<?php echo $this->_tpl_vars['ml']['vendor_id']; ?>
">удалить</a></td>
				<?php endif; ?>
			</tr>
			<?php endforeach; endif; unset($_from); ?>	

			<?php if (! $this->_tpl_vars['vendor_id']): ?>
			<tr>
				<td colspan="2" align="center">
					<a href="index.php?cmd=add_model&cat_id=<?php echo $this->_tpl_vars['cat_data']['cat_id']; ?>
&vendor_id=<?php echo $this->_tpl_vars['vendor']['id']; ?>
">Добавить</a>
				</td>
				<td colspan="2">
					Перенести в 
					<select name="to_model_id">
						<option value="-1" selected>Модель
					<?php $_from = $this->_tpl_vars['model_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ml'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ml']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ml']):
        $this->_foreach['ml']['iteration']++;
?>
						<option value="<?php echo $this->_tpl_vars['ml']['id']; ?>
"><?php echo $this->_tpl_vars['ml']['name']; ?>

					<?php endforeach; endif; unset($_from); ?>&nbsp;&nbsp;&nbsp;
					<!--<input type="hidden" name="cmd" value="transfer_vendor">
					<input type="hidden" name="cat_id" value="<?php echo $this->_tpl_vars['cat_data']['cat_id']; ?>
">-->
					<input type="button" value="Перенести" onclick="javascript:subPage('transfer_model',<?php echo $this->_tpl_vars['cat_data']['cat_id']; ?>
,<?php echo $this->_tpl_vars['vendor']['id']; ?>
,'')">
					</select>
				</td>
			</tr>
			<?php endif; ?>			
		</table>
	</td>
		<input type="hidden" name="cmd" value="">
		<input type="hidden" name="cat_id" value="">
		<input type="hidden" name="vendor_id" value="">
		<input type="hidden" name="model_id" value="">
	</form>	
</tr>
</table>