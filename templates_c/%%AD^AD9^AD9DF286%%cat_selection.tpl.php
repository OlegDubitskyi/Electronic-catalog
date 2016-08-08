<?php /* Smarty version 2.6.12, created on 2007-02-10 20:16:14
         compiled from cat_selection.tpl */ ?>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td>
<!--Центральный фрейм -->
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
<!--
				<tr>
					<td align="center">Поиск</td>
				</tr>
-->				
				<tr>
					<td align="center">
	<!--Отображение каталога-->
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
						<tr class="admin_nav">
							<td><a href="company_account.php?cmd=profile">Профиль</a></td>
							<td><a href="company_account.php?cmd=price">Прайс</a></td>
							<td><b>Импорт</b></td>
							<td><a href="company_account.php">Статистика</a></td>
							<td><a href="company_account.php?cmd=exit">Выход</a></td>
						</tr>
						<tr>
							<td colspan=5>
								<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
									<tr>
										<td width=24><img src="img/white2.gif"></td>
										<td class=path_filter>
											Пользователь: <?php echo $this->_tpl_vars['user_name']; ?>
("<?php echo $this->_tpl_vars['company_name']; ?>
")</td>
										</td>
									</tr>							
								</table>							
							</td>						
						</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
						<?php if ($this->_tpl_vars['num_err']): ?>
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
													<td align="center" height=30 class=vendor_filter bgcolor="#EDEFFA">Указан неверный разделитель</td>
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
						<?php else: ?>
						<tr>
							<td>
								<table border="0" width="100%" cellpadding="0" cellspacing="0">
									<form action="company_account.php" method="POST">
									<tr>
										<td width="24">&nbsp;</td>
										<td colspan="<?php echo $this->_tpl_vars['num_col']; ?>
" style="TEXT-ALIGN:LEFT;"><input type="submit" value="Сохранить"></td>										
									</tr>
									<tr>							
										<td width="24">&nbsp;</td>																
										<td>
											<table border="0" class="rows" cellpadding="0" cellspacing="0" width="100%">
											<tr>
												<?php unset($this->_sections['columns']);
$this->_sections['columns']['name'] = 'columns';
$this->_sections['columns']['loop'] = is_array($_loop=$this->_tpl_vars['num_col']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['columns']['show'] = true;
$this->_sections['columns']['max'] = $this->_sections['columns']['loop'];
$this->_sections['columns']['step'] = 1;
$this->_sections['columns']['start'] = $this->_sections['columns']['step'] > 0 ? 0 : $this->_sections['columns']['loop']-1;
if ($this->_sections['columns']['show']) {
    $this->_sections['columns']['total'] = $this->_sections['columns']['loop'];
    if ($this->_sections['columns']['total'] == 0)
        $this->_sections['columns']['show'] = false;
} else
    $this->_sections['columns']['total'] = 0;
if ($this->_sections['columns']['show']):

            for ($this->_sections['columns']['index'] = $this->_sections['columns']['start'], $this->_sections['columns']['iteration'] = 1;
                 $this->_sections['columns']['iteration'] <= $this->_sections['columns']['total'];
                 $this->_sections['columns']['index'] += $this->_sections['columns']['step'], $this->_sections['columns']['iteration']++):
$this->_sections['columns']['rownum'] = $this->_sections['columns']['iteration'];
$this->_sections['columns']['index_prev'] = $this->_sections['columns']['index'] - $this->_sections['columns']['step'];
$this->_sections['columns']['index_next'] = $this->_sections['columns']['index'] + $this->_sections['columns']['step'];
$this->_sections['columns']['first']      = ($this->_sections['columns']['iteration'] == 1);
$this->_sections['columns']['last']       = ($this->_sections['columns']['iteration'] == $this->_sections['columns']['total']);
?>
												<td style="TEXT-ALIGN:LEFT; BACKGROUND: #CBCCD1; PADDING-TOP:5px; PADDING-BOTTOM:5px;">
													<select name="column[<?php echo $this->_tpl_vars['i']++; ?>
]">
														<option value="-1">...	
														<option value="cat">Категория
														<option value="vendor">Производитель
																												<option value="gname">Товар
														<option value="price_ua">Цена(грн)
														<option value="price_usd">Цена(у.е)
														<option value="price_opt_ua">Цена опт(грн)
														<option value="price_opt_usd">Цена опт(у.е)
														<option value="desc">Описание
														<option value="guarantee">Гарантия
														<option value="url">URL
														<option value="presence">Наличие
													</select>
												</td>
												<?php endfor; endif; ?>
											</tr>
											<?php $_from = $this->_tpl_vars['final_price']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['final_price'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['final_price']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['row']):
        $this->_foreach['final_price']['iteration']++;
?>
											<tr <?php if (($this->_foreach['final_price']['iteration']-1)%2 == 0): ?>class=m<?php endif; ?>>
												<?php $_from = $this->_tpl_vars['row']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['col']):
?>
												<td><?php echo $this->_tpl_vars['col']; ?>
&nbsp;</td>
												<?php endforeach; endif; unset($_from); ?>
											</tr>
											<?php endforeach; endif; unset($_from); ?>
											</table>
												
										</td>
									</tr>
									<tr>
										<td colspan="<?php echo $this->_tpl_vars['num_col']; ?>
" style="TEXT-ALIGN:LEFT;">
											<input type="hidden" name="seller_id" value="">
											<input type="hidden" name="cmd" value="chane_columns">															
											<input type="submit" value="Сохранить">
										</td>
									</tr>
									</form>
								</table>
							</td>
						</tr>
						<?php endif; ?>
						</table>
	<!--/Отображение каталога-->						
					</td>
				</tr>							
			</table>
<!--/Центральный фрейм -->			
		</td>
	</tr>
</table>