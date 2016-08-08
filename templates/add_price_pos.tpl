<form name=details method="POST">
<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td>
<!--Центральный фрейм -->
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
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
												<tr>
													<td width="15"></td>
													<td><a href="company_account.php?cmd=seller_price&cat_id={$cat_data.cat_id}">Вернуться в категорию "<b>{$cat_data.cat_name}</b>"</a></td>
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
<!----------------->					
		<table width="100%" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td width=24><img src="img/white2.gif"></td>				
				<td>		
								<table class="rows" width="100%" cellpadding="0" cellspacing="0" border="0">
									<tr class="header" style="TEXT-ALIGN: left; PADDING-LEFT: 15px;">
										<td class="header">Производитель</td>
										<td class="header">Наименование</td>
										<td class="header">Описание</td>
										<td class="header">Цена, грн.</td>
										<td class="header">Цена, usd</td>
										<td class="header">Опт, грн.</td>				
										<td class="header">Опт, usd</td>
										<td width=70 class="header">Гарантия, мес</td>
										<td class="header">Наличие</td>
									</tr>		
									<tr>
										<td>
											<select name="vendor_id">
												<option value="-1">...
											{foreach from=$vendor_list item=vl}
												<option value="{$vl.id}">{$vl.vendor_name}
											{/foreach}
											</select>
										</td>
										<td><input type="text" name="name" size="15"></td>
										<td><textarea name="description"></textarea></td>
										<td><input type="text" name="price_ua" size="5"></td>
										<td><input type="text" name="price_usd" size="5"></td>
										<td><input type="text" name="price_opt_ua" size="5"></td>
										<td><input type="text" name="price_opt_usd" size="5"></td>
										<td width="60"><input type="text" name="guarantee" size="5"></td>
										<td><input type="text" name="presence" size="10"></td>
									</tr>
								</table>
								<input type="hidden" name="cmd" value="insert_new_pos">
								<input type="hidden" name="cat_id" value="{$cat_data.cat_id}">
				</td>	
				<td width=24><img src="img/white2.gif"></td>					
			</tr>
			<tr style="PADDING-TOP:15px; PADDING-BOTTOM:15px;">
				<td width=24><img src="img/white2.gif"></td>				
				<td align=center><input type="submit" value="Добавить"></td>
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
</form>