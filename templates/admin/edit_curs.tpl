<form action="index.php">
<table border="1" width="100%" height="100%">
<tr>
	<td align="center" valign="top">
		<table cellpadding="2" cellspacing="0" border="1">
			<tr>
				<td><b>Курс</b></td>
				<td><input type="text" name="curc_usd_to_uah" value="{$usd_to_uah}"></td>	
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