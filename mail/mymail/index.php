<?php 
$fcontents = file ("mail_list.txt");
#цикл по списку емейлов	
while (list ($line_num, $mail_to) = each ($fcontents)) {
	if($mail_to !=''){
		print "<br>$line_num: $mail_to";	
		 if(empty($mail_to)) exit("Введите адрес получателя"); 
		 // проверяем правильности заполнения с помощью регулярного выражения 
		 $mail_to = htmlspecialchars(stripslashes(trim($mail_to))); 
		 $_POST['mail_subject'] = htmlspecialchars(stripslashes($_POST['mail_subject'])); 
		 $_POST['mail_msg'] = htmlspecialchars(stripslashes($_POST['mail_msg'])); 
		
		 $thm = $_POST['mail_subject'];
		 $msg = '
Здравствуйте уважаемые коллеги!<br>
сервер <a href="http://webcat.com.ua">WebCatalog</a> предлагает Вам бесплатную регистрацию<br>
в каталоге http://www.webcat.com.ua<br>
WebCatalog - это  поисково-информационный  каталог  о товарах и магазинах!<br>
<br>
Уважаемые предприниматели, менеджеры и руководители<br>
предприятий всех форм собственности.<br>
Каталог <a href="http://webcat.com.ua">WebCatalog</a> - разработан таким образом, чтобы   максимально<br>
удовлетворить  потребности  рекламодателя в сфере интернет-продвижения своего бизнеса.<br>
<br>
Вы  получаете  следующие  возможности:<br>  создание отдельной страницы и размещение  информации<br>
о  Вашем  магазине  или компании (с указанием названия магазина  или  компании,<br>
описанием рода  деятельности, ссылкой  на  сайт компании или  магазина<br>
и  контактной информацией).<br>
Вам также предоставляются сервисы:<br>
 - редактирование информации о вашем магазине или компании,<br>
 - импорт Ваших прайс-листов в каталог без ограничений по количеству обновлений,<br>
 - редактирование прайс-листа в режиме "онлайн",<br>
 - детальная статистика переходов с нашего каталога на Ваш сайт<br>
Все эти сервисы являются бесплатными.<br>

<br>
Регистрация: <a href="http://webcat.com.ua/index.php?cmd=order">www.webcat.com.ua/index.php?cmd=order</a>

<br><br>
Будем рады сотрудничеству!<br>
Администрация сервера <a href="http://webcat.com.ua">WebCatalog</a>';

		 	$headers .= "Content-type: text/html; charset=koi8-r\r\n";
			$headers .= "From: support@webcat.com.ua\r\n";
			$subject = "Приглашение к сотрудничеству";
		 // Отправляем почтовое сообщение 
		mail($mail_to, convert_cyr_string ($subject,w,k), convert_cyr_string ($msg,w,k),$headers); 
  	}
}
?>
