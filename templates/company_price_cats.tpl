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
													<td><b>Список категорий:</b></td>
												</tr>							
											{foreach from=$bottom_categories item=bc}
												<tr>
													<td width="15"></td>
													<td>&nbsp;&nbsp;&nbsp;&nbsp;<a href="company_account.php?cmd=seller_price&cat_id={$bc.cat_id}">{$bc.cat_name}</a><span>({$bc.num_goods})</span></td>
												</tr>
											{/foreach}
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
						</table>
	<!--/Отображение каталога-->						
					</td>
				</tr>							
			</table>
<!--/Центральный фрейм -->			
		</td>
	</tr>
</table>