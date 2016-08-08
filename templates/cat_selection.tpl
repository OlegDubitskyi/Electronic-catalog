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
							<td><a href="company_account.php?cmd=price">Прайс</a></td>
							<td><b>Импорт</b></td>
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
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
						{if $num_err}
						<tr>
							<td>
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
													<td align="center" height=30 class=vendor_filter bgcolor="#EDEFFA">Указан неверный разделитель</td>
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
							</td>		
						</tr>
						{else}
						<tr>
							<td>
								<table border="0" width="100%" cellpadding="0" cellspacing="0">
									<form action="company_account.php" method="POST">
									<tr>
										<td width="24">&nbsp;</td>
										<td colspan="{$num_col}" style="TEXT-ALIGN:LEFT;"><input type="submit" value="Сохранить"></td>										
									</tr>
									<tr>							
										<td width="24">&nbsp;</td>																
										<td>
											<table border="0" class="rows" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												{section name=columns loop=$num_col}
												<td style="TEXT-ALIGN:LEFT; BACKGROUND: #CBCCD1; PADDING-TOP:5px; PADDING-BOTTOM:5px;">
													<select name="column[{$i++}]">
														<option value="-1">...	
														<option value="cat">Категория
														<option value="vendor">Производитель
														{*<option value="vg">Произв.+товар*}
														<option value="gname">Товар
														<option value="price_ua">Цена(грн)
														<option value="price_usd">Цена(у.е)
														<option value="price_opt_ua">Цена опт(грн)
														<option value="price_opt_usd">Цена опт(у.е)
														<option value="desc">Описание
														<option value="guarantee">Гарантия
														<option value="url">URL
														<option value="presence">Наличие
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
										<td colspan="{$num_col}" style="TEXT-ALIGN:LEFT;">
											<input type="hidden" name="seller_id" value="">
											<input type="hidden" name="cmd" value="chane_columns">															
											<input type="submit" value="Сохранить">
										</td>
									</tr>
									</form>
								</table>
							</td>
						</tr>
						{/if}
						</table>
	<!--/Отображение каталога-->						
					</td>
				</tr>							
			</table>
<!--/Центральный фрейм -->			
		</td>
	</tr>
</table>