<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td width="300" class="page_bar"><p class=page_pointer>
{foreach from=$page_array item=pa}
	{if $page==$pa}
		<b class="page_bar">{$pa}</b>
	{else}	
		<a href="board.php?cmd=show_adverts&t={$type}&cat_id={$cat_id}&pg={$pa}&rid={$region_id}">{$pa}</a>
	{/if}									
{/foreach}
{if $page!=1}
		<a href="board.php?cmd=show_adverts&t={$type}&cat_id={$cat_id}&pg={$page-1}&rid={$region_id}">Предыдущая</a>
{/if}
{if count($page_array)>1 and $page<$num_pages}
		<a href="board.php?cmd=show_adverts&t={$type}&cat_id={$cat_id}&pg={$page+1}&rid={$region_id}">Следующая</a>
{/if}</p>	
		</td>
		<td align="right"><a href="board.php?cmd=add_advert"><b>Добавить объявление</b></a></td>
	</tr>
</table>
