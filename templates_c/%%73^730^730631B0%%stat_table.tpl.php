<?php /* Smarty version 2.6.12, created on 2006-12-10 19:30:00
         compiled from stat_table.tpl */ ?>
<table border="2" width="100%" cellpadding="2" cellspacing="0">
	<tr>
		<td>
<!--Центральный фрейм -->
			<table border="2" width="100%" cellpadding="2" cellspacing="0">
<!--
				<tr>
					<td align="center">Поиск</td>
				</tr>
-->				
				<tr>
					<td align="center">
	<!--Отображение каталога-->
						<table border="1" width="100%" cellpadding="2" cellspacing="0">
						<tr>
							<td><a href="company_account.php?cmd=profile">Профиль</a></td>
							<td><a href="company_account.php?cmd=seller_price">Прайс</a></td>
							<td><a href="company_account.php?cmd=import">Импорт</a></td>
							<td>Статистика</td>
							<td><a href="company_account.php?cmd=exit">Выход</a></td>
						</tr>
						<tr>
							<td colspan=5>Пользователь: <?php echo $this->_tpl_vars['user_name']; ?>
("<?php echo $this->_tpl_vars['company_name']; ?>
")</td>
						</tr>
						<tr>
							<td colspan=5 align="center">
								<table border="1" cellpadding="2" cellspacing="0">
									<tr>
										<td align="center" colspan="7"><b><?php echo $this->_tpl_vars['stat_title']; ?>
</b></td>
									</tr>
									<tr>
										<td>№</td>
										<td align="center">Наименование</td>
										<td align="center">Кол-во переходов</td>
									</tr>
<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['data'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['data']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['d']):
        $this->_foreach['data']['iteration']++;
?>
									<tr>
										<td><?php echo $this->_foreach['data']['iteration']; ?>
</td>
										<td><?php echo $this->_tpl_vars['d']['gname']; ?>
</td>
										<td align="center"><?php echo $this->_tpl_vars['d']['num_rows']; ?>
</td>
									</tr>
<?php endforeach; endif; unset($_from); ?>
								</table>
							</td>
						</tr>
						</table>
	<!--/Отображение каталога-->						
					</td>
				</tr>							
			</table>
<!--/Центральный фрейм -->			
		</td>
	</tr>
</table>