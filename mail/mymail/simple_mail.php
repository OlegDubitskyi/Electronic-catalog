<?php 
$fcontents = file ("mail_list.txt");
#���� �� ������ �������	
while (list ($line_num, $mail_to) = each ($fcontents)) {
	if($mail_to !=''){
		print "<br>$line_num: $mail_to";	
		 if(empty($mail_to)) exit("������� ����� ����������"); 
		 // ��������� ������������ ���������� � ������� ����������� ��������� 
		 $mail_to = htmlspecialchars(stripslashes(trim($mail_to))); 
		 $_POST['mail_subject'] = htmlspecialchars(stripslashes($_POST['mail_subject'])); 
		 $_POST['mail_msg'] = htmlspecialchars(stripslashes($_POST['mail_msg'])); 
		
		 $thm = $_POST['mail_subject'];
		 $msg = '
������������!
����� ��������-������� WebCatalog ���������� ��� ������� � ��������������. �� ���������� ��� ���������� ���� �����-����� �� ����� �������.
��� ������ ��������� ��� ������ ������������� �����-����� � ������������� �� � ������ ������ ��� ����������� 24 ���� � �����.
��� ������� � ����� ������� ��� ���������� ������ <a href="http://webcat.com.ua/index.php?cmd=reg">�����������</a>
� ���������� � ��������� �����-����� �� ������ ������������ <a href="http://webcat.com.ua/docs/WebCat_price_example.doc">�����</a>
���������� �����-������ ���������

����� ���� ��������������,
������������� ������� WebCatalog';

		 	$headers .= "Content-type: text/html; charset=koi8-r\r\n";
			$headers .= "From: support@webcat.com.ua\r\n";
		 // ���������� �������� ��������� 
		mail($mail_to, "����������� � ��������������", convert_cyr_string ($msg,w,k),$headers); 
  	}
}
?>
