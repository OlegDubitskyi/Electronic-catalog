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
			<tr>
				<td colspan="10"><a href="index.php?cmd=seller_price">Вернуться к списку категорий</a></td>
			</tr>
			<tr>
				<td colspan="9"><b>{$cat_name}</b></td>
				<td><a href="index.php?cmd=add_position&cat_id={$cat_id}">Добавить</a></td>
			</tr>
			<tr>
				<td width=250>Наименование</td>
				<td>Цена, грн.</td>
				<td>Цена, usd</td>
				<td>Опт, грн.</td>				
				<td>Опт, usd</td>
				<td>Гарантия, мес</td>
				<td>Наличие</td>
				<td>Дата</td>
				<td colspan="2" align="center">Действия</td>
			</tr>		
		{foreach from=$rows_list item=g}
			<tr>
				<td width="250">{$g.vendor_name} {$g.name} {$g.description}</td>
				<td>{$g.price_ua}</td>
				<td>{$g.price_usd}</td>
				<td>{$g.price_opt_ua}</td>
				<td>{$g.price_opt_usd}</td>
				<td>{$g.guarantee}</td>
				<td>{if $g.presence}{$g.presence}{else}&nbsp;{/if}</td>
				<td>{$g.insert_date}</td>
				<td><a href="index.php?cmd=edit_position&cat_id={$g.cat_id}&gid={$g.id}">редактировать</a></td>																				
				<td><a href="index.php?cmd=del_position&cat_id={$g.cat_id}&gid={$g.id}">удалить</a></td>																				
			</tr>
		{/foreach}
		</table>
	</td>
</tr>
</table>