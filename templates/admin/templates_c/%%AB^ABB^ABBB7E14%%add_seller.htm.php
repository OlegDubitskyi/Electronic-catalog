<?php /* Smarty version 2.6.12, created on 2006-11-19 18:39:59
         compiled from add_seller.htm */ ?>
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
<form method="post" action="index.php?cmd=save_seller">
<h3 align=center></h3>
<table width="100%" cellpadding="4" cellspacing="1" border="0" class="forumline">
  <tr>
	<th width="25%" nowrap="nowrap" height="25" class="thCornerL">��������</th>
	<th width="25%" height="25" class="thTop">��������</th>
  </tr>
  <tr>
	<td class="row1" nowrap="nowrap">�������� ��������</td>
	<td class="row2"><input type=text name="company_name" value="<?php echo $this->_tpl_vars['company_name']; ?>
"></td>
  </tr>
  <tr>
	<td class="row1" nowrap="nowrap">�����</td>
	<td class="row2"><input type=text name="login"></td>
  </tr>
  <tr>
	<td class="row1" nowrap="nowrap">������</td>
	<td class="row2"><input type="password" name="password"></td>
  </tr>
  <tr>
	<td class="row1" nowrap="nowrap">������������� ������</td>
	<td class="row2"><input type="password" name="password" ></td>
  </tr>    
  <tr>
	<td class="row1" nowrap="nowrap">���������� ����(���)</td>
	<td class="row2"><input type="text" name="user_name" value="<?php echo $this->_tpl_vars['user_name']; ?>
" size=40></td>
  </tr>  
  <tr>
	<td class="row1" nowrap="nowrap">�������</td>
	<td class="row2"><input type=text name="tel" ></td>
  </tr>
  <tr>
	<td class="row1" nowrap="nowrap">�����</td>
	<td class="row2"><input type=text name="address" value="<?php echo $this->_tpl_vars['address']; ?>
"></td>
  </tr>
  <tr>
	<td class="row1" nowrap="nowrap">�����</td>
	<td class="row2">
		<SELECT name="region_id" >
			<option value="-1">�������� �����</option>
<!-- Region block-->		
			<?php $_from = $this->_tpl_vars['region_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rl'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rl']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['rl']):
        $this->_foreach['rl']['iteration']++;
?>
				<option value="<?php echo $this->_tpl_vars['rl']['id']; ?>
" ><?php echo $this->_tpl_vars['rl']['region_name']; ?>
</option>			
			<?php endforeach; endif; unset($_from); ?>				
<!-- /Region block-->		
		</SELECT>
	</td>
  </tr>  
  <tr>
	<td class="row1" nowrap="nowrap">������� ��������</td>
	<td class="row2">
		<input type="checkbox" name="delivery" >
	</td>
  </tr>    
  <tr>
	<td class="row1" nowrap="nowrap">������� �������</td>
	<td class="row2">
		<input type="checkbox" name="credit" >
	</td>
  </tr>    
  <tr>
	<td class="row1" nowrap="nowrap">����������� ������</td>
	<td class="row2">
		<input type="checkbox" name="beznal" >
	</td>
  </tr>    
    <tr>
	<td colspan=2 class="row1" nowrap="nowrap" align=center><input type="submit"></td>
  </tr>    
</table>
</form>
	</td>
</tr>
</table>