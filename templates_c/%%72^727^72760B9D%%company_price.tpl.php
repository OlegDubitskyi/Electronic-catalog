<?php /* Smarty version 2.6.12, created on 2006-11-17 23:59:21
         compiled from company_price.tpl */ ?>
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
							<td>�����</td>
							<td><a href="company_account.php?cmd=import">������</a></td>
							<td><a href="company_account.php">����������</a></td>
							<td><a href="company_account.php?cmd=exit">�����</a></td>
						</tr>
						<tr>
							<td colspan=5>������������: <?php echo $this->_tpl_vars['user_name']; ?>
("<?php echo $this->_tpl_vars['company_name']; ?>
")</td>
						</tr>
						<tr>
							<td colspan=5>��� ��� �����, �.� ��� :) </td>
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