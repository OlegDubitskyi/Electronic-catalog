<table border="2" width="100%" cellpadding="2" cellspacing="0">
	<tr>
		<td>
<!--����������� ����� -->
			<table border="2" width="100%" cellpadding="2" cellspacing="0">
				<tr>
					<td align="center">�����</td>
				</tr>
				<tr>
					<td>
{* ����������� ���� � ���������*}										
					{foreach name=path from=$cat_path item=path}
						{if $smarty.foreach.path.last}
							{$path.cat_name}
						{else}
							<a href="index.php?cmd=open_c&cat_id={$path.cat_id}">{$path.cat_name}</a> �
						{/if}
					{/foreach}										
					</td>
				</tr>
				<tr>
					<td><b>{$cat_name}</b></td>
				</tr>
				<tr>
					<td>
<!--����������� ��������-->
						<table border="2" width="" cellpadding="2" cellspacing="0">
						{foreach from=$catalog item=c}
							<tr>
								<td></td>
							</tr>
						{/foreach}
						</table>
<!--/����������� ��������-->						
					</td>
				</tr>							
			</table>
<!--/����������� ����� -->			
		</td>
	</tr>
</table>