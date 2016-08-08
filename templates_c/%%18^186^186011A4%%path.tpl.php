<?php /* Smarty version 2.6.12, created on 2007-02-09 22:39:56
         compiled from board/inc/path.tpl */ ?>
<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	<tr>
		<td class=path_filter style="PADDING-BOTTOM:0px;";>
						<a href="board.php">Каталог объявлений</a> »
		<?php $_from = $this->_tpl_vars['cat_path']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['path'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['path']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['path']):
        $this->_foreach['path']['iteration']++;
?>
			<?php if (($this->_foreach['path']['iteration'] == $this->_foreach['path']['total'])): ?>
				<b><?php echo $this->_tpl_vars['path']['cat_name']; ?>
</b>
			<?php else: ?>
				<a href="board.php?cmd=show_adverts&cat_id=<?php echo $this->_tpl_vars['path']['cat_id']; ?>
"><?php echo $this->_tpl_vars['path']['cat_name']; ?>
</a> »
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>										
		</td>
	</tr>
</table>	