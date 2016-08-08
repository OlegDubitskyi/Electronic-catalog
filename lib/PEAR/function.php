<?
// преобразование для SQL запроса 
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
    case "def":
      $theValue = $theValue;
      break;
    case "def1":
      $theValue = "''";
      break;
  }
  return $theValue;
}
/*
формирование SQL запроса
$toTable таблица для изменений
$typeQ insert или update
$arr масив полей и их тип
	$arr['ol']=array("1"=>"int");
	$arr['olw']=array("12"=>"int");
$adwhire добавление запроса
$db_type тип базы данных				
*/  
function addQuerys($toTable, $typeQ, $arr, $adwhire="", $db_type="mysql")
{
	$fl=0;
	$strQuerys1="";
	$strQuerys2="";
if($db_type=="mysql") 
 {
 foreach ($arr as $names=>$keys)
	{
		list($key,$val)=each($keys);
		$value=GetSQLValueString($key, $val);
		if($typeQ=="insert")
			{
				$strQuerys1.= $fl==0 ? "INSERT INTO $toTable ($names": ", $names";
				$strQuerys2.= $fl==0 ? ") VALUES ($value" : ", $value";
			}
		elseif ($typeQ=="update")
			{
				
				$strQuerys1.= $fl==0 ? "UPDATE $toTable SET $names=$value" : ", $names=$value";
				
			}
		//echo "$names=$key=$val\n";
		$fl=1;
	}
	$strQuerys= $typeQ=="insert" ? "$strQuerys1$strQuerys2)" : $strQuerys1;	$strQuerys.= $adwhire!="" ? " WHERE $adwhire" : "";	
 }
return $strQuerys;	
}

// генерация пароля
function keycode(){
  $string="";
  $all = explode(" ","a b c d e f g h i j k l m n o p q r s t u v w x y z A B C D E F G H I J K L M N O P Q R S T U V W X Y Z 0 1 2 3 4 5 6 7 8 9");
  $length=12;
  for($i=0;$i<$length;$i++) {
    srand((double)microtime()*1000000);
    $randy = rand(0,61);
    $string.= $all[$randy];
  }
  return $string;
}

 /************************************************************************ 
  * This function checks the format of an email address. There are five levels of 
  * checking: 
  * 
  * 1 - Basic format checking. Ensures that: 
  *     There is an @ sign with something on the left and something on the right 
  *     To the right of the @ sign, there's at least one dot, with something to the left and right. 
  *     To the right of the last dot is either 2 or 3 letters, or the special case "arpa" 
  * 2 - The above, plus the letters to the right of the last dot are: 
  *     com, net, org, edu, mil, gov, int, arpa or one of the two-letter country codes 
  * 3 - The above, plus attempts to check if there is an MX (Mail eXchange) record for the 
  *     domain name. 
  * 4 - The above, plus attempt to connect to the mail server 
  * 5 - The above, plus check to see if there is a response from the mail server. The third 
  *     argument to this function is optional, and sets the number of times to loop while 
  *     waiting for a response from the mail server. The default is 15000. The actual waiting 
  *     time, of course, depends on such things as the speed of your server. 
  * 
  * Level 1 is bulletproof: if the address fails this level, it's bad. Level 2 is still 
  * pretty solid, but less certain: there could be valid TLDs overlooked when writing 
  * this function, or new ones could be added. Level 3 is even less certain: there are 
  * a number of things that could prevent finding an MX record for a valid address 
  * at any given time. 4 and 5 are even less certain still. Ultimately, the only absolutely 
  * positive way to test an email address is to send something to it. 
  * 
  * The function returns 0 for a valid address, or the level at which it failed, for an 
  * invalid address. 
  * 
  ************************************************************************/ 
