{literal}
<script language="javascript">
function Sub_search(){
	if(document.search.search_str.value!=''){
		if(document.search.search_str.value.length <3){
			alert('������ ������ ������ ��������� �� ����� 3-� ��������');
		}else{
			document.search.submit();
		}
	}
}
</script>
{/literal}

<form name=search action="index.php" method="GET">
<table border="0" cellpadding="2" cellspacing="0">
	<tr>
		<td width=10></td>
		<td><font style="color:#ffffff"><b>�����:</b></font></td>
		<td><input type="text" name="search_str" value="{$search_str}" size="50"></td>
		<td width=10>
			<select name="search_cat">
				<option value="-1">��� ���������
	{if $cat_id}
				<option value="{$cat_id}" selected>� ���� ���������
	{else}
<!---				<option value="-1">� ���� ���������	--->
	{/if}
			</select>
		</td>
		<input type="hidden" name="cmd" value="s">
		<td><input type="button" value="������" onclick="Sub_search()"></td>
	</tr>
</table>
</form>