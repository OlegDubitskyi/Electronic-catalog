<?php
	// Трансляция новостей с 3DNews.ru
	// http://www.3dnews.ru/news/rss/

    // Имя файла для хранения RSS на локальном сервере
    $filename = '3dnews.xml';
    // URL RSS потока
    $rss_url = 'http://www.3dnews.ru/news/rss/';
    
   	// Закачка файлов XML
   	// Произвести проверку на то, что файл уже закачен
	if (!file_exists($filename)) {
		// Закачать и сохранить
		download($rss_url, $filename);
	}
	
	// Создание объекта SIMPLEXML и загрузка документа
	$xml = simplexml_load_file($filename); 	
	
	$i = 1;
	foreach ($xml->channel->item as $item) {
		print_r($item);
		$title = $item->title;
		$description = $item->description;
		$link = $item->link;
		echo '<h3>' , iconv("UTF-8","windows-1251", $title) , '</h3>';
		echo '<p>' , iconv("UTF-8","windows-1251", $description) , ' <a href="' , $link , '">' . 'продолжение</a>...</p>';
		$i++;
		if ($i > 5) break; // Не более 5 анонсов новостей
	}
	
	// Проверка на то, что если файл устарел более, чем на 12 часов - качать и сохранить новый
	if (time() > filemtime($filename) + 60*60*12) {
		// Закачать и сохранить
		download($rss_url, $filename);	
	}
	
	#################################################################################################################
	function download($url, $filename) {
		// Закачать файл с указанного URL и сохранить с определенным именем
		$file = file_get_contents($url);
		if ($file) file_put_contents($filename, $file);
	}
?>
