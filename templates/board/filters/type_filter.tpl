<td class=filter style="BORDER-TOP: #C4C4C4 1px solid;">
<table border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="10"></td>
		<td width=65 class=vendor_filter>
			<b>���:</b>		
		</td>
		<td class="page_bar">
			{if $type==-1 or !$type}
				<b>���</b>
			{else}
				<a href="board.php?cmd=show_adverts&t=-1&cat_id={$cat_id}">���</a> 
			{/if}		
			{foreach name=t from=$type_list item=t}	
				{if $smarty.foreach.t.first}
					{* ������� ������ ������ � ��������� ������� *}
					{if $type==$t.id}<b>{$t.type_name}</b>
					{else}
						<a href="board.php?cmd=show_adverts&t={$t.id}&cat_id={$cat_id}">{$t.type_name}</a>
					{/if}
				{else}
					{* ������� ������ ������ � ��������� ������� *}
					{if $type==$t.id}, {$t.type_name}
					{else}, <a href="board.php?cmd=show_adverts&t={$t.id}&cat_id={$cat_id}">{$t.type_name}</a>
					{/if}
				{/if}
			{/foreach}
		</td>
	</tr>
</table>
</td>
