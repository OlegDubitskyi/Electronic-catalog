<?php /* Smarty version 2.6.12, created on 2007-01-12 20:46:47
         compiled from reg_company_data.tpl */ ?>
<?php echo '
<script language="Javascript">
function subPage(type){
	document.reg.type.value=type;		
	document.reg.submit();
}
</script>
'; ?>

<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td width=24><img src="../img/white2.gif"></td>
		<td>
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td style="PADDING-TOP:10px;" align="center">
						<form name=reg method="POST">
						<table class="import" width=550 cellpadding="0" cellspacing="0">
<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['d']):
?>
							<tr>
								<td width=250>Название организации или СПД:</td>
								<td><?php echo $this->_tpl_vars['d']['company_name']; ?>
</td>
							</tr>
							<tr>
								<td width=250>Город:</td>
								<td><?php echo $this->_tpl_vars['d']['region_name']; ?>
</td>
							</tr>													
							<tr>
								<td width=250>Название города в базе:</td>
								<td>
									<table cellpadding="0" cellspacing="0">
										<tr>								
											<td>
												<SELECT name="region_id" >
													<option value="-1">Выберите город</option>
<!-- Region block-->		
												<?php $_from = $this->_tpl_vars['region_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rl'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rl']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['rl']):
        $this->_foreach['rl']['iteration']++;
?>
													<?php if ($this->_tpl_vars['rl']['id'] == $this->_tpl_vars['s']['region_id']): ?>		
														<option value="<?php echo $this->_tpl_vars['rl']['id']; ?>
" selected><?php echo $this->_tpl_vars['rl']['region_name']; ?>
</option>						
													<?php else: ?>
														<option value="<?php echo $this->_tpl_vars['rl']['id']; ?>
" ><?php echo $this->_tpl_vars['rl']['region_name']; ?>
</option>			
													<?php endif; ?>
												<?php endforeach; endif; unset($_from); ?>				
<!-- /Region block-->		
												</SELECT>																			
											</td>
											<td>&nbsp;&nbsp;<a href="index.php?cmd=region">Редактировать список городов</a></td>
										</tr>
									</table>					
								</td>									
							</tr>																				
							<tr>
								<td>Контактное лицо:</td>
								<td><?php echo $this->_tpl_vars['d']['user_name']; ?>
</td>
							</tr>													
							<tr>
								<td>Телефон для контактов:</td>
								<td>+38(<?php echo $this->_tpl_vars['d']['tel_code']; ?>
) <?php echo $this->_tpl_vars['d']['tel']; ?>
</td>
							</tr>
							<tr>
								<td>Email:</td>
								<td><?php echo $this->_tpl_vars['d']['email']; ?>
</td>
							</tr>													
							<tr>
								<td>Сайт:</td>
								<td><?php echo $this->_tpl_vars['d']['url']; ?>
</td>
							</tr>																				
							<tr>
								<td>Предполагаемое кол-во прайс-строк:</td>
								<td><?php echo $this->_tpl_vars['d']['num_rows']; ?>
</td>
							</tr>																										
							<tr>
								<td colspan="2" style="BORDER-DOWN: #D8D9E1 1px solid;" align="center">
								</td>
							</tr>	
							<tr>
								<td colspan=2>
									<table width=100%>
										<tr>
											<td><input onclick="javascript:subPage('register')" type=button value="Регистрировать"></td>
											<td><input onclick="javascript:subPage('decline')" type=button value="Отклонить"></td>
											<input type=hidden name=id value="<?php echo $this->_tpl_vars['d']['id']; ?>
">
											<input type="hidden" name="cmd" value="reg_decision">
											<input type="hidden" name="type" value="">
										</tr>
									</table>
								</td>
							</tr>
<?php endforeach; endif; unset($_from); ?>																																													
						</table>
						</form>
					</td>
				</tr>
			</table>		
		</td>
		<td><img src="../img/white2.gif"></td>
	</tr>
</table>		