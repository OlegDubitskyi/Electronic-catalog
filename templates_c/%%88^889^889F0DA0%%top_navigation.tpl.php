<?php /* Smarty version 2.6.12, created on 2007-03-31 18:46:40
         compiled from top_navigation.tpl */ ?>
<table border="0" cellspacing="0" cellpadding="12" bgcolor="#6E1515">
<tr>
	<td><a href="index.php"  class="top_n"><b>�������</b></a></td>
	<td><a href="index.php?cmd=showf" class="top_n"><b>�����</b></a></td>
<?php if ($this->_tpl_vars['is_logged']): ?>
	<td><a href="company_account.php" class="top_n"><b>�����-������</b></a></td>
<?php endif; ?>	
	<td><a href="index.php?cmd=adv" class="top_n"><b>����������</b></a></td>
	<td><a href="forum/index.php" class="top_n"><b>�����</b></a></td>	
<!--	
	<td><a href="forum">�����</a></td>		
	<td><a href="forum">������</a></td>			
	<td><a href="forum">�������</a></td>			
-->	
</tr>
</table>