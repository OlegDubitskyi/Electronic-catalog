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
������������ ��������� �������!<br>
������ <a href="http://webcat.com.ua">WebCatalog</a> ���������� ��� ���������� �����������<br>
� �������� http://www.webcat.com.ua<br>
WebCatalog - ���  ��������-��������������  �������  � ������� � ���������!<br>
<br>
��������� ���������������, ��������� � ������������<br>
����������� ���� ���� �������������.<br>
������� <a href="http://webcat.com.ua">WebCatalog</a> - ���������� ����� �������, �����   �����������<br>
�������������  �����������  ������������� � ����� ��������-����������� ������ �������.<br>
<br>
��  ���������  ���������  �����������:<br>  �������� ��������� �������� � ����������  ����������<br>
�  �����  ��������  ��� �������� (� ��������� �������� ��������  ���  ��������,<br>
��������� ����  ������������, �������  ��  ���� �������� ���  ��������<br>
�  ���������� �����������).<br>
��� ����� ��������������� �������:<br>
 - �������������� ���������� � ����� �������� ��� ��������,<br>
 - ������ ����� �����-������ � ������� ��� ����������� �� ���������� ����������,<br>
 - �������������� �����-����� � ������ "������",<br>
 - ��������� ���������� ��������� � ������ �������� �� ��� ����<br>
��� ��� ������� �������� �����������.<br>

<br>
�����������: <a href="http://webcat.com.ua/index.php?cmd=order">www.webcat.com.ua/index.php?cmd=order</a>

<br><br>
����� ���� ��������������!<br>
������������� ������� <a href="http://webcat.com.ua">WebCatalog</a>';

		 	$headers .= "Content-type: text/html; charset=koi8-r\r\n";
			$headers .= "From: support@webcat.com.ua\r\n";
			$subject = "����������� � ��������������";
		 // ���������� �������� ��������� 
		mail($mail_to, convert_cyr_string ($subject,w,k), convert_cyr_string ($msg,w,k),$headers); 
  	}
}
?>
