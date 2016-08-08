<table width="100%" height="100%" cellpadding="2" cellspacing="0" border="1">
<tr>
	<td height="20"><a href="index.php?cmd=seller_profile">Профиль</td>
	<td><a href="index.php?cmd=edit_seller">Статистика</td>
	<td><b>Прайс</b></td>	
	<td><a href="index.php?cmd=seller_import">Импорт</a></td>	
</tr>
<tr>
	<td colspan="4" height="100%" valign="top">
		<table width="100%" cellpadding="2" cellspacing="0" border="1">
		{foreach from=$bottom_categories item=bc}
			<tr>
				<td><a href="index.php?cmd=seller_price&cat_id={$bc.cat_id}">{$bc.cat_name}</a></td>
			</tr>
		{/foreach}
		</table>
	</td>
</tr>
</table>