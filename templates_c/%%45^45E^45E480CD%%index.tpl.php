<?php /* Smarty version 2.6.12, created on 2007-02-11 20:25:18
         compiled from index.tpl */ ?>
<html>
<head>
	<title>Цены на фото видео мобильную и компьютерную технику а так же mp3 dvd и косметику</title>
	<link rel="stylesheet" href="lib/style.css">		
	<META content="text/html; charset=windows-1251" http-equiv=Content-Type>	
	<META http-equiv="Content-Language" content="ru">
	<META http-equiv="Content-Type" content="text/html; charset=windows-1251">
	<META NAME="keywords" CONTENT="фото видео мобильный телефон магазин цена компьютер ноутбук косметика техника mp3 dvd">
	<META NAME="description" CONTENT="Сравнение цен на фото видео товары, мобильные телефоны, компьютерную технику, mp3 и dvd плееры, косметику в интернет магазинах">	
</head>
<body>
<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0">
<!--Cap-->
	<tr>
		<td align="center"  valign="middle" height="80" bgcolor="#FFFFFF">
			<!-- Ukrainian Banner Network 468x60 START -->
			<center><script>
			//<!--
			user = "40837";
			page = "1";
			pid = Math.round((Math.random() * (10000000 - 1)));
			document.write("<iframe src='http://banner.kiev.ua/cgi-bin/bi.cgi?h" +
			user + "&amp;"+ pid + "&amp;" + page + "' frameborder=0 vspace=0 hspace=0 " +
			" width=468 height=60 marginwidth=0 marginheight=0 scrolling=no>");
			document.write("<a href='http://banner.kiev.ua/cgi-bin/bg.cgi?" +
			user + "&amp;"+ pid + "&amp;" + page + "' target=_top>");
			document.write("<img border=0 src='http://banner.kiev.ua/" +
			"cgi-bin/bi.cgi?i" + user + "&amp;" + pid + "&amp;" + page +
			"' width=468 height=60 alt='Украинская Баннерная Сеть'></a>");
			document.write("</iframe>");
			//-->
			</script>
			</center>
			<!-- Ukrainian Banner Network 468x60 END -->
		</td>
	</tr>
	<tr><td height="6" bgcolor="#D8D7D0"><img src="img/gray1.gif"></td></tr>
<!--/Cap-->	
<!--NAVIGATION-->
	<tr>
		<td>
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td width="143" rowspan="3"><a href="index.php"><img src="img/logo.gif" border="0"></a></td>
					<td colspan=2>
<!-- Navigation panel-->
						<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0">
							<tr>
								<td bgcolor="#225D92" colspan=2><img src="img/blue1.gif"></td>
							</tr>
							<tr>
								<td bgcolor="#7A2323"><img src="img/red1.gif"></td>
								<td bgcolor="#225D92" width=250><img src="img/blue2.gif"></td>
							</tr>
							<tr>
								<td bgcolor="#6E1515">
									<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "top_navigation.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>		
								</td>
								<td bgcolor="#225D92">&nbsp;</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF" colspan=2><img src="img/white1.gif"></td>
							</tr>
						</table>
<!-- /Navigation panel-->						
					</td>		
				</tr>
<!--Search-->				
				<tr>
					<td bgcolor="#FFBA43"><img src="img/orange1.gif"></td>
					<td bgcolor="#FFC453"><img src="img/orange2.gif"></td>
				</tr>
				<tr>
					<td bgcolor="#FFA304">
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "search.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>		
					</td>
					<td bgcolor="#FFAF08" width=250></td>					
				</tr>
<!--/Search-->								
			</table>
		</td>
	</tr>
<!--/NAVIGATION-->	
<!--Third level -->
	<tr>
		<td valign="top" height="100%" bgcolor="#FFFFFF">
<!--Основная часть страницы, состоящая из трех частей: левый баннер, центральная часть, правый баннер-->
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['main_win'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--/Основная часть страницы, состоящая из трех частей: левый баннер, центральная часть, правый баннер-->			
		</td>
	</tr>
<!--/Third level -->
	<tr>
		<td>
<!---Footer--->
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['footer'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!---/Footer--->
		</td>
	</tr>
</table>
</body>
</html>