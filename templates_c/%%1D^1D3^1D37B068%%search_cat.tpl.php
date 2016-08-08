<?php /* Smarty version 2.6.12, created on 2006-12-22 11:39:50
         compiled from search_cat.tpl */ ?>
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
												Вы искали: "<b><?php echo $this->_tpl_vars['search_str']; ?>
</b>"
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
					<?php if (count ( $this->_tpl_vars['search_tree'] ) > 0): ?>
						<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
							<tr>
								<td width=5 bgcolor="#CBCCD2"></td>
								<td width=19><img src="img/white2.gif"></td>					
								<td>
									<table class="t1" border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#EDEFFA">
										<tr class="topline">
											<td colspan=2><img src="img/sir.gif"></td>
										</tr>						
									<?php $_from = $this->_tpl_vars['search_tree']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['st']):
?>
										<tr>
											<td width="15"></td>
											<td><?php echo $this->_tpl_vars['st']['prefix']; ?>

										<?php if ($this->_tpl_vars['st']['link']): ?>
												<a href="index.php?cmd=sg&cat_id=<?php echo $this->_tpl_vars['st']['cat_id']; ?>
"><?php echo $this->_tpl_vars['st']['cat_name']; ?>
</a> <span>(<?php echo $this->_tpl_vars['st']['num_rows']; ?>
)</span>
										<?php else: ?>
											<?php echo $this->_tpl_vars['st']['cat_name']; ?>

										<?php endif; ?>
											</td>
										</tr>
									<?php endforeach; endif; unset($_from); ?>	
										<tr class="bottom_line">
											<td colspan=2><img src="img/sir.gif"></td>
										</tr>						
									</table>
								</td>
								<td width=19><img src="img/white2.gif"></td>										
								<td width=5 bgcolor="#CBCCD2"></td>
							</tr>
						</table>	
					<?php else: ?>
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
					<?php endif; ?>
					</td>
				</tr>
			</table>
<!--/Левый фрейм -->							
		</td>
		<td width="250" align="center" valign="top">
<!--Правый фрейм -->			
					
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/right_block.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<!--/Правый фрейм -->			
		</td>
	</tr>
</table>