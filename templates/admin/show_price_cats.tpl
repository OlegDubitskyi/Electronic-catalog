<table width="100%" height="100%" cellpadding="2" cellspacing="0" border="1">
<tr>
	<td height="20"><a href="index.php?cmd=seller_profile">�������</td>
	<td><a href="index.php?cmd=edit_seller">����������</td>
	<td><b>�����</b></td>	
	<td><a href="index.php?cmd=seller_import">������</a></td>	
</tr>
<tr>
	<td colspan="4" height="100%" valign="top">
		<table width="100%" cellpadding="2" cellspacing="0" border="1">
		{foreach from=$bottom_categories item=bc}
			<tr>
				<td><a href="index.php?cmd=seller_price&cat_id={$bc.cat_id}">{$bc.cat_name}</a></td>
			</tr>
		{/foreach}
		</table>
	</td>
</tr>
</table>