<?php /* Smarty version 2.6.12, created on 2007-02-25 13:03:21
         compiled from edit_curs.tpl */ ?>
<form action="index.php">
<table border="1" width="100%" height="100%">
<tr>
	<td align="center" valign="top">
		<table cellpadding="2" cellspacing="0" border="1">
			<tr>
				<td><b>Курс</b></td>
				<td><input type="text" name="curc_usd_to_uah" value="<?php echo $this->_tpl_vars['usd_to_uah']; ?>
"></td>	
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="Сохранить"></td>
			</tr>
		</table>	
	</td>
</tr>
</table>
<input type="hidden" name="cmd" value="save_curs">
</form>