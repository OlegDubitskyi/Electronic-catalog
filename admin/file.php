<?
//foreach (glob("*.csv") as $filename) {
//	$suppliers["$filename"]= "";
//    $filename_array[] = $filename;
//    print_r($filename_array);
#������ ����� � ������ fcontents � ���������� �����
$fcontents = file ($uploaddir."\\temp.csv");
$final_price = array();#������ � ������� ����� ����������� ����� �������� �� ��������
//print "separator:$separator<br>";
#������� ���� �� ����� ����� ������	
while (list ($line_num, $line) = each ($fcontents)) {
print $line."<br>";
	include("test.php");
	array_push($final_price,$price);
	
		
		
		

		
		
		
		
//�������� ��� ������ �� ������
//		$num_col = preg_split ("/[".$main_splitter."]+/", trim($line), -1, PREG_SPLIT_NO_EMPTY);
/*
		if(count($num_col)>1){
			$line = str_replace('mobile phone','', strtolower($line));	    		    	
    	}

//���� ���� ��� �� � �������� ��
		if (ereg ('\".*\"', $line, $regs)) {
			$model_name = $regs[0];
//�������� ������� �������� ������ � ��������
//������� �������
			$model_name_str = str_replace('"', '', $regs[0]);
//	    print $model_name_str."<br>";
//�������� �������� ������ �� �� �����
			$temp_array = preg_split ("/[\s]+/", trim($model_name_str), 2, PREG_SPLIT_NO_EMPTY);
			$model_name = $temp_array[0];
			$colors_str = $temp_array[1];
//print "<br>$colors_str";
//��������� �����
			$colors_arr = preg_split ("/[".$color_splitter."]+/", trim($colors_str), -1, PREG_SPLIT_NO_EMPTY);
//print_r($colors_arr);
//		$temp_str = preg_split ("/[\s,;]+/", trim($other_str), -1, PREG_SPLIT_NO_EMPTY);
	//������� ��������� � ��������
//print $line."<br>";
			$other_str = ereg_replace('\".*\"','', $line);
			$temp_str = preg_split ("/[\s,;]+/", trim($other_str), -1, PREG_SPLIT_NO_EMPTY);
			$price =$temp_str[0];
			if(count($colors_arr)>0){
				foreach($colors_arr as $color){
					$final_arr[]=array(	'vendor'		=> ucwords(strtolower(trim($vendor_name))),
                						'model'			=> strtoupper(trim($model_name))." ".trim(strtolower($color)),
                            	        'price'			=> (int)$price,
                                	    'seller'	=> $filename);
            	}
        	}else{
        			$final_arr[]=array(	'vendor'		=> ucwords(strtolower(trim($vendor_name))),
                						'model'			=> strtoupper(trim($model_name)),
                            	        'price'			=> (int)$price,
                                	    'seller'	=> $filename);
        	}
//	    print "<br> price :$price<br>";
    	}else{
################################################################################
###��������� ����� ��� �������� �������
################################################################################
			$columns = preg_split ("/[".$main_splitter."]+/", trim($line), -1, PREG_SPLIT_NO_EMPTY);

//���� ������ ������� �� ������ ��������, �� ��� �������� �������������
			if(count($columns)==1){
				$vendor_line = preg_split ("/[\s,;]+/", trim($line), -1, PREG_SPLIT_NO_EMPTY);
				$vendor_name = $vendor_line[0];
//            print $vendor_name."<br>";
				continue;

        	}elseif(count($columns)>1){
				$temp_array = preg_split ("/[\s]+/", trim($columns[0]), 2, PREG_SPLIT_NO_EMPTY);

				$model_name = $temp_array[0];
				$colors_str = $temp_array[1];
            	$price = $columns[1];
//��������� �����
				$colors_arr = preg_split ("/[".$color_splitter."]+/", trim($colors_str), -1, PREG_SPLIT_NO_EMPTY);
//print_r ($colors_arr);
				if(count($colors_arr)>0){
					foreach($colors_arr as $color){
						$final_arr[]=array(	'vendor'		=> ucwords(strtolower(trim($vendor_name))),
	                						'model'			=> strtoupper(trim($model_name))." ".trim(strtolower($color)),
	                            	        'price'			=> (int)$price,
	                                	    'seller'		=> $filename);
    	        	}
            	}
        	}else{
				continue;
    	    }
    	}
*/
	}	
print_r($final_price);
?>