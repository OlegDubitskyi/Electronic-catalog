<?php /* Smarty version 2.6.12, created on 2006-11-06 21:51:08
         compiled from show_price_list.tpl */ ?>
<table border="2" width="100%" cellpadding="2" cellspacing="0">
	<tr>
		<td>
<!--����������� ����� -->
			<table border="2" width="100%" cellpadding="2" cellspacing="0">
				<tr>
					<td align="center">�����</td>
				</tr>
				<tr>
					<td>����</td>
				</tr>
				<tr>
					<td><b><?php echo $this->_tpl_vars['cat_name']; ?>
</b></td>
				</tr>
				<tr>
					<td>
<!--����������� ��������-->
						<table border="2" width="" cellpadding="2" cellspacing="0">
						<?php $_from = $this->_tpl_vars['catalog']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
							<tr>
								<td></td>
							</tr>
						<?php endforeach; endif; unset($_from); ?>
						</table>
<!--/����������� ��������-->						
					</td>
				</tr>							
			</table>
<!--/����������� ����� -->			
		</td>
	</tr>
</table>