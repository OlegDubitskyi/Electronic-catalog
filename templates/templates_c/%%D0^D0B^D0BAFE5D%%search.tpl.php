<?php /* Smarty version 2.6.12, created on 2007-01-13 02:15:09
         compiled from search.tpl */ ?>
<?php echo '
<script language="javascript">
function Sub_search(){
	if(document.search.search_str.value!=\'\'){
		if(document.search.search_str.value.length <3){
			alert(\'Строка поиска должна содеражть не менее 3-х символов\');
		}else{
			document.search.submit();
		}
	}
}
</script>
'; ?>


<form name=search action="index.php" method="GET">
<table border="0" cellpadding="2" cellspacing="0">
	<tr>
		<td width=10></td>
		<td><font style="color:#ffffff"><b>Поиск:</b></font></td>
		<td><input type="text" name="search_str" value="<?php echo $this->_tpl_vars['search_str']; ?>
" size="50"></td>
		<td width=10>
			<select name="search_cat">
				<option value="-1">Все категории
	<?php if ($this->_tpl_vars['cat_id']): ?>
				<option value="<?php echo $this->_tpl_vars['cat_id']; ?>
" selected>В этой категории
	<?php else: ?>
				<option value="-1">В этой категории	
	<?php endif; ?>
			</select>
		</td>
		<input type="hidden" name="cmd" value="s">
		<td><input type="button" value="Искать" onclick="Sub_search()"></td>
	</tr>
</table>
</form>