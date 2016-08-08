<?php /* Smarty version 2.6.12, created on 2006-12-20 19:59:35
         compiled from company_catalog.tpl */ ?>
<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<!--Gray line-->
	<tr>
		<td bgcolor="#E8E7E3"><img src="img/gray2.gif"></td>
		<td width=250 bgcolor="#D9D7D2"><img src="img/gray5.gif"></td>		
	</tr>
<!--/Gray line-->			
	<tr>
		<td valign="top">
<!--ֻוגûי פנויל -->
			<table border=0 width=100% cellpadding=0 cellspacing=0>
				<tr>
					<td>
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/company_alphabet.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>					
					</td>
				</tr>
				<tr>
					<td>
					<?php if ($this->_tpl_vars['show_table']): ?>
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td width="24">&nbsp;</td>						
								<td>
									<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/company_list.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
								</td>
								<td width="24">&nbsp;</td>											
							</tr>
						</table>
					<?php endif; ?>					
					</td>
				</tr>				
			</table>
<!--/ֻוגûי פנויל -->			
		</td>
		<td width="250" align="center" valign="top">
<!--ֿנאגûי פנויל -->			
					
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/right_block.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<!--/ֿנאגûי פנויל -->					
		</td>
	</tr>
</table>