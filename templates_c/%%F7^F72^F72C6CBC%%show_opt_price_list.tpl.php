<?php /* Smarty version 2.6.12, created on 2007-01-27 00:23:55
         compiled from show_opt_price_list.tpl */ ?>
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
$this->_smarty_include(array('smarty_include_tpl_file' => "filters/all_filters.tpl", 'smarty_include_vars' => array()));
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
						<table class="rows" width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td style="TEXT-ALIGN: left; PADDING-LEFT: 15px;" class="header">Наименование</td>
								<td width=60 class="header">Опт, грн.</td>
								<td width=60 class="header">Опт, usd</td>							
								<td width=60 class="header">Гарантия, мес</td>
								<td width=70 class="header">Наличие</td>
								<td width=40 class="header">Дата</td>
								<td width=120 class="header">Продавец</td>
							</tr>
							<?php $_from = $this->_tpl_vars['positions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['positions'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['positions']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['p']):
        $this->_foreach['positions']['iteration']++;
?>
							<tr <?php if (($this->_foreach['positions']['iteration']-1)%2 == 0): ?>class=m<?php endif; ?>>
								<td class=al>
								<?php if ($this->_tpl_vars['p']['url']): ?>
									<a href="go.php?gid=<?php echo $this->_tpl_vars['p']['gid']; ?>
" target="new"><?php echo $this->_tpl_vars['p']['vendor_name']; ?>
 <?php echo $this->_tpl_vars['p']['goods_name']; ?>
 <?php echo $this->_tpl_vars['p']['description']; ?>
</a>
								<?php else: ?>
									<?php echo $this->_tpl_vars['p']['vendor_name']; ?>
 <?php echo $this->_tpl_vars['p']['goods_name']; ?>
 <?php echo $this->_tpl_vars['p']['description']; ?>

								<?php endif; ?>	
								</td>
								<td align="center"><?php if ($this->_tpl_vars['p']['price_opt_ua'] != 0):  echo $this->_tpl_vars['p']['price_opt_ua'];  else: ?>-<?php endif; ?></td>
								<td align="center"><?php if ($this->_tpl_vars['p']['price_opt_usd'] != 0):  echo $this->_tpl_vars['p']['price_opt_usd'];  else: ?>-<?php endif; ?></td>
								<td align="center"><?php echo $this->_tpl_vars['p']['guarantee']; ?>
</td>
								<td align="center"><?php if ($this->_tpl_vars['p']['presence']):  echo $this->_tpl_vars['p']['presence'];  else: ?>&nbsp;<?php endif; ?></td>
								<td align="center"><?php echo $this->_tpl_vars['p']['insert_date']; ?>
</td>
								<td align="center">
									<a href="index.php?cmd=ci&sid=<?php echo $this->_tpl_vars['p']['seller_id']; ?>
" title="подробнее" target="new"><b><?php echo $this->_tpl_vars['p']['company_name']; ?>
</b></a><br>
									<?php if ($this->_tpl_vars['p']['tel1']): ?>т.<?php if ($this->_tpl_vars['p']['tel_code1']): ?>(<?php echo $this->_tpl_vars['p']['tel_code1']; ?>
)<?php endif; ?> <?php echo $this->_tpl_vars['p']['tel1']; ?>
<br><?php endif; ?>
									<?php echo $this->_tpl_vars['p']['region_name']; ?>

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
$this->_smarty_include(array('smarty_include_tpl_file' => "filters/page_filter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>						
					</td>
					<td width="24">&nbsp;</td>											
				</tr>
			</table>		
		</td>
	</tr>	
<?php else: ?>
	<tr height=30>
		<td>
			<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
				<tr>
					<td width=24><img src="img/white2.gif"></td>
					<td>
												<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/path_shift.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
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
						<table class="t1" border="0" cellpadding="0" cellspacing="0">
							<tr class="topline">
								<td colspan=2><img src="img/sir.gif"></td>
							</tr>
							<tr>
								<td width=15><img src="img/white2.gif"></td>
								<td align="center" height=30 class=vendor_filter bgcolor="#EDEFFA">По данному запросу ничего не найдено</td>
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
		</td>
	</tr>
<?php endif; ?>											
</table>