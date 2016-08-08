<?php /* Smarty version 2.6.12, created on 2006-12-14 19:51:44
         compiled from cat_selection.tpl */ ?>
<table width="100%" height="100%" cellpadding="2" cellspacing="0" border="1">
<tr>
	<td height="20"><a href="index.php?cmd=seller_profile">Профиль</td>
	<td><a href="index.php?cmd=edit_seller">Статистика</td>
	<td><a href="index.php?cmd=seller_price">Прайс</a></td>	
	<td><b>Импорт</b></td>	
</tr>
<tr>
	<td colspan="4" height="100%" valign="top">
<?php if ($this->_tpl_vars['num_err']): ?>
		<table align="center">
		<tr>
			<td><font color="red">Указан неверный разделитель столбцов</font></td>
		</tr>
		</table>						
<?php endif; ?>
	<form action="index.php" method="POST">
	<table border="1" cellpadding="2" cellspacing="0" width="100%">
			<tr>
				<td colspan="<?php echo $this->_tpl_vars['num_col']; ?>
"><input type="submit"></td>
			</tr>			
			<tr>
			<?php unset($this->_sections['columns']);
$this->_sections['columns']['name'] = 'columns';
$this->_sections['columns']['loop'] = is_array($_loop=$this->_tpl_vars['num_col']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['columns']['show'] = true;
$this->_sections['columns']['max'] = $this->_sections['columns']['loop'];
$this->_sections['columns']['step'] = 1;
$this->_sections['columns']['start'] = $this->_sections['columns']['step'] > 0 ? 0 : $this->_sections['columns']['loop']-1;
if ($this->_sections['columns']['show']) {
    $this->_sections['columns']['total'] = $this->_sections['columns']['loop'];
    if ($this->_sections['columns']['total'] == 0)
        $this->_sections['columns']['show'] = false;
} else
    $this->_sections['columns']['total'] = 0;
if ($this->_sections['columns']['show']):

            for ($this->_sections['columns']['index'] = $this->_sections['columns']['start'], $this->_sections['columns']['iteration'] = 1;
                 $this->_sections['columns']['iteration'] <= $this->_sections['columns']['total'];
                 $this->_sections['columns']['index'] += $this->_sections['columns']['step'], $this->_sections['columns']['iteration']++):
$this->_sections['columns']['rownum'] = $this->_sections['columns']['iteration'];
$this->_sections['columns']['index_prev'] = $this->_sections['columns']['index'] - $this->_sections['columns']['step'];
$this->_sections['columns']['index_next'] = $this->_sections['columns']['index'] + $this->_sections['columns']['step'];
$this->_sections['columns']['first']      = ($this->_sections['columns']['iteration'] == 1);
$this->_sections['columns']['last']       = ($this->_sections['columns']['iteration'] == $this->_sections['columns']['total']);
?>
				<td>
					<select name="column[<?php echo $this->_tpl_vars['i']++; ?>
]">
						<option value="-1">...	
						<option value="cat">Категория
						<option value="vendor">Производитель
						<option value="vg">Произв.+товар
						<option value="gname">Товар
						<option value="price_ua">Цена(грн)
						<option value="price_usd">Цена(у.е)
						<option value="price_opt_ua">Цена опт(грн)
						<option value="price_opt_usd">Цена опт(у.е)
						<option value="desc">Описание
						<option value="guarantee">Гарантия
						<option value="url">URL
						<option value="presence">Наличие
					</select>
				</td>
			<?php endfor; endif; ?>
			</tr>
			<?php $_from = $this->_tpl_vars['final_price']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
			<tr>
				<?php $_from = $this->_tpl_vars['row']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['col']):
?>
				<td><?php echo $this->_tpl_vars['col']; ?>
&nbsp;</td>
				<?php endforeach; endif; unset($_from); ?>
			</tr>
			<?php endforeach; endif; unset($_from); ?>
		</table>
<?php if (! $this->_tpl_vars['num_err']): ?>
			<input type="hidden" name="seller_id" value="">
			<input type="hidden" name="cmd" value="chane_columns">			
			<input type="submit">			
<?php endif; ?>
		</form>	
	</td>
</tr>
</table>	