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
											������������: {$user_name}("{$company_name}")</td>
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
										<td class="stat" align="center"><a href="company_account.php?cmd=vt">{$visits_today}</a></td>
										<td class="stat" align="center"><a href="company_account.php?cmd=vy">{$visits_yesterday}</a></td>
										<td class="stat" align="center"><a href="company_account.php?cmd=wv">{$week_visits}</a></td>
										<td class="stat" align="center"><a href="company_account.php?cmd=mv">{$month_visits}</a></td>
										<td class="stat" align="center"><a href="company_account.php?cmd=yv">{$year_visits}</a></td>
										<td class="stat" align="center"><a href="company_account.php?cmd=av">{$all_visits}</a></td>
									</tr>
									<tr class="stat">
										<td class="stat" width="150">���������� ������:</td>
{*
										<td class="stat" align="center"><a href="company_account.php?cmd=ht">{$hosts_today}</a></td>
										<td class="stat" align="center"><a href="company_account.php?cmd=hy">{$hosts_yesterday}</a></td>
										<td class="stat" align="center"><a href="company_account.php?cmd=wh">{$week_hosts}</a></td>
										<td class="stat" align="center"><a href="company_account.php?cmd=mh">{$month_hosts}</a></td>
										<td class="stat" align="center"><a href="company_account.php?cmd=yh">{$year_hosts}</a></td>
										<td class="stat" align="center"><a href="company_account.php?cmd=ah">{$all_hosts}</a></td>
*}
										<td class="stat" align="center">{$hosts_today}</td>
										<td class="stat" align="center">{$hosts_yesterday}</td>
										<td class="stat" align="center">{$week_hosts}</td>
										<td class="stat" align="center">{$month_hosts}</td>
										<td class="stat" align="center">{$year_hosts}</td>
										<td class="stat" align="center">{$all_hosts}</td>										
									</tr>									
									<tr class="stat">
										<td class="stat">���-�� ��������� �����:</td>
										<td class="stat" align="center">{$company_num_rows}</td>
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