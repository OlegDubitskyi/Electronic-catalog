{literal}
<script language="Javascript">
function SubPage(){
	error = false;
	if(eval("document.reg['user_data[login]'].value")==''){
		error = true;
		alert('���� "�����" ������ ���� ���������!')
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
											<td class=path_filter><b>�����������:</b></td>
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
													<tr>
														<td>������������ <b>{$login}</b> ��� ������� ���������������</td>
													</tr>
													<tr>
														<td>�� �������� ���� <b>{$email}</b> ���� ������� ������ � ������� � �������</td>
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