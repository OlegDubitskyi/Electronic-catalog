<form method="POST">
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
				<td colspan="10"><b>{$cat_name}</b></td>
			</tr>
			<tr>
				<td width=250>������������</td>
				<td>����, ���.</td>
				<td>����, usd</td>
				<td>���, ���.</td>				
				<td>���, usd</td>
				<td>��������</td>
				<td>�������</td>
				<td colspan="2" align="center">��������</td>
			</tr>		
		{foreach from=$rows_list item=g}
			<tr>
			{if $edit_position_id==$g.id}
				<td>{$g.vendor_name} {$g.name} {$g.description}</td>
				<td><input size=5 type="text" name="price_ua" value="{$g.price_ua}"></td>
				<td><input size=5 type="text" name="price_usd" value="{$g.price_usd}"></td>
				<td><input size=5 type="text" name="price_opt_ua" value="{$g.price_opt_ua}"></td>
				<td><input size=5 type="text" name="price_opt_usd" value="{$g.price_opt_usd}"></td>
				<td><input size=5 type="text" name="guarantee" value="{$g.guarantee}"></td>
				<td><input size=10 type="text" name="presence" value="{$g.presence}"></td>
				<td><input type="submit" value="���������"></td>
				<td>&nbsp;</td>
				<input type="hidden" name="gid" value="{$g.id}">				
			{else}
				<td>{$g.vendor_name} {$g.name} {$g.description}</td>
				<td>{$g.price_ua}</td>
				<td>{$g.price_usd}</td>
				<td>{$g.price_opt_ua}</td>
				<td>{$g.price_opt_usd}</td>
				<td>{$g.guarantee}</td>
				<td>{if $g.presence}{$g.presence}{else}&nbsp;{/if}</td>
				<td><a href="index.php?cmd=edit_position&cat_id={$g.cat_id}&gid={$g.id}">�������������</a></td>																							
				<td><a href="index.php?cmd=del_position&cat_id={$g.cat_id}&gid={$g.id}">�������</a></td>																				
			{/if}
			</tr>
		{/foreach}
		</table>
	</td>
</tr>
</table>
<input type="hidden" name="cmd" value="update_price_row">
</form>
