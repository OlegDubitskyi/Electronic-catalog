<?php /* Smarty version 2.6.12, created on 2007-03-07 23:04:05
         compiled from company_account.tpl */ ?>
<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td valign="top">
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center">
	<!--����������� ��������-->
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
						<tr class="admin_nav">
							<td><a href="company_account.php?cmd=profile">�������</a></td>
							<td><a href="company_account.php?cmd=seller_price">�����</a></td>
							<td><a href="company_account.php?cmd=import">������</a></td>
							<td><b>����������</b></td>
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
							<td colspan=5 align="center">
<!--- ����������� ����� --->
								<table class="import" border="0" cellpadding="2" cellspacing="0">
									<tr>
										<td class="head" align="center" colspan="7">���������� ���������</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td align="center">�� �������</td>
										<td align="center">�� �����</td>
										<td align="center">�� ������</td>
										<td align="center">�� �����</td>																								<td align="center">�� ���</td>
										<td align="center">�� ��� �����</td>
									</tr>
									<tr>
										<td class="stat">���������:</td>
										<td class="stat" align="center"><a href="company_account.php?cmd=vt"><?php echo $this->_tpl_vars['visits_today']; ?>
</a></td>
										<td class="stat" align="center"><a href="company_account.php?cmd=vy"><?php echo $this->_tpl_vars['visits_yesterday']; ?>
</a></td>
										<td class="stat" align="center"><a href="company_account.php?cmd=wv"><?php echo $this->_tpl_vars['week_visits']; ?>
</a></td>
										<td class="stat" align="center"><a href="company_account.php?cmd=mv"><?php echo $this->_tpl_vars['month_visits']; ?>
</a></td>
										<td class="stat" align="center"><a href="company_account.php?cmd=yv"><?php echo $this->_tpl_vars['year_visits']; ?>
</a></td>
										<td class="stat" align="center"><a href="company_account.php?cmd=av"><?php echo $this->_tpl_vars['all_visits']; ?>
</a></td>
									</tr>
									<tr class="stat">
										<td class="stat" width="150">���������� ������:</td>
										<td class="stat" align="center"><?php echo $this->_tpl_vars['hosts_today']; ?>
</td>
										<td class="stat" align="center"><?php echo $this->_tpl_vars['hosts_yesterday']; ?>
</td>
										<td class="stat" align="center"><?php echo $this->_tpl_vars['week_hosts']; ?>
</td>
										<td class="stat" align="center"><?php echo $this->_tpl_vars['month_hosts']; ?>
</td>
										<td class="stat" align="center"><?php echo $this->_tpl_vars['year_hosts']; ?>
</td>
										<td class="stat" align="center"><?php echo $this->_tpl_vars['all_hosts']; ?>
</td>										
									</tr>									
									<tr class="stat">
										<td class="stat">���-�� ��������� �����:</td>
										<td class="stat" align="center"><?php echo $this->_tpl_vars['company_num_rows']; ?>
</td>
										<td class="stat" colspan="6">&nbsp;</td>
									</tr>									
								</table>
<!---/����������� ����� --->								
							</td>
						</tr>
						</table>
	<!--/����������� ��������-->						
					</td>
				</tr>							
			</table>
		</td>
	</tr>
</table>