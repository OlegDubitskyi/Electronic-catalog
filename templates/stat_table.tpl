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
							<td colspan=5>Пользователь: {$user_name}("{$company_name}")</td>
						</tr>
						<tr>
							<td colspan=5 align="center">
								<table border="1" cellpadding="2" cellspacing="0">
									<tr>
										<td align="center" colspan="7"><b>{$stat_title}</b></td>
									</tr>
									<tr>
										<td>№</td>
										<td align="center">Наименование</td>
										<td align="center">Кол-во переходов</td>
									</tr>
{foreach name=data from=$data item=d}
									<tr>
										<td>{$smarty.foreach.data.iteration}</td>
										<td>{$d.gname}</td>
										<td align="center">{$d.num_rows}</td>
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