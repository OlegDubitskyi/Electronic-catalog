						<table class="rows" border="0" cellpadding="0" cellspacing="0" align="center">
						{if count($sellers)>0}
							<tr>
								<td class="header" style="TEXT-ALIGN: left; PADDING-LEFT: 15px;">Компания</td>
								<td width="250" class="header">Сайт</td>
								<td width="100" class="header">Город</td>
								<td width="200" class="header">Телефоны</td>
							</tr>
							{foreach name=sellers from=$sellers item=s}
							<tr {if $smarty.foreach.sellers.index%2==0}class=m{/if}>
								<td class=al height="30">
									<a href="index.php?cmd=ci&sid={$s.id}" title="подробнее">{$s.company_name}</a>
								</td>
								<td align="center">
								{if $s.url}
									<a href="http://{$s.url}" target="new">{$s.url}</a>
								{else}
									-
								{/if}
								</td>
								<td>{$s.region_name}</td>
								<td>
								{if $s.tel1}
									({$s.tel_code1}) {$s.tel1}
								{else}
									&nbsp;
								{/if}
								{if $s.tel2}
									<br>({$s.tel_code2}) {$s.tel2}
								{else}
									&nbsp;
								{/if}
								{if $s.tel2}
									<br>({$s.tel_code3}) {$s.tel3}
								{else}
									&nbsp;
								{/if}										
								</td>
							</tr>
							{/foreach}	  
						{else}
							<tr>
								<td class="header" style="TEXT-ALIGN: left; PADDING-LEFT: 15px;">Компания</td>
								<td width="250" class="header">Сайт</td>
								<td width="100" class="header">Город</td>
								<td width="200" class="header">Телефоны</td>
							</tr>						
							<tr class=m>
								<td colspan="4" class="row1" align="center" height=30>Список пуст</td>
							</tr>
						{/if}
						</table>		