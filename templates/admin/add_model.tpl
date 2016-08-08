<form method="POST">
<table cellpadding="0" cellspacing="0" border="1">
	<tr>
		<td>Модель:</td>
		<td><input type="text" name="model_name"></td>
	</tr>
	<tr>
		<td colspan=2 align="center"><input type="submit" value="Сохранить"></td>
	</tr>
</table>
<input type="hidden" name="cmd" value="insert_model">
<input type="hidden" name="cat_id" value="{$cat_id}">
<input type="hidden" name="vendor_id" value="{$vendor_id}">
</form>	