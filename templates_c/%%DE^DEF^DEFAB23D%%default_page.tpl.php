<?php /* Smarty version 2.6.12, created on 2007-01-17 19:43:39
         compiled from default_page.tpl */ ?>
<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0">
<!--Gray line-->
	<tr>
		<td width=137 bgcolor="#E8E7E3"><img src="img/gray2.gif"></td>
		<td width=6 bgcolor="#C8C6C1"><img src="img/gray3.gif"></td>
		<td bgcolor="#E8E7E3"><img src="img/gray4.gif"></td>
		<td width=250 bgcolor="#D9D7D2"><img src="img/gray5.gif"></td>
	</tr>
<!--/Gray line-->	
	<tr>
		<td width=137 bgcolor="#E8E7E3" align=center>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/left_block.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>			
		
		</td>
		<td width=6 bgcolor="#C8C6C1"><img src="img/gray3.gif"></td>
		<td valign="top" height="100%">
<!--Центральный фрейм -->
			<table border="0" width="" height="100%" bgcolor="#FFFFFF" cellpadding="2" cellspacing="0">
				<tr>
					<td width=10 bgcolor="#FFFFFF"><img src="img/white1.gif"></td>
					<td align="center" valign="top">
<!--Отображение каталога-->
						<table border="0" cellpadding="2" cellspacing="0">
							<tr>
								<td height=15 colspan=3>&nbsp;</td>
							</tr>
						<?php unset($this->_sections['tree']);
$this->_sections['tree']['name'] = 'tree';
$this->_sections['tree']['loop'] = is_array($_loop=$this->_tpl_vars['cat_tree']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['tree']['step'] = ((int)2) == 0 ? 1 : (int)2;
$this->_sections['tree']['show'] = true;
$this->_sections['tree']['max'] = $this->_sections['tree']['loop'];
$this->_sections['tree']['start'] = $this->_sections['tree']['step'] > 0 ? 0 : $this->_sections['tree']['loop']-1;
if ($this->_sections['tree']['show']) {
    $this->_sections['tree']['total'] = min(ceil(($this->_sections['tree']['step'] > 0 ? $this->_sections['tree']['loop'] - $this->_sections['tree']['start'] : $this->_sections['tree']['start']+1)/abs($this->_sections['tree']['step'])), $this->_sections['tree']['max']);
    if ($this->_sections['tree']['total'] == 0)
        $this->_sections['tree']['show'] = false;
} else
    $this->_sections['tree']['total'] = 0;
if ($this->_sections['tree']['show']):

            for ($this->_sections['tree']['index'] = $this->_sections['tree']['start'], $this->_sections['tree']['iteration'] = 1;
                 $this->_sections['tree']['iteration'] <= $this->_sections['tree']['total'];
                 $this->_sections['tree']['index'] += $this->_sections['tree']['step'], $this->_sections['tree']['iteration']++):
$this->_sections['tree']['rownum'] = $this->_sections['tree']['iteration'];
$this->_sections['tree']['index_prev'] = $this->_sections['tree']['index'] - $this->_sections['tree']['step'];
$this->_sections['tree']['index_next'] = $this->_sections['tree']['index'] + $this->_sections['tree']['step'];
$this->_sections['tree']['first']      = ($this->_sections['tree']['iteration'] == 1);
$this->_sections['tree']['last']       = ($this->_sections['tree']['iteration'] == $this->_sections['tree']['total']);
?>

							<?php $this->assign('i', $this->_sections['tree']['index']); ?>
							<?php $this->assign('i_next', $this->_sections['tree']['index']+1); ?>
							<tr>
								<td valign="top" width="48%">
<!--Первый столбец-->								
									<table border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td>
												<table width="100%" border="0" cellpadding="0" cellspacing="0">
													<tr>
														<td>
															<td width="55" height="1" bgcolor="#595959"><img src="img/black1.gif"></td>
															<td height="1" bgcolor="#C7C7C7"><img src="img/gray6.gif"></td>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td>
												<table width="100%" border="0" cellpadding="0" cellspacing="0">
													<tr>
														<td>
															<td width="55" height="1" bgcolor="#C7C7C7"><img src="img/gray6.gif"></td>
															<td height="1" bgcolor="#FFFFFF"><img src="img/white2.gif"></td>
														</td>
													</tr>
												</table>
											</td>										
										</tr>
										<tr>
											<td class=catalog><h1 class="main_cat"><a href="index.php?cmd=open_c&cat_id=<?php echo $this->_tpl_vars['cat_tree'][$this->_tpl_vars['i']]['cat_id']; ?>
"><?php echo $this->_tpl_vars['cat_tree'][$this->_tpl_vars['i']]['cat_name']; ?>
</a></h1></td>
										</tr>
										<tr>
											<td class=catalog>
											<?php $_from = $this->_tpl_vars['cat_tree'][$this->_tpl_vars['i']]['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cat']):
        $this->_foreach['cat']['iteration']++;
 if (($this->_foreach['cat']['iteration'] <= 1)): ?><a href="index.php?cmd=open_c&cat_id=<?php echo $this->_tpl_vars['cat']['cat_id']; ?>
