<?php /* Smarty version 2.6.12, created on 2007-02-16 23:51:10
         compiled from reg_list.tpl */ ?>
<h3 align=center>Список магазинов ожидающих регистрации</h3>
<form>
<table cellpadding="2" border="1" align="center">
	<tr>
		<td>
			<SELECT name="status">
				<option value="0" <?php if ($this->_tpl_vars['status'] == 0): ?>selected<?php endif; ?>>Неподтвержденные
				<option value="1" <?php if ($this->_tpl_vars['status'] == 1): ?>selected<?php endif; ?>>Подтвержденные
				<option value="2" <?php if ($this->_tpl_vars['status'] == 2): ?>selected<?php endif; ?>>Зарегистрированные
			</SELECT>
		</td>
		<td>
			<input type="hidden" name="cmd" value="reg_list">			
			<input type="submit" value="Go">
		</td>
	</tr>
</table>
</form>
<table cellpadding="2" border="1" align="center">
<?php if (count ( $this->_tpl_vars['list'] ) > 0): ?>
  <tr>
	<td width="250" height="25">Название</td>
	<td width="150" height="25">Кол-во позиций</td>
	<td width="100">Дата регистрации (подтверждения)</td>
	<td>Действия</td>
  </tr>
	<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['l']):
?>
  	<tr>
		<td><a href="index.php?cmd=show_reg_company&id=<?php echo $this->_tpl_vars['l']['id']; ?>
"><?php echo $this->_tpl_vars['l']['company_name']; ?>
</a></td>
		<td align="center"><?php echo $this->_tpl_vars['l']['num_rows']; ?>
</td>
		<td><?php echo $this->_tpl_vars['l']['date_reg']; ?>
</td>
		<td><a href="index.php?cmd=del_reg_company&id=<?php echo $this->_tpl_vars['l']['id']; ?>
">удалить</a></td>
  	</tr>
	<?php endforeach; endif; unset($_from); ?>	  
<?php else: ?>
  	<tr>
		<td colspan="2">Список пуст</td>
  	</tr>
<?php endif; ?>
</table>