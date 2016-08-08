<form method=post>
<table width="400" cellspacing="0" cellpadding="3" border="1">
{foreach from=$sellers item=seller}
	<tr>
	    <td><a href="index.php?cmd=&seller_id={$seller.id}">{$seller.name}</td>
	    <td>{seller.insert_date}</td>
	    <td><input type="checkbox"></td>
		<td><input type="checkbox"></td>	    
	</tr>
{/foreach}	
{else}
<tr>
    <td colspan=2 align="center">Список пуст</td>
</tr>
<tr>
    <td align="center"><a href="index.php?cmd=add_seller">Сгенерировать отчет</a></td>
</tr>
</table>
<input type="hidden" name="cmd" value="">
</form>