"><?php echo $this->_tpl_vars['cat']['cat_name']; ?>
</a><?php else: ?>, <a href="index.php?cmd=open_c&cat_id=<?php echo $this->_tpl_vars['cat']['cat_id']; ?>
"><?php echo $this->_tpl_vars['cat']['cat_name']; ?>
</a><?php endif;  endforeach; endif; unset($_from); ?>
											</td>
										</tr>
										<tr>
											<td colspan=2>&nbsp;</td>
										</tr>
									</table>
<!--/Первый столбец-->									
								</td>	
<!--Разделитель-->
								<td width="25" bgcolor="#FFFFFF"><img src="img/white1.gif"></td>
<!--/Разделитель-->								
								<td valign="top" width="48%">
<!--Второй столбец-->
									<table width="" border="0" width="" cellpadding="0" cellspacing="0">
										<tr>
											<td>
												<table width="100%" border="0" cellpadding="0" cellspacing="0">
													<tr>
														<td>
															<td width="55" height="1" bgcolor="#595959"><img src="img/black1.gif"></td>
															<td height="1" bgcolor="#C7C7C7"><img src="img/gray6.gif"></td>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td>
												<table width="100%" border="0" cellpadding="0" cellspacing="0">
													<tr>
														<td>
															<td width="55" height="1" bgcolor="#C7C7C7"><img src="img/gray6.gif"></td>
															<td height="1" bgcolor="#FFFFFF"><img src="img/white2.gif"></td>
														</td>
													</tr>
												</table>
											</td>										
										</tr>
										<tr>
											<td colspan=2 class=catalog><h1 class="main_cat"><a href="index.php?cmd=open_c&cat_id=<?php echo $this->_tpl_vars['cat_tree'][$this->_tpl_vars['i_next']]['cat_id']; ?>
"><?php echo $this->_tpl_vars['cat_tree'][$this->_tpl_vars['i_next']]['cat_name']; ?>
</h1></a></td>
										</tr>
										<tr>
											<td colspan=2 class=catalog>
											<?php $_from = $this->_tpl_vars['cat_tree'][$this->_tpl_vars['i_next']]['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cat']):
        $this->_foreach['cat']['iteration']++;
 if (($this->_foreach['cat']['iteration'] <= 1)): ?><a href="index.php?cmd=open_c&cat_id=<?php echo $this->_tpl_vars['cat']['cat_id']; ?>
"><?php echo $this->_tpl_vars['cat']['cat_name']; ?>
</a><?php else: ?>, <a href="index.php?cmd=open_c&cat_id=<?php echo $this->_tpl_vars['cat']['cat_id']; ?>
"><?php echo $this->_tpl_vars['cat']['cat_name']; ?>
</a><?php endif;  endforeach; endif; unset($_from); ?>											
											</td>
										</tr>
										<tr>
											<td colspan=2>&nbsp;</td>
										</tr>	
									</table>
<!--/Второй столбец-->									
								</td>
							</tr>
						<?php endfor; endif; ?>
						</table>
<!--/Отображение каталога-->						
					</td>
					<td width=10 rowspan=2 bgcolor="#FFFFFF"><img src="img/white1.gif"></td>					
				</tr>							
				<tr>
					<td width=10 bgcolor="#FFFFFF"><img src="img/white1.gif"></td>
					<td height=10>
						<table border=0 cellpadding="5" cellspacing="0">
							<tr>
								<td>
									<a href="index.php?cmd=about">О проекте</a> | 
								 	<a href="index.php?cmd=order">Как разместить прайс лист</a> |
								 	<a href="index.php?cmd=but">Кнопки</a> |
									<a href="mailto:support@webcat.com.ua">Пишите нам</a>	
								</td>																
							</tr>
						</table>	
					</td>
				</tr>
			</table>
<!--/Центральный фрейм -->			
		</td>
		<td width="250" align="right" valign="top">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "inc/right_block.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</td>
	</tr>
</table>