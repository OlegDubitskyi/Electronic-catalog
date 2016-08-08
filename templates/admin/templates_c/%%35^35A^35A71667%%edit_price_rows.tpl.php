<?php /* Smarty version 2.6.12, created on 2006-11-14 15:50:25
         compiled from edit_price_rows.tpl */ ?>
<form method="POST">
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
				<td colspan="10"><b><?php echo $this->_tpl_vars['cat_name']; ?>
</b></td>
			</tr>
			<tr>
				<td width=250>Наименование</td>
				<td>Цена, грн.</td>
				<td>Цена, usd</td>
				<td>Опт, грн.</td>				
				<td>Опт, usd</td>
				<td>Гарантия</td>
				<td>Наличие</td>
				<td colspan="2" align="center">Действия</td>
			</tr>		
		<?php $_from = $this->_tpl_vars['rows_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['g']):
?>
			<tr>
			<?php if ($this->_tpl_vars['edit_position_id'] == $this->_tpl_vars['g']['id']): ?>
				<td><?php echo $this->_tpl_vars['g']['vendor_name']; ?>
 <?php echo $this->_tpl_vars['g']['name']; ?>
 <?php echo $this->_tpl_vars['g']['description']; ?>
</td>
				<td><input size=5 type="text" name="price_ua" value="<?php echo $this->_tpl_vars['g']['price_ua']; ?>
"></td>
				<td><input size=5 type="text" name="price_usd" value="<?php echo $this->_tpl_vars['g']['price_usd']; ?>
"></td>
				<td><input size=5 type="text" name="price_opt_ua" value="<?php echo $this->_tpl_vars['g']['price_opt_ua']; ?>
"></td>
				<td><input size=5 type="text" name="price_opt_usd" value="<?php echo $this->_tpl_vars['g']['price_opt_usd']; ?>
"></td>
				<td><input size=5 type="text" name="guarantee" value="<?php echo $this->_tpl_vars['g']['guarantee']; ?>
"></td>
				<td><input size=10 type="text" name="presence" value="<?php echo $this->_tpl_vars['g']['presence']; ?>
"></td>
				<td><input type="submit" value="сохранить"></td>
				<td>&nbsp;</td>
				<input type="hidden" name="gid" value="<?php echo $this->_tpl_vars['g']['id']; ?>
">				
			<?php else: ?>
				<td><?php echo $this->_tpl_vars['g']['vendor_name']; ?>
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
				<td><a href="index.php?cmd=edit_position&cat_id=<?php echo $this->_tpl_vars['g']['cat_id']; ?>
&gid=<?php echo $this->_tpl_vars['g']['id']; ?>
">редактировать</a></td>																							
				<td><a href="index.php?cmd=del_position&cat_id=<?php echo $this->_tpl_vars['g']['cat_id']; ?>
&gid=<?php echo $this->_tpl_vars['g']['id']; ?>
">удалить</a></td>																				
			<?php endif; ?>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
		</table>
	</td>
</tr>
</table>
<input type="hidden" name="cmd" value="update_price_row">
</form>