<table width="100%" height="100%" cellpadding="2" cellspacing="0" border="1">
<tr>
	<td height="20"><a href="index.php?cmd=seller_profile">�������</td>
	<td><a href="index.php?cmd=edit_seller">����������</td>
	<td><b>�����</b></td>	
	<td><a href="index.php?cmd=seller_import">������</a></td>	
</tr>
<tr>
	<td colspan="4" height="100%" valign="top">
		<form name=details method="POST">
		<table width="100%" cellpadding="2" cellspacing="0" border="1">
			<tr>
				<td colspan="9"><b>{$cat_data.cat_name}</b></td>
			</tr>
			<tr>
				<td>�������������</td>
				<td>������������</td>
				<td>��������</td>
				<td>����, ���.</td>
				<td>����, usd</td>
				<td>���, ���.</td>				
				<td>���, usd</td>
				<td>��������, ���</td>
				<td>�������</td>
			</tr>		
			<tr>
				<td>
					<select name="vendor_id">
						<option value="-1">...
					{foreach from=$vendor_list item=vl}
						<option value="{$vl.id}">{$vl.vendor_name}
					{/foreach}
					</select>
				</td>
				<td><input type="text" name="name" size="15"></td>
				<td><textarea name="description"></textarea></td>
				<td><input type="text" name="price_ua" size="5"></td>
				<td><input type="text" name="price_usd" size="5"></td>
				<td><input type="text" name="price_opt_ua" size="5"></td>
				<td><input type="text" name="price_opt_usd" size="5"></td>
				<td width="60"><input type="text" name="guarantee" size="5"></td>
				<td><input type="text" name="presence" size="10"></td>
			</tr>
			<tr>
				<td colspan="9" align="center"><input type="submit" value="��������"></td>
			</tr>
		</table>
		<input type="hidden" name="cmd" value="insert_new_pos">
		<input type="hidden" name="cat_id" value="{$cat_data.cat_id}">
		</form>
	</td>
</tr>
</table>