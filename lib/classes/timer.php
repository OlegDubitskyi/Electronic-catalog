<?
class timer {
	var $start_time = 0;
	var $stop_time = 0;
	var $elapsed_time = 0;

    function start(){
		$this->start_time = $this->getmicrotime();
	}
	function stop(){
		$this->stop_time = $this->getmicrotime();
		if (function_exists('bcsub')){
        	$this->elapsed_time = bcsub($this->stop_time,$this->start_time,6);
		}else{
        	$this->elapsed_time = $this->stop_time-$this->start_time;
        }
		return $this->elapsed_time;
	}
	function getmicrotime(){
		list($usec, $sec) = explode(" ",microtime());
		return ((float)$usec + (float)$sec);
	}
}
//Example
/*
$timer = new timer();
$b=array(3,5,1,0,7,10,7,12,-6, 6.7, 1.2, 0.4,121212,56,234,34,34,34,4343,3434,343434,343434,343434,343343,3,5,6);
$c=array(3,5,1,0,7,10,7,12,-6, 6.7, 1.2, 0.4,121212,56,234,34,34,34,4343,3434,343434,343434,343434,343343,3,5,6);
$timer->start();
sort($b);
$timer->stop();
echo "Sort: ";
echo   $timer->elapsed_time;
*/
?>
