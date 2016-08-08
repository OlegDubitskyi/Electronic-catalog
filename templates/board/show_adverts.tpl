<table border="0" width="100%" cellpadding="0" cellspacing="0">
<!--Gray line-->
	<tr>
		<td bgcolor="#E8E7E3"><img src="img/gray2.gif"></td>
	</tr>
<!--/Gray line-->	
	<tr>
		<td>
{if count($positions)>0}
<!---Навигация и фильтры --->
			{include file="board/filters/all_filters.tpl"}
<!---/Навигация и фильтры --->		
		</td>
	</tr>
	<tr>
		<td>
<!--Отображение каталога-->
			<table width="100%" border="0" width="" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
				<tr>
					<td width="24">&nbsp;</td>						
					<td>
						<table class="advert" width="100%" border="0" cellpadding="0" cellspacing="0">
							{foreach name=positions from=$positions item=p}
							<tr class=m>
								<td width="170" style="BORDER-RIGHT: #D8D9E1 1px solid"><b>"{$p.type}"</b></td>
								<td>
									<table width="100%" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td class="withdraw" style="PADDING-LEFT:0px; "><b>{$p.annotation}</b></td>
											<td class="withdraw" width="70"><b>{$p.price} {$p.currency}</b></td>
											<td class="withdraw" width="60"><b>{$p.date_ins}</b></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td style="BORDER-RIGHT: #D8D9E1 1px solid">
									<b>{$p.name}</b><br>
									Город: {$p.region_name}<br>
									Email: <a href="mailto:{$p.email}">{$p.email}</a><br>
									ICQ: {$p.icq}<br>
									Тел.: {$p.tel}
								</td>
								<td valign="top" class="black">{$p.description}</td>
							</tr>
							{/foreach}
						</table>
					</td>
					<td width="24">&nbsp;</td>
				</tr>
			</table>
<!--/Отображение каталога-->						
		</td>
	</tr>
	<tr>
		<td>
			<table width="100%" border="0" width="" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
				<tr>
					<td width="24">&nbsp;</td>						
					<td>
						{include file="board/filters/page_filter.tpl"}				
					</td>
					<td width="24">&nbsp;</td>											
				</tr>
			</table>		
		</td>
	</tr>
{/if}	
</table>

