<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	<tr>
		<td colspan="2" width=24><img src="img/white2.gif"></td>
		<td>
			<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
				<tr>
					<td class=path_filter>
					{* ���� � ��������� *}
						{include file="board/inc/path.tpl"}	
					{* /���� � ��������� *}
					</td>
				</tr>
			</table>		
		</td>
		<td colspan=2><img src="img/white2.gif"></td>
	</tr>
	<tr>
		<td width=5 bgcolor="#CBCCD2"></td>
		<td width=19><img src="img/white2.gif"></td>
		<td>
			<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
			{*
				<tr>
					<td>
						<h1>
						{foreach name=path from=$cat_path item=path}
							{if $smarty.foreach.path.last}
							{$path.cat_name}
							{/if}
						{/foreach}						
						</h1>
					</td>
				</tr>
			*}				
				<tr>
			<!-- ������ �� �������������� --->
				{include file="board/filters/type_filter.tpl"}	
			<!-- /������ �� �������������� --->
				</tr>
				<tr>
			<!-- ������ �� �������� --->
				{include file="board/filters/region_filter.tpl"}	
			<!-- /������ �� �������� --->					
				</tr>
			</table>		
		</td>
		<td width=19><img src="img/white2.gif"></td>
		<td width=5 bgcolor="#CBCCD2"></td>		
	</tr>
	<tr>
		<td colspan=2 width=24><img src="img/white2.gif"></td>
		<td>
			<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="2" cellspacing="0">
							<tr>
								<td width="100%">
			<!-- ������������ ����� -->
									{include file="board/filters/page_filter.tpl"}	
			<!-- /������������ ����� -->
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
		<td colspan="2" width=24><img src="img/white2.gif"></td>
	</tr>	
</table>
		

