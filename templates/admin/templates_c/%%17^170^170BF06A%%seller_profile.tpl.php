<?php /* Smarty version 2.6.12, created on 2006-12-01 20:02:59
         compiled from seller_profile.tpl */ ?>
<?php echo '
<script language="Javascript">
function SubPage(){
	error = false;
	if(eval("document.details[\'seller_data[company_name]\'].value")==\'\'){
		error = true;
		alert(\'���� "�������� ��������" ������ ���� ���������!\')
	}
	if(eval("document.details[\'seller_data[password]\'].value")!=document.details.password_confirm.value){
		alert(\'������ � ������������ ������ �� ���������!\')
		//alert(eval("document.details[\'seller_data[password]\'].value"));
		error = true;
	}
	if(eval("document.details[\'seller_data[user_name]\'].value")==\'\'){
		error = true;
		alert(\'���� "���������� ����(���)" ������ ���� ���������!\')
	}
	if(eval("document.details[\'seller_data[region_id]\'].value")==\'-1\'){
		error = true;
		alert(\'������� ���������� �����!\')
	}
	if(eval("document.details[\'seller_data[email]\'].value")==\'\'){
		error = true;
		alert(\'���� Email ������ ���� ���������!\')
	}
	if(eval("document.details[\'seller_data[tel_code1]\'].value")==\'\'){
		error = true;
		alert(\'������ ���� ������ ���������� ��� ������!\')
	}
	if(eval("document.details[\'seller_data[tel1]\'].value")==\'\'){
		error = true;
		alert(\'���� "������� 1" ������ ���� ���������!\')
	}	
	if(!error){
		document.details.submit()		
	}
}

</script>
'; ?>

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
<?php $_from = $this->_tpl_vars['seller']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['s'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['s']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['s']):
        $this->_foreach['s']['iteration']++;
?>
<form name=details method="post" action="index.php?cmd=<?php echo $this->_tpl_vars['cmd']; ?>
&id=<?php echo $this->_tpl_vars['s']['seller_id']; ?>
">
<h3 align=center></h3>
<?php if ($this->_tpl_vars['company_exist']): ?>
	<font color="red">�������� � ����� ��������� ��� ����������</font>
<?php endif; ?>
<?php if ($this->_tpl_vars['login_exist']): ?>
	<font color="red"><br>����� Email ��� ���������� � ����, ���������� ������</font>
<?php endif; ?>
<table width="100%" cellpadding="4" cellspacing="1" border="1" class="forumline">
  <tr>
	<th width="25%" nowrap="nowrap" height="25" class="thCornerL">��������</th>
	<th width="25%" height="25" class="thTop">��������</th>
  </tr>
  <tr>
	<td class="row1" nowrap="nowrap">�������� �������� *</td>
	<td class="row2"><input type=text name="seller_data[company_name]" value="<?php echo $this->_tpl_vars['s']['company_name']; ?>
"></td>
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
	<td class="row2"><input type=text name="seller_data[user_name]" value="<?php echo $this->_tpl_vars['s']['user_name']; ?>
" size="50"></td>
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
					<?php $_from = $this->_tpl_vars['region_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rl'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rl']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['rl']):
        $this->_foreach['rl']['iteration']++;
?>
						<?php if ($this->_tpl_vars['rl']['id'] == $this->_tpl_vars['s']['region_id']): ?>		
						<option value="<?php echo $this->_tpl_vars['rl']['id']; ?>
" selected><?php echo $this->_tpl_vars['rl']['region_name']; ?>
</option>						
						<?php else: ?>
						<option value="<?php echo $this->_tpl_vars['rl']['id']; ?>
" ><?php echo $this->_tpl_vars['rl']['region_name']; ?>
</option>			
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>				
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
	<td class="row2"><input type=text name="seller_data[address]" value="<?php echo $this->_tpl_vars['s']['address']; ?>
" size="50"></td>
  </tr>
  <tr>
	<td class="row1">������� 1 *</td>
	<td class="row2">
		+38( <input type=text name="seller_data[tel_code1]" value="<?php echo $this->_tpl_vars['s']['tel_code1']; ?>
" size=5 maxlength="5"> )
		<input type=text name="seller_data[tel1]" value="<?php echo $this->_tpl_vars['s']['tel1']; ?>
" size=10 maxlength="10">
	</td>
  </tr>
  <tr>
	<td class="row1" nowrap="nowrap">������� 2</td>
	<td class="row2">
		+38( <input type=text name="seller_data[tel_code2]" value="<?php echo $this->_tpl_vars['s']['tel_code2']; ?>
" size=5 maxlength="5"> )
		<input type=text name="seller_data[tel2]" value="<?php echo $this->_tpl_vars['s']['tel2']; ?>
" size=10 maxlength="10">
	</td>
  </tr>
  <tr>
	<td class="row1" nowrap="nowrap">������� 3</td>
	<td class="row2">
		+38( <input type=text name="seller_data[tel_code3]" value="<?php echo $this->_tpl_vars['s']['tel_code3']; ?>
" size=5 maxlength="5"> )
		<input type=text name="seller_data[tel3]" value="<?php echo $this->_tpl_vars['s']['tel3']; ?>
" size=10 maxlength="10">
	</td>
  </tr>    
  <tr>
	<td class="row1" nowrap="nowrap">����</td>
	<td class="row2"><input type=text name="seller_data[fax]" value="<?php echo $this->_tpl_vars['s']['fax']; ?>
"></td>
  </tr>  
  <tr>
	<td class="row1" nowrap="nowrap">����� �����</td>
	<td class="row2">http://<input type=text name="seller_data[url]" value="<?php echo $this->_tpl_vars['s']['url']; ?>
" size="20"></td>
  </tr>  
  <tr>
	<td class="row1" nowrap="nowrap">����� ������</td>
	<td class="row2"><input type=text name="seller_data[work_time]" value="<?php echo $this->_tpl_vars['s']['icq']; ?>
" size="50"></td>
  </tr>    
  <tr>
	<td class="row1" nowrap="nowrap">Email *</td>
	<td class="row2"><input type=text name="seller_data[email]" value="<?php echo $this->_tpl_vars['s']['email']; ?>
"></td>
  </tr>  
  <tr>
	<td class="row1" nowrap="nowrap">ICQ</td>
	<td class="row2"><input type=text name="seller_data[icq]" value="<?php echo $this->_tpl_vars['s']['icq']; ?>
" size="20"></td>
  </tr>
  <tr>
	<td class="row1" nowrap="nowrap">������� ��������</td>
	<td class="row2">
		<SELECT name="seller_data[delivery]" >
			<option value="1" <?php if ($this->_tpl_vars['s']['delivery']): ?>selected<?php endif; ?>>����</option>
			<option value="0" <?php if (! $this->_tpl_vars['s']['delivery']): ?>selected<?php endif; ?>>���</option>				
		</SELECT>
	</td>
  </tr> 
  <tr>
  	<td class="row1">������� ��������</td>
  	<td class="row2"><textarea name="seller_data[delivery_options]" rows="3" cols="50"><?php echo $this->_tpl_vars['s']['delivery_options']; ?>
</textarea></td>
  </tr>   
  <tr>
	<td class="row1" nowrap="nowrap">������� �������</td>
	<td class="row2">
		<SELECT name="seller_data[credit]" >
			<option value="1" <?php if ($this->_tpl_vars['s']['credit']): ?>selected<?php endif; ?>>����</option>
			<option value="0" <?php if (! $this->_tpl_vars['s']['credit']): ?>selected<?php endif; ?>>���</option>				
		</SELECT>
	</td>
  </tr>    
 <tr>
  	<td class="row1">���������� � ��������:</td>
  	<td class="row2"><textarea name="seller_data[description]" rows="5" cols="50"><?php echo $this->_tpl_vars['s']['description']; ?>
</textarea></td>
 </tr>       
    <tr>
	<td colspan=2 class="row1" nowrap="nowrap" align=center><input type="button" onclick="SubPage()" value="���������"></td>
  </tr>    
</table>
</form>
<?php endforeach; endif; unset($_from); ?>
	</td>
</tr>
</table>