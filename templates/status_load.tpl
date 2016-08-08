<form name="price" action="company_account.php" method="POST">
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
							<td><a href="company_account.php?cmd=price">Прайс</a></td>
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
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table class="gray_lines" border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
							<tr>
								<td width=5 bgcolor="#CBCCD2"></td>
								<td width=19><img src="img/white2.gif"></td>					
								<td>
			<!--Отображение каталога-->
									<table class="t1" border="0" cellpadding="0" cellspacing="0">
										<tr class="topline">
											<td colspan=2><img src="img/sir.gif"></td>
										</tr>
										<tr>
											<td width="15"></td>
											<td>
												{if $is_absent_err}
												{* Вывод блока ошибки нехватки обязательных полей *}
												<table border="0" cellpadding="5" cellspacing="0" width="100%">
												<tr>
													<td>Отсутствуют следующие обязательные поля:</td>
												</tr>
												{foreach from=$absent_column item=col}
												<tr>
													<td>"{$col}"</td>
												</tr>
												{/foreach}
												</table>
												{* /Вывод блока ошибки нехватки обязательных полей *}
												{/if}								
											</td>
										</tr>
										<tr>
											<td width="15"></td>
											<td>
											{if $multiple_column_error}
											{* Вывод ошибок при выборе типов колонок *}
												<table border="0" cellpadding="5" cellspacing="0" width="100%">
												<tr>
													<td>{$err_mes}</td>
												</tr>
												</table>
											{* /Вывод ошибок при выборе типов колонок *}
											{/if}								
											</td>
										</tr>
										<tr>
											<td width="15"></td>
											<td>
											{if $rename_categories}
											{* Вывод ошибки отсутствия категории в базе *}
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
												{foreach name=ac key=key from=$rename_categories item=ac}
												<tr>
													<td>Категория "{$key}" отсутствует в базе, 
																		заменить ее на:
															<select name='rename_categories[{$key}]'>
																<option value="-1">...
															{foreach key=key2 name=blc from=$bot_level_cat item=blc}
																<option value="{$key2}" {if $ac==$key2}selected{/if}>{$blc}
															{/foreach}
															</select>
														<br>
													</td>
												</tr>
												{/foreach}
												</table>
											{/if}								
											</td>
										</tr>							
										<tr class="bottom_line">
											<td colspan=2><img src="img/sir.gif"></td>
										</tr>
									</table>
			<!--/Отображение каталога-->											
								</td>
								<td width=19><img src="img/white2.gif"></td>
								<td width=5 bgcolor="#CBCCD2"></td>							
							</tr>
						</table>					
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<td colspan="{$num_col}" style="TEXT-ALIGN:LEFT;"><input type="submit" value="Submit page"></td>
							</tr>
						</table>																				
					</td>
				</tr>
				<tr>
					<td>			
						<table class="rows" border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
							{section name=columns loop=$num_col}
								<td style="TEXT-ALIGN:LEFT; BACKGROUND: #CBCCD1; PADDING-TOP:5px; PADDING-BOTTOM:5px; PADDING-LEFT:0px; PADDING-RIGHT:0px;S">
									<select name="column[{$smarty.section.columns.iteration}]">
										<option value="-1" {if $column[$smarty.section.columns.iteration]=='-1'}selected{/if}>...	
										<option value="cat" {if $column[$smarty.section.columns.iteration]=='cat'}selected{/if}>Категория
										<option value="vendor" {if $column[$smarty.section.columns.iteration]=='vendor'}selected{/if}>Производитель
										{*<option value="vg" {if $column[$smarty.section.columns.iteration]=='vg'}selected{/if}>Произв.+товар*}
										<option value="gname" {if $column[$smarty.section.columns.iteration]=='gname'}selected{/if}>Товар
										<option value="price_ua" {if $column[$smarty.section.columns.iteration]=='price_ua'}selected{/if}>Цена(грн)
										<option value="price_usd" {if $column[$smarty.section.columns.iteration]=='price_usd'}selected{/if}>Цена(у.е)
										<option value="price_opt_ua" {if $column[$smarty.section.columns.iteration]=='price_opt_ua'}selected{/if}>Оптовая цена(грн)
										<option value="price_opt_usd" {if $column[$smarty.section.columns.iteration]=='price_opt_usd'}selected{/if}>Оптовая цена(у.е)
										<option value="desc" {if $column[$smarty.section.columns.iteration]=='desc'}selected{/if}>Описание
										<option value="guarantee" {if $column[$smarty.section.columns.iteration]=='guarantee'}selected{/if}>Гарантия
										<option value="url" {if $column[$smarty.section.columns.iteration]=='url'}selected{/if}>URL
										<option value="presence" {if $column[$smarty.section.columns.iteration]=='presence'}selected{/if}>Наличие
									</select>
								</td>
							{/section}
							</tr>
							{foreach name=final_price from=$final_price item=row}
							<tr {if $smarty.foreach.final_price.index%2==0}class=m{/if}>
								{foreach from=$row item=col}
								<td>{$col}&nbsp;</td>
								{/foreach}
							</tr>
							{/foreach}
						</table>					
					</td>
				</tr>
				<tr>
					<td>
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<td colspan="{$num_col}" style="TEXT-ALIGN:LEFT;">
									<input type="hidden" name="seller_id" value="">
									<input type="hidden" name="cmd" value="chane_columns">			
									<input type="submit" value="Submit page"> 												
								</td>
							</tr>
						</table>																									
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</form>