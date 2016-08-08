<form>
<table border="1" width="100%">
{if count($mail_list)>0}
	<tr>
		<td><b>№</b></td>		
		<td><b>Название компании</b></td>
		<td><b>URL</b></td>
		<td><b>Email</b></td>
		<td><b>ICQ</b></td>
		<td><b>Статус</b></td>
		<td><b>Действия</b></td>				
	</tr>
{foreach name=mail_list from=$mail_list item=ml}	
{if $ml.id==$mail_id}
	<tr>
		<td>{$smarty.foreach.mail_list.iteration}</td>		
		<td><input type="text" name="mail_data[name]" value="{$ml.name}"></td>
		<td><input type="text" name="mail_data[url]" value="{$ml.url}"></td>
		<td><input type="text" name="mail_data[email]" value="{$ml.email}"></td>
		<td><input type="text" name="mail_data[icq]" value="{$ml.icq}"></td>
		<td><input type="text" name="mail_data[status]" value="{$ml.status}"></td>		
		<td>
			<input type="hidden" name="mail_data[id]" value="{$ml.id}">
			<input type="hidden" name="cmd" value="update_mail">			
			<input type="submit" value="Сохранить">
		</td>				
	</tr>
{else}
	<tr>
		<td>{$smarty.foreach.mail_list.iteration}</td>		
		<td>{$ml.name}</td>
		<td>{$ml.url}</td>
		<td>{$ml.email}</td>
		<td>{$ml.icq}</td>
		<td>{$ml.status}</td>		
		<td width="120">
			<table border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td><a href="index.php?cmd=del_mail&id={$ml.id}">удалить</a>&nbsp;&nbsp;&nbsp;</td>
					<td><a href="index.php?cmd=edit_mail&id={$ml.id}">редактировать</a></td>
				</tr>
			</table>		
		</td>				
	</tr>
{/if}
{/foreach}
{else}
	<tr>
		<td align="center">Список пуст</td>
	</tr>
{/if}
	<tr>
		<td colspan="7" align="right"><a href="index.php?cmd=add_mail">Добавить</a></td>
	</tr>	
</table>
</form>