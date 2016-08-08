<?php /* Smarty version 2.6.12, created on 2006-08-26 18:22:58
         compiled from price.tpl */ ?>
<form enctype="multipart/form-data" action="index.php"  method=post>
<table width="400" cellspacing="0" cellpadding="3" border="1">
<tr>
    <td>Разделитель между колонками:</td>
    <td><input type="text" name='splitter' value=';'></td>
</tr>
<tr>
    <td>Поставщик:</td>
    <td>
    	<select name=seller_id> 
    	<option value="-1">Выберите поставщика
    	<?php $_from = $this->_tpl_vars['sellers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['seller']):
?>
    		<option value="<?php echo $this->_tpl_vars['seller']['id']; ?>
"><?php echo $this->_tpl_vars['seller']['name']; ?>

    	<?php endforeach; endif; unset($_from); ?>
    	</select>
    </td>
</tr>
<tr>
	<td>Категория:</td>
	<td>
    	<select name=cat_id> 
		<?php if ($this->_tpl_vars['cat_size'] > 0): ?>
    		<option value="-1">Выберите категорию
			<?php $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
    			<option value="<?php echo $this->_tpl_vars['category']['cat_id']; ?>
"><?php echo $this->_tpl_vars['category']['cat_name']; ?>

	    	<?php endforeach; endif; unset($_from); ?>
		<?php else: ?>
    		<option value="-1">Список пуст    	
	    </select>	
    	<?php endif; ?>
    	
	</td>
</tr>
<tr>
	<td>Путь к файлу:</td>
	<td><input type="file" name="userfile"></td>
</tr>
<tr>
	<td colspan=2 align="center"><input type="submit" value="Загрузить"></td>
</tr>
</table>
<input type="hidden" name="cmd" value="save_price">
</form>