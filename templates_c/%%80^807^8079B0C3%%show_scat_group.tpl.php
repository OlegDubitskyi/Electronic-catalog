<?php /* Smarty version 2.6.12, created on 2007-02-09 23:04:09
         compiled from board/show_scat_group.tpl */ ?>
<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<!--Gray line-->
	<tr>
		<td bgcolor="#E8E7E3"><img src="img/gray2.gif"></td>
	</tr>
<!--/Gray line-->		
	<tr>
		<td valign=top >
			<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
				<tr>
					<td width=24><img src="img/white2.gif"></td>
					<td>
						<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
							<tr>
								<td class=path_filter>
																	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "board/inc/path.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
																</td>
							</tr>
							<tr>
								<td><b><?php echo $this->_tpl_vars['cat_data']['cat_name']; ?>
</b></td>
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
						<?php $_from = $this->_tpl_vars['catalog']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
							<tr>
								<td width="15"></td>
							<?php if ($this->_tpl_vars['c']['cat_right']-$this->_tpl_vars['c']['cat_left'] != 1): ?>
								<td><?php echo $this->_tpl_vars['c']['prefix']; ?>
<b><a href="board.php?cmd=show_adverts&cat_id=<?php echo $this->_tpl_vars['c']['cat_id']; ?>
"><?php echo $this->_tpl_vars['c']['cat_name']; ?>
</a></b><?php if ($this->_tpl_vars['c']['cat_right']-$this->_tpl_vars['c']['cat_left'] == 1): ?>DDD <span>(<?php echo $this->_tpl_vars['c']['num_goods']; ?>
)</span><?php endif; ?></td>
							<?php else: ?>
								<?php if ($this->_tpl_vars['c']['num_goods'] == 0): ?>
									<td><?php echo $this->_tpl_vars['c']['prefix']; ?>
<span><?php echo $this->_tpl_vars['c']['cat_name']; ?>
</span></td>								
								<?php else: ?>
									<td><?php echo $this->_tpl_vars['c']['prefix']; ?>
<a href="board.php?cmd=show_adverts&cat_id=<?php echo $this->_tpl_vars['c']['cat_id']; ?>
"><?php echo $this->_tpl_vars['c']['cat_name']; ?>
</a> <span>(<?php echo $this->_tpl_vars['c']['num_goods']; ?>
)</span></td>
								<?php endif; ?>
							<?php endif; ?>
							</tr>
						<?php endforeach; endif; unset($_from); ?>
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
		<td height="60" bgcolor="#FFFFFF">&nbsp;</td>
	</tr>						
</table>