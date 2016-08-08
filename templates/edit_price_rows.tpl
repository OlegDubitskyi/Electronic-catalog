<form method="POST">
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
							<td class="header" style="TEXT-ALIGN: left; PADDING-LEFT: 15px;">Наименование</td>
							<td width=60 class="header">Цена, грн.</td>
							<td width=60 class="header">Цена, usd</td>
							<td width=60 class="header">Опт, грн.</td>				
							<td width=60 class="header">Опт, usd</td>
							<td width=70 class="header">Гарантия, мес</td>
							<td width=60 class="header">Наличие</td>
							<td width=100 class="header" align="center">Действия</td>
						</tr>		
					{foreach name=rows_list from=$rows_list item=g}
						<tr {if $smarty.foreach.rows_list.index%2==0}class=m{/if}>
						{if $edit_position_id==$g.id}
							<td class=al><a name={$smarty.foreach.rows_list.index}>{$g.vendor_name} {$g.name} {$g.description}</a></td>
							<td><input size=5 type="text" name="price_ua" value="{$g.price_ua}"></td>
							<td><input size=5 type="text" name="price_usd" value="{$g.price_usd}"></td>
							<td><input size=5 type="text" name="price_opt_ua" value="{$g.price_opt_ua}"></td>
							<td><input size=5 type="text" name="price_opt_usd" value="{$g.price_opt_usd}"></td>
							<td><input size=5 type="text" name="guarantee" value="{$g.guarantee}"></td>
							<td><input size=10 type="text" name="presence" value="{$g.presence}"></td>
							<td><input type="submit" value="сохранить"></td>
							<input type="hidden" name="gid" value="{$g.id}">				
						{else}
							<td class=al><a name={$smarty.foreach.rows_list.index}>{$g.vendor_name} {$g.name} {$g.description}</a></td>
							<td>{$g.price_ua}</td>
							<td>{$g.price_usd}</td>
							<td>{$g.price_opt_ua}</td>
							<td>{$g.price_opt_usd}</td>
							<td>{$g.guarantee}</td>
							<td>{if $g.presence}{$g.presence}{else}&nbsp;{/if}</td>
							<td>
								<a href="company_account.php?cmd=edit_position&cat_id={$g.cat_id}&gid={$g.id}#{$smarty.foreach.rows_list.index-3}">редактировать</a>
								<a href="company_account.php?cmd=del_position&cat_id={$g.cat_id}&gid={$g.id}">удалить</a>
							</td>
						{/if}
						</tr>
					{/foreach}
					</table>
				</td>	
				<td width=24><img src="img/white2.gif"></td>					
			</tr>
		</table>				
<input type="hidden" name="cmd" value="update_price_row">		
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