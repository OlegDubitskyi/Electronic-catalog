<?php /* Smarty version 2.6.12, created on 2006-12-28 13:39:46
         compiled from inc/company_list.tpl */ ?>
						<table class="rows" border="0" cellpadding="0" cellspacing="0" align="center">
						<?php if (count ( $this->_tpl_vars['sellers'] ) > 0): ?>
							<tr>
								<td class="header" style="TEXT-ALIGN: left; PADDING-LEFT: 15px;">Компания</td>
								<td width="250" class="header">Сайт</td>
								<td width="100" class="header">Город</td>
								<td width="200" class="header">Телефоны</td>
							</tr>
							<?php $_from = $this->_tpl_vars['sellers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sellers'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sellers']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['s']):
        $this->_foreach['sellers']['iteration']++;
?>
							<tr <?php if (($this->_foreach['sellers']['iteration']-1)%2 == 0): ?>class=m<?php endif; ?>>
								<td class=al height="30">
									<a href="index.php?cmd=ci&sid=<?php echo $this->_tpl_vars['s']['id']; ?>
" title="подробнее"><?php echo $this->_tpl_vars['s']['company_name']; ?>
</a>
								</td>
								<td align="center">
								<?php if ($this->_tpl_vars['s']['url']): ?>
									<a href="http://<?php echo $this->_tpl_vars['s']['url']; ?>
" target="new"><?php echo $this->_tpl_vars['s']['url']; ?>
</a>
								<?php else: ?>
									-
								<?php endif; ?>
								</td>
								<td><?php echo $this->_tpl_vars['s']['region_name']; ?>
</td>
								<td>
								<?php if ($this->_tpl_vars['s']['tel1']): ?>
									(<?php echo $this->_tpl_vars['s']['tel_code1']; ?>
) <?php echo $this->_tpl_vars['s']['tel1']; ?>

								<?php else: ?>
									&nbsp;
								<?php endif; ?>
								<?php if ($this->_tpl_vars['s']['tel2']): ?>
									<br>(<?php echo $this->_tpl_vars['s']['tel_code2']; ?>
) <?php echo $this->_tpl_vars['s']['tel2']; ?>

								<?php else: ?>
									&nbsp;
								<?php endif; ?>
								<?php if ($this->_tpl_vars['s']['tel2']): ?>
									<br>(<?php echo $this->_tpl_vars['s']['tel_code3']; ?>
) <?php echo $this->_tpl_vars['s']['tel3']; ?>

								<?php else: ?>
									&nbsp;
								<?php endif; ?>										
								</td>
							</tr>
							<?php endforeach; endif; unset($_from); ?>	  
						<?php else: ?>
							<tr>
								<td class="header" style="TEXT-ALIGN: left; PADDING-LEFT: 15px;">Компания</td>
								<td width="250" class="header">Сайт</td>
								<td width="100" class="header">Город</td>
								<td width="200" class="header">Телефоны</td>
							</tr>						
							<tr class=m>
								<td colspan="4" class="row1" align="center" height=30>Список пуст</td>
							</tr>
						<?php endif; ?>
						</table>		