<?
class lan
{
 function __construct($file)
  {
  $this->file=$file;
  }
  
  function getW()
    {
	$file_cont=file($this->file);
	$file_str=implode("", $file_cont);
	$file_arr=explode(";",$file_str);
	
	$count=count($file_arr);
	for ($i=0; $i<$count; $i++)
	 {
	 $part_str=explode("=>",trim($file_arr[$i]));
	 $arrW[$part_str[0]]=$part_str[1];
	 }
	return $arrW;
	//echo print_r($arrW);
	
	}

}

?>