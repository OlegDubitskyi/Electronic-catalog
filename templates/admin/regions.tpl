<table width="100%" height="100%" cellpadding="0" cellspacing="0" border="1">
{if $show_link_seller_back}
<tr>
	<td><a href="index.php?cmd=seller_profile">��������� � ������� ��������</a></td>
</tr>
{/if}
<tr>
	<td height="20">�������:</td>
</tr>
<tr>
<form method="POST">
	<td height="100%" valign="top" align="center">
		<table border="1" cellpadding="2" cellspacing="0">
			<tr>
				<td width="100">������</td>
				<td>�������������</td>
				<td>�������</td>
			</tr>
			{if count($region_list)>0}
			{foreach name=rl from=$region_list item=rl}
			<tr>
				{if $rl.id==$region_id}
				<td><input type="text" name="region_name" value="{$rl.region_name}"></td>
				<td><input type="submit" value="���������"></a></td>
				<input type="hidden" name="cmd" value="update_region">
				<input type="hidden" name="region_id" value="{$region_id}">				
				<td>�������</td>				
				{else}
				<td>{$rl.region_name}</td>
				<td><a href="index.php?cmd=region&region_id={$rl.id}">�������������</a></td>
				<td><a href="index.php?cmd=del_region&region_id={$rl.id}">�������</a></td>
				{/if}
			</tr>
			{/foreach}	
			{else}
			<tr>
				<td colspan="3" align="center"><b>������ ����</b></td>
			</tr>
			{/if}
			{if !$region_id}
			<tr>
				<td colspan="3">
					<a href="index.php?cmd=add_region">��������</a>
				</td>
			</tr>
			{/if}					
		</table>
	</td>
</form>	
</tr>
</table>