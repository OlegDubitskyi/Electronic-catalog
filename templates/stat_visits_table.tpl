<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td>
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
							<td><a href="company_account.php?cmd=seller_price">Прайс</a></td>
							<td><a href="company_account.php?cmd=import">Импорт</a></td>
							<td><b>Статистика</b></td>
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
													<td><a href="company_account.php">Общая статистика</a></td>
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
						<tr style="PADDING-TOP:20px; PADDING-BOTTOM:20px;">
							<td colspan=5 align="center">
								<table class="import" border="0" cellpadding="0" cellspacing="0">
									<tr>
										<td class="head" align="center" colspan="7">{$stat_title}</td>
									</tr>
									<tr>
										<td><b>№</b></td>
										<td align="left"><b>Наименование</b></td>
										<td align="center"><b>Кол-во переходов</b></td>
									</tr>
{foreach name=data from=$data item=d}
									<tr>
										<td class="stat">{$smarty.foreach.data.iteration}</td>
										<td class="stat">{$d.gname}</td>
										<td class="stat" align="center">{$d.num_rows}</td>
									</tr>
{/foreach}
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