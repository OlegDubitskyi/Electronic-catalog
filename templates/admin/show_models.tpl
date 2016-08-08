<table width="100%" height="100%" cellpadding="0" cellspacing="0" border="1">
<tr>
	<td><a href="index.php?cmd=show_vendors&cat_id={$cat_data.cat_id}">Вернуться к списку производителей</a></td>
</tr>
<tr>
	<td height="20" align="center">{$cat_data.cat_name}</td>
</tr>
<tr>
	<td height="20" align="center">{$vendor.vendor_name}</td>
</tr>
<tr>
	<td height="20">Модели:</td>
</tr>
<tr>
<form name="details" method="POST">
	<td height="100%" valign="top" align="center">
		<table border="1" cellpadding="2" cellspacing="0">
			<tr>
				<td>Наименование</td>
				<td>Перенос</td>
				<td>Редактировать</td>
				<td>Удалить</td>
			</tr>
			{foreach name=ml from=$model_list item=ml}
			<tr>
				{if $ml.id==$model_id}
				<td><input type="text" name="model_name" value="{$ml.name}"></td>
				<td><input type="checkbox" name="transfer[{$smarty.foreach.ml.index}]" disabled></td>
				<td><input type="button" value="сохранить" onclick="javascript:subPage('update_model',{$ml.cat_id},{$ml.vendor_id},{$model_id})"></a></td>

				<td>удалить</td>				
				{else}
				<td>{$ml.name}</a></td>
				<td><input type="checkbox" name="transfer[{$smarty.foreach.ml.index}]" value="{$ml.id}"></td>
				<td><a href="index.php?cmd=show_models&vendor_id={$ml.vendor_id}&cat_id={$ml.cat_id}&model_id={$ml.id}">редактировать</a></td>
				<td><a href="index.php?cmd=del_model&model_id={$ml.id}&cat_id={$ml.cat_id}&vendor_id={$ml.vendor_id}">удалить</a></td>
				{/if}
			</tr>
			{/foreach}	

			{if !$vendor_id}
			<tr>
				<td colspan="2" align="center">
					<a href="index.php?cmd=add_model&cat_id={$cat_data.cat_id}&vendor_id={$vendor.id}">Добавить</a>
				</td>
				<td colspan="2">
					Перенести в 
					<select name="to_model_id">
						<option value="-1" selected>Модель
					{foreach name=ml from=$model_list item=ml}
						<option value="{$ml.id}">{$ml.name}
					{/foreach}&nbsp;&nbsp;&nbsp;
					<!--<input type="hidden" name="cmd" value="transfer_vendor">
					<input type="hidden" name="cat_id" value="{$cat_data.cat_id}">-->
					<input type="button" value="Перенести" onclick="javascript:subPage('transfer_model',{$cat_data.cat_id},{$vendor.id},'')">
					</select>
				</td>
			</tr>
			{/if}			
		</table>
	</td>
		<input type="hidden" name="cmd" value="">
		<input type="hidden" name="cat_id" value="">
		<input type="hidden" name="vendor_id" value="">
		<input type="hidden" name="model_id" value="">
	</form>	
</tr>
</table>