<?php /* Smarty version 2.6.12, created on 2007-01-06 19:31:51
         compiled from sel_manage.htm */ ?>
<form method="post" action="index.php">
<h3 align=center>Управление фирмами-продавцами</h3>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td width="24">&nbsp;</td>						
		<td>
			<table class="rows" border="0" cellpadding="0" cellspacing="0" align="center">
				<tr>
					<td width="" class="header" style="TEXT-ALIGN: left; PADDING-LEFT: 15px;">Название</td>
					<td width="" class="header">Сайт</td>					
					<td width="" class="header">Кол-во позиций</td>
					<td width="" class="header">Статус</td>
					<td width="" class="header">Действия</td>
				</tr>
<?php if (count ( $this->_tpl_vars['sellers'] ) > 0): ?>
	<?php $_from = $this->_tpl_vars['sellers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sellers'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sellers']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['s']):
        $this->_foreach['sellers']['iteration']++;
?>
			  	<tr <?php if (($this->_foreach['sellers']['iteration']-1)%2 == 0): ?>class=m<?php endif; ?>>
					<td class=al height="30"><a href="index.php?cmd=edit_seller&id=<?php echo $this->_tpl_vars['s']['id']; ?>
"><?php echo $this->_tpl_vars['s']['company_name']; ?>
</a></td>
					<td><a href="http://<?php echo $this->_tpl_vars['s']['url']; ?>
" target="new"><?php echo $this->_tpl_vars['s']['url']; ?>
</a></td>					
					<td><?php echo $this->_tpl_vars['s']['num_rows']; ?>
</td>
					<td><?php echo $this->_tpl_vars['s']['status']; ?>
</td>
					<td width="150">
						<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td style="BORDER-BOTTOM:none">
									<a href="index.php?cmd=del_seller&id=<?php echo $this->_tpl_vars['s']['id']; ?>
">Удалить</a>
								</td>
								<td style="BORDER-BOTTOM:none">
									<a href="index.php?cmd=change_status&id=<?php echo $this->_tpl_vars['s']['id']; ?>
" title="Изменение статуса компании">
									<?php if ($this->_tpl_vars['s']['status'] == 1): ?>
										Inactive
									<?php else: ?>
										Active
									<?php endif; ?>
									</a>
								</td>
							</tr>
						</table>
					</td>
  				</tr>
	<?php endforeach; endif; unset($_from); ?>	  
<?php else: ?>
				<tr class=m>
					<td colspan="4" class="row1" align="center" height=30>Список пуст</td>
				</tr>
<?php endif; ?>
			</table>
		</td>
		<td width="24">&nbsp;</td>								
	</tr>
	<tr>
		<td width="24">&nbsp;</td>						
		<td align="right">
			<a href=index.php?cmd=add_seller>Добавить</a>
		</td>
		<td width="24">&nbsp;</td>								
	</tr>
</table>