<h3 align=center>������ ��������� ��������� �����������</h3>
<form>
<table cellpadding="2" border="1" align="center">
	<tr>
		<td>
			<SELECT name="status">
				<option value="0" {if $status==0}selected{/if}>����������������
				<option value="1" {if $status==1}selected{/if}>��������������
				<option value="2" {if $status==2}selected{/if}>������������������
			</SELECT>
		</td>
		<td>
			<input type="hidden" name="cmd" value="reg_list">			
			<input type="submit" value="Go">
		</td>
	</tr>
</table>
</form>
<table cellpadding="2" border="1" align="center">
{if count($list)>0}
  <tr>
	<td width="250" height="25">��������</td>
	<td width="150" height="25">���-�� �������</td>
	<td width="100">���� ����������� (�������������)</td>
	<td>��������</td>
  </tr>
	{foreach from=$list item=l}
  	<tr>
		<td><a href="index.php?cmd=show_reg_company&id={$l.id}">{$l.company_name}</a></td>
		<td align="center">{$l.num_rows}</td>
		<td>{$l.date_reg}</td>
		<td><a href="index.php?cmd=del_reg_company&id={$l.id}">�������</a></td>
  	</tr>
	{/foreach}	  
{else}
  	<tr>
		<td colspan="2">������ ����</td>
  	</tr>
{/if}
</table>
