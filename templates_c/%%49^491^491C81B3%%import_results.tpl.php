<?php /* Smarty version 2.6.12, created on 2006-12-21 20:03:16
         compiled from import_results.tpl */ ?>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
<tr>
	<td>
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
					<td>������</td>
					<td><a href="company_account.php">����������</a></td>
					<td><a href="company_account.php?cmd=exit">�����</a></td>
				</tr>
				<tr>
					<td colspan=5>
						<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
							<tr>
								<td width=24><img src="img/white2.gif"></td>
								<td class=path_filter>
									������������: <?php echo $this->_tpl_vars['user_name']; ?>
("<?php echo $this->_tpl_vars['company_name']; ?>
")</td>
								</td>
							</tr>							
						</table>							
					</td>
				</tr>
				<tr>
					<td colspan=5>
<!----------------------------------->
						<table class="gray_lines" border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
							<tr>
								<td width=5 bgcolor="#CBCCD2"></td>
								<td width=19><img src="img/white2.gif"></td>					
								<td>
									<table class="t1" border="0" cellpadding="0" cellspacing="0">
										<tr class="topline">
											<td colspan=2><img src="img/sir.gif"></td>
										</tr>
										<tr>
											<td width=15><img src="img/white2.gif"></td>
											<td align="center" height=30 class=vendor_filter bgcolor="#EDEFFA">
												����� ��� ������� ������������ � ����
											</td>
										</tr>				
										<tr>
											<td width=15><img src="img/white2.gif"></td>
											<td align="center" height=30 class=vendor_filter bgcolor="#EDEFFA">
												���-�� ��������� �����:<?php echo $this->_tpl_vars['num_deleted_rows']; ?>

											</td>
										</tr>				
										<tr>
											<td width=15><img src="img/white2.gif"></td>
											<td align="center" height=30 class=vendor_filter bgcolor="#EDEFFA">
												���-�� ��������������� �����:<?php echo $this->_tpl_vars['num_inserted_rows']; ?>

											</td>
										</tr>																		
										<tr class="bottom_line">
											<td colspan=2><img src="img/sir.gif"></td>
										</tr>
									</table>
								</td>
								<td width=19><img src="img/white2.gif"></td>
								<td width=5 bgcolor="#CBCCD2"></td>							
							</tr>
						</table>	
<!----------------------------------->
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