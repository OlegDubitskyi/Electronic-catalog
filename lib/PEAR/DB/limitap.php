<?
class Lim {
var $tRows;
var $mRows;
var $nPage;
var $pNum;
var $totalPages;
var $startRows=0;
var $query_strings="";



// добавление к запросу лимита
function addTOlimit($query_info)
{
	$view_res=sprintf("%s LIMIT %d, %d", $query_info, $this->startRows, $this->mRows);
	return $view_res;
}
  /* 1 -всего найдено
  	 2 -с какого показано
  	 3 - по какой показано
  */
function prInfo($param)
  {
  	switch ($param)
 	{
    case 1: 
    { 	
    	$view_res=$this->tRows;
	  	break; }
    case 2:
    { 	
    	$view_res=$this->startRows + 1;
    	//$view_res=$this->totalPages;
	  	break; }
    case 3:
    { 	
    	$view_res=min($this->startRows + $this->mRows, $this->tRows);
		break; }
   }
  return $view_res;
  }
  // выводит текст вперед назад начало конец
  function prNumRes($param, $txt_par)
  {
	switch ($param)
 	{
    case 1: // на начало
    { 	
    	if ($this->pNum > 0)
    	 { 
      		$view_res=sprintf("<a href=\"%s?pageNum=%d&totalRows=%d%s\">%s</a>", $this->nPage, 0, $this->tRows, $this->query_strings, $txt_par);
    	 } 	
    	 else
    	 {	
    	 	$view_res=sprintf("%s", $txt_par);
    	 }
	  	break; }
    case 2:
    { 	if ($this->pNum > 0)
    	 { 
      		$view_res=sprintf("<a href=\"%s?pageNum=%d&totalRows=%d%s\">%s</a>", $this->nPage, max(0, $this->pNum-1), $this->tRows, $this->query_strings, $txt_par);
    	 } 	
    	 else
    	 {	
    	 	$view_res=sprintf("%s", $txt_par);
    	 }
	  	break; }
    case 3:
    { 	if ($this->pNum < $this->totalPages)
    	 { 
      		$view_res=sprintf("<a href=\"%s?pageNum=%d&totalRows=%d%s\">%s</a>", $this->nPage, min($this->totalPages, $this->pNum + 1), $this->tRows, $this->query_strings, $txt_par);
    	 } 	
    	 else
    	 {	
    	 	$view_res=sprintf("%s", $txt_par);
    	 }
		break; }
    case 4:
    { 	if ($this->pNum < $this->totalPages)
    	 { 
      		$view_res=sprintf("<a href=\"%s?pageNum=%d&totalRows=%d%s\">%s</a>", $this->nPage, $this->totalPages, $this->tRows, $this->query_strings, $txt_par);
    	 } 	
    	 else
    	 {	
    	 	$view_res=sprintf("%s", $txt_par);
    	 }
		break; }
    }
  	return $view_res;
	//return $this->currentPage;
  }
 function setmaxRows($maxRows)
  {
	$this->mRows=$maxRows;
  }
 // добавление после запроса сколько всего найдено в запросе
function setValRes($totalRows, $newStart=0, $nameStart="none")
  {
	global $HTTP_GET_VARS, $PHP_SELF;
	$query_st=$HTTP_GET_VARS;
	if(isset($query_st['pageNum']))
  	{
  		$this->pNum=$query_st['pageNum'][0];
  		unset($query_st['pageNum']);
  	}
	else
	{
		$this->pNum=0;
	}
	if(isset($query_st['totalRows']))
  	{
  		$this->tRows=$totalRows;
  		unset($query_st['totalRows']);
  	}
	else
	{
		$this->tRows=$totalRows;
	}
	
	$this->totalPages = ceil($this->tRows / $this->mRows)-1;
	//$this->totalPages = $totalRows;
	while(list($name,$value)=each($query_st))
	{ 
		if($nameStart!=$name) {
			$this->query_strings.="&$name=$value";
		}
		elseif($newStart==0){
		$this->query_strings.="&$name=$value";
		}
		//$this->query_strings.="&$name=$value";
		
	}	
  	/*if (isset($HTTP_GET_VARS['pageNum_info']))
  	 {
  		$pageNum_info = $HTTP_GET_VARS['pageNum_info'];
	 }*/
	//$startRow_info = $pageNum * $maxRows;
	if($newStart!=0){
		$this->startRows=$this->pNum * $this->mRows;
	}
	else {
		$this->startRows=$newStart;
	}
	$this->nPage =$PHP_SELF;
  }
}
?>