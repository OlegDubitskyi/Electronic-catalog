<?php /* Smarty version 2.6.12, created on 2007-01-27 00:21:06
         compiled from filters/all_filters.tpl */ ?>
<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	<tr>
		<td colspan="2" width=24><img src="img/white2.gif"></td>
		<td>
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/path_shift.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
					</td>
		<td colspan=2><img src="img/white2.gif"></td>
	</tr>
	<tr>
		<td width=5 bgcolor="#CBCCD2"></td>
		<td width=19><img src="img/white2.gif"></td>
		<td>
			<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
							
				<tr>
			<!-- Фильтр по производителям --->
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "filters/vendor_filter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
			<!-- /Фильтр по производителям --->
				</tr>
				<tr>
			<!-- Фильтр по регионам --->
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "filters/region_filter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
			<!-- /Фильтр по регионам --->					
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
						<table border="0" cellpadding="2" cellspacing="0">
							<tr>
								<td width="300">
			<!-- Постраничный вывод -->
									<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "filters/page_filter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
			<!-- /Постраничный вывод -->
								</td>
			<!-- Фильтр по типу прайса(розница, опт) -->
									<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "filters/price_type_filter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>									
			<!-- Фильтр по типу прайса(розница, опт) -->								
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
		<td colspan="2" width=24><img src="img/white2.gif"></td>
	</tr>	
</table>
		
