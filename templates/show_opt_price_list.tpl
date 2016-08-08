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
			{include file="filters/all_filters.tpl"}
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
						<table class="rows" width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td style="TEXT-ALIGN: left; PADDING-LEFT: 15px;" class="header">Наименование</td>
								<td width=60 class="header">Опт, грн.</td>
								<td width=60 class="header">Опт, usd</td>							
								<td width=60 class="header">Гарантия, мес</td>
								<td width=70 class="header">Наличие</td>
								<td width=40 class="header">Дата</td>
								<td width=120 class="header">Продавец</td>
							</tr>
							{foreach name=positions from=$positions item=p}
							<tr {if $smarty.foreach.positions.index%2==0}class=m{/if}>
								<td class=goods>
								{if $p.url}
									<a href="go.php?gid={$p.gid}" target="new">{$p.vendor_name} {$p.goods_name} {$p.description}</a>
								{else}
									{$p.vendor_name} {$p.goods_name} {$p.description}
								{/if}	
								</td>
								<td align="center">{if $p.price_opt_ua!=0}{$p.price_opt_ua}{else}-{/if}</td>
								<td align="center">{if $p.price_opt_usd!=0}{$p.price_opt_usd}{else}-{/if}</td>
								<td align="center">{$p.guarantee}</td>
								<td align="center">{if $p.presence}{$p.presence}{else}&nbsp;{/if}</td>
								<td align="center">{$p.insert_date}</td>
								<td align="center" class="cinfo">
									<a href="index.php?cmd=ci&sid={$p.seller_id}" title="подробнее" target="new">{$p.company_name}</a><br>
									{if $p.tel1}т.{if $p.tel_code1}({$p.tel_code1}){/if} {$p.tel1}<br>{/if}
									{$p.region_name}
								</td>
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
						{include file="filters/page_filter.tpl"}						
					</td>
					<td width="24">&nbsp;</td>											
				</tr>
			</table>		
		</td>
	</tr>	
{else}
	<tr height=30>
		<td>
			<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
				<tr>
					<td width=24><img src="img/white2.gif"></td>
					<td>
						{* Путь к категории *}
						{include file="inc/path_shift.tpl"}	
						{* /Путь к категории *}
					</td>
					<td width=24><img src="img/white2.gif"></td>
				</tr>	
			</table>
		</td>
	</tr>
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
								<td align="center" height=30 class=vendor_filter bgcolor="#EDEFFA">По данному запросу ничего не найдено</td>
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
{/if}											
</table>
