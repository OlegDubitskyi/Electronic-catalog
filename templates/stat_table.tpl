<table border="2" width="100%" cellpadding="2" cellspacing="0">
	<tr>
		<td>
<!--����������� ����� -->
			<table border="2" width="100%" cellpadding="2" cellspacing="0">
<!--
				<tr>
					<td align="center">�����</td>
				</tr>
-->				
				<tr>
					<td align="center">
	<!--����������� ��������-->
						<table border="1" width="100%" cellpadding="2" cellspacing="0">
						<tr>
							<td><a href="company_account.php?cmd=profile">�������</a></td>
							<td><a href="company_account.php?cmd=seller_price">�����</a></td>
							<td><a href="company_account.php?cmd=import">������</a></td>
							<td>����������</td>
							<td><a href="company_account.php?cmd=exit">�����</a></td>
						</tr>
						<tr>
							<td colspan=5>������������: {$user_name}("{$company_name}")</td>
						</tr>
						<tr>
							<td colspan=5 align="center">
								<table border="1" cellpadding="2" cellspacing="0">
									<tr>
										<td align="center" colspan="7"><b>{$stat_title}</b></td>
									</tr>
									<tr>
										<td>�</td>
										<td align="center">������������</td>
										<td align="center">���-�� ���������</td>
									</tr>
{foreach name=data from=$data item=d}
									<tr>
										<td>{$smarty.foreach.data.iteration}</td>
										<td>{$d.gname}</td>
										<td align="center">{$d.num_rows}</td>
									</tr>
{/foreach}
								</table>
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