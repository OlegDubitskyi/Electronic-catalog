<?php /* Smarty version 2.6.12, created on 2006-12-27 19:20:28
         compiled from company_info.tpl */ ?>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
<!--Gray line-->
	<tr>
		<td bgcolor="#E8E7E3"><img src="img/gray2.gif"></td>
	</tr>
<!--/Gray line-->			
	<tr>
<!--Центральный фрейм -->
		<td valign="top">
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr style="PADDING-TOP:20px; PADDING-BOTTOM:20px;">
					<td>
<!--Отображение информации о компании-->
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td align="center">
<?php $_from = $this->_tpl_vars['seller']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['s']):
?>								
								<table class="import" width=450 cellpadding="0" cellspacing="0">
									<tr>
										<td class="info_head2" width=150>Компания:</td>
										<td style="PADDING-RIGHT:5px;"><?php if ($this->_tpl_vars['s']['company_name']): ?><b><?php echo $this->_tpl_vars['s']['company_name']; ?>
</b><?php else: ?>&nbsp;<?php endif; ?></td>
									</tr>
									<tr>
										<td class="info_head">Город:</td>
										<td class="stat" style="PADDING-RIGHT:5px;"><?php if ($this->_tpl_vars['s']['region_name']):  echo $this->_tpl_vars['s']['region_name'];  else: ?>&nbsp;<?php endif; ?></td>									
									</tr>
									<tr>
										<td class="info_head">Адрес:</td>
										<td class="stat" style="PADDING-RIGHT:5px;"><?php if ($this->_tpl_vars['s']['address']):  echo $this->_tpl_vars['s']['address'];  else: ?>&nbsp;<?php endif; ?></td>									
									</tr>
									<tr>
										<td class="info_head">Телефоны:</td>
										<td class="stat" style="PADDING-RIGHT:5px;">
											<?php if ($this->_tpl_vars['s']['tel1']): ?>
												(<?php echo $this->_tpl_vars['s']['tel_code1']; ?>
) <?php echo $this->_tpl_vars['s']['tel1']; ?>
;
											<?php endif; ?>
											<?php if ($this->_tpl_vars['s']['tel2']): ?>
												(<?php echo $this->_tpl_vars['s']['tel_code2']; ?>
) <?php echo $this->_tpl_vars['s']['tel2']; ?>
;
											<?php endif; ?>
											<?php if ($this->_tpl_vars['s']['tel2']): ?>
												(<?php echo $this->_tpl_vars['s']['tel_code3']; ?>
) <?php echo $this->_tpl_vars['s']['tel3']; ?>

											<?php endif; ?>										
										</td>									
									</tr>
									<tr>
										<td class="info_head">Факс:</td>
										<td class="stat" style="PADDING-RIGHT:5px;"><?php if ($this->_tpl_vars['s']['fax']):  echo $this->_tpl_vars['s']['fax'];  else: ?>&nbsp;<?php endif; ?></td>									
									</tr>
									<tr>
										<td class="info_head">Сайт:</td>
										<td class="stat" style="PADDING-RIGHT:5px;"><?php if ($this->_tpl_vars['s']['url']):  echo $this->_tpl_vars['s']['url'];  else: ?>&nbsp;<?php endif; ?></td>									
									</tr>
									<tr>
										<td class="info_head">Время работы:</td>
										<td class="stat" style="PADDING-RIGHT:5px;"><?php if ($this->_tpl_vars['s']['work_time']):  echo $this->_tpl_vars['s']['work_time'];  else: ?>&nbsp;<?php endif; ?></td>									
									</tr>
									<tr>
										<td class="info_head">Email:</td>
										<td class="stat" style="PADDING-RIGHT:5px;"><?php if ($this->_tpl_vars['s']['email']):  echo $this->_tpl_vars['s']['email'];  else: ?>&nbsp;<?php endif; ?></td>									
									</tr>									
									<tr>
										<td class="info_head">ICQ:</td>
										<td class="stat" style="PADDING-RIGHT:5px;"><?php if ($this->_tpl_vars['s']['icq']):  echo $this->_tpl_vars['s']['icq'];  else: ?>&nbsp;<?php endif; ?></td>									
									</tr>									
<?php if ($this->_tpl_vars['s']['delivery']): ?>				
<!--если есть доставка-->
									<tr>
										<td class="info_head">Условия доставки:</td>
										<td class="stat" style="PADDING-RIGHT:5px;"><?php if ($this->_tpl_vars['s']['delivery_options']):  echo $this->_tpl_vars['s']['delivery_options'];  else: ?>&nbsp;<?php endif; ?></td>									
									</tr>
<!--если есть доставка-->
<?php endif; ?>																		
									<tr>
										<td class="info_head">Наличие кредита:</td>
										<td class="stat" style="PADDING-RIGHT:5px;">
											<?php if ($this->_tpl_vars['s']['credit']): ?>Есть
											<?php else: ?>Нет
											<?php endif; ?>
										</td>									
									</tr>																											
									<tr>
										<td class="info_head">Информация о компании:</td>
										<td class="stat" style="PADDING-RIGHT:5px;"><?php if ($this->_tpl_vars['s']['description']):  echo $this->_tpl_vars['s']['description'];  else: ?>&nbsp;<?php endif; ?></td>									
									</tr>																											
								</table>
<?php endforeach; endif; unset($_from); ?>								
								</td>
							</tr>							
						</table>
<!--/Отображение информации о компании-->
					</td>
				</tr>							
			</table>
<!--/Центральный фрейм -->			
		</td>
	</tr>
</table>