<table border="0" width="100%" cellpadding="0" cellspacing="0">
<!--Gray line-->
	<tr>
		<td bgcolor="#E8E7E3"><img src="img/gray2.gif"></td>
	</tr>
<!--/Gray line-->			
	<tr>
<!--Центральный фрейм -->
		<td valign="top">
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr style="PADDING-TOP:20px; PADDING-BOTTOM:20px;">
					<td>
<!--Отображение информации о компании-->
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td align="center">
{foreach from=$seller item=s}								
								<table class="import" width=450 cellpadding="0" cellspacing="0">
									<tr>
										<td class="info_head2" width=150>Компания:</td>
										<td style="PADDING-RIGHT:5px;">{if $s.company_name}<b>{$s.company_name}</b>{else}&nbsp;{/if}</td>
									</tr>
									<tr>
										<td class="info_head">Город:</td>
										<td class="stat" style="PADDING-RIGHT:5px;">{if $s.region_name}{$s.region_name}{else}&nbsp;{/if}</td>									
									</tr>
									<tr>
										<td class="info_head">Адрес:</td>
										<td class="stat" style="PADDING-RIGHT:5px;">{if $s.address}{$s.address}{else}&nbsp;{/if}</td>									
									</tr>
									<tr>
										<td class="info_head">Телефоны:</td>
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
										<td class="info_head">Факс:</td>
										<td class="stat" style="PADDING-RIGHT:5px;">{if $s.fax}{$s.fax}{else}&nbsp;{/if}</td>									
									</tr>
									<tr>
										<td class="info_head">Сайт:</td>
										<td class="stat" style="PADDING-RIGHT:5px;">{if $s.url}{$s.url}{else}&nbsp;{/if}</td>									
									</tr>
									<tr>
										<td class="info_head">Время работы:</td>
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
<!--если есть доставка-->
									<tr>
										<td class="info_head">Условия доставки:</td>
										<td class="stat" style="PADDING-RIGHT:5px;">{if $s.delivery_options}{$s.delivery_options}{else}&nbsp;{/if}</td>									
									</tr>
<!--если есть доставка-->
{/if}																		
									<tr>
										<td class="info_head">Наличие кредита:</td>
										<td class="stat" style="PADDING-RIGHT:5px;">
											{if $s.credit}Есть
											{else}Нет
											{/if}
										</td>									
									</tr>																											
									<tr>
										<td class="info_head">Информация о компании:</td>
										<td class="stat" style="PADDING-RIGHT:5px;">{if $s.description}{$s.description}{else}&nbsp;{/if}</td>									
									</tr>																											
								</table>
{/foreach}								
								</td>
							</tr>							
						</table>
<!--/Отображение информации о компании-->
					</td>
				</tr>							
			</table>
<!--/Центральный фрейм -->			
		</td>
	</tr>
</table>