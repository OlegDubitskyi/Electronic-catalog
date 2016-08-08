<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	<tr>
		<td class=path_filter style="PADDING-BOTTOM:0px;";>
			{* Отображение пути к категории*}
			<a href="board.php">Каталог объявлений</a> »
		{foreach name=path from=$cat_path item=path}
			{if $smarty.foreach.path.last}
				<b>{$path.cat_name}</b>
			{else}
				<a href="board.php?cmd=show_adverts&cat_id={$path.cat_id}">{$path.cat_name}</a> »
			{/if}
		{/foreach}										
		</td>
	</tr>
</table>	