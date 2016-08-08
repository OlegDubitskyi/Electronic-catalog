{literal}
<script language="Javascript">
function SubPage(){
	error = false;
	if(eval("document.reg['user_data[password]'].value")!=document.reg.password_confirm.value){
		alert('Пароль и подтвержение пароля не совпадает!')
		//alert(eval("document.details['seller_data[password]'].value"));
		error = true;
	}
	if(eval("document.reg['user_data[email]'].value")==''){
		alert('Поле "Email" должно быть заполнено!')
		//alert(eval("document.details['seller_data[password]'].value"));
		error = true;
	}
	if(eval("document.reg['user_data[region_id]'].value")=='-1'){
		error = true;
		alert('Поле "Регион" должно быть заполнено!')
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
					<td valign="top" colspan="3">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td width=24><img src="img/white2.gif"></td>
								<td>
									<table border="0" width="100%" cellpadding="0" cellspacing="0">
										<tr>
											<td style="FONT-SIZE:12px; PADDING-TOP:50px;" align="center">
												<table class="import" border="0" cellpadding=2>
													<tr>
														<td align="center"><b>Изменения профиля были сохранены</b></td>
													</tr>
												</table>
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