<?php /* Smarty version 2.6.12, created on 2006-12-14 18:57:50
         compiled from status_load.tpl */ ?>
<script language="Javascript" >
<?php echo '
	function submit_page(warning){
		if(warning){
			if(confirm(warning)){
				document.price.submit();
			}
		}else{
			document.price.submit();			
		}
	}
'; ?>
	
</script>
<!--status load-->
<form name="price" action="index.php" method="POST">
<table width="100%" height="100%" cellpadding="2" cellspacing="0" border="1">
<tr>
	<td height="20"><a href="index.php?cmd=seller_profile">Профиль</td>
	<td><a href="index.php?cmd=edit_seller">Статистика</td>
	<td><a href="index.php?cmd=seller_price">Прайс</a></td>	
	<td><b>Импорт</b></td>	
</tr>
<?php if ($this->_tpl_vars['is_absent_err']): ?>
<tr>
	<td colspan="4" valign="top">
		<table border="1" cellpadding="5" cellspacing="0" width="100%">
		<tr>
			<td>Отсутствуют следующие обязательные поля:</td>
		</tr>
		<?php $_from = $this->_tpl_vars['absent_column']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['col']):
?>
		<tr>
			<td><font color="Red"><?php echo $this->_tpl_vars['col']; ?>
</font></td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
		</table>
	</td>
</tr>
<?php endif; ?>

<?php if ($this->_tpl_vars['multiple_column_error']): ?>

<tr>
	<td colspan="4" valign="top">
		<form action="index.php" method="POST">
		<table border="1" cellpadding="5" cellspacing="0" width="100%"  bgcolor="Yellow">
		<tr>
			<td><?php echo $this->_tpl_vars['err_mes']; ?>
</td>
		</tr>
		</table>
	</td>
</tr>
<?php endif; ?>


<?php if ($this->_tpl_vars['rename_categories']): ?>

<tr>
	<td colspan="4" valign="top">
		<form action="index.php" method="POST">
		<table border="1" cellpadding="5" cellspacing="0" width="100%"  bgcolor="Yellow">
		<?php $_from = $this->_tpl_vars['rename_categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ac'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ac']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['ac']):
        $this->_foreach['ac']['iteration']++;
?>
		<tr>
			<td><font color=red>Категория "<?php echo $this->_tpl_vars['key']; ?>
" отсутствует в базе, 
								заменить ее на:
					<select name="rename_categories[<?php echo $this->_tpl_vars['key']; ?>
]">
						<option value="-1">...
					<?php $_from = $this->_tpl_vars['bot_level_cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['blc'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['blc']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key2'] => $this->_tpl_vars['blc']):
        $this->_foreach['blc']['iteration']++;
?>
						<option value="<?php echo $this->_tpl_vars['key2']; ?>
" <?php if ($this->_tpl_vars['ac'] == $this->_tpl_vars['key2']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['blc']; ?>

					<?php endforeach; endif; unset($_from); ?>
					</select>
				</font>
				<br>
			</td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
		</table>
	</td>
</tr>
<?php endif; ?>

<tr>
	<td colspan="4" height="100%" valign="top">
		<table border="1" cellpadding="2" cellspacing="0" width="100%">
			<tr>
				<td colspan="<?php echo $this->_tpl_vars['num_col']; ?>
"><input type="submit" value="Submit page"></td>
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
					<select name="column[<?php echo $this->_sections['columns']['iteration']; ?>
]">
						<option value="-1" <?php if ($this->_tpl_vars['column'][$this->_sections['columns']['iteration']] == '-1'): ?>selected<?php endif; ?>>...	
						<option value="cat" <?php if ($this->_tpl_vars['column'][$this->_sections['columns']['iteration']] == 'cat'): ?>selected<?php endif; ?>>Категория
						<option value="vendor" <?php if ($this->_tpl_vars['column'][$this->_sections['columns']['iteration']] == 'vendor'): ?>selected<?php endif; ?>>Производитель
						<option value="vg" <?php if ($this->_tpl_vars['column'][$this->_sections['columns']['iteration']] == 'vg'): ?>selected<?php endif; ?>>Произв.+товар
						<option value="gname" <?php if ($this->_tpl_vars['column'][$this->_sections['columns']['iteration']] == 'gname'): ?>selected<?php endif; ?>>Товар
						<option value="price_ua" <?php if ($this->_tpl_vars['column'][$this->_sections['columns']['iteration']] == 'price_ua'): ?>selected<?php endif; ?>>Цена(грн)
						<option value="price_usd" <?php if ($this->_tpl_vars['column'][$this->_sections['columns']['iteration']] == 'price_usd'): ?>selected<?php endif; ?>>Цена(у.е)
						<option value="price_opt_ua" <?php if ($this->_tpl_vars['column'][$this->_sections['columns']['iteration']] == 'price_opt_ua'): ?>selected<?php endif; ?>>Оптовая цена(грн)
						<option value="price_opt_usd" <?php if ($this->_tpl_vars['column'][$this->_sections['columns']['iteration']] == 'price_opt_usd'): ?>selected<?php endif; ?>>Оптовая цена(у.е)
						<option value="desc" <?php if ($this->_tpl_vars['column'][$this->_sections['columns']['iteration']] == 'desc'): ?>selected<?php endif; ?>>Описание
						<option value="guarantee" <?php if ($this->_tpl_vars['column'][$this->_sections['columns']['iteration']] == 'guarantee'): ?>selected<?php endif; ?>>Гарантия
						<option value="url" <?php if ($this->_tpl_vars['column'][$this->_sections['columns']['iteration']] == 'url'): ?>selected<?php endif; ?>>URL
						<option value="presence" <?php if ($this->_tpl_vars['column'][$this->_sections['columns']['iteration']] == 'presence'): ?>selected<?php endif; ?>>Наличие
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
			<input type="hidden" name="seller_id" value="">
			<input type="hidden" name="cmd" value="chane_columns">			
			<input type="submit" value="Submit page"> 
	</td>
</tr>
</table>	
</form>