// валидатор мыла
function MailValidator($Addr, $Level=1, $Timeout = 15000) { 
// (c) Darguz  http://www.zend.com/search_code_author.php?author=Darguz
//  Valid Top-Level Domains 
    $gTLDs = "com:net:org:edu:gov:mil:int:arpa:info:name:"; 
    $CCs   = "ad:ae:af:ag:ai:al:am:an:ao:aq:ar:as:at:au:aw:az:ba:bb:bd:be:bf:". 
             "bg:bh:bi:bj:bm:bn:bo:br:bs:bt:bv:bw:by:bz:ca:cc:cf:cd:cg:ch:ci:". 
             "ck:cl:cm:cn:co:cr:cs:cu:cv:cx:cy:cz:de:dj:dk:dm:do:dz:ec:ee:eg:". 
             "eh:er:es:et:fi:fj:fk:fm:fo:fr:fx:ga:gb:gd:ge:gf:gh:gi:gl:gm:gn:". 
             "gp:gq:gr:gs:gt:gu:gw:gy:hk:hm:hn:hr:ht:hu:id:ie:il:in:io:iq:ir:". 
             "is:it:jm:jo:jp:ke:kg:kh:ki:km:kn:kp:kr:kw:ky:kz:la:lb:lc:li:lk:". 
             "lr:ls:lt:lu:lv:ly:ma:mc:md:mg:mh:mk:ml:mm:mn:mo:mp:mq:mr:ms:mt:". 
             "mu:mv:mw:mx:my:mz:na:nc:ne:nf:ng:ni:nl:no:np:nr:nt:nu:nz:om:pa:". 
             "pe:pf:pg:ph:pk:pl:pm:pn:pr:pt:pw:py:qa:re:ro:ru:rw:sa:sb:sc:sd:". 
             "se:sg:sh:si:sj:sk:sl:sm:sn:so:sr:st:su:sv:sy:sz:tc:td:tf:tg:th:". 
             "tj:tk:tm:tn:to:tp:tr:tt:tv:tw:tz:ua:ug:uk:um:us:uy:uz:va:vc:ve:". 
             "vg:vi:vn:vu:wf:ws:ye:yt:yu:za:zm:zr:zw:"; 

//  The countries can have their own 'TLDs', e.g. mydomain.com.au 
    $cTLDs = "com:net:org:edu:gov:mil:co:ne:or:ed:go:mi:"; 

    $fail = 0; 

//  Shift the address to lowercase to simplify checking 
    $Addr = strtolower($Addr); 

//  Split the Address into user and domain parts 
    $UD = explode("@", $Addr); 
    if (sizeof($UD) != 2 || !$UD[0]) $fail = 1; 

//  Split the domain part into its Levels 
    $Levels = explode(".", $UD[1]); $sLevels = sizeof($Levels); 
    if ($sLevels < 2) $fail = 1; 

//  Get the TLD, strip off trailing ] } ) > and check the length 
    $tld = $Levels[$sLevels-1]; 
    $tld = ereg_replace("[>)}]$|]$", "", $tld); 
    if (strlen($tld) < 2 || strlen($tld) > 3 && $tld != "arpa") $fail = 1; 

    $Level--; 

//  If the string after the last dot isn't in the generic TLDs or country codes, it's invalid. 
    if ($Level && !$fail) { 
    $Level--; 
    if (!ereg($tld.":", $gTLDs) && !ereg($tld.":", $CCs)) $fail = 2; 
    } 

//  If it's a country code, check for a country TLD; add on the domain name. 
    if ($Level && !$fail) { 
    $cd = $sLevels - 2; $domain = $Levels[$cd].".".$tld; 
    if (ereg($Levels[$cd].":", $cTLDs)) { $cd--; $domain = $Levels[$cd].".".$domain; } 
    } 

//  See if there's an MX record for the domain 
    if ($Level && !$fail) { 
    $Level--; 
    if (!getmxrr($domain, $mxhosts, $weight)) $fail = 3; 
    } 

//  Attempt to connect to port 25 on an MX host 
    if ($Level && !$fail) { 
    $Level--; 
    while (!$sh && list($nul, $mxhost) = each($mxhosts)) 
      $sh = fsockopen($mxhost, 25); 
    if (!$sh) $fail = 4; 
    } 

//  See if anyone answers 
    if ($Level && !$fail) { 
    $Level--; 
    set_socket_blocking($sh, false); 
    $out = ""; $t = 0; 
    while ($t++ < $Timeout && !$out) 
      $out = fgets($sh, 256); 
    if (!ereg("^220", $out)) $fail = 5; 
    } 

    if (isset($sh)) fclose($sh); 

    return $fail; 
  }
  
// }}} MailVal
// возможна отправка на несколько адресов
function  send_mail($to_address,  $from_address,  $subject,  $message)  
{ 
global $konv1, $konv;
 if ($konv==1)
 {
	$message=convert_cyr_string($message, $konv1[0], $konv1[1]);
	$subject=convert_cyr_string($subject, $konv1[0], $konv1[1]);
 }
$emails=explode(";",$to_address);
$addheader="Content-Language: ru; Content-Type: text/plain;  charset=".$konv1[3];
for ($i=0;$i<sizeof($emails);$i++)
	{
	//mail ($emails[$i], $subject, $message, "From: $from_address\r\nReply-to: $from_address\r\n$addheader");
	//$tm = "$emails[$i], $subject, $message, \"From: $from_address\r\nReply-to: $from_address\r\n$addheader\"";
	}
	//return $tm;
}
// после загрузки файла с разделением табуляцией переводит в массив
function ltoa($string, $razdel="\t")
{
	$a = split( "\n", $string);
	for ($i=0; $i<sizeof($a); $i++)
	{
		$b = explode( "$razdel", $a[$i]);
		//if($i==0 AND !isset($b[1])) { return "-1"; }
		$res[$i] = $b;
	}
return $res;
}
// загрузка файла впеременную
function openfromfile ($source) {
   if(!$fp = @fopen($source,"r")) {
        return 0;
   }
   $text = @fread($fp,filesize($source));
   fclose($fp);
   return $text;
}
// запись переменной в файл
// $name имя файла
// $data данные которые будут записаны
function write_to_file ($data, $name, $types="w") {
//	prepare_dir($name);
	if(!$pfile=fopen($name,"$types")) { return false; }
	if(fwrite ($pfile,$data))
	 {
		fclose($pfile);
		return true;
	 }
	 else { return false; }
}
// Ищет в масиве одинаковые елемены
//$e="1,2,4,2,2";
//$n=array();
//$ee=explode(",", $e);
//$tmp1="";
//foreach ($ee as $ea)
//{
//	if (a_search($ea, $n)!=true)
//	{
//		$n[]=$ea;
//		if ($tmp1!="") {
//			$tmp1.=",".$ea; } 
//			else { 
//				$tmp1.=$ea; }
//	}
//}
//echo $tmp1;

function a_search($chto, $arr)
{
	for($i=0;$i<count($arr);$i++)
	{
		if ($arr[$i]==$chto) { return true; }
	}
	return false;
}
function e_search($chto, $arr)
{
	for($i=0;$i<count($arr);$i++)
	{
		if ($arr[$i][0]==$chto) { return $i; }
	}
	return "-1";
}
function d_search($chto, $arr)
{
	for($i=0;$i<count($arr);$i++)
	{
		if ($arr[$i][0]==$chto) { unset($arr[$i]); }
	}
	return $arr;
}
?>