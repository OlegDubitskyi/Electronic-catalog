<table width="100%" height="100%" cellpadding="0" cellspacing="0" border="1">
<tr>
	<td><a href="index.php?cmd=vendors_goods">��������� � ������ ���������</a></td>
</tr>
<tr>
	<td height="20" align="center">{$cat_data.cat_name}</td>
</tr>
<tr>
	<td height="20">�������������:</td>
</tr>
<tr>
<form method="POST">
	<td height="100%" valign="top" align="center">
		<table border="1" cellpadding="2" cellspacing="0">
			{if $cmd=='del_vendor'}
			<tr>
				<td colspan="4">���-�� ��������� �������: {$num_deleted_goods}</td>
			</tr>
			{/if}
			<tr>
				<td>�������������</td>
				<td>�������</td>
				<td>�������������</td>
				<td>�������</td>
			</tr>
			{foreach name=vl from=$vendor_list item=vl}
			<tr>
				{if $vl.id==$vendor_id}
				<td><input type="text" name="vendor_name" value="{$vl.vendor_name}"></td>
				<td><input type="checkbox" name="transfer[{$smarty.foreach.vl.index}]" disabled></td>
				<td><input type="submit" value="���������"></a></td>
				<input type="hidden" name="cmd" value="update_vendor">
				<input type="hidden" name="vendor_id" value="{$vendor_id}">				
				<input type="hidden" name="cat_id" value="{$vl.cat_id}">								
				<td>�������</td>				
				{else}
				<td><a href="index.php?cmd=show_models&vid={$vl.id}&cat_id={$vl.cat_id}">{$vl.vendor_name}</a></td>
				<td><input type="checkbox" name="transfer[{$smarty.foreach.vl.index}]" value="{$vl.id}"></td>
				<td><a href="index.php?cmd=show_vendors&vid={$vl.id}&cat_id={$vl.cat_id}">�������������</a></td>
				<td><a href="index.php?cmd=del_vendor&vid={$vl.id}&cat_id={$vl.cat_id}">�������</a></td>
				{/if}
			</tr>
			{/foreach}	

			{if !$vendor_id}
			<tr>
				<td colspan="2" align="center">
					<a href="index.php?cmd=add_vendor&cat_id={$cat_data.cat_id}">��������</a>
				</td>
				<td colspan="2">
					��������� � 
					<select name="to_vendor_id">
						<option value="-1" selected>�������������
					{foreach name=vl from=$vendor_list item=vl}
						<option value="{$vl.id}">{$vl.vendor_name}
					{/foreach}&nbsp;&nbsp;&nbsp;
					<input type="hidden" name="cmd" value="transfer_vendor">
					<input type="hidden" name="cat_id" value="{$cat_data.cat_id}">
					<input type="submit" value="���������">
					</select>
				</td>
			</tr>
			{/if}			
		</table>
	</td>
</form>	
</tr>
</table>