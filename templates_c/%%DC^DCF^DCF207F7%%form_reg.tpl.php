<?php /* Smarty version 2.6.12, created on 2007-01-17 16:47:47
         compiled from form_reg.tpl */ ?>
<?php echo '
<script language="Javascript">
function SubPage(){
	error = false;
	if(eval("document.reg.company_name.value")==\'\'){
		error = true;
		alert(\'Поле "Название организации или СПД" должно быть заполнено!\')
	}
	if(eval("document.reg.user_name.value")==\'\'){
		alert(\'Поле "Контактное лицо" должно быть заполнено!\')
		//alert(eval("document.details[\'seller_data[password]\'].value"));
		error = true;
	}
	if(eval("document.reg.tel.value")==\'\'){
		error = true;
		alert(\'Поле "Телефон для контактов" должно быть заполнено!\')
	}
	if(eval("document.reg.region_name.value")==\'\'){
		error = true;
		alert(\'Поле "Город" должно быть заполнено!\')
	}
	if(eval("document.reg.email.value")==\'\'){
		error = true;
		alert(\'Поле Email должно быть заполнено!\')
	}
	if(eval("document.reg.num_rows.value")==\'\'){
		error = true;
		alert(\'Поле "Предполагаемое кол-во прайс-строк" должно быть заполнено!\')
	}
	if(!error){
		document.reg.submit()		
	}
}

</script>
'; ?>

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
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/left_block.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>			
		
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
											<td style="PADDING-TOP:10px;" align="center">
												<form name=reg>
												<table class="import" width=550 cellpadding="0" cellspacing="0">
													<tr>
														<td width=250>Название организации или СПД:</td>
														<td><input type="text" name="company_name" size="40"></td>
													</tr>
													<tr>
														<td width=250>Город:</td>
														<td><input type="text" name="region_name" size="40"></td>
													</tr>													
													<tr>
														<td>Контактное лицо:</td>
														<td><input type="text" name="user_name" size="40"></td>
													</tr>													
													<tr>
														<td>Телефон для контактов:</td>
														<td>+38( <input type=text name="tel_code" size=5 maxlength="5"> ) <input type="text" name="tel" size="20"></td>
													</tr>
													<tr>
														<td>Email:</td>
														<td><input type="text" name="email" size="40"></td>
													</tr>													
													<tr>
														<td>Адрес сайта:</td>
														<td><input type="text" name="url" size="40"></td>
													</tr>																										
													<tr>
														<td>Предполагаемое кол-во прайс-строк:</td>
														<td><input type="text" name="num_rows" size="10"></td>
													</tr>																										
													<tr>
														<td colspan="2" style="BORDER-DOWN: #D8D9E1 1px solid;" align="center">
															<input type="hidden" name="cmd" value="srinfo">
															<input type="button" value="Зарегистрировать" onclick="SubPage()">
														</td>
													</tr>																																							
												</table>
												</form>
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
									<a href="mailto:support@webcat.com.ua">Пишите нам</a>	
								</td>																
							</tr>
						</table>	
					</td>
				</tr>
			</table>
<!--/Центральный фрейм -->			
		</td>
		<td width="250" align="right" valign="top">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/right_block.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</td>
	</tr>
</table>