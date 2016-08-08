<?php
	// ���������� �������� � 3DNews.ru
	// http://www.3dnews.ru/news/rss/

    // ��� ����� ��� �������� RSS �� ��������� �������
    $filename = '3dnews.xml';
    // URL RSS ������
    $rss_url = 'http://www.3dnews.ru/news/rss/';
    
   	// ������� ������ XML
   	// ���������� �������� �� ��, ��� ���� ��� �������
	if (!file_exists($filename)) {
		// �������� � ���������
		download($rss_url, $filename);
	}
	
	// �������� ������� SIMPLEXML � �������� ���������
	$xml = simplexml_load_file($filename); 	
	
	$i = 1;
	foreach ($xml->channel->item as $item) {
		print_r($item);
		$title = $item->title;
		$description = $item->description;
		$link = $item->link;
		echo '<h3>' , iconv("UTF-8","windows-1251", $title) , '</h3>';
		echo '<p>' , iconv("UTF-8","windows-1251", $description) , ' <a href="' , $link , '">' . '�����������</a>...</p>';
		$i++;
		if ($i > 5) break; // �� ����� 5 ������� ��������
	}
	
	// �������� �� ��, ��� ���� ���� ������� �����, ��� �� 12 ����� - ������ � ��������� �����
	if (time() > filemtime($filename) + 60*60*12) {
		// �������� � ���������
		download($rss_url, $filename);	
	}
	
	#################################################################################################################
	function download($url, $filename) {
		// �������� ���� � ���������� URL � ��������� � ������������ ������
		$file = file_get_contents($url);
		if ($file) file_put_contents($filename, $file);
	}
?>
