{literal}
<script language="Javascript">
function subPage(type){
	document.reg.type.value=type;		
	document.reg.submit();
}
</script>
{/literal}
<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td width=24><img src="../img/white2.gif"></td>
		<td>
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td style="PADDING-TOP:10px;" align="center">
						<form name=reg method="POST">
						<table class="import" width=550 cellpadding="0" cellspacing="0">
{foreach from=$data item=d}
							<tr>
								<td width=250>Название организации или СПД:</td>
								<td>{$d.company_name}</td>
							</tr>
							<tr>
								<td width=250>Город:</td>
								<td>{$d.region_name}</td>
							</tr>													
							<tr>
								<td width=250>Название города в базе:</td>
								<td>
									<table cellpadding="0" cellspacing="0">
										<tr>								
											<td>
												<SELECT name="region_id" >
													<option value="-1">Выберите город</option>
<!-- Region block-->		
												{foreach name=rl from=$region_list item=rl}
													{if $rl.id==$s.region_id}		
														<option value="{$rl.id}" selected>{$rl.region_name}</option>						
													{else}
														<option value="{$rl.id}" >{$rl.region_name}</option>			
													{/if}
												{/foreach}				
<!-- /Region block-->		
												</SELECT>																			
											</td>
											<td>&nbsp;&nbsp;<a href="index.php?cmd=region">Редактировать список городов</a></td>
										</tr>
									</table>					
								</td>									
							</tr>																				
							<tr>
								<td>Контактное лицо:</td>
								<td>{$d.user_name}</td>
							</tr>													
							<tr>
								<td>Телефон для контактов:</td>
								<td>+38({$d.tel_code}) {$d.tel}</td>
							</tr>
							<tr>
								<td>Email:</td>
								<td>{$d.email}</td>
							</tr>													
							<tr>
								<td>Сайт:</td>
								<td>{$d.url}</td>
							</tr>																				
							<tr>
								<td>Предполагаемое кол-во прайс-строк:</td>
								<td>{$d.num_rows}</td>
							</tr>																										
							<tr>
								<td colspan="2" style="BORDER-DOWN: #D8D9E1 1px solid;" align="center">
								</td>
							</tr>	
							<tr>
								<td colspan=2>
									<table width=100%>
										<tr>
											<td><input onclick="javascript:subPage('register')" type=button value="Регистрировать"></td>
											<td><input onclick="javascript:subPage('decline')" type=button value="Отклонить"></td>
											<input type=hidden name=id value="{$d.id}">
											<input type="hidden" name="cmd" value="reg_decision">
											<input type="hidden" name="type" value="">
										</tr>
									</table>
								</td>
							</tr>
{/foreach}																																													
						</table>
						</form>
					</td>
				</tr>
			</table>		
		</td>
		<td><img src="../img/white2.gif"></td>
	</tr>
</table>		