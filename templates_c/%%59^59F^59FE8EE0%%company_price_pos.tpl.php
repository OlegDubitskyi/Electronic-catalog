<?php /* Smarty version 2.6.12, created on 2007-04-01 08:26:45
         compiled from company_price_pos.tpl */ ?>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td valign="top">
<!--Центральный фрейм -->
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
<!--
				<tr>
					<td align="center">Поиск</td>
				</tr>
-->				
				<tr>
					<td align="center">
	<!--Отображение каталога-->
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
						<tr class="admin_nav">
							<td><a href="company_account.php?cmd=profile">Профиль</a></td>
							<td><b>Прайс</b></td>
							<td><a href="company_account.php?cmd=import">Импорт</a></td>
							<td><a href="company_account.php">Статистика</a></td>
							<td><a href="company_account.php?cmd=exit">Выход</a></td>
						</tr>
						<tr>
							<td colspan=5>
								<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
									<tr>
										<td width=24><img src="img/white2.gif"></td>
										<td class=path_filter>
											Пользователь: <?php echo $this->_tpl_vars['user_name']; ?>
("<?php echo $this->_tpl_vars['company_name']; ?>
")</td>
										</td>
									</tr>							
								</table>							
							</td>
						</tr>
						<tr>
							<td colspan=5>
<!----------------->
								<table class="gray_lines" border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
									<tr>
										<td width=5 bgcolor="#CBCCD2"></td>
										<td width=19><img src="img/white2.gif"></td>					
										<td>
											<table class="t1" border="0" cellpadding="0" cellspacing="0">
												<tr class="topline">
													<td colspan=2><img src="img/sir.gif"></td>
												</tr>
												<tr>
													<td width="15"></td>
													<td><a href="company_account.php?cmd=seller_price">Вернуться к списку категорий</a></td>
												</tr>							
												<tr class="bottom_line">
													<td colspan=2><img src="img/sir.gif"></td>
												</tr>
											</table>
										</td>
										<td width=19><img src="img/white2.gif"></td>
										<td width=5 bgcolor="#CBCCD2"></td>							
									</tr>
								</table>
<!----------------->							
							</td>
						</tr>
						<tr>
							<td colspan=5>
								<table width="100%" cellpadding="0" cellspacing="0" border="0">
									<tr>
										<td width=24><img src="img/white2.gif"></td>
										<td class=path_filter><b><?php echo $this->_tpl_vars['cat_name']; ?>
<b></td>
										<td width=60 align=right><a href="company_account.php?cmd=add_position&cat_id=<?php echo $this->_tpl_vars['cat_id']; ?>
">Добавить</a></td>
										<td width=24><img src="img/white2.gif"></td>										
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td colspan=5>
<!----------------->					
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td width=24><img src="img/white2.gif"></td>				
				<td>
					<table class="rows" width="100%" cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td class="header" style="TEXT-ALIGN: left; PADDING-LEFT: 15px;"><b>Наименование</b></td>
							<td width=50 class="header"><b>Цена, грн.</b></td>
							<td width=50 class="header"><b>Цена, usd</b></td>
							<td width=50 class="header"><b>Опт, грн.</b></td>				
							<td width=50 class="header"><b>Опт, usd</b></td>
							<td width=60 class="header"><b>Гарантия, мес</b></td>
							<td width=60 class="header"><b>Наличие</b></td>
							<td width=40 class="header"><b>Дата</b></td>
							<td width=100 class="header"><b>Действия</b></td>
						</tr>		
					<?php $_from = $this->_tpl_vars['rows_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rows_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rows_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['g']):
        $this->_foreach['rows_list']['iteration']++;
?>
						<tr <?php if (($this->_foreach['rows_list']['iteration']-1)%2 == 0): ?>class=m<?php endif; ?>>
							<td class=al><a name=<?php echo ($this->_foreach['rows_list']['iteration']-1); ?>
><?php echo $this->_tpl_vars['g']['vendor_name']; ?>
 <?php echo $this->_tpl_vars['g']['name']; ?>
 <?php echo $this->_tpl_vars['g']['description']; ?>
</a></td>
							<td align="center"><?php echo $this->_tpl_vars['g']['price_ua']; ?>
</td>
							<td align="center"><?php echo $this->_tpl_vars['g']['price_usd']; ?>
</td>
							<td align="center"><?php echo $this->_tpl_vars['g']['price_opt_ua']; ?>
</td>
							<td align="center"><?php echo $this->_tpl_vars['g']['price_opt_usd']; ?>
</td>
							<td align="center"><?php echo $this->_tpl_vars['g']['guarantee']; ?>
</td>
							<td align="center"><?php if ($this->_tpl_vars['g']['presence']):  echo $this->_tpl_vars['g']['presence'];  else: ?>&nbsp;<?php endif; ?></td>
							<td align="center"><?php echo $this->_tpl_vars['g']['insert_date']; ?>
</td>
							<td align="center">
								<a href="company_account.php?cmd=edit_position&cat_id=<?php echo $this->_tpl_vars['g']['cat_id']; ?>
&gid=<?php echo $this->_tpl_vars['g']['id']; ?>
#<?php echo ($this->_foreach['rows_list']['iteration']-1)-3; ?>
">редактировать</a><br>
								<a href="company_account.php?cmd=del_position&cat_id=<?php echo $this->_tpl_vars['g']['cat_id']; ?>
&gid=<?php echo $this->_tpl_vars['g']['id']; ?>
">удалить</a>
							</td>
						</tr>
					<?php endforeach; endif; unset($_from); ?>
					</table>				
				</td>	
				<td width=24><img src="img/white2.gif"></td>					
			</tr>
		</table>
<!----------------->														
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