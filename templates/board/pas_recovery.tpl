{literal}
<script language="Javascript">
function SubPage(){
	error = false;
	if(eval("document.reg['user_data[login]'].value")==''){
		error = true;
		alert('Поле "Логин" должно быть заполнено!')
	}
	if(!error){
		document.reg.submit()		
	}
}

</script>
{/literal}
<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0">
<!--Gray line-->
	<tr>
		<td bgcolor="#E8E7E3"><img src="img/gray4.gif"></td>
	</tr>
<!--/Gray line-->	
	<tr>
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
											<td class=path_filter><b>Регистрация:</b></td>
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
											<td style="BORDER-TOP: #C4C4C4 1px solid; FONT-SIZE:12px; PADDING-TOP:10px;" align="center">
												<form name=reg action="board.php?cmd=add_user" method="POST">
												<table class="import" border="0" cellpadding=2>
													{if $is_ok==1}
													<tr>
														<td colspan="2" style="font-color:#ff0000">На емейл указанный при регистрации был выслан пароль</td>
													</tr>
													{elseif $is_ok==-1}
													<tr>
														<td colspan="2" style="font-color:#ff0000">Такого пользователя не существует в базе</td>
													</tr>
													{else}													
													{foreach from=$user_data item=u}
													<tr>
														<td>Логин</td>
														<td><input type="text" name="user_data[login]" size="20"></td>
													</tr>
													<tr>
														<td colspan="2" align="center"><input type="button" value="Отправить" onclick="javascript:SubPage()"></td>
													</tr>													
													{/foreach}
													{/if}	
													<input type="hidden" name="cmd" value="recovery">
												</table>
												</form>
											</td>
										</tr>
										<tr>
											<td height="30">&nbsp;</td>
										</tr>
									</table>		
								</td>
								<td><img src="img/white2.gif"></td>
							</tr>
						</table>					
					</td>
				</tr>							
			</table>
<!--/Центральный фрейм -->			
		</td>
	</tr>
</table>