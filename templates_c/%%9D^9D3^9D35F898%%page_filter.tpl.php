<?php /* Smarty version 2.6.12, created on 2007-02-10 11:41:31
         compiled from board/filters/page_filter.tpl */ ?>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr>
		<td width="300" class="page_bar"><p class=page_pointer>
<?php $_from = $this->_tpl_vars['page_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pa']):
?>
	<?php if ($this->_tpl_vars['page'] == $this->_tpl_vars['pa']): ?>
		<b class="page_bar"><?php echo $this->_tpl_vars['pa']; ?>
</b>
	<?php else: ?>	
		<a href="board.php?cmd=show_adverts&t=<?php echo $this->_tpl_vars['type']; ?>
&cat_id=<?php echo $this->_tpl_vars['cat_id']; ?>
&pg=<?php echo $this->_tpl_vars['pa']; ?>
&rid=<?php echo $this->_tpl_vars['region_id']; ?>
"><?php echo $this->_tpl_vars['pa']; ?>
</a>
	<?php endif; ?>									
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['page'] != 1): ?>
		<a href="board.php?cmd=show_adverts&t=<?php echo $this->_tpl_vars['type']; ?>
&cat_id=<?php echo $this->_tpl_vars['cat_id']; ?>
&pg=<?php echo $this->_tpl_vars['page']-1; ?>
&rid=<?php echo $this->_tpl_vars['region_id']; ?>
">Предыдущая</a>
<?php endif; ?>
<?php if (count ( $this->_tpl_vars['page_array'] ) > 1 && $this->_tpl_vars['page'] < $this->_tpl_vars['num_pages']): ?>
		<a href="board.php?cmd=show_adverts&t=<?php echo $this->_tpl_vars['type']; ?>
&cat_id=<?php echo $this->_tpl_vars['cat_id']; ?>
&pg=<?php echo $this->_tpl_vars['page']+1; ?>
&rid=<?php echo $this->_tpl_vars['region_id']; ?>
">Следующая</a>
<?php endif; ?></p>	
		</td>
		<td align="right"><a href="board.php?cmd=add_advert"><b>Добавить объявление</b></a></td>
	</tr>
</table>