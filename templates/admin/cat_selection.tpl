<table width="100%" height="100%" cellpadding="2" cellspacing="0" border="1">
<tr>
	<td height="20"><a href="index.php?cmd=seller_profile">�������</td>
	<td><a href="index.php?cmd=edit_seller">����������</td>
	<td><a href="index.php?cmd=seller_price">�����</a></td>	
	<td><b>������</b></td>	
</tr>
<tr>
	<td colspan="4" height="100%" valign="top">
{if $num_err}
		<table align="center">
		<tr>
			<td><font color="red">������ �������� ����������� ��������</font></td>
		</tr>
		</table>						
{/if}
	<form action="index.php" method="POST">
	<table border="1" cellpadding="2" cellspacing="0" width="100%">
			<tr>
				<td colspan="{$num_col}"><input type="submit"></td>
			</tr>			
			<tr>
			{section name=columns loop=$num_col}
				<td>
					<select name="column[{$i++}]">
						<option value="-1">...	
						<option value="cat">���������
						<option value="vendor">�������������
						<option value="vg">������.+�����
						<option value="gname">�����
						<option value="price_ua">����(���)
						<option value="price_usd">����(�.�)
						<option value="price_opt_ua">���� ���(���)
						<option value="price_opt_usd">���� ���(�.�)
						<option value="desc">��������
						<option value="guarantee">��������
						<option value="url">URL
						<option value="presence">�������
					</select>
				</td>
			{/section}
			</tr>
			{foreach from=$final_price item=row}
			<tr>
				{foreach from=$row item=col}
				<td>{$col}&nbsp;</td>
				{/foreach}
			</tr>
			{/foreach}
		</table>
{if !$num_err}
			<input type="hidden" name="seller_id" value="">
			<input type="hidden" name="cmd" value="chane_columns">			
			<input type="submit">			
{/if}
		</form>	
	</td>
</tr>
</table>	