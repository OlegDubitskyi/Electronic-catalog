<?php /* Smarty version 2.6.12, created on 2006-12-27 19:20:28
         compiled from company_info.tpl */ ?>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
<!--Gray line-->
	<tr>
		<td bgcolor="#E8E7E3"><img src="img/gray2.gif"></td>
	</tr>
<!--/Gray line-->			
	<tr>
<!--����������� ����� -->
		<td valign="top">
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr style="PADDING-TOP:20px; PADDING-BOTTOM:20px;">
					<td>
<!--����������� ���������� � ��������-->
						<table border="0" width="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td align="center">
<?php $_from = $this->_tpl_vars['seller']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['s']):
?>								
								<table class="import" width=450 cellpadding="0" cellspacing="0">
									<tr>
										<td class="info_head2" width=150>��������:</td>
										<td style="PADDING-RIGHT:5px;"><?php if ($this->_tpl_vars['s']['company_name']): ?><b><?php echo $this->_tpl_vars['s']['company_name']; ?>
</b><?php else: ?>&nbsp;<?php endif; ?></td>
									</tr>
									<tr>
										<td class="info_head">�����:</td>
										<td class="stat" style="PADDING-RIGHT:5px;"><?php if ($this->_tpl_vars['s']['region_name']):  echo $this->_tpl_vars['s']['region_name'];  else: ?>&nbsp;<?php endif; ?></td>									
									</tr>
									<tr>
										<td class="info_head">�����:</td>
										<td class="stat" style="PADDING-RIGHT:5px;"><?php if ($this->_tpl_vars['s']['address']):  echo $this->_tpl_vars['s']['address'];  else: ?>&nbsp;<?php endif; ?></td>									
									</tr>
									<tr>
										<td class="info_head">��������:</td>
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
										<td class="info_head">����:</td>
										<td class="stat" style="PADDING-RIGHT:5px;"><?php if ($this->_tpl_vars['s']['fax']):  echo $this->_tpl_vars['s']['fax'];  else: ?>&nbsp;<?php endif; ?></td>									
									</tr>
									<tr>
										<td class="info_head">����:</td>
										<td class="stat" style="PADDING-RIGHT:5px;"><?php if ($this->_tpl_vars['s']['url']):  echo $this->_tpl_vars['s']['url'];  else: ?>&nbsp;<?php endif; ?></td>									
									</tr>
									<tr>
										<td class="info_head">����� ������:</td>
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
<!--���� ���� ��������-->
									<tr>
										<td class="info_head">������� ��������:</td>
										<td class="stat" style="PADDING-RIGHT:5px;"><?php if ($this->_tpl_vars['s']['delivery_options']):  echo $this->_tpl_vars['s']['delivery_options'];  else: ?>&nbsp;<?php endif; ?></td>									
									</tr>
<!--���� ���� ��������-->
<?php endif; ?>																		
									<tr>
										<td class="info_head">������� �������:</td>
										<td class="stat" style="PADDING-RIGHT:5px;">
											<?php if ($this->_tpl_vars['s']['credit']): ?>����
											<?php else: ?>���
											<?php endif; ?>
										</td>									
									</tr>																											
									<tr>
										<td class="info_head">���������� � ��������:</td>
										<td class="stat" style="PADDING-RIGHT:5px;"><?php if ($this->_tpl_vars['s']['description']):  echo $this->_tpl_vars['s']['description'];  else: ?>&nbsp;<?php endif; ?></td>									
									</tr>																											
								</table>
<?php endforeach; endif; unset($_from); ?>								
								</td>
							</tr>							
						</table>
<!--/����������� ���������� � ��������-->
					</td>
				</tr>							
			</table>
<!--/����������� ����� -->			
		</td>
	</tr>
</table>