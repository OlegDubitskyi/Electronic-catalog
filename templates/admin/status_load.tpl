<script language="Javascript" >
{literal}
	function submit_page(warning){
		if(warning){
			if(confirm(warning)){
				document.price.submit();
			}
		}else{
			document.price.submit();			
		}
	}
{/literal}	
</script>
<!--status load-->
<form name="price" action="index.php" method="POST">
<table width="100%" height="100%" cellpadding="2" cellspacing="0" border="1">
<tr>
	<td height="20"><a href="index.php?cmd=seller_profile">�������</td>
	<td><a href="index.php?cmd=edit_seller">����������</td>
	<td><a href="index.php?cmd=seller_price">�����</a></td>	
	<td><b>������</b></td>	
</tr>
{if $is_absent_err}
{* ����� ����� ������ �������� ������������ ����� *}
<tr>
	<td colspan="4" valign="top">
		<table border="1" cellpadding="5" cellspacing="0" width="100%">
		<tr>
			<td>����������� ��������� ������������ ����:</td>
		</tr>
		{foreach from=$absent_column item=col}
		<tr>
			<td><font color="Red">{$col}</font></td>
		</tr>
		{/foreach}
		</table>
	</td>
</tr>
{/if}

{if $multiple_column_error}
{* ����� ������ ��� ������ ����� ������� *}

<tr>
	<td colspan="4" valign="top">
		<form action="index.php" method="POST">
		<table border="1" cellpadding="5" cellspacing="0" width="100%"  bgcolor="Yellow">
		<tr>
			<td>{$err_mes}</td>
		</tr>
		</table>
	</td>
</tr>
{/if}


{if $rename_categories}
{* ����� ������ ���������� ��������� � ���� *}

<tr>
	<td colspan="4" valign="top">
		<form action="index.php" method="POST">
		<table border="1" cellpadding="5" cellspacing="0" width="100%"  bgcolor="Yellow">
		{foreach name=ac key=key from=$rename_categories item=ac}
		<tr>
			<td><font color=red>��������� "{$key}" ����������� � ����, 
								�������� �� ��:
					<select name="rename_categories[{$key}]">
						<option value="-1">...
					{foreach key=key2 name=blc from=$bot_level_cat item=blc}
						<option value="{$key2}" {if $ac==$key2}selected{/if}>{$blc}
					{/foreach}
					</select>
				</font>
				<br>
			</td>
		</tr>
		{/foreach}
		</table>
	</td>
</tr>
{/if}

{* ����� �������� *}
<tr>
	<td colspan="4" height="100%" valign="top">
		<table border="1" cellpadding="2" cellspacing="0" width="100%">
			<tr>
				<td colspan="{$num_col}"><input type="submit" value="Submit page"></td>
			</tr>																	
			<tr>
			{section name=columns loop=$num_col}
				<td>
					<select name="column[{$smarty.section.columns.iteration}]">
						<option value="-1" {if $column[$smarty.section.columns.iteration]=='-1'}selected{/if}>...	
						<option value="cat" {if $column[$smarty.section.columns.iteration]=='cat'}selected{/if}>���������
						<option value="vendor" {if $column[$smarty.section.columns.iteration]=='vendor'}selected{/if}>�������������
						<option value="vg" {if $column[$smarty.section.columns.iteration]=='vg'}selected{/if}>������.+�����
						<option value="gname" {if $column[$smarty.section.columns.iteration]=='gname'}selected{/if}>�����
						<option value="price_ua" {if $column[$smarty.section.columns.iteration]=='price_ua'}selected{/if}>����(���)
						<option value="price_usd" {if $column[$smarty.section.columns.iteration]=='price_usd'}selected{/if}>����(�.�)
						<option value="price_opt_ua" {if $column[$smarty.section.columns.iteration]=='price_opt_ua'}selected{/if}>������� ����(���)
						<option value="price_opt_usd" {if $column[$smarty.section.columns.iteration]=='price_opt_usd'}selected{/if}>������� ����(�.�)
						<option value="desc" {if $column[$smarty.section.columns.iteration]=='desc'}selected{/if}>��������
						<option value="guarantee" {if $column[$smarty.section.columns.iteration]=='guarantee'}selected{/if}>��������
						<option value="url" {if $column[$smarty.section.columns.iteration]=='url'}selected{/if}>URL
						<option value="presence" {if $column[$smarty.section.columns.iteration]=='presence'}selected{/if}>�������
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
			<input type="hidden" name="seller_id" value="">
			<input type="hidden" name="cmd" value="chane_columns">			
			<input type="submit" value="Submit page"> 
	</td>
</tr>
</table>	
</form>
