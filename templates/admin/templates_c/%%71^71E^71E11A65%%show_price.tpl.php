<?php /* Smarty version 2.6.12, created on 2006-11-01 18:48:17
         compiled from show_price.tpl */ ?>
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
		<?php $_from = $this->_tpl_vars['bottom_categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['bc']):
?>
			<tr>
				<td><a href="index.php?cmd=show_price&cat_id=<?php echo $this->_tpl_vars['bc']['cat_id']; ?>
"><?php echo $this->_tpl_vars['bc']['cat_name']; ?>
</a></td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
		</table>
	</td>
</tr>
</table>