{literal}
<script language="Javascript">
function SubPage(){
	error = false;
	if(eval("document.reg['user_data[password]'].value")!=document.reg.password_confirm.value){
		alert('������ � ������������ ������ �� ���������!')
		//alert(eval("document.details['seller_data[password]'].value"));
		error = true;
	}
	if(eval("document.reg['user_data[email]'].value")==''){
		alert('���� "Email" ������ ���� ���������!')
		//alert(eval("document.details['seller_data[password]'].value"));
		error = true;
	}
	if(eval("document.reg['user_data[region_id]'].value")=='-1'){
		error = true;
		alert('���� "������" ������ ���� ���������!')
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
<!--����������� ����� -->
			<table border="0" width="100%" height="100%" bgcolor="#FFFFFF" cellpadding="2" cellspacing="0">
				<tr>
					<td valign="top" colspan="3" height="20">
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td width=24><img src="img/white2.gif"></td>
								<td>
									<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
										<tr>
											<td class=path_filter><b>�������:</b></td>
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
													{if $email_error and !$login_error}
													<tr>
														<td colspan="2" style="font-color:#ff0000" align="center">����� email ��� ���������� � ����</td>
													</tr>
													{elseif $login_error and !$email_error}
													<tr>
														<td colspan="2" style="font-color:#ff0000" align="center">����� ����� ��� ���������� � ����</td>
													</tr>
													{elseif $login_error and $email_error}													
													<tr>
														<td colspan="2" style="font-color:#ff0000" align="center">����� ����� � email ��� ���������� � ����</td>
													</tr>													
													{/if}
													{foreach from=$user_data item=u}
													<tr>
														<td colspan="2" align="center">��������� ������� ��� <b>{$u.login}</b></td>
													</tr>
													<tr>
														<td>������</td>
														<td><input type="password" name="user_data[password]" size="20"></td>
													</tr>													
													<tr>
														<td>������������� ������</td>
														<td><input type="password" name="password_confirm" size="20"></td>
													</tr>													
													<tr>
														<td>Email <font color="Red">*</font><br><span>�� ������� ����� ������ ������</span></td>
														<td><input type="text" name="user_data[email]" value="{$u.email}" size="20"></td>
													</tr>													
													<tr>
														<td>Email<br><span>(����� � ����������)</span></td>
														<td><input type="text" name="user_data[pub_email]" value="{$u.pub_email}" size="20"></td>
													</tr>
													<tr>
														<td>ICQ</td>
														<td><input type="text" name="user_data[icq]" value="{$u.icq}" size="20"></td>
													</tr>
													<tr>
														<td>�������</td>
														<td><input type="text" name="user_data[tel]" value="{$u.tel}" size="20"></td>
													</tr>
													<tr>
														<td>������ <font color="Red">*</font></td>
														<td>
															<SELECT name="user_data[region_id]" >
																<option value="-1">�������� �����</option>
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
													{/foreach}
													<tr>
														<td colspan="2">����, ���������� ���������� (*), ����������� ��� ����������. </td>
													</tr>
													<tr>
														<td colspan="2" align="center"><input type="button" value="���������" onclick="SubPage()"></td>
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
<!--/����������� ����� -->			
		</td>
	</tr>
</table>