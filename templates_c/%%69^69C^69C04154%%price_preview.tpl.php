<?php /* Smarty version 2.6.12, created on 2006-08-27 13:53:57
         compiled from price_preview.tpl */ ?>
<form action="index.php" method="POST">
<table cellspacing="0" cellpadding="2" border="1">
<tr>
	<th colspan=4><?php echo $this->_tpl_vars['cat_name']; ?>
</th>
</tr>
<tr>
    <th>Производитель</th>
    <th>Товар</th>
    <th>Цена</th>
    <th>Удалить</th>
</tr>
<?php $_from = $this->_tpl_vars['goods_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
<tr>
    <td><?php echo $this->_tpl_vars['row']['vendor']; ?>
</td>
    <td><?php echo $this->_tpl_vars['row']['model']; ?>
</td>
    <td><?php echo $this->_tpl_vars['row']['price']; ?>
</td>
    <td><a href="">Удалить</a></td>
</tr>
<?php endforeach; endif; unset($_from); ?>
<tr>
	<td colspan=4><input type="submit" value="Импортировать в базу"></td>
</tr>
</table>
<input type="hidden" name="cat_id" value="<?php echo $this->_tpl_vars['cat_id']; ?>
">
<input type="hidden" name="seller_id" value="<?php echo $this->_tpl_vars['seller_id']; ?>
">
<input type="hidden" name="cmd" value="import_price">
</form>