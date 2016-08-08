<table border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="300" class="page_bar"><p class=page_pointer>
{foreach from=$page_array item=pa}
	{if $page==$pa}
		<b class="page_bar">{$pa}</b>
	{else}	
		<a href="index.php?cmd=sg&vid={$vendor_id}&cat_id={$cat_id}&pg={$pa}&rid={$region_id}">{$pa}</a>
	{/if}									
{/foreach}
{if $page!=1}
		<a href="index.php?cmd=sg&vid={$vendor_id}&cat_id={$cat_id}&pg={$page-1}&rid={$region_id}">Предыдущая</a>
{/if}
{if count($page_array)>1 and $page<$num_pages}
		<a href="index.php?cmd=sg&vid={$vendor_id}&cat_id={$cat_id}&pg={$page+1}&rid={$region_id}">Следующая</a>
{/if}</p>
		</td>
	</tr>
</table>