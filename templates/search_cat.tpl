<table border="0" width="100%" cellpadding="0" cellspacing="0">
<!--Gray line-->
	<tr>
		<td bgcolor="#E8E7E3"><img src="img/gray4.gif"></td>
		<td width=250 bgcolor="#D9D7D2"><img src="img/gray5.gif"></td>
	</tr>
<!--/Gray line-->	
	<tr>
		<td valign="top">
<!--Левый фрейм -->
			<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
				<tr>
					<td>
						<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
							<tr>
								<td width=24><img src="img/white2.gif"></td>
								<td>
									<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
										<tr>
											<td class=path_filter>
												Вы искали: "<b>{$search_str}</b>"
											</td>
										</tr>
									</table>		
								</td>
								<td width=24><img src="img/white2.gif"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
					{if count($search_tree)>0}
						<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
							<tr>
								<td width=5 bgcolor="#CBCCD2"></td>
								<td width=19><img src="img/white2.gif"></td>					
								<td>
									<table class="t1" border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#EDEFFA">
										<tr class="topline">
											<td colspan=2><img src="img/sir.gif"></td>
										</tr>						
									{foreach from=$search_tree item=st}
										<tr>
											<td width="15"></td>
											<td>{$st.prefix}
										{if $st.link}
												<a href="index.php?cmd=sg&cat_id={$st.cat_id}">{$st.cat_name}</a> <span>({$st.num_rows})</span>
										{else}
											{$st.cat_name}
										{/if}
											</td>
										</tr>
									{/foreach}	
										<tr class="bottom_line">
											<td colspan=2><img src="img/sir.gif"></td>
										</tr>						
									</table>
								</td>
								<td width=19><img src="img/white2.gif"></td>										
								<td width=5 bgcolor="#CBCCD2"></td>
							</tr>
						</table>	
					{else}
						<table class="gray_lines" border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
							<tr>
								<td width=5 bgcolor="#CBCCD2"></td>
								<td width=19><img src="img/white2.gif"></td>					
								<td>
									<table class="t1" border="0" cellpadding="0" cellspacing="0">
										<tr class="topline">
											<td colspan=2><img src="img/sir.gif"></td>
										</tr>
										<tr>
											<td width=15><img src="img/white2.gif"></td>
											<td align="center" height=30 class=vendor_filter bgcolor="#EDEFFA">К сожалению, по Вашему запросу ничего не найдено</td>
										</tr>				
										<tr class="bottom_line">
											<td colspan=2><img src="img/sir.gif"></td>
										</tr>
									</table>
								</td>
								<td width=19><img src="img/white2.gif"></td>
								<td width=5 bgcolor="#CBCCD2"></td>							
							</tr>
						</table>							
					{/if}
					</td>
				</tr>
			</table>
<!--/Левый фрейм -->							
		</td>
		<td width="250" align="center" valign="top">
<!--Правый фрейм -->			
{* Правый блок в котором у нас будет баннер и вход для партнеров *}					
			{* Правый блок в котором у нас будет баннер и вход для партнеров *}
			{include file="inc/right_block.tpl"}
			{* Правый блок в котором у нас будет баннер и вход для партнеров *}
<!--/Правый фрейм -->			
		</td>
	</tr>
</table>
