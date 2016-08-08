<?php /* Smarty version 2.6.12, created on 2006-12-22 10:42:11
         compiled from filters/price_type_filter.tpl */ ?>
<td class="page_bar">
	<?php if ($this->_tpl_vars['pt'] == 'r'): ?>
		<b class="page_bar">розница</b>
		<a href="index.php?cmd=open_c&cat_id=<?php echo $this->_tpl_vars['cat_id'];  if ($this->_tpl_vars['vendor_id']): ?>&vendor_id=<?php echo $this->_tpl_vars['vendor_id'];  endif; ?>&pt=o">опт</a>								
	<?php elseif ($this->_tpl_vars['pt'] == 'o'): ?>
		<a href="index.php?cmd=open_c&cat_id=<?php echo $this->_tpl_vars['cat_id'];  if ($this->_tpl_vars['vendor_id']): ?>&vendor_id=<?php echo $this->_tpl_vars['vendor_id'];  endif; ?>&pt=r">розница</a>
		<b class="page_bar">опт</b>
	<?php endif; ?>
</td>