{literal}
<script language="Javascript">
function SubPage(){
	error = false;
	if(eval("document.formadm['user_data[region_id]'].value")=='-1'){
		error = true;
		alert('���� "������" ������ ���� ���������!')
	}
	if(eval("document.formadm['user_data[type]'].value")=='-1'){
		error = true;
		alert('����������� ��� ����������!')
	}
	if(eval("document.formadm['user_data[annotation]'].value")==''){
		error = true;
		alert('���� "��������" ������ ���� ���������!')
	}
	if(eval("document.formadm['user_data[annotation]'].value").length>100){
		error = true;
		alert('"��������" ������ ��������� �� ����� 100 ��������!')
	}	
	if(eval("document.formadm['user_data[description]'].value")==''){
		error = true;
		alert('����� ��������� �����������!')
	}	
	if(eval("document.formadm['user_data[description]'].value").length>500){
		error = true;
		alert('����� ���������� ������ ��������� �� ����� 500 ��������!')
	}		
	if(eval("formadm['user_data[cat_id]'].value")==''){
		error = true;
		alert('�� ������� ���������!')
	}			
	if(!error){
		document.formadm.submit()		
	}
}
function set_cat_id(cat_id){
	eval("document.formadm['user_data[cat_id]'].value="+cat_id)
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
<!--����������� ����� -->
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
											<td class=path_filter><b>���� ����������:</b></td>
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
													{foreach from=$user_data item=u}
													<tr>
														<td>Email<br><span>(����� � ����������)</span></td>
														<td><input type="text" name="user_data[pub_email]" value="{$u.pub_email}" size="30"></td>
													</tr>
													<tr>
														<td>ICQ</td>
														<td><input type="text" name="user_data[icq]" value="{$u.icq}" size="30"></td>
													</tr>
													<tr>
														<td>�������</td>
														<td><input type="text" name="user_data[tel]" value="{$u.tel}" size="30"></td>
													</tr>
													<tr>
														<td>������ <font color="Red">*</font></td>
														<td>
															<SELECT name="user_data[region_id]" >
																<option value="-1"></option>
															<!-- Region block-->		
															{foreach name=rl from=$region_list item=rl}
																{if $rl.id==$u.region_id}		
																	<option value="{$rl.id}" selected>{$rl.region_name}</option>						
																{else}
																	<option value="{$rl.id}" >{$rl.region_name}</option>			
																{/if}
															{/foreach}				
															<!-- /Region block-->		
															</SELECT>														
														</td>
													</tr>
													<tr>
														<td>��� <font color="Red">*</font></td>
														<td>
															<SELECT name="user_data[type]" >
																<option value="-1"></option>															
																<option value="1">�����</option>
																<option value="2">������</option>
															</SELECT>
														</td>
													</tr>
													<tr>
														<td>�������� ���������<br>(�� 100 ��������) <font color="Red">*</font></td>
														<td><input type="text" name="user_data[annotation]" value="{$u.annotation}" size="40"></td>
													</tr>													
													<tr>
														<td>����� ����������<br>(�� 500 ��������) <font color="Red">*</font></td>
														<td>
															<textarea name="user_data[description]" cols="30" rows="8">{$u.description}</textarea>
														</td>
													</tr>
													<tr>
														<td>����</td>
														<td>
															<table cellpadding="0" cellspacing="0">
																<tr>
																	<td><input type="text" name="user_data[price]" size="10"></td>
																	<td>
																		<SELECT name="user_data[currency]" >
																			<option value="uah">���.</option>															
																			<option value="usd">�.�</option>
																		</SELECT>
																	</td>
																</tr>
															</table>
														</td>
													</tr>
													{/foreach}
													<tr>
														<td colspan="2">����, ���������� ���������� (*), ����������� ��� ����������. </td>
													</tr>
												</table>
											</td>
<!---�������--->
											<td width="400" valign="top">
												<script language="JavaScript" src="js/board_tree.js?{$rand}"></script>
												<script language="JavaScript" src="js/board_tree_items.js?{$rand}"></script>
												<script language="JavaScript" src="js/board_tree_tpl.js?{$rand}"></script>

												<table cellpadding="5" cellspacing="0" cellpadding="10" border="0" width="100%">
												<tr>
													<td> 
														<input type="Hidden" name="open_it" value="{$open_it}">
														<script language="JavaScript">
															<!--//
	  														new tree (TREE_ITEMS, TREE_TPL);
															//-->
														</script>

													</td>
												</tr>
												</table>
											</td>
<!---�������--->											
										</tr>
										<tr>
											<td align="center"><input type="button" value="���������" onclick="SubPage()"></td>
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
<!--/����������� ����� -->			
		</td>
	</tr>
</table>