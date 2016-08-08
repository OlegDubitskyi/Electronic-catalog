<?php /* Smarty version 2.6.12, created on 2006-11-12 10:23:32
         compiled from show_def_price_list.tpl */ ?>
<table border="2" width="100%" cellpadding="2" cellspacing="0">
	<tr>
		<td>
<!--Центральный фрейм -->
			<table border="2" width="100%" cellpadding="2" cellspacing="0">
				<tr>
					<td align="center">Поиск</td>
				</tr>
				<tr>
					<td>
					
					<?php $_from = $this->_tpl_vars['cat_path']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['path'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['path']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['path']):
        $this->_foreach['path']['iteration']++;
?>
						<?php if (($this->_foreach['path']['iteration'] == $this->_foreach['path']['total'])): ?>
							<?php echo $this->_tpl_vars['path']['cat_name']; ?>

						<?php else: ?>
							<a href="index.php?cmd=open_c&cat_id=<?php echo $this->_tpl_vars['path']['cat_id']; ?>
"><?php echo $this->_tpl_vars['path']['cat_name']; ?>
</a> »
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>										
					</td>
				</tr>
				<tr>
					<td><b><?php echo $this->_tpl_vars['cat_name']; ?>
</b></td>
				</tr>
				<tr>
					<td>Вендоры:
					<?php $_from = $this->_tpl_vars['vendors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['v'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['v']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['v']):
        $this->_foreach['v']['iteration']++;
?>
						<?php if (($this->_foreach['v']['iteration'] <= 1)): ?>
							<a href="index.php?cmd=&vendor_id=<?php echo $this->_tpl_vars['v']['id']; ?>
&cat_id=<?php echo $this->_tpl_vars['v']['cat_id']; ?>
"><?php echo $this->_tpl_vars['v']['vendor_name']; ?>
</a>
						<?php else: ?>
							,<a href="index.php?cmd=&vendor_id=<?php echo $this->_tpl_vars['v']['id']; ?>
&cat_id=<?php echo $this->_tpl_vars['v']['cat_id']; ?>
"><?php echo $this->_tpl_vars['v']['vendor_name']; ?>
</a>
						<?php endif; ?>					
					<?php endforeach; endif; unset($_from); ?>
					</td>
				</tr>
				<tr>
					<td>
						<table border="1" cellpadding="2" cellspacing="0">
							<tr>
								<td>Разбиение по страницам</td>
								<td>
									<a href="index.php?cmd=open_c&cat_id=<?php echo $this->_tpl_vars['cat_id']; ?>
&pt=r">розница</a>
									<a href="index.php?cmd=open_c&cat_id=<?php echo $this->_tpl_vars['cat_id']; ?>
&pt=o">опт</a>
								</td>
							</tr>
						</table>
					
					</td>
				</tr>
				<tr>
					<td>
<!--Отображение каталога-->
						<table width="100%" border="2" width="" cellpadding="2" cellspacing="0">
						<tr>
							<td><b>Наименование</b></td>
							<td><b>Цена, грн.</b></td>
							<td><b>Цена, usd</b></td>							
							<td><b>Гарантия</b></td>
							<td><b>Наличие</b></td>
							<td><b>Дата</b></td>
							<td><b>Продавец</b></td>
						</tr>
						<?php $_from = $this->_tpl_vars['positions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
							<tr>
								<td width=250><?php echo $this->_tpl_vars['p']['vendor_name']; ?>
 <?php echo $this->_tpl_vars['p']['goods_name']; ?>
 <?php echo $this->_tpl_vars['p']['description']; ?>
</td>
								<td><?php echo $this->_tpl_vars['p']['price_ua']; ?>
</td>
								<td><?php echo $this->_tpl_vars['p']['price_usd']; ?>
</td>
								<td><?php echo $this->_tpl_vars['p']['guarantee']; ?>
</td>
								<td><?php echo $this->_tpl_vars['p']['availability']; ?>
</td>
								<td><?php echo $this->_tpl_vars['p']['insert_date']; ?>
</td>
								<td><?php echo $this->_tpl_vars['p']['company_name']; ?>
</td>
							</tr>
						<?php endforeach; endif; unset($_from); ?>
						</table>
<!--/Отображение каталога-->						
					</td>
				</tr>							
			</table>
<!--/Центральный фрейм -->			
		</td>
	</tr>
</table>