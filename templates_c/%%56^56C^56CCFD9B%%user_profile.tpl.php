<?php /* Smarty version 2.6.12, created on 2007-01-28 19:20:34
         compiled from board/user_profile.tpl */ ?>
<?php echo '
<script language="Javascript">
function SubPage(){
	error = false;
	if(eval("document.reg[\'user_data[password]\'].value")!=document.reg.password_confirm.value){
		alert(\'Пароль и подтвержение пароля не совпадает!\')
		//alert(eval("document.details[\'seller_data[password]\'].value"));
		error = true;
	}
	if(eval("document.reg[\'user_data[email]\'].value")==\'\'){
		alert(\'Поле "Email" должно быть заполнено!\')
		//alert(eval("document.details[\'seller_data[password]\'].value"));
		error = true;
	}
	if(eval("document.reg[\'user_data[region_id]\'].value")==\'-1\'){
		error = true;
		alert(\'Поле "Регион" должно быть заполнено!\')
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
											<td class=path_filter><b>Профиль:</b></td>
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
												<form name=reg action="board.php?cmd=update_user" method="POST">
												<table class="import" border="0" cellpadding=2>
													<?php if ($this->_tpl_vars['email_error'] && ! $this->_tpl_vars['login_error']): ?>
													<tr>
														<td colspan="2" style="font-color:#ff0000" align="center">Такой email уже существует в базе</td>
													</tr>
													<?php elseif ($this->_tpl_vars['login_error'] && ! $this->_tpl_vars['email_error']): ?>
													<tr>
														<td colspan="2" style="font-color:#ff0000" align="center">Такой логин уже существует в базе</td>
													</tr>
													<?php elseif ($this->_tpl_vars['login_error'] && $this->_tpl_vars['email_error']): ?>													
													<tr>
														<td colspan="2" style="font-color:#ff0000" align="center">Такой логин и email уже существует в базе</td>
													</tr>													
													<?php endif; ?>
													<?php $_from = $this->_tpl_vars['user_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['u']):
?>
													<tr>
														<td colspan="2" align="center">Изменение профиля для <b><?php echo $this->_tpl_vars['u']['login']; ?>
</b></td>
													</tr>
													<tr>
														<td>Пароль</td>
														<td><input type="password" name="user_data[password]" size="20"></td>
													</tr>													
													<tr>
														<td>Подтверждение пароля</td>
														<td><input type="password" name="password_confirm" size="20"></td>
													</tr>													
													<tr>
														<td>Email <font color="Red">*</font><br><span>на который будет выслан пароль</span></td>
														<td><input type="text" name="user_data[email]" value="<?php echo $this->_tpl_vars['u']['email']; ?>
" size="20"></td>
													</tr>													
													<tr>
														<td>Email<br><span>(виден в объявлении)</span></td>
														<td><input type="text" name="user_data[pub_email]" value="<?php echo $this->_tpl_vars['u']['pub_email']; ?>
" size="20"></td>
													</tr>
													<tr>
														<td>ICQ</td>
														<td><input type="text" name="user_data[icq]" value="<?php echo $this->_tpl_vars['u']['icq']; ?>
" size="20"></td>
													</tr>
													<tr>
														<td>Телефон</td>
														<td><input type="text" name="user_data[tel]" value="<?php echo $this->_tpl_vars['u']['tel']; ?>
" size="20"></td>
													</tr>
													<tr>
														<td>Регион <font color="Red">*</font></td>
														<td>
															<SELECT name="user_data[region_id]" >
																<option value="-1">Выберите город</option>
															<!-- Region block-->		
															<?php $_from = $this->_tpl_vars['region_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rl'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rl']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['rl']):
        $this->_foreach['rl']['iteration']++;
?>
																<?php if ($this->_tpl_vars['rl']['id'] == $this->_tpl_vars['u']['region_id']): ?>		
																	<option value="<?php echo $this->_tpl_vars['rl']['id']; ?>
" selected><?php echo $this->_tpl_vars['rl']['region_name']; ?>
</option>						
																<?php else: ?>
																	<option value="<?php echo $this->_tpl_vars['rl']['id']; ?>
" ><?php echo $this->_tpl_vars['rl']['region_name']; ?>
</option>			
																<?php endif; ?>
															<?php endforeach; endif; unset($_from); ?>				
															<!-- /Region block-->		
															</SELECT>														
														</td>
													</tr>
													<?php endforeach; endif; unset($_from); ?>
													<tr>
														<td colspan="2">Поля, отмеченные звездочкой (*), обязательны для заполнения. </td>
													</tr>
													<tr>
														<td colspan="2" align="center"><input type="button" value="Сохранить" onclick="SubPage()"></td>
													</tr>
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