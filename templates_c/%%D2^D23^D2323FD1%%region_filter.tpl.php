<?php /* Smarty version 2.6.12, created on 2006-11-19 16:00:48
         compiled from region_filter.tpl */ ?>
<td>
Регионы:
<?php if ($this->_tpl_vars['selected_reg_id'] == -1 || ! $this->_tpl_vars['selected_reg_id']): ?>
	Все
<?php else: ?>
	<a href="index.php?cmd=open_c&vid=<?php echo $this->_tpl_vars['vendor_id']; ?>
&cat_id=<?php echo $this->_tpl_vars['cat_id']; ?>
&rid=-1">Все</a>
<?php endif; ?>
						
<?php $_from = $this->_tpl_vars['region_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rl'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rl']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['rl']):
        $this->_foreach['rl']['iteration']++;
?>
	<?php if (($this->_foreach['rl']['iteration'] <= 1)): ?>
		<?php if ($this->_tpl_vars['selected_reg_id'] == $this->_tpl_vars['rl']['id']): ?>
			<?php echo $this->_tpl_vars['rl']['region_name']; ?>
									
		<?php else: ?>
			<a href="index.php?cmd=open_c&vid=<?php echo $this->_tpl_vars['vendor_id']; ?>
&cat_id=<?php echo $this->_tpl_vars['cat_id']; ?>
&rid=<?php echo $this->_tpl_vars['rl']['id']; ?>
"><?php echo $this->_tpl_vars['rl']['region_name']; ?>
</a>					
		<?php endif; ?>
							
	<?php else: ?>
		
		<?php if ($this->_tpl_vars['selected_reg_id'] == $this->_tpl_vars['rl']['id']): ?>
			, <?php echo $this->_tpl_vars['rl']['region_name']; ?>
									
		<?php else: ?>
			, <a href="index.php?cmd=open_c&vid=<?php echo $this->_tpl_vars['vendor_id']; ?>
&cat_id=<?php echo $this->_tpl_vars['cat_id']; ?>
&rid=<?php echo $this->_tpl_vars['rl']['id']; ?>
"><?php echo $this->_tpl_vars['rl']['region_name']; ?>
</a>					
		<?php endif; ?>
	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>					
</td>