<td class=filter style="BORDER-TOP: #C4C4C4 1px solid;">
<table border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="10"></td>
		<td width=65 class=vendor_filter>
			<b>Вендоры:</b>
		</td>
		<td class="page_bar">		
			{if $vendor_id==-1 or !$vendor_id}<b>Все</b> {else}<a href="index.php?cmd=sg&cat_id={$cat_id}&vid=-1">Все</a>{/if}{foreach name=v from=$vendors item=v}{if $smarty.foreach.v.first}{if $vendor_id==$v.id}<b>{$v.vendor_name}</b><span>({$v.num_goods})</span>{else}<a href="index.php?cmd=sg&vid={$v.id}&cat_id={$v.cat_id}">{$v.vendor_name}</a> <span>({$v.num_goods})</span>{/if}{else}{if $vendor_id==$v.id}, <b>{$v.vendor_name}</b><span>({$v.num_goods})</span>{else}, <a href="index.php?cmd=sg&vid={$v.id}&cat_id={$v.cat_id}">{$v.vendor_name}</a> <span>({$v.num_goods})</span>{/if}{/if}{/foreach}
		</td>
	</tr>
</table>
</td>
