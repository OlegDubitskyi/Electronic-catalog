<?php /* Smarty version 2.6.12, created on 2007-03-19 21:36:23
         compiled from show_mail_list.tpl */ ?>
<form>
<table border="1" width="100%">
<?php if (count ( $this->_tpl_vars['mail_list'] ) > 0): ?>
	<tr>
		<td><b>№</b></td>		
		<td><b>Название компании</b></td>
		<td><b>URL</b></td>
		<td><b>Email</b></td>
		<td><b>ICQ</b></td>
		<td><b>Статус</b></td>
		<td><b>Действия</b></td>				
	</tr>
<?php $_from = $this->_tpl_vars['mail_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['mail_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['mail_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ml']):
        $this->_foreach['mail_list']['iteration']++;
?>	
<?php if ($this->_tpl_vars['ml']['id'] == $this->_tpl_vars['mail_id']): ?>
	<tr>
		<td><?php echo $this->_foreach['mail_list']['iteration']; ?>
</td>		
		<td><input type="text" name="mail_data[name]" value="<?php echo $this->_tpl_vars['ml']['name']; ?>
"></td>
		<td><input type="text" name="mail_data[url]" value="<?php echo $this->_tpl_vars['ml']['url']; ?>
"></td>
		<td><input type="text" name="mail_data[email]" value="<?php echo $this->_tpl_vars['ml']['email']; ?>
"></td>
		<td><input type="text" name="mail_data[icq]" value="<?php echo $this->_tpl_vars['ml']['icq']; ?>
"></td>
		<td><input type="text" name="mail_data[status]" value="<?php echo $this->_tpl_vars['ml']['status']; ?>
"></td>		
		<td>
			<input type="hidden" name="mail_data[id]" value="<?php echo $this->_tpl_vars['ml']['id']; ?>
">
			<input type="hidden" name="cmd" value="update_mail">			
			<input type="submit" value="Сохранить">
		</td>				
	</tr>
<?php else: ?>
	<tr>
		<td><?php echo $this->_foreach['mail_list']['iteration']; ?>
</td>		
		<td><?php echo $this->_tpl_vars['ml']['name']; ?>
</td>
		<td><?php echo $this->_tpl_vars['ml']['url']; ?>
</td>
		<td><?php echo $this->_tpl_vars['ml']['email']; ?>
</td>
		<td><?php echo $this->_tpl_vars['ml']['icq']; ?>
</td>
		<td><?php echo $this->_tpl_vars['ml']['status']; ?>
</td>		
		<td width="120">
			<table border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td><a href="index.php?cmd=del_mail&id=<?php echo $this->_tpl_vars['ml']['id']; ?>
">удалить</a>&nbsp;&nbsp;&nbsp;</td>
					<td><a href="index.php?cmd=edit_mail&id=<?php echo $this->_tpl_vars['ml']['id']; ?>
">редактировать</a></td>
				</tr>
			</table>		
		</td>				
	</tr>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php else: ?>
	<tr>
		<td align="center">Список пуст</td>
	</tr>
<?php endif; ?>
	<tr>
		<td colspan="7" align="right"><a href="index.php?cmd=add_mail">Добавить</a></td>
	</tr>	
</table>
</form>