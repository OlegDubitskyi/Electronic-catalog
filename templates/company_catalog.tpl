<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<!--Gray line-->
	<tr>
		<td bgcolor="#E8E7E3"><img src="img/gray2.gif"></td>
		<td width=250 bgcolor="#D9D7D2"><img src="img/gray5.gif"></td>		
	</tr>
<!--/Gray line-->			
	<tr>
		<td valign="top">
<!--Левый фрейм -->
			<table border=0 width=100% cellpadding=0 cellspacing=0>
				<tr>
					<td>
						{include file="inc/company_alphabet.tpl"}					
					</td>
				</tr>
				<tr>
					<td>
					{if $show_table}
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td width="24">&nbsp;</td>						
								<td>
									{include file="inc/company_list.tpl"}
								</td>
								<td width="24">&nbsp;</td>											
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
