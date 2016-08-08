<?php /* Smarty version 2.6.12, created on 2007-04-01 08:33:12
         compiled from status_load.tpl */ ?>
<form name="price" action="company_account.php" method="POST">
<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td>
<!--Центральный фрейм -->
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center">
	<!--Отображение каталога-->
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
						<tr class="admin_nav">
							<td><a href="company_account.php?cmd=profile">Профиль</a></td>
							<td><a href="company_account.php?cmd=price">Прайс</a></td>
							<td>Импорт</td>
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
						<tr>
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
			<!--Отображение каталога-->
									<table class="t1" border="0" cellpadding="0" cellspacing="0">
										<tr class="topline">
											<td colspan=2><img src="img/sir.gif"></td>
										</tr>
										<tr>
											<td width="15"></td>
											<td>
												<?php if ($this->_tpl_vars['is_absent_err']): ?>
																								<table border="0" cellpadding="5" cellspacing="0" width="100%">
												<tr>
													<td>Отсутствуют следующие обязательные поля:</td>
												</tr>
												<?php $_from = $this->_tpl_vars['absent_column']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['col']):
?>
												<tr>
													<td>"<?php echo $this->_tpl_vars['col']; ?>
"</td>
												</tr>
												<?php endforeach; endif; unset($_from); ?>
												</table>
																								<?php endif; ?>								
											</td>
										</tr>
										<tr>
											<td width="15"></td>
											<td>
											<?php if ($this->_tpl_vars['multiple_column_error']): ?>
																							<table border="0" cellpadding="5" cellspacing="0" width="100%">
												<tr>
													<td><?php echo $this->_tpl_vars['err_mes']; ?>
</td>
												</tr>
												</table>
																						<?php endif; ?>								
											</td>
										</tr>
										<tr>
											<td width="15"></td>
											<td>
											<?php if ($this->_tpl_vars['rename_categories']): ?>
																							<table border="0" cellpadding="0" cellspacing="0" width="100%">
												<?php $_from = $this->_tpl_vars['rename_categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ac'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ac']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['ac']):
        $this->_foreach['ac']['iteration']++;
?>
												<tr>
													<td>Категория "<?php echo $this->_tpl_vars['key']; ?>
" отсутствует в базе, 
																		заменить ее на:
															<select name='rename_categories[<?php echo $this->_tpl_vars['key']; ?>
]'>
																<option value="-1">...
															<?php $_from = $this->_tpl_vars['bot_level_cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['blc'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['blc']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key2'] => $this->_tpl_vars['blc']):
        $this->_foreach['blc']['iteration']++;
?>
																<option value="<?php echo $this->_tpl_vars['key2']; ?>
" <?php if ($this->_tpl_vars['ac'] == $this->_tpl_vars['key2']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['blc']; ?>

															<?php endforeach; endif; unset($_from); ?>
															</select>
														<br>
													</td>
												</tr>
												<?php endforeach; endif; unset($_from); ?>
												</table>
											<?php endif; ?>								
											</td>
										</tr>							
										<tr class="bottom_line">
											<td colspan=2><img src="img/sir.gif"></td>
										</tr>
									</table>
			<!--/Отображение каталога-->											
								</td>
								<td width=19><img src="img/white2.gif"></td>
								<td width=5 bgcolor="#CBCCD2"></td>							
							</tr>
						</table>					
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<td colspan="<?php echo $this->_tpl_vars['num_col']; ?>
" style="TEXT-ALIGN:LEFT;"><input type="submit" value="Submit page"></td>
							</tr>
						</table>																				
					</td>
				</tr>
				<tr>
					<td>			
						<table class="rows" border="0" cellpadding="0" cellspacing="0" width="100%">
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
								<td style="TEXT-ALIGN:LEFT; BACKGROUND: #CBCCD1; PADDING-TOP:5px; PADDING-BOTTOM:5px; PADDING-LEFT:0px; PADDING-RIGHT:0px;S">
									<select name="column[<?php echo $this->_sections['columns']['iteration']; ?>
]">
										<option value="-1" <?php if ($this->_tpl_vars['column'][$this->_sections['columns']['iteration']] == '-1'): ?>selected<?php endif; ?>>...	
										<option value="cat" <?php if ($this->_tpl_vars['column'][$this->_sections['columns']['iteration']] == 'cat'): ?>selected<?php endif; ?>>Категория
										<option value="vendor" <?php if ($this->_tpl_vars['column'][$this->_sections['columns']['iteration']] == 'vendor'): ?>selected<?php endif; ?>>Производитель
																				<option value="gname" <?php if ($this->_tpl_vars['column'][$this->_sections['columns']['iteration']] == 'gname'): ?>selected<?php endif; ?>>Товар
										<option value="price_ua" <?php if ($this->_tpl_vars['column'][$this->_sections['columns']['iteration']] == 'price_ua'): ?>selected<?php endif; ?>>Цена(грн)
										<option value="price_usd" <?php if ($this->_tpl_vars['column'][$this->_sections['columns']['iteration']] == 'price_usd'): ?>selected<?php endif; ?>>Цена(у.е)
										<option value="price_opt_ua" <?php if ($this->_tpl_vars['column'][$this->_sections['columns']['iteration']] == 'price_opt_ua'): ?>selected<?php endif; ?>>Оптовая цена(грн)
										<option value="price_opt_usd" <?php if ($this->_tpl_vars['column'][$this->_sections['columns']['iteration']] == 'price_opt_usd'): ?>selected<?php endif; ?>>Оптовая цена(у.е)
										<option value="desc" <?php if ($this->_tpl_vars['column'][$this->_sections['columns']['iteration']] == 'desc'): ?>selected<?php endif; ?>>Описание
										<option value="guarantee" <?php if ($this->_tpl_vars['column'][$this->_sections['columns']['iteration']] == 'guarantee'): ?>selected<?php endif; ?>>Гарантия
										<option value="url" <?php if ($this->_tpl_vars['column'][$this->_sections['columns']['iteration']] == 'url'): ?>selected<?php endif; ?>>URL
										<option value="presence" <?php if ($this->_tpl_vars['column'][$this->_sections['columns']['iteration']] == 'presence'): ?>selected<?php endif; ?>>Наличие
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
					<td>
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<td colspan="<?php echo $this->_tpl_vars['num_col']; ?>
" style="TEXT-ALIGN:LEFT;">
									<input type="hidden" name="seller_id" value="">
									<input type="hidden" name="cmd" value="chane_columns">			
									<input type="submit" value="Submit page"> 												
								</td>
							</tr>
						</table>																									
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</form>