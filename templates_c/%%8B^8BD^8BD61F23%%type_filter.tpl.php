<?php /* Smarty version 2.6.12, created on 2007-02-04 13:06:12
         compiled from board/filters/type_filter.tpl */ ?>
<td class=filter style="BORDER-TOP: #C4C4C4 1px solid;">
<table border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="10"></td>
		<td width=65 class=vendor_filter>
			<b>Тип:</b>		
		</td>
		<td class="page_bar">
			<?php if ($this->_tpl_vars['type'] == -1 || ! $this->_tpl_vars['type']): ?>
				<b>Все</b>
			<?php else: ?>
				<a href="board.php?cmd=show_adverts&t=-1&cat_id=<?php echo $this->_tpl_vars['cat_id']; ?>
">Все</a> 
			<?php endif; ?>		
			<?php $_from = $this->_tpl_vars['type_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['t'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['t']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['t']):
        $this->_foreach['t']['iteration']++;
?>	
				<?php if (($this->_foreach['t']['iteration'] <= 1)): ?>
										<?php if ($this->_tpl_vars['type'] == $this->_tpl_vars['t']['id']): ?><b><?php echo $this->_tpl_vars['t']['type_name']; ?>
</b>
					<?php else: ?>
						<a href="board.php?cmd=show_adverts&t=<?php echo $this->_tpl_vars['t']['id']; ?>
&cat_id=<?php echo $this->_tpl_vars['cat_id']; ?>
"><?php echo $this->_tpl_vars['t']['type_name']; ?>
</a>
					<?php endif; ?>
				<?php else: ?>
										<?php if ($this->_tpl_vars['type'] == $this->_tpl_vars['t']['id']): ?>, <?php echo $this->_tpl_vars['t']['type_name']; ?>

					<?php else: ?>, <a href="board.php?cmd=show_adverts&t=<?php echo $this->_tpl_vars['t']['id']; ?>
&cat_id=<?php echo $this->_tpl_vars['cat_id']; ?>
"><?php echo $this->_tpl_vars['t']['type_name']; ?>
</a>
					<?php endif; ?>
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
		</td>
	</tr>
</table>
</td>