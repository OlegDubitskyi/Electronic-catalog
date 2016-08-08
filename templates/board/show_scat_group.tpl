<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<!--Gray line-->
	<tr>
		<td bgcolor="#E8E7E3"><img src="img/gray2.gif"></td>
	</tr>
<!--/Gray line-->		
	<tr>
		<td valign=top >
			<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
				<tr>
					<td width=24><img src="img/white2.gif"></td>
					<td>
						<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
							<tr>
								<td class=path_filter>
								{* Путь к категории *}
									{include file="board/inc/path.tpl"}	
								{* /Путь к категории *}
								</td>
							</tr>
							<tr>
								<td><b>{$cat_data.cat_name}</b></td>
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
			<table class="gray_lines" border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
				<tr>
					<td width=5 bgcolor="#CBCCD2"></td>
					<td width=19><img src="img/white2.gif"></td>					
					<td>
<!--Отображение каталога-->
						<table class="t1" border="0" cellpadding="0" cellspacing="0">
							<tr class="topline">
								<td colspan=2><img src="img/sir.gif"></td>
							</tr>
						{foreach from=$catalog item=c}
							<tr>
								<td width="15"></td>
							{if $c.cat_right-$c.cat_left!=1}
								<td>{$c.prefix}<b><a href="board.php?cmd=show_adverts&cat_id={$c.cat_id}">{$c.cat_name}</a></b>{if $c.cat_right-$c.cat_left==1}DDD <span>({$c.num_goods})</span>{/if}</td>
							{else}
								{if $c.num_goods==0}
									<td>{$c.prefix}<span>{$c.cat_name}</span></td>								
								{else}
									<td>{$c.prefix}<a href="board.php?cmd=show_adverts&cat_id={$c.cat_id}">{$c.cat_name}</a> <span>({$c.num_goods})</span></td>
								{/if}
							{/if}
							</tr>
						{/foreach}
							<tr class="bottom_line">
								<td colspan=2><img src="img/sir.gif"></td>
							</tr>
						</table>
<!--/Отображение каталога-->											
					</td>
					<td width=19><img src="img/white2.gif"></td>
					<td width=5 bgcolor="#CBCCD2"></td>							
				</tr>
			</table>
		</td>
	</tr>	
	<tr>
		<td height="60" bgcolor="#FFFFFF">&nbsp;</td>
	</tr>						
</table>
