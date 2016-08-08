<?php /* Smarty version 2.6.12, created on 2006-11-19 15:58:03
         compiled from vendor_filter.tpl */ ?>
<td>
Вендоры:
<?php if ($this->_tpl_vars['vendor_id'] == -1 || ! $this->_tpl_vars['vendor_id']): ?>
	Все
<?php else: ?>
	<a href="index.php?cmd=open_c&cat_id=<?php echo $this->_tpl_vars['cat_id']; ?>
&vid=-1">Все</a>
<?php endif; ?>

<?php $_from = $this->_tpl_vars['vendors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['v'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['v']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['v']):
        $this->_foreach['v']['iteration']++;
?>
	<?php if (($this->_foreach['v']['iteration'] <= 1)): ?>
		<?php if ($this->_tpl_vars['vendor_id'] == $this->_tpl_vars['v']['id']): ?>
			<?php echo $this->_tpl_vars['v']['vendor_name']; ?>
(<?php echo $this->_tpl_vars['v']['num_goods']; ?>
)
		<?php else: ?>
			<a href="index.php?cmd=open_c&vid=<?php echo $this->_tpl_vars['v']['id']; ?>
&cat_id=<?php echo $this->_tpl_vars['v']['cat_id']; ?>
"><?php echo $this->_tpl_vars['v']['vendor_name']; ?>
(<?php echo $this->_tpl_vars['v']['num_goods']; ?>
)</a>
		<?php endif; ?>
	<?php else: ?>
		<?php if ($this->_tpl_vars['vendor_id'] == $this->_tpl_vars['v']['id']): ?>
			<?php echo $this->_tpl_vars['v']['vendor_name']; ?>
(<?php echo $this->_tpl_vars['v']['num_goods']; ?>
)
		<?php else: ?>
			, <a href="index.php?cmd=open_c&vid=<?php echo $this->_tpl_vars['v']['id']; ?>
&cat_id=<?php echo $this->_tpl_vars['v']['cat_id']; ?>
"><?php echo $this->_tpl_vars['v']['vendor_name']; ?>
(<?php echo $this->_tpl_vars['v']['num_goods']; ?>
)</a>
		<?php endif; ?>
	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</td>