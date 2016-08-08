<td class="page_bar">
	{if $pt=='r'}
		<b class="page_bar">розница</b>
		<a href="index.php?cmd=open_c&cat_id={$cat_id}{if $vendor_id}&vendor_id={$vendor_id}{/if}&pt=o">опт</a>								
	{elseif $pt=='o'}
		<a href="index.php?cmd=open_c&cat_id={$cat_id}{if $vendor_id}&vendor_id={$vendor_id}{/if}&pt=r">розница</a>
		<b class="page_bar">опт</b>
	{/if}
</td>