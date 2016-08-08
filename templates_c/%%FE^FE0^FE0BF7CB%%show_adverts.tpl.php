<?php /* Smarty version 2.6.12, created on 2007-02-13 23:27:18
         compiled from board/show_adverts.tpl */ ?>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
<!--Gray line-->
	<tr>
		<td bgcolor="#E8E7E3"><img src="img/gray2.gif"></td>
	</tr>
<!--/Gray line-->	
	<tr>
		<td>
<?php if (count ( $this->_tpl_vars['positions'] ) > 0): ?>
<!---Навигация и фильтры --->
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "board/filters/all_filters.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!---/Навигация и фильтры --->		
		</td>
	</tr>
	<tr>
		<td>
<!--Отображение каталога-->
			<table width="100%" border="0" width="" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
				<tr>
					<td width="24">&nbsp;</td>						
					<td>
						<table class="advert" width="100%" border="0" cellpadding="0" cellspacing="0">
							<?php $_from = $this->_tpl_vars['positions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['positions'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['positions']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['p']):
        $this->_foreach['positions']['iteration']++;
?>
							<tr class=m>
								<td width="170" style="BORDER-RIGHT: #D8D9E1 1px solid"><b>"<?php echo $this->_tpl_vars['p']['type']; ?>
"</b></td>
								<td>
									<table width="100%" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td class="withdraw" style="PADDING-LEFT:0px; "><b><?php echo $this->_tpl_vars['p']['annotation']; ?>
</b></td>
											<td class="withdraw" width="70"><b><?php echo $this->_tpl_vars['p']['price']; ?>
 <?php echo $this->_tpl_vars['p']['currency']; ?>
</b></td>
											<td class="withdraw" width="60"><b><?php echo $this->_tpl_vars['p']['date_ins']; ?>
</b></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td style="BORDER-RIGHT: #D8D9E1 1px solid">
									<b><?php echo $this->_tpl_vars['p']['name']; ?>
</b><br>
									Город: <?php echo $this->_tpl_vars['p']['region_name']; ?>
<br>
									Email: <a href="mailto:<?php echo $this->_tpl_vars['p']['email']; ?>
"><?php echo $this->_tpl_vars['p']['email']; ?>
</a><br>
									ICQ: <?php echo $this->_tpl_vars['p']['icq']; ?>
<br>
									Тел.: <?php echo $this->_tpl_vars['p']['tel']; ?>

								</td>
								<td valign="top" class="black"><?php echo $this->_tpl_vars['p']['description']; ?>
</td>
							</tr>
							<?php endforeach; endif; unset($_from); ?>
						</table>
					</td>
					<td width="24">&nbsp;</td>
				</tr>
			</table>
<!--/Отображение каталога-->						
		</td>
	</tr>
	<tr>
		<td>
			<table width="100%" border="0" width="" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
				<tr>
					<td width="24">&nbsp;</td>						
					<td>
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "board/filters/page_filter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>				
					</td>
					<td width="24">&nbsp;</td>											
				</tr>
			</table>		
		</td>
	</tr>
<?php endif; ?>	
</table>
