<?php /* Smarty version 2.6.12, created on 2006-12-21 12:05:30
         compiled from company_import.tpl */ ?>
<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0">
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
							<td><a href="company_account.php?cmd=seller_price">Прайс</a></td>
							<td><b>Импорт</b></a></td>
							<td><a href="company_account.php">Статистика</td>
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
							<td colspan=5 align=center>
								<form enctype="multipart/form-data" action="company_account.php"  method=post>
								<table class="import" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td class="head" colspan=2 align=center>Импорт прайс-листа</td>
								</tr>
								<tr>
									<td width=200>Разделитель между колонками:</td>
									<td><input type="text" name="separator" value=',' size="3"></td>
								</tr>
								<tr>
									<td>Путь к файлу:</td>
									<td><input type="file" name="userfile" size="40"></td>
								</tr>
								<tr>
									<td colspan="2" align="center"><input type="submit" value="Загрузить"></td>
								</tr>
								</table>
								<input type="hidden" name="cmd" value="load_price">
								</form>
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