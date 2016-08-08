<table width="100%" height="100%" cellpadding="2" cellspacing="0" border="1">
<tr>
	<td height="20">Производители:</td>
</tr>
<tr>
	<td height="100%" valign="top">
		<table border="1" cellpadding="2">
			{foreach name=vl from=$vendor_list item=vl}
			<tr>
				<td><a href="index.php?cmd=edit_models&vendor_id={$vl.id}&cat_id={$vl.cat_id}">{$vl.vendor_name}</a></td>
				<td><input type="checkbox" name="transfer[{$smarty.foreach.vl.index}]"></td>
				<td><a href="index.php?cmd=edit_vendor&vendor_id={$vl.id}&cat_id={$vl.cat_id}">редактировать</a></td>
				<td></td>
			</tr>
			{/foreach}	
		</table>
	</td>
</tr>
</table>