<?php /* Smarty version 2.6.12, created on 2007-01-13 02:15:09
         compiled from top_navigation.tpl */ ?>
<table border="0" cellspacing="0" cellpadding="12" bgcolor="#6E1515">
<tr>
	<td><a href="index.php"><font style="color:white"><b>Каталог</b></font></a></td>
	<td><a href="index.php?cmd=showf"><font style="color:white"><b>Фирмы</b></font></a></td>
<?php if ($this->_tpl_vars['is_logged']): ?>
	<td><a href="company_account.php"><font style="color:white"><b>Админ-панель</b></font></a></td>
<?php endif; ?>	
<!--	
	<td><a href="forum">Форум</a></td>		
	<td><a href="forum">Объявления</a></td>		
	<td><a href="forum">Статьи</a></td>			
	<td><a href="forum">Новости</a></td>			
-->	
</tr>
</table>