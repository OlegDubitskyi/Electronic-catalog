<td class="page_bar">
	{if $pt=='r'}
		<b class="page_bar">�������</b>
		<a href="index.php?cmd=open_c&cat_id={$cat_id}{if $vendor_id}&vendor_id={$vendor_id}{/if}&pt=o">���</a>								
	{elseif $pt=='o'}
		<a href="index.php?cmd=open_c&cat_id={$cat_id}{if $vendor_id}&vendor_id={$vendor_id}{/if}&pt=r">�������</a>
		<b class="page_bar">���</b>
	{/if}
</td>