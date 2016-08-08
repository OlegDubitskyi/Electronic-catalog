<?php /* Smarty version 2.6.12, created on 2006-12-19 00:36:13
         compiled from right_block.tpl */ ?>
<table border=1 height=100% cellpadding=0 cellspacing=0>
<!--ќбрамл€юща€ полоска-->
	<tr height=10>
		<td bgcolor="#E8E7E3" rowspan=4 width=5><img src="img/gray2.gif"></td>
		<td bgcolor="#E8E7E3"><img src="img/gray2.gif"></td>
		<td bgcolor="#E8E7E3" rowspan=4 width=5><img src="img/gray2.gif"></td>
	</tr>
<!--/ќбрамл€юща€ полоска-->
	<tr height=350>
		<td width=240>
			<table width="240" border=1 cellpadding="0" cellspacing="0">
				<tr>
					<td height="350" width="240" align="center">
<!---ѕравый баннер--->								
					Ѕаннер 240x350
<!---/ѕравый баннер--->								
					</td>
				</tr>
			</table>		
		</td>
	</tr>
<!--ќбрамл€юща€ полоска-->
	<tr height=10>
		<td bgcolor="#E8E7E3"><img src="img/gray2.gif"></td>
	</tr>		
<!--/ќбрамл€юща€ полоска-->						
	<?php if (! $this->_tpl_vars['is_logged']): ?>
	<tr>
		<td valign=top>
			<form name=log_form action="index.php?cmd=login" method="POST">
			<table border="0" width="240" cellpadding="0" cellspacing="0" bgcolor="#DAD9D4">
				<tr>
					<td colspan=4 bgcolor="#BBB9AD"><img src="img/gray7.gif"></td>
				</tr>		
				<tr height=30>
					<td width=15 rowspan=7></td>
					<td colspan=2><b>¬ход дл€ партнеров</b></td>
					<td width=15 rowspan=7></td>
				</tr>
				<?php if ($this->_tpl_vars['login_warn']): ?>
				<tr>
					<td colspan="2"><font color="Red">Ћогин или пароль неверен</font></td>
				</tr>
				<?php endif; ?>
				<tr>
					<td colspan=2>Ћогин:</td>
				</tr>
				<tr>
					<td colspan=2><input type="text" name="login" size=25></td>
				</tr>
				<tr>
					<td colspan=2>ѕароль:</td>
				</tr>
				<tr>
					<td colspan=2><input type="password" name="pas" size=25></td>
				</tr>
				<tr height=28>
					<td colspan="2" align="leftt"><input type="submit" value="¬ход"></td>
				</tr>
			</table>
			</form>
		</td>
	</tr>
	<?php endif; ?>									
	<tr height=100%>
		<td colspan=3 bgcolor="#1F69A0"><img src="img/blue4.gif"></td>
	</tr>
</table>