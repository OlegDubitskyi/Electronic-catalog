<table border="2" width="100%" cellpadding="2" cellspacing="0">
	<tr>
		<td>
<!--Центральный фрейм -->
			<table border="2" width="100%" cellpadding="2" cellspacing="0">
				<tr>
					<td align="center">Поиск</td>
				</tr>
				<tr>
					<td>
{* Отображение пути к категории*}										
					{foreach name=path from=$cat_path item=path}
						{if $smarty.foreach.path.last}
							{$path.cat_name}
						{else}
							<a href="index.php?cmd=open_c&cat_id={$path.cat_id}">{$path.cat_name}</a> »
						{/if}
					{/foreach}										
					</td>
				</tr>
				<tr>
					<td><b>{$cat_name}</b></td>
				</tr>
				<tr>
					<td>
<!--Отображение каталога-->
						<table border="2" width="" cellpadding="2" cellspacing="0">
						{foreach from=$catalog item=c}
							<tr>
								<td></td>
							</tr>
						{/foreach}
						</table>
<!--/Отображение каталога-->						
					</td>
				</tr>							
			</table>
<!--/Центральный фрейм -->			
		</td>
	</tr>
</table>