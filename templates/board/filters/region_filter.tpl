<td class=filter>
<table border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="10"></td>
		<td width=65 class=vendor_filter>
			<b>Регионы:</b>
		</td>
		<td class="page_bar">
			{if $selected_reg_id==-1 or !$selected_reg_id}
				<b>Все</b>
			{else}<a href="board.php?cmd=show_adverts&t={$type}&cat_id={$cat_id}&rid=-1">Все</a> {/if}{foreach name=rl from=$region_list item=rl}{if $smarty.foreach.rl.first}{* Убираем ссылку ссылку с выбраного региона *}{if $selected_reg_id==$rl.id}<b>{$rl.region_name}</b>{else}<a href="board.php?cmd=show_adverts&t={$type}&cat_id={$cat_id}&rid={$rl.id}">{$rl.region_name}</a>{/if}{else}{* Убираем ссылку ссылку с выбраного региона *}{if $selected_reg_id==$rl.id}, {$rl.region_name}{else}, <a href="board.php?cmd=show_adverts&t={$type}&cat_id={$cat_id}&rid={$rl.id}">{$rl.region_name}</a>{/if}{/if}{/foreach}
		</td>
	</tr>
</table>
</td>		