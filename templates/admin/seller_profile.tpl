{literal}
<script language="Javascript">
function SubPage(){
	error = false;
	if(eval("document.details['seller_data[company_name]'].value")==''){
		error = true;
		alert('���� "�������� ��������" ������ ���� ���������!')
	}
	if(eval("document.details['seller_data[password]'].value")!=document.details.password_confirm.value){
		alert('������ � ������������ ������ �� ���������!')
		//alert(eval("document.details['seller_data[password]'].value"));
		error = true;
	}
	if(eval("document.details['seller_data[user_name]'].value")==''){
		error = true;
		alert('���� "���������� ����(���)" ������ ���� ���������!')
	}
	if(eval("document.details['seller_data[region_id]'].value")=='-1'){
		error = true;
		alert('������� ���������� �����!')
	}
	if(eval("document.details['seller_data[email]'].value")==''){
		error = true;
		alert('���� Email ������ ���� ���������!')
	}
	if(eval("document.details['seller_data[tel_code1]'].value")==''){
		error = true;
		alert('������ ���� ������ ���������� ��� ������!')
	}
	if(eval("document.details['seller_data[tel1]'].value")==''){
		error = true;
		alert('���� "������� 1" ������ ���� ���������!')
	}	
	if(!error){
		document.details.submit()		
	}
}

</script>
{/literal}
<table width="100%" height="100%" cellpadding="2" cellspacing="0" border="1">
<tr>
	<td height="20"><b>�������</b></td>
	<td><a href="index.php?cmd=edit_seller">����������</td>
	<td><a href="index.php?cmd=seller_price">�����</a></td>	
	<td><a href="index.php?cmd=seller_import">������</a></td>	
</tr>
<tr>
	<td colspan="4"><a href="index.php?cmd=show_sellers">��������� � ������ ����-���������</a></td>
</tr>
<tr>
	<td colspan=4 height="100%" valign="top">
{foreach name=s from=$seller item=s}
<form name=details method="post" action="index.php?cmd={$cmd}&id={$s.seller_id}">
<h3 align=center></h3>
{if $company_exist}
	<font color="red">�������� � ����� ��������� ��� ����������</font>
{/if}
{if $login_exist}
	<font color="red"><br>����� Email ��� ���������� � ����, ���������� ������</font>
{/if}
<table width="100%" cellpadding="4" cellspacing="1" border="1" class="forumline">
  <tr>
	<th width="25%" nowrap="nowrap" height="25" class="thCornerL">��������</th>
	<th width="25%" height="25" class="thTop">��������</th>
  </tr>
  <tr>
	<td class="row1" nowrap="nowrap">�������� �������� *</td>
	<td class="row2"><input type=text name="seller_data[company_name]" value="{$s.company_name}"></td>
  </tr>
  <tr>
	<td class="row1" nowrap="nowrap">������</td>
	<td class="row2"><input type="password" name="seller_data[password]"></td>
  </tr>
  <tr>
	<td class="row1" nowrap="nowrap">������������� ������</td>
	<td class="row2"><input type="password" name="password_confirm"></td>
  </tr>  
  <tr>
	<td class="row1" nowrap="nowrap">���������� ����(���)</td>
	<td class="row2"><input type=text name="seller_data[user_name]" value="{$s.user_name}" size="50"></td>
  </tr>
  <tr>
	<td class="row1" nowrap="nowrap">����� *</td>
	<td class="row2">
	<table border="0">
		<tr>
			<td>
				<SELECT name="seller_data[region_id]" >
					<option value="-1">�������� �����</option>
<!-- Region block-->		
					{foreach name=rl from=$region_list item=rl}
						{if $rl.id==$s.region_id}		
						<option value="{$rl.id}" selected>{$rl.region_name}</option>						
						{else}
						<option value="{$rl.id}" >{$rl.region_name}</option>			
						{/if}
					{/foreach}				
<!-- /Region block-->		
				</SELECT>
			</td>
			<td>&nbsp;&nbsp;<a href="index.php?cmd=region">������������� ������ �������</a></td>
		</tr>
	</table>		
	</td>
  </tr>  
  <tr>
	<td class="row1" nowrap="nowrap">�����</td>
	<td class="row2"><input type=text name="seller_data[address]" value="{$s.address}" size="50"></td>
  </tr>
  <tr>
	<td class="row1">������� 1 *</td>
	<td class="row2">
		+38( <input type=text name="seller_data[tel_code1]" value="{$s.tel_code1}" size=5 maxlength="5"> )
		<input type=text name="seller_data[tel1]" value="{$s.tel1}" size=10 maxlength="10">
	</td>
  </tr>
  <tr>
	<td class="row1" nowrap="nowrap">������� 2</td>
	<td class="row2">
		+38( <input type=text name="seller_data[tel_code2]" value="{$s.tel_code2}" size=5 maxlength="5"> )
		<input type=text name="seller_data[tel2]" value="{$s.tel2}" size=10 maxlength="10">
	</td>
  </tr>
  <tr>
	<td class="row1" nowrap="nowrap">������� 3</td>
	<td class="row2">
		+38( <input type=text name="seller_data[tel_code3]" value="{$s.tel_code3}" size=5 maxlength="5"> )
		<input type=text name="seller_data[tel3]" value="{$s.tel3}" size=10 maxlength="10">
	</td>
  </tr>    
  <tr>
	<td class="row1" nowrap="nowrap">����</td>
	<td class="row2"><input type=text name="seller_data[fax]" value="{$s.fax}"></td>
  </tr>  
  <tr>
	<td class="row1" nowrap="nowrap">����� �����</td>
	<td class="row2">http://<input type=text name="seller_data[url]" value="{$s.url}" size="20"></td>
  </tr>  
  <tr>
	<td class="row1" nowrap="nowrap">����� ������</td>
	<td class="row2"><input type=text name="seller_data[work_time]" value="{$s.work_time}" size="50"></td>
  </tr>    
  <tr>
	<td class="row1" nowrap="nowrap">Email *</td>
	<td class="row2"><input type=text name="seller_data[email]" value="{$s.email}"></td>
  </tr>  
  <tr>
	<td class="row1" nowrap="nowrap">ICQ</td>
	<td class="row2"><input type=text name="seller_data[icq]" value="{$s.icq}" size="20"></td>
  </tr>
  <tr>
	<td class="row1" nowrap="nowrap">������� ��������</td>
	<td class="row2">
		<SELECT name="seller_data[delivery]" >
			<option value="1" {if $s.delivery}selected{/if}>����</option>
			<option value="0" {if !$s.delivery}selected{/if}>���</option>				
		</SELECT>
	</td>
  </tr> 
  <tr>
  	<td class="row1">������� ��������</td>
  	<td class="row2"><textarea name="seller_data[delivery_options]" rows="3" cols="50">{$s.delivery_options}</textarea></td>
  </tr>   
  <tr>
	<td class="row1" nowrap="nowrap">������� �������</td>
	<td class="row2">
		<SELECT name="seller_data[credit]" >
			<option value="1" {if $s.credit}selected{/if}>����</option>
			<option value="0" {if !$s.credit}selected{/if}>���</option>				
		</SELECT>
	</td>
  </tr>    
 <tr>
  	<td class="row1">���������� � ��������:</td>
  	<td class="row2"><textarea name="seller_data[description]" rows="5" cols="50">{$s.description}</textarea></td>
 </tr>       
    <tr>
	<td colspan=2 class="row1" nowrap="nowrap" align=center><input type="button" onclick="SubPage()" value="���������"></td>
  </tr>    
</table>
</form>
{/foreach}
	</td>
</tr>
</table>
