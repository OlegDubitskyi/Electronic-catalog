<table width="100%" height="100%" cellpadding="2" cellspacing="0" border="1">
<tr>
	<td height="20">Каталог:</td>
</tr>
<tr>
	<td colspan="4" height="100%" valign="top">
		<table border="1" cellpadding="2">
			{foreach from=$catalog item=c}
			<tr>
				<td>{$c.prefix}
				{if $c.cat_right-$c.cat_left==1}
					<a href="index.php?cmd=show_vendors&cat_id={$c.cat_id}">{$c.cat_name}</a>
				{else}
					{$c.cat_name}
				{/if}
				</td>
			</tr>
			{/foreach}	
		</table>
	</td>
</tr>
</table>