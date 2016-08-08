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
					<td>Импорт</td>
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
<!----------------------------------->
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
											<td width=15><img src="img/white2.gif"></td>
											<td align="center" height=30 class=vendor_filter bgcolor="#EDEFFA">
												Прайс был успешно импортирован в базу
											</td>
										</tr>				
										<tr>
											<td width=15><img src="img/white2.gif"></td>
											<td align="center" height=30 class=vendor_filter bgcolor="#EDEFFA">
												Кол-во удаленных строк:{$num_deleted_rows}
											</td>
										</tr>				
										<tr>
											<td width=15><img src="img/white2.gif"></td>
											<td align="center" height=30 class=vendor_filter bgcolor="#EDEFFA">
												Кол-во импортированных строк:{$num_inserted_rows}
											</td>
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
<!----------------------------------->
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