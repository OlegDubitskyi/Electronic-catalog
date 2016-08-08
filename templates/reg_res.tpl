<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0">
<!--Gray line-->
	<tr>
		<td width=137 bgcolor="#E8E7E3"><img src="img/gray2.gif"></td>
		<td width=6 bgcolor="#C8C6C1"><img src="img/gray3.gif"></td>
		<td bgcolor="#E8E7E3"><img src="img/gray4.gif"></td>
		<td width=250 bgcolor="#D9D7D2"><img src="img/gray5.gif"></td>
	</tr>
<!--/Gray line-->	
	<tr>
		<td width=137 bgcolor="#E8E7E3" align=center>
{* Левый блок под баннер *}
			{include file="inc/left_block.tpl"}			
{* /Левый блок под баннер *}		
		</td>
		<td width=6 bgcolor="#C8C6C1"><img src="img/gray3.gif"></td>
		<td valign="top">
<!--Центральный фрейм -->
			<table border="0" width="100%" height="100%" bgcolor="#FFFFFF" cellpadding="2" cellspacing="0">
				<tr>
					<td valign="top" colspan="3" height="20">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td width=24><img src="img/white2.gif"></td>
								<td>
									<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
										<tr>
											<td class=path_filter><b>Регистрация</b></td>
										</tr>
									</table>		
								</td>
								<td><img src="img/white2.gif"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td valign="top" colspan="3">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td width=24><img src="img/white2.gif"></td>
								<td>
									<table border="0" width="100%" cellpadding="0" cellspacing="0">
										<tr>
											<td style="BORDER-TOP: #C4C4C4 1px solid; FONT-SIZE:12px; PADDING-TOP:20px;" align="center">
											{if $user_exist}
												Такой емейл уже существует в базе
											{else}
												Спасибо за регистрацию, на Ваш емейл выслано письмо с просьбой о подтверждении регистрации.<br>
												После подтверждения регистрации Ваша заявка будет рассмотрена.
											{/if}												
											</td>
										</tr>
									</table>		
								</td>
								<td><img src="img/white2.gif"></td>
							</tr>
						</table>					
					</td>
				</tr>							
				<tr>
					<td width=10 bgcolor="#FFFFFF"><img src="img/white1.gif"></td>
					<td height=10>
						<table border=0 cellpadding="5" cellspacing="0">
							<tr>
								<td>
									<a href="index.php?cmd=about">О проекте</a> | 
								 	<a href="index.php?cmd=order">Как разместить прайс лист</a> |
								 	<a href="index.php?cmd=but">Кнопки</a> |
									<a href=""><a href="mailto:support@webcat.com.ua">Пишите нам</a>{* | 
									<a href="">Реклама на сайте</a>*}	
								</td>																
							</tr>
						</table>	
					</td>
				</tr>
			</table>
<!--/Центральный фрейм -->			
		</td>
		<td width="250" align="right" valign="top">
{* Правый блок в котором у нас будет баннер и вход для партнеров *}
			{include file="inc/right_block.tpl"}
{* Правый блок в котором у нас будет баннер и вход для партнеров *}
		</td>
	</tr>
</table>