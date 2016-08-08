<?php /* Smarty version 2.6.12, created on 2006-11-14 17:33:53
         compiled from show_price_rows.tpl */ ?>
<table width="100%" height="100%" cellpadding="2" cellspacing="0" border="1">
<tr>
	<td height="20"><a href="index.php?cmd=seller_profile">Профиль</td>
	<td><a href="index.php?cmd=edit_seller">Статистика</td>
	<td><b>Прайс</b></td>	
	<td><a href="index.php?cmd=seller_import">Импорт</a></td>	
</tr>
<tr>
	<td colspan="4" height="100%" valign="top">
		<table width="100%" cellpadding="2" cellspacing="0" border="1">
			<tr>
				<td colspan="10"><a href="index.php?cmd=seller_price">Вернуться к списку категорий</a></td>
			</tr>
			<tr>
				<td colspan="9"><b><?php echo $this->_tpl_vars['cat_name']; ?>
</b></td>
				<td><a href="index.php?cmd=add_position&cat_id=<?php echo $this->_tpl_vars['cat_id']; ?>
">Добавить</a></td>
			</tr>
			<tr>
				<td width=250>Наименование</td>
				<td>Цена, грн.</td>
				<td>Цена, usd</td>
				<td>Опт, грн.</td>				
				<td>Опт, usd</td>
				<td>Гарантия, мес</td>
				<td>Наличие</td>
				<td>Дата</td>
				<td colspan="2" align="center">Действия</td>
			</tr>		
		<?php $_from = $this->_tpl_vars['rows_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['g']):
?>
			<tr>
				<td width="250"><?php echo $this->_tpl_vars['g']['vendor_name']; ?>
 <?php echo $this->_tpl_vars['g']['name']; ?>
 <?php echo $this->_tpl_vars['g']['description']; ?>
</td>
				<td><?php echo $this->_tpl_vars['g']['price_ua']; ?>
</td>
				<td><?php echo $this->_tpl_vars['g']['price_usd']; ?>
</td>
				<td><?php echo $this->_tpl_vars['g']['price_opt_ua']; ?>
</td>
				<td><?php echo $this->_tpl_vars['g']['price_opt_usd']; ?>
</td>
				<td><?php echo $this->_tpl_vars['g']['guarantee']; ?>
</td>
				<td><?php if ($this->_tpl_vars['g']['presence']):  echo $this->_tpl_vars['g']['presence'];  else: ?>&nbsp;<?php endif; ?></td>
				<td><?php echo $this->_tpl_vars['g']['insert_date']; ?>
</td>
				<td><a href="index.php?cmd=edit_position&cat_id=<?php echo $this->_tpl_vars['g']['cat_id']; ?>
&gid=<?php echo $this->_tpl_vars['g']['id']; ?>
">редактировать</a></td>																				
				<td><a href="index.php?cmd=del_position&cat_id=<?php echo $this->_tpl_vars['g']['cat_id']; ?>
&gid=<?php echo $this->_tpl_vars['g']['id']; ?>
">удалить</a></td>																				
			</tr>
		<?php endforeach; endif; unset($_from); ?>
		</table>
	</td>
</tr>
</table>