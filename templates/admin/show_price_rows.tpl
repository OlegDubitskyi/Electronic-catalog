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
			<tr>
				<td colspan="10"><a href="index.php?cmd=seller_price">��������� � ������ ���������</a></td>
			</tr>
			<tr>
				<td colspan="9"><b>{$cat_name}</b></td>
				<td><a href="index.php?cmd=add_position&cat_id={$cat_id}">��������</a></td>
			</tr>
			<tr>
				<td width=250>������������</td>
				<td>����, ���.</td>
				<td>����, usd</td>
				<td>���, ���.</td>				
				<td>���, usd</td>
				<td>��������, ���</td>
				<td>�������</td>
				<td>����</td>
				<td colspan="2" align="center">��������</td>
			</tr>		
		{foreach from=$rows_list item=g}
			<tr>
				<td width="250">{$g.vendor_name} {$g.name} {$g.description}</td>
				<td>{$g.price_ua}</td>
				<td>{$g.price_usd}</td>
				<td>{$g.price_opt_ua}</td>
				<td>{$g.price_opt_usd}</td>
				<td>{$g.guarantee}</td>
				<td>{if $g.presence}{$g.presence}{else}&nbsp;{/if}</td>
				<td>{$g.insert_date}</td>
				<td><a href="index.php?cmd=edit_position&cat_id={$g.cat_id}&gid={$g.id}">�������������</a></td>																				
				<td><a href="index.php?cmd=del_position&cat_id={$g.cat_id}&gid={$g.id}">�������</a></td>																				
			</tr>
		{/foreach}
		</table>
	</td>
</tr>
</table>