<?php /* Smarty version 2.6.12, created on 2006-11-30 09:15:34
         compiled from regions.tpl */ ?>
<table width="100%" height="100%" cellpadding="0" cellspacing="0" border="1">
<?php if ($this->_tpl_vars['show_link_seller_back']): ?>
<tr>
	<td><a href="index.php?cmd=seller_profile">Вернуться к профилю компании</a></td>
</tr>
<?php endif; ?>
<tr>
	<td height="20">Регионы:</td>
</tr>
<tr>
<form method="POST">
	<td height="100%" valign="top" align="center">
		<table border="1" cellpadding="2" cellspacing="0">
			<tr>
				<td width="100">Регион</td>
				<td>Редактировать</td>
				<td>Удалить</td>
			</tr>
			<?php if (count ( $this->_tpl_vars['region_list'] ) > 0): ?>
			<?php $_from = $this->_tpl_vars['region_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rl'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rl']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['rl']):
        $this->_foreach['rl']['iteration']++;
?>
			<tr>
				<?php if ($this->_tpl_vars['rl']['id'] == $this->_tpl_vars['region_id']): ?>
				<td><input type="text" name="region_name" value="<?php echo $this->_tpl_vars['rl']['region_name']; ?>
"></td>
				<td><input type="submit" value="сохранить"></a></td>
				<input type="hidden" name="cmd" value="update_region">
				<input type="hidden" name="region_id" value="<?php echo $this->_tpl_vars['region_id']; ?>
">				
				<td>удалить</td>				
				<?php else: ?>
				<td><?php echo $this->_tpl_vars['rl']['region_name']; ?>
</td>
				<td><a href="index.php?cmd=region&region_id=<?php echo $this->_tpl_vars['rl']['id']; ?>
">редактировать</a></td>
				<td><a href="index.php?cmd=del_region&region_id=<?php echo $this->_tpl_vars['rl']['id']; ?>
">удалить</a></td>
				<?php endif; ?>
			</tr>
			<?php endforeach; endif; unset($_from); ?>	
			<?php else: ?>
			<tr>
				<td colspan="3" align="center"><b>Список пуст</b></td>
			</tr>
			<?php endif; ?>
			<?php if (! $this->_tpl_vars['region_id']): ?>
			<tr>
				<td colspan="3">
					<a href="index.php?cmd=add_region">Добавить</a>
				</td>
			</tr>
			<?php endif; ?>					
		</table>
	</td>
</form>	
</tr>
</table>