<?php /* Smarty version 2.6.12, created on 2006-11-19 00:34:40
         compiled from edit_seller.htm */ ?>
<?php $_from = $this->_tpl_vars['seller']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['s']):
?>
<table width="100%" height="100%" cellpadding="2" cellspacing="0" border="1">
<tr>
	<td height="20"><a href="index.php?cmd=seller_profile">Профиль</a></td>
	<td><b>Статистика</b></td>
	<td><a href="index.php?cmd=seller_price">Прайс</a></td>	
	<td><a href="index.php?cmd=seller_import">Импорт</a></td>	
</tr>
<tr>
	<td colspan=4 height="100%" valign="top">По умолчанию тут будет отображаться статистика</td>
</tr>
</table>
<?php endforeach; endif; unset($_from); ?>