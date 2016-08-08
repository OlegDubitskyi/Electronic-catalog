<?php /* Smarty version 2.6.12, created on 2006-12-22 10:48:18
         compiled from filters/region_filter_for_search.tpl */ ?>
<td class=filter>
<table border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="10"></td>
		<td width=65 class=vendor_filter>
			<b>Регионы:</b>
		</td>
		<td class="page_bar">
			<?php if ($this->_tpl_vars['selected_reg_id'] == -1 || ! $this->_tpl_vars['selected_reg_id']): ?>
				<b>Все</b>
			<?php else: ?><a href="index.php?cmd=sg&vid=<?php echo $this->_tpl_vars['vendor_id']; ?>
&cat_id=<?php echo $this->_tpl_vars['cat_id']; ?>
&rid=-1">Все</a>
			<?php endif;  $_from = $this->_tpl_vars['region_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rl'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rl']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['rl']):
        $this->_foreach['rl']['iteration']++;
 if (($this->_foreach['rl']['iteration'] <= 1)):  if ($this->_tpl_vars['selected_reg_id'] == $this->_tpl_vars['rl']['id']):  echo $this->_tpl_vars['rl']['region_name'];  else: ?><a href="index.php?cmd=sg&vid=<?php echo $this->_tpl_vars['vendor_id']; ?>
&cat_id=<?php echo $this->_tpl_vars['cat_id']; ?>
&rid=<?php echo $this->_tpl_vars['rl']['id']; ?>
"><?php echo $this->_tpl_vars['rl']['region_name']; ?>
</a><?php endif;  else:  if ($this->_tpl_vars['selected_reg_id'] == $this->_tpl_vars['rl']['id']): ?>, <?php echo $this->_tpl_vars['rl']['region_name'];  else: ?>, <a href="index.php?cmd=sg&vid=<?php echo $this->_tpl_vars['vendor_id']; ?>
&cat_id=<?php echo $this->_tpl_vars['cat_id']; ?>
&rid=<?php echo $this->_tpl_vars['rl']['id']; ?>
"><?php echo $this->_tpl_vars['rl']['region_name']; ?>
</a><?php endif;  endif;  endforeach; endif; unset($_from); ?>
		</td>
	</tr>
</table>
</td>