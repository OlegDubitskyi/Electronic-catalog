{literal}
<script language="Javascript">
function SubPage(){
	error = false;
	if(eval("document.reg.company_name.value")==''){
		error = true;
		alert('���� "�������� ����������� ��� ���" ������ ���� ���������!')
	}
	if(eval("document.reg.user_name.value")==''){
		alert('���� "���������� ����" ������ ���� ���������!')
		//alert(eval("document.details['seller_data[password]'].value"));
		error = true;
	}
	if(eval("document.reg.tel.value")==''){
		error = true;
		alert('���� "������� ��� ���������" ������ ���� ���������!')
	}
	if(eval("document.reg.region_name.value")==''){
		error = true;
		alert('���� "�����" ������ ���� ���������!')
	}
	if(eval("document.reg.email.value")==''){
		error = true;
		alert('���� Email ������ ���� ���������!')
	}
	if(eval("document.reg.num_rows.value")==''){
		error = true;
		alert('���� "�������������� ���-�� �����-�����" ������ ���� ���������!')
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
		<td width=137 bgcolor="#E8E7E3"><img src="img/gray2.gif"></td>
		<td width=6 bgcolor="#C8C6C1"><img src="img/gray3.gif"></td>
		<td bgcolor="#E8E7E3"><img src="img/gray4.gif"></td>
		<td width=250 bgcolor="#D9D7D2"><img src="img/gray5.gif"></td>
	</tr>
<!--/Gray line-->	
	<tr>
		<td width=137 bgcolor="#E8E7E3" align=center>
{* ����� ���� ��� ������ *}
			{include file="inc/left_block.tpl"}			
{* /����� ���� ��� ������ *}		
		</td>
		<td width=6 bgcolor="#C8C6C1"><img src="img/gray3.gif"></td>
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
											<td class=path_filter><b>�����������</b></td>
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
														<td width=250>�������� ����������� ��� ���:</td>
														<td><input type="text" name="company_name" size="40"></td>
													</tr>
													<tr>
														<td width=250>�����:</td>
														<td><input type="text" name="region_name" size="40"></td>
													</tr>													
													<tr>
														<td>���������� ����:</td>
														<td><input type="text" name="user_name" size="40"></td>
													</tr>													
													<tr>
														<td>������� ��� ���������:</td>
														<td>+38( <input type=text name="tel_code" size=5 maxlength="5"> ) <input type="text" name="tel" size="20"></td>
													</tr>
													<tr>
														<td>Email:</td>
														<td><input type="text" name="email" size="40"></td>
													</tr>													
													<tr>
														<td>����� �����:</td>
														<td><input type="text" name="url" size="40"></td>
													</tr>																										
													<tr>
														<td>�������������� ���-�� �����-�����:</td>
														<td><input type="text" name="num_rows" size="10"></td>
													</tr>																										
													<tr>
														<td colspan="2" style="BORDER-DOWN: #D8D9E1 1px solid;" align="center">
															<input type="hidden" name="cmd" value="srinfo">
															<input type="button" value="����������������" onclick="SubPage()">
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
									<a href="index.php?cmd=about">� �������</a> | 
								 	<a href="index.php?cmd=order">��� ���������� ����� ����</a> |
								 	<a href="index.php?cmd=but">������</a> |
									<a href="mailto:support@webcat.com.ua">������ ���</a>{* | 
									<a href="">������� �� �����</a>*}	
								</td>																
							</tr>
						</table>	
					</td>
				</tr>
			</table>
<!--/����������� ����� -->			
		</td>
		<td width="250" align="right" valign="top">
{* ������ ���� � ������� � ��� ����� ������ � ���� ��� ��������� *}
			{include file="inc/right_block.tpl"}
{* ������ ���� � ������� � ��� ����� ������ � ���� ��� ��������� *}
		</td>
	</tr>
</table>