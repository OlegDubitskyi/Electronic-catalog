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
											<td style="BORDER-TOP: #C4C4C4 1px solid; FONT-SIZE:12px; PADDING-TOP:20px;" align="center">
											{if $user_exist}
												����� ����� ��� ���������� � ����
											{else}
												������� �� �����������, �� ��� ����� ������� ������ � �������� � ������������� �����������.<br>
												����� ������������� ����������� ���� ������ ����� �����������.
											{/if}												
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
									<a href=""><a href="mailto:support@webcat.com.ua">������ ���</a>{* | 
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