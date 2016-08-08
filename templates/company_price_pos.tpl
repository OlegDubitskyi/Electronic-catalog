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
											Пользователь: {$user_name}("{$company_name}")</td>
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
										<td class=path_filter><b>{$cat_name}<b></td>
										<td width=60 align=right><a href="company_account.php?cmd=add_position&cat_id={$cat_id}">Добавить</a></td>
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
					{foreach name=rows_list from=$rows_list item=g}
						<tr {if $smarty.foreach.rows_list.index%2==0}class=m{/if}>
							<td class=al><a name={$smarty.foreach.rows_list.index}>{$g.vendor_name} {$g.name} {$g.description}</a></td>
							<td align="center">{$g.price_ua}</td>
							<td align="center">{$g.price_usd}</td>
							<td align="center">{$g.price_opt_ua}</td>
							<td align="center">{$g.price_opt_usd}</td>
							<td align="center">{$g.guarantee}</td>
							<td align="center">{if $g.presence}{$g.presence}{else}&nbsp;{/if}</td>
							<td align="center">{$g.insert_date}</td>
							<td align="center">
								<a href="company_account.php?cmd=edit_position&cat_id={$g.cat_id}&gid={$g.id}#{$smarty.foreach.rows_list.index-3}">редактировать</a><br>
								<a href="company_account.php?cmd=del_position&cat_id={$g.cat_id}&gid={$g.id}">удалить</a>
							</td>
						</tr>
					{/foreach}
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