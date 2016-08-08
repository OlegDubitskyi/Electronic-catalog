<?php /* Smarty version 2.6.12, created on 2006-12-22 10:56:32
         compiled from filters/vendor_filter_for_search.tpl */ ?>
<td class=filter style="BORDER-TOP: #C4C4C4 1px solid;">
<table border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="10"></td>
		<td width=65 class=vendor_filter>
			<b>Вендоры:</b>
		</td>
		<td class="page_bar">		
			<?php if ($this->_tpl_vars['vendor_id'] == -1 || ! $this->_tpl_vars['vendor_id']): ?><b>Все</b> <?php else: ?><a href="index.php?cmd=sg&cat_id=<?php echo $this->_tpl_vars['cat_id']; ?>
&vid=-1">Все</a><?php endif;  $_from = $this->_tpl_vars['vendors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['v'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['v']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['v']):
        $this->_foreach['v']['iteration']++;
 if (($this->_foreach['v']['iteration'] <= 1)):  if ($this->_tpl_vars['vendor_id'] == $this->_tpl_vars['v']['id']): ?><b><?php echo $this->_tpl_vars['v']['vendor_name']; ?>
</b><span>(<?php echo $this->_tpl_vars['v']['num_goods']; ?>
)</span><?php else: ?><a href="index.php?cmd=sg&vid=<?php echo $this->_tpl_vars['v']['id']; ?>
&cat_id=<?php echo $this->_tpl_vars['v']['cat_id']; ?>
"><?php echo $this->_tpl_vars['v']['vendor_name']; ?>
</a> <span>(<?php echo $this->_tpl_vars['v']['num_goods']; ?>
)</span><?php endif;  else:  if ($this->_tpl_vars['vendor_id'] == $this->_tpl_vars['v']['id']): ?>, <b><?php echo $this->_tpl_vars['v']['vendor_name']; ?>
</b><span>(<?php echo $this->_tpl_vars['v']['num_goods']; ?>
)</span><?php else: ?>, <a href="index.php?cmd=sg&vid=<?php echo $this->_tpl_vars['v']['id']; ?>
&cat_id=<?php echo $this->_tpl_vars['v']['cat_id']; ?>
"><?php echo $this->_tpl_vars['v']['vendor_name']; ?>
</a> <span>(<?php echo $this->_tpl_vars['v']['num_goods']; ?>
)</span><?php endif;  endif;  endforeach; endif; unset($_from); ?>
		</td>
	</tr>
</table>
</td>