<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0">
<!--Gray line-->
	<tr>
		<td width=137 bgcolor="#E8E7E3"><img src="img/gray2.gif"></td>
		<td width=6 bgcolor="#C8C6C1"><img src="img/gray3.gif"></td>
		<td bgcolor="#E8E7E3"><img src="img/gray4.gif"></td>
		<td width=250 bgcolor="#D9D7D2"><img src="img/gray5.gif"></td>
	</tr>
<!--/Gray line-->	
	<tr>
		<td width=137 bgcolor="#E8E7E3" align=center>
{* ����� ���� ��� ������ *}
			{include file="inc/left_block.tpl"}			
{* /����� ���� ��� ������ *}		
		</td>
		<td width=6 bgcolor="#C8C6C1"><img src="img/gray3.gif"></td>
		<td valign="top" height="100%">
<!--����������� ����� -->
			<table border="0" width="" height="100%" bgcolor="#FFFFFF" cellpadding="2" cellspacing="0">
				<tr>
					<td width=10 bgcolor="#FFFFFF"><img src="img/white1.gif"></td>
					<td align="center" valign="top">
<!--����������� ��������-->
						<table border="0" cellpadding="2" cellspacing="0">
							<tr>
								<td height=15 colspan=3>&nbsp;</td>
							</tr>
						{section name=tree loop=$cat_tree step=2}

{*�������������� ������� ������� �� �����(�� ��������� � �����������) ��� ����� ���������
 ���=2 ��� ����, ��� �� ��������� ������ �� 2 �����
 ����� ��������� ������� �������, index-���������� �������� ������� �����  ������� � ����
 ����� ��������� ������� �������, i_next*}
							{assign var="i" value=$smarty.section.tree.index}
							{assign var="i_next" value=$smarty.section.tree.index+1}
							<tr>
								<td valign="top" width="48%">
<!--������ �������-->								
									<table border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td>
												<table width="100%" border="0" cellpadding="0" cellspacing="0">
													<tr>
														<td>
															<td width="55" height="1" bgcolor="#595959"><img src="img/black1.gif"></td>
															<td height="1" bgcolor="#C7C7C7"><img src="img/gray6.gif"></td>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td>
												<table width="100%" border="0" cellpadding="0" cellspacing="0">
													<tr>
														<td>
															<td width="55" height="1" bgcolor="#C7C7C7"><img src="img/gray6.gif"></td>
															<td height="1" bgcolor="#FFFFFF"><img src="img/white2.gif"></td>
														</td>
													</tr>
												</table>
											</td>										
										</tr>
										<tr>
											<td class=catalog><h1 class="main_cat"><a href="index.php?cmd=open_c&cat_id={$cat_tree[$i].cat_id}">{$cat_tree[$i].cat_name}</a></h1></td>
										</tr>
										<tr>
											<td class=catalog>
											{foreach name=cat from=$cat_tree[$i].children item=cat}{if $smarty.foreach.cat.first}<a href="index.php?cmd=open_c&cat_id={$cat.cat_id}">{$cat.cat_name}</a>{else}, <a href="index.php?cmd=open_c&cat_id={$cat.cat_id}">{$cat.cat_name}</a>{/if}{/foreach}
											</td>
										</tr>
										<tr>
											<td colspan=2>&nbsp;</td>
										</tr>
									</table>
<!--/������ �������-->									
								</td>	
<!--�����������-->
								<td width="25" bgcolor="#FFFFFF"><img src="img/white1.gif"></td>
<!--/�����������-->								
								<td valign="top" width="48%">
<!--������ �������-->
									<table width="" border="0" width="" cellpadding="0" cellspacing="0">
										<tr>
											<td>
												<table width="100%" border="0" cellpadding="0" cellspacing="0">
													<tr>
														<td>
															<td width="55" height="1" bgcolor="#595959"><img src="img/black1.gif"></td>
															<td height="1" bgcolor="#C7C7C7"><img src="img/gray6.gif"></td>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td>
												<table width="100%" border="0" cellpadding="0" cellspacing="0">
													<tr>
														<td>
															<td width="55" height="1" bgcolor="#C7C7C7"><img src="img/gray6.gif"></td>
															<td height="1" bgcolor="#FFFFFF"><img src="img/white2.gif"></td>
														</td>
													</tr>
												</table>
											</td>										
										</tr>
										<tr>
											<td colspan=2 class=catalog><h1 class="main_cat"><a href="index.php?cmd=open_c&cat_id={$cat_tree[$i_next].cat_id}">{$cat_tree[$i_next].cat_name}</h1></a></td>
										</tr>
										<tr>
											<td colspan=2 class=catalog>
											{foreach name=cat from=$cat_tree[$i_next].children item=cat}{if $smarty.foreach.cat.first}<a href="index.php?cmd=open_c&cat_id={$cat.cat_id}">{$cat.cat_name}</a>{else}, <a href="index.php?cmd=open_c&cat_id={$cat.cat_id}">{$cat.cat_name}</a>{/if}{/foreach}											
											</td>
										</tr>
										<tr>
											<td colspan=2>&nbsp;</td>
										</tr>	
									</table>
<!--/������ �������-->									
								</td>
							</tr>
						{/section}
						</table>
<!--/����������� ��������-->						
					</td>
					<td width=10 rowspan=2 bgcolor="#FFFFFF"><img src="img/white1.gif"></td>					
				</tr>							
				<tr>
					<td width=10 bgcolor="#FFFFFF"><img src="img/white1.gif"></td>
					<td height=10>
						<table border=0 cellpadding="5" cellspacing="0">
							<tr>
								<td>
									<a href="index.php?cmd=about">� �������</a> | 
								 	<a href="index.php?cmd=order">��� ���������� ����� ����</a> |
								 	<a href="index.php?cmd=but">������</a> |
									<a href="mailto:support@webcat.com.ua">������ ���</a>{* | 
									<a href="">������� �� �����</a>*}	
								</td>																
							</tr>
						</table>	
					</td>
				</tr>
			</table>
<!--/����������� ����� -->			
		</td>
		<td width="250" align="right" valign="top">
{* ������ ���� � ������� � ��� ����� ������ � ���� ��� ��������� *}
			{include file="inc/right_block.tpl"}
{* ������ ���� � ������� � ��� ����� ������ � ���� ��� ��������� *}
		</td>
	</tr>
</table>