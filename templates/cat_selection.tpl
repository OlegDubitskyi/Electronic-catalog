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
							<td><a href="company_account.php?cmd=price">�����</a></td>
							<td><b>������</b></td>
							<td><a href="company_account.php">����������</a></td>
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
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
						{if $num_err}
						<tr>
							<td>
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
													<td align="center" height=30 class=vendor_filter bgcolor="#EDEFFA">������ �������� �����������</td>
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
							</td>		
						</tr>
						{else}
						<tr>
							<td>
								<table border="0" width="100%" cellpadding="0" cellspacing="0">
									<form action="company_account.php" method="POST">
									<tr>
										<td width="24">&nbsp;</td>
										<td colspan="{$num_col}" style="TEXT-ALIGN:LEFT;"><input type="submit" value="���������"></td>										
									</tr>
									<tr>							
										<td width="24">&nbsp;</td>																
										<td>
											<table border="0" class="rows" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												{section name=columns loop=$num_col}
												<td style="TEXT-ALIGN:LEFT; BACKGROUND: #CBCCD1; PADDING-TOP:5px; PADDING-BOTTOM:5px;">
													<select name="column[{$i++}]">
														<option value="-1">...	
														<option value="cat">���������
														<option value="vendor">�������������
														{*<option value="vg">������.+�����*}
														<option value="gname">�����
														<option value="price_ua">����(���)
														<option value="price_usd">����(�.�)
														<option value="price_opt_ua">���� ���(���)
														<option value="price_opt_usd">���� ���(�.�)
														<option value="desc">��������
														<option value="guarantee">��������
														<option value="url">URL
														<option value="presence">�������
													</select>
												</td>
												{/section}
											</tr>
											{foreach name=final_price from=$final_price item=row}
											<tr {if $smarty.foreach.final_price.index%2==0}class=m{/if}>
												{foreach from=$row item=col}
												<td>{$col}&nbsp;</td>
												{/foreach}
											</tr>
											{/foreach}
											</table>
												
										</td>
									</tr>
									<tr>
										<td colspan="{$num_col}" style="TEXT-ALIGN:LEFT;">
											<input type="hidden" name="seller_id" value="">
											<input type="hidden" name="cmd" value="chane_columns">															
											<input type="submit" value="���������">
										</td>
									</tr>
									</form>
								</table>
							</td>
						</tr>
						{/if}
						</table>
	<!--/����������� ��������-->						
					</td>
				</tr>							
			</table>
<!--/����������� ����� -->			
		</td>
	</tr>
</table>