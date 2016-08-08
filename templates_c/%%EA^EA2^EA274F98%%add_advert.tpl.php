<?php /* Smarty version 2.6.12, created on 2007-02-10 16:16:41
         compiled from board/add_advert.tpl */ ?>
<?php echo '
<script language="Javascript">
function SubPage(){
	error = false;
	if(eval("document.formadm[\'user_data[region_id]\'].value")==\'-1\'){
		error = true;
		alert(\'Поле "Регион" должно быть заполнено!\')
	}
	if(eval("document.formadm[\'user_data[type]\'].value")==\'-1\'){
		error = true;
		alert(\'Неопределен тип Объявления!\')
	}
	if(eval("document.formadm[\'user_data[annotation]\'].value")==\'\'){
		error = true;
		alert(\'Поле "Заглавие" должно быть заполнено!\')
	}
	if(eval("document.formadm[\'user_data[annotation]\'].value").length>100){
		error = true;
		alert(\'"Заглавие" должно содержать не более 100 символов!\')
	}	
	if(eval("document.formadm[\'user_data[description]\'].value")==\'\'){
		error = true;
		alert(\'Текст сообщения отсутствует!\')
	}	
	if(eval("document.formadm[\'user_data[description]\'].value").length>500){
		error = true;
		alert(\'Текст объявления должен содержать не более 500 символов!\')
	}		
	if(eval("formadm[\'user_data[cat_id]\'].value")==\'\'){
		error = true;
		alert(\'Не выбрана категория!\')
	}			
	if(!error){
		document.formadm.submit()		
	}
}
function set_cat_id(cat_id){
	eval("document.formadm[\'user_data[cat_id]\'].value="+cat_id)
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
			<form name=formadm action="board.php?cmd=save_advert" method="POST">
			<table border="0" width="100%" height="100%" bgcolor="#FFFFFF" cellpadding="2" cellspacing="0">
				<tr>
					<td valign="top" colspan="3" height="20">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td width=24><img src="img/white2.gif"></td>
								<td>
									<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
										<tr>
											<td class=path_filter><b>Дать объявление:</b></td>
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
									<table border="0" width="100%" cellpadding="0" cellspacing="0" style="PADDING-TOP:10px; PADDING-BOTTOM:10px;">
										<tr>
											<td style="FONT-SIZE:12px;" align="center" valign="top">
												
												<table class="import" border="0" cellpadding=2>
													<?php $_from = $this->_tpl_vars['user_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['u']):
?>
													<tr>
														<td>Email<br><span>(виден в объявлении)</span></td>
														<td><input type="text" name="user_data[pub_email]" value="<?php echo $this->_tpl_vars['u']['pub_email']; ?>
" size="30"></td>
													</tr>
													<tr>
														<td>ICQ</td>
														<td><input type="text" name="user_data[icq]" value="<?php echo $this->_tpl_vars['u']['icq']; ?>
" size="30"></td>
													</tr>
													<tr>
														<td>Телефон</td>
														<td><input type="text" name="user_data[tel]" value="<?php echo $this->_tpl_vars['u']['tel']; ?>
" size="30"></td>
													</tr>
													<tr>
														<td>Регион <font color="Red">*</font></td>
														<td>
															<SELECT name="user_data[region_id]" >
																<option value="-1"></option>
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
													<tr>
														<td>Тип <font color="Red">*</font></td>
														<td>
															<SELECT name="user_data[type]" >
																<option value="-1"></option>															
																<option value="1">Куплю</option>
																<option value="2">Продам</option>
															</SELECT>
														</td>
													</tr>
													<tr>
														<td>Заглавие сообщения<br>(до 100 символов) <font color="Red">*</font></td>
														<td><input type="text" name="user_data[annotation]" value="<?php echo $this->_tpl_vars['u']['annotation']; ?>
" size="40"></td>
													</tr>													
													<tr>
														<td>Текст объявления<br>(до 500 символов) <font color="Red">*</font></td>
														<td>
															<textarea name="user_data[description]" cols="30" rows="8"><?php echo $this->_tpl_vars['u']['description']; ?>
</textarea>
														</td>
													</tr>
													<tr>
														<td>Цена</td>
														<td>
															<table cellpadding="0" cellspacing="0">
																<tr>
																	<td><input type="text" name="user_data[price]" size="10"></td>
																	<td>
																		<SELECT name="user_data[currency]" >
																			<option value="uah">грн.</option>															
																			<option value="usd">у.е</option>
																		</SELECT>
																	</td>
																</tr>
															</table>
														</td>
													</tr>
													<?php endforeach; endif; unset($_from); ?>
													<tr>
														<td colspan="2">Поля, отмеченные звездочкой (*), обязательны для заполнения. </td>
													</tr>
												</table>
											</td>
<!---Каталог--->
											<td width="400" valign="top">
												<script language="JavaScript" src="js/board_tree.js?<?php echo $this->_tpl_vars['rand']; ?>
"></script>
												<script language="JavaScript" src="js/board_tree_items.js?<?php echo $this->_tpl_vars['rand']; ?>
"></script>
												<script language="JavaScript" src="js/board_tree_tpl.js?<?php echo $this->_tpl_vars['rand']; ?>
"></script>

												<table cellpadding="5" cellspacing="0" cellpadding="10" border="0" width="100%">
												<tr>
													<td> 
														<input type="Hidden" name="open_it" value="<?php echo $this->_tpl_vars['open_it']; ?>
">
														<script language="JavaScript">
															<!--//
	  														new tree (TREE_ITEMS, TREE_TPL);
															//-->
														</script>

													</td>
												</tr>
												</table>
											</td>
<!---Каталог--->											
										</tr>
										<tr>
											<td align="center"><input type="button" value="Отправить" onclick="SubPage()"></td>
											<td>&nbsp;</td>
										</tr>																											
									</table>		
								</td>
								<td><img src="img/white2.gif"></td>
							</tr>
						</table>					
					</td>
				</tr>							
			</table>
			<input type="hidden" name="user_data[cat_id]" value="">
			</form>
<!--/Центральный фрейм -->			
		</td>
	</tr>
</table>