<table border="2" width="100%" cellpadding="2" cellspacing="0">
	<tr>
		<td>
<!--����������� ����� -->
			<table border="2" width="100%" cellpadding="2" cellspacing="0">
				<tr>
					<td align="center">�����</td>
				</tr>
				<tr>
					<td>����</td>
				</tr>
				<tr>
					<td><b>{$cat_name}</b></td>
				</tr>
				<tr>
					<td>���������� �� ��������</td>
				</tr>
				<tr>
					<td>���������� �� �����</td>
				</tr>
				<tr>
					<td>
<!--����������� ��������-->
						<table width="100%" border="2" width="" cellpadding="2" cellspacing="0">
						<tr>
							<td><b>������������</b></td>
							<td><b>����, ���.</b></td>
							<td><b>����, usd</b></td>							
							<td><b>��������</b></td>
							<td><b>�������</b></td>
							<td><b>����</b></td>
							<td><b>��������</b></td>
						</tr>
						{foreach from=$positions item=p}
							<tr>
								<td>{$p.goods_name} {$p.description}</td>
								<td>{$p.price_ua}</td>
								<td>{$p.price_usd}</td>
								<td>{$p.guarantee}</td>
								<td>{$p.availability}</td>
								<td>{$p.insert_date}</td>
								<td>{$p.company_name}</td>
							</tr>
						{/foreach}
						</table>
<!--/����������� ��������-->						
					</td>
				</tr>							
			</table>
<!--/����������� ����� -->			
		</td>
	</tr>
</table>