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
Здравствуйте!
Новый Интернет-каталог WebCatalog приглашает ваш магазин к сотрудничеству. Мы предлагаем Вам разместить ваши прайс-листы на нашем сервере.
Наш сервис позволяет Вам самому импортировать прайс-листы и редактировать их в режиме онлайн без ограничений 24 часа в сутки.
Для участия в нашей системе Вам необходимо пройти <a href="http://webcat.com.ua/index.php?cmd=reg">регистрацию</a>
С требования к структуре прайс-листа вы можете ознакомиться <a href="http://webcat.com.ua/docs/WebCat_price_example.doc">здесь</a>
Размещение прайс-листов бесплатно

Будем рады сотрудничеству,
Администрация сервера WebCatalog';

		 	$headers .= "Content-type: text/html; charset=koi8-r\r\n";
			$headers .= "From: support@webcat.com.ua\r\n";
		 // Отправляем почтовое сообщение 
		mail($mail_to, "Приглашение к сотрудничеству", convert_cyr_string ($msg,w,k),$headers); 
  	}
}
?>
