<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	<tr>
		<td colspan="2" width=24><img src="img/white2.gif"></td>
		<td>
			{* Путь к категории *}
			{include file="inc/path_shift.tpl"}	
			{* /Путь к категории *}
		</td>
		<td colspan=2><img src="img/white2.gif"></td>
	</tr>
	<tr>
		<td width=5 bgcolor="#CBCCD2"></td>
		<td width=19><img src="img/white2.gif"></td>
		<td>
			<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
			{*
				<tr>
					<td>
						<h1>
						{foreach name=path from=$cat_path item=path}
							{if $smarty.foreach.path.last}
							{$path.cat_name}
							{/if}
						{/foreach}						
						</h1>
					</td>
				</tr>
			*}				
				<tr>
			<!-- Фильтр по производителям --->
				{include file="filters/vendor_filter.tpl"}	
			<!-- /Фильтр по производителям --->
				</tr>
				<tr>
			<!-- Фильтр по регионам --->
				{include file="filters/region_filter.tpl"}	
			<!-- /Фильтр по регионам --->					
				</tr>
			</table>		
		</td>
		<td width=19><img src="img/white2.gif"></td>
		<td width=5 bgcolor="#CBCCD2"></td>		
	</tr>
	<tr>
		<td colspan=2 width=24><img src="img/white2.gif"></td>
		<td>
			<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
				<tr>
					<td>
						<table border="0" cellpadding="2" cellspacing="0">
							<tr>
								<td width="300">
			<!-- Постраничный вывод -->
									{include file="filters/page_filter.tpl"}	
			<!-- /Постраничный вывод -->
								</td>
			<!-- Фильтр по типу прайса(розница, опт) -->
									{include file="filters/price_type_filter.tpl"}									
			<!-- Фильтр по типу прайса(розница, опт) -->								
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
		<td colspan="2" width=24><img src="img/white2.gif"></td>
	</tr>	
</table>
		

