<table border="0" width="100%" cellpadding="0" cellspacing="0">
<!--Gray line-->
	<tr>
		<td bgcolor="#E8E7E3"><img src="img/gray2.gif"></td>
	</tr>
<!--/Gray line-->			
	<tr>
<!--����������� ����� -->
		<td valign="top">
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr style="PADDING-TOP:20px; PADDING-BOTTOM:20px;">
					<td>
<!--����������� ���������� � ��������-->
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td align="center">
{foreach from=$seller item=s}								
								<table class="import" width=450 cellpadding="0" cellspacing="0">
									<tr>
										<td class="info_head2" width=150>��������:</td>
										<td style="PADDING-RIGHT:5px;">{if $s.company_name}<b>{$s.company_name}</b>{else}&nbsp;{/if}</td>
									</tr>
									<tr>
										<td class="info_head">�����:</td>
										<td class="stat" style="PADDING-RIGHT:5px;">{if $s.region_name}{$s.region_name}{else}&nbsp;{/if}</td>									
									</tr>
									<tr>
										<td class="info_head">�����:</td>
										<td class="stat" style="PADDING-RIGHT:5px;">{if $s.address}{$s.address}{else}&nbsp;{/if}</td>									
									</tr>
									<tr>
										<td class="info_head">��������:</td>
										<td class="stat" style="PADDING-RIGHT:5px;">
											{if $s.tel1}
												({$s.tel_code1}) {$s.tel1};
											{/if}
											{if $s.tel2}
												({$s.tel_code2}) {$s.tel2};
											{/if}
											{if $s.tel2}
												({$s.tel_code3}) {$s.tel3}
											{/if}										
										</td>									
									</tr>
									<tr>
										<td class="info_head">����:</td>
										<td class="stat" style="PADDING-RIGHT:5px;">{if $s.fax}{$s.fax}{else}&nbsp;{/if}</td>									
									</tr>
									<tr>
										<td class="info_head">����:</td>
										<td class="stat" style="PADDING-RIGHT:5px;">{if $s.url}{$s.url}{else}&nbsp;{/if}</td>									
									</tr>
									<tr>
										<td class="info_head">����� ������:</td>
										<td class="stat" style="PADDING-RIGHT:5px;">{if $s.work_time}{$s.work_time}{else}&nbsp;{/if}</td>									
									</tr>
									<tr>
										<td class="info_head">Email:</td>
										<td class="stat" style="PADDING-RIGHT:5px;">{if $s.email}{$s.email}{else}&nbsp;{/if}</td>									
									</tr>									
									<tr>
										<td class="info_head">ICQ:</td>
										<td class="stat" style="PADDING-RIGHT:5px;">{if $s.icq}{$s.icq}{else}&nbsp;{/if}</td>									
									</tr>									
{if $s.delivery}				
<!--���� ���� ��������-->
									<tr>
										<td class="info_head">������� ��������:</td>
										<td class="stat" style="PADDING-RIGHT:5px;">{if $s.delivery_options}{$s.delivery_options}{else}&nbsp;{/if}</td>									
									</tr>
<!--���� ���� ��������-->
{/if}																		
									<tr>
										<td class="info_head">������� �������:</td>
										<td class="stat" style="PADDING-RIGHT:5px;">
											{if $s.credit}����
											{else}���
											{/if}
										</td>									
									</tr>																											
									<tr>
										<td class="info_head">���������� � ��������:</td>
										<td class="stat" style="PADDING-RIGHT:5px;">{if $s.description}{$s.description}{else}&nbsp;{/if}</td>									
									</tr>																											
								</table>
{/foreach}								
								</td>
							</tr>							
						</table>
<!--/����������� ���������� � ��������-->
					</td>
				</tr>							
			</table>
<!--/����������� ����� -->			
		</td>
	</tr>
</table>