<table border=0 height=100% cellpadding=0 cellspacing=0>
<!--ќбрамл€юща€ полоска-->
	<tr height=10>
		<td bgcolor="#E8E7E3" width=5><img src="img/gray2.gif"></td>
		<td bgcolor="#E8E7E3"><img src="img/gray2.gif"></td>
		<td bgcolor="#E8E7E3" width=5><img src="img/gray2.gif"></td>
	</tr>
<!--/ќбрамл€юща€ полоска-->
	{if !$is_logged}
	<tr>
		<td bgcolor="#E8E7E3" width=5><img src="img/gray2.gif"></td>		
		<td valign=top bgcolor="#E8E7E3">
			<form name=log_form action="index.php?cmd=login" method="POST">
			<table border="0" width="240" cellpadding="0" cellspacing="0" bgcolor="#DAD9D4">
				<tr>
					<td colspan=4 bgcolor="#BBB9AD"><img src="img/gray7.gif"></td>
				</tr>		
				<tr height=30>
					<td width=15 rowspan=7></td>
					<td colspan=2 class="bold">¬ход дл€ партнеров</td>
					<td width=15 rowspan=7></td>
				</tr>
				{if $login_warn}
				<tr>
					<td colspan="2" class="red">Ћогин или пароль неверен</td>
				</tr>
				{/if}
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
		<td bgcolor="#E8E7E3" width=5><img src="img/gray2.gif"></td>		
	</tr>
	{/if}									
<!--ќбрамл€юща€ полоска-->
	<tr height=10>
		<td bgcolor="#E8E7E3" width=5><img src="img/gray2.gif"></td>
		<td bgcolor="#E8E7E3"><img src="img/gray2.gif"></td>
		<td bgcolor="#E8E7E3" width=5><img src="img/gray2.gif"></td>		
	</tr>		
<!--/ќбрамл€юща€ полоска-->						
	<tr>
		<td bgcolor="#E8E7E3" width=5><img src="img/gray2.gif"></td>		
		<td width=240>
			<table width="240" border=0 cellpadding="0" cellspacing="0">
				<tr>
					<td width="240" align="center" bgcolor="#E8E7E3">
<!---ѕравый баннер--->								
<!-- Ukrainian Banner Network 160х60 START -->
<center><script>
//<!--
user = "40837";
page = "1";
pid = Math.round((Math.random() * (10000000 - 1)));
document.write("<iframe src='http://banner.kiev.ua/cgi-bin/bi.cgi?h" +
user + "&amp;"+ pid + "&amp;" + page + "&amp;5' frameborder=0 vspace=0 hspace=0 " +
" width=160 height=60 marginwidth=0 marginheight=0 scrolling=no>");
document.write("<a href='http://banner.kiev.ua/cgi-bin/bg.cgi?" +
user + "&amp;"+ pid + "&amp;" + page + "&amp;5' target=_top>");
document.write("<img border=0 src='http://banner.kiev.ua/" +
"cgi-bin/bi.cgi?i" + user + "&amp;" + pid + "&amp;" + page +
"&amp;5' width=160 height=60 alt='Ukrainian Banner Network'></a>");
document.write("</iframe>");
//-->
</script>
<!-- Ukrainian Banner Network 160х60 END -->
<br>

<!---/ѕравый баннер--->								
					</td>
				</tr>
			</table>		
		</td>
		<td bgcolor="#E8E7E3" width=5><img src="img/gray2.gif"></td>		
	</tr>
	<tr height=100%>
		<td colspan=3 bgcolor="#E8E7E3"><img src="img/gray2.gif"></td>
	</tr>
</table>