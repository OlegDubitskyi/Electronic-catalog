<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td valign="top">
<!--����������� ����� -->
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
<!--
				<tr>
					<td align="center">�����</td>
				</tr>
-->				
				<tr>
					<td align="center">
	<!--����������� ��������-->
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
						<tr class="admin_nav">
							<td><a href="company_account.php?cmd=profile">�������</a></td>
							<td><a href="company_account.php?cmd=seller_price">�����</a></td>
							<td><b>������</b></a></td>
							<td><a href="company_account.php">����������</td>
							<td><a href="company_account.php?cmd=exit">�����</a></td>
						</tr>
						<tr>
							<td colspan=5>
								<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
									<tr>
										<td width=24><img src="img/white2.gif"></td>
										<td class=path_filter>
											������������: {$user_name}("{$company_name}")</td>
										</td>
									</tr>							
								</table>							
							</td>
						</tr>
						<tr>
							<td colspan=5 align=center>
								<form enctype="multipart/form-data" action="company_account.php"  method=post>
								<table class="import" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td class="head" colspan=2 align=center>������ �����-�����</td>
								</tr>
								<tr>
									<td width=200>����������� ����� ���������:</td>
									<td><input type="text" name="separator" value=',' size="3"></td>
								</tr>
								<tr>
									<td>���� � �����:</td>
									<td><input type="file" name="userfile" size="40"></td>
								</tr>
								<tr>
									<td colspan="2" align="center"><input type="submit" value="���������"></td>
								</tr>
								</table>
								<input type="hidden" name="cmd" value="load_price">
								</form>
							</td>
						</tr>
						</table>
	<!--/����������� ��������-->						
					</td>
				</tr>							
			</table>
<!--/����������� ����� -->			
		</td>
	</tr>
</table>