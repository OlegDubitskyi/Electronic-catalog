<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	<tr>
		<td class=path_filter>
			{* Отображение пути к категории*}
			<a href="index.php">Каталог</a> »
		{foreach name=path from=$cat_path item=path}
			{if $smarty.foreach.path.last}
				<b>{$path.cat_name}</b>
			{else}
				<a href="index.php?cmd=open_c&cat_id={$path.cat_id}">{$path.cat_name}</a> »
			{/if}
		{/foreach}										
		</td>
	</tr>
</table>	