<?
class Pricer{
	function __construct($db,$smarty,$uploaddir){
		$this->db = $db;
		$this->smarty = $smarty;
		$this->uploaddir = $uploaddir;
		$this->column_verification = true;# флаг проверки на наличие всех обязательных полей, если он false - значит проверка не прошла
		$this->doubling_cols = array();
		$this->show_rename_categories=true;
	}
	function upload_price(){
		if($_FILES['userfile']['tmp_name']){
			//print $this->uploaddir;
			if(!is_dir($this->uploaddir)){
				mkdir($this->uploaddir);
	    	}
//print "id:".$_SESSION['seller_id']."<br>";
	    	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $this->uploaddir ."/temp".$_SESSION['seller_id'].".csv")) {
			//print "UPLOADED<br>";
			}else {
			    print "There some errors with uploading file!";
			}
		}	
	}
	function price_verification($column,$rename_categories=''){
//print_r($rename_categories);

		/**
	 	* Здесь мы будем определять логику проверки прайса на соответствие нашим нормам
	 	* Необходимо:
	 	* - проверить соответствие категорий определенных пользователем, категориям 
	 	* нижнего уровня(не имеющих дочерних элементов)
	 	* - проверка на отсутствие дублирования категорий в селектах
	 	* - в случае обнаружения одного из указанных пунктов - вывести статусное сообщение
	 	* 
	 	* проверка на неповторяемость колонок.
	 	* Условия 
	 	*/

		$this->error_message = '';
		$this->dublicate_columns($column);
		$this->dublicate_hard_columns($column);
		
		############################################################################# 
		# Получаем массив обязательных колонок которые не были заполнены
		# Эта же функция устанавливает переменную $this->column_verification
		#############################################################################		
		$this->absent_column = $this->obligatory_cols($column);
#############################################################################
# а вот здесь мы проверим наши категории на соответствие 
# категориям 3-го(нижнего) уровня
#############################################################################		
		#####################################################################		
		# получаем наш прайс
		#####################################################################
		$final_price = $this->price_parser();
#############################################################################		
# формируем наш массив(связываем номера колонок с типом) для импорта в базу
#############################################################################		
		for($i=0;$i<count($final_price);$i++){
			for($j=1;$j<=count($column);$j++){
				if($column[$j]!='-1'){
					$temp_price[$i][$column[$j]] = $final_price[$i][($j-1)];
				}
			}
		}
#############################################################################							
# теперь получаем список категорий нижнего уровня
#############################################################################		
		$seller = new load_sellers($this->db,$this->smarty);
		$bot_level_cat = $seller->get_all_bottom_level_categories();

#############################################################################
# теперь начинаем сравнивать:
# Если, массив $rename_categories инициализирован, то значит какие то операции
# с ним уже производились и мы проверяем какие из категорий не были заполнены
#############################################################################
		$cat_verification = true;# Инициализируем переменную, указывающую на то, что все ОК
		
		if(isset($rename_categories)){
			if( count(array_keys($rename_categories,'-1'))>0 ){
				$cat_verification = false;
			}else{
				$cat_verification = true;
			}	
#############################################################################
# Если, массив не инициализирован, значит мы его инициализируем
#############################################################################
		}else{
			for($i=0;$i<count($temp_price);$i++){
				if(!array_keys($bot_level_cat,$temp_price[$i]['cat'])){
					$rename_categories[$temp_price[$i]['cat']] ='-1';
					#$rename_categories[htmlspecialchars($temp_price[$i]['cat'], ENT_QUOTES)] ='-1';
					$cat_verification = false;					
				}					
			}
		}
		//print_r($rename_categories);
		//print "cat_verification:$cat_verification<br>";
#############################################################################		
# Показывать список категорий для изменения или нет,
# Делается это для того, что бы не показывать список категорий если у нас 
# не выбрана колонка "Категория" или она продублирована и в качестве исходных
# данных могет быть использована колонка названная так по ошибке
#############################################################################
		if($this->show_rename_categories){
			$this->smarty->assign("rename_categories",$rename_categories);
		}
		
		$this->smarty->assign("bot_level_cat",$bot_level_cat);

		if(array_search('-1',$column)){
			$this->warning = 'Не всем колонкам прайса присвоены типы, если вы не выберете тип, они не будут импортированы в базу, хотите ли вы продолжить?';
		}
#############################################################################
# Мы имеем обязательные поля в прайсе:
# - Категория товара
# - Производитель...Хотя этот пункт под вопросом для некоторых категорий! 
# - Название товара
# - Цена товара(в гривнах или в у.е)
# Надо организовать проверку по наличию этих полей
#############################################################################
		//$this->column_verification = true;# флаг проверки на наличие всех обязательных полей, если он false - значит проверка не прошла
		
//		############################################################################# 
//		# Получаем массив обязательных колонок которые не были заполнены
//		# Эта же функция устанавливает переменную $this->column_verification
//		#############################################################################		
//		$this->absent_column = $this->obligatory_cols($column);

###########################	
		
		if(!$this->column_verification){#если проверка не прошла, вывести сообщение в шаблон
			$this->smarty->assign("is_absent_err",1);
			$this->smarty->assign("absent_column",$this->absent_column);#передаем в шаблон массив отсутствующих обязательных полей
		}
		if($this->error_message!=''){
			$this->smarty->assign("multiple_column_error",1);
			$this->smarty->assign("err_mes",$this->error_message);
		}
		/**
	 	* Делаем сохранение выбранных типов колонок
	 	* на входе у нас массив $columns[<номер колонки>] = '<название колонки>'
	 	* Его же мы и передаем обратно в шаблон
	 	*/		
		$this->smarty->assign("column",$column);			
		if($this->column_verification and $this->error_message=='' and $cat_verification){
			return 1;#делаем импорт
		}else{
			return 0;#продолжаем проверять
		}
	}
	function price_parser(){
		//Хорошая штука сессия
		$separator = $_SESSION['column_separator'];
		$this->static_line = '';
		$this->line_integrity = 0;
		#$this->fcontents = file ($this->uploaddir."\\temp".$_SESSION['seller_id'].".csv");
		$this->fcontents = file ($this->uploaddir."/temp".$_SESSION['seller_id'].".csv");
		$this->final_price = array();#массив в котором будет содержаться прайс разбитый по колонкам
		#внешний цикл по всему файлу прайса	
		while (list ($this->line_num, $this->line) = each ($this->fcontents)) {
			//print "line:".$this->line."<br>";
			$this->price = array();
			//Тестовые строки
			//$line = 'Мобильные телефоны, Nokia, 1600 black,"test, one, more test",134';
			//$line = 'Мобильные телефоны; Nokia; 1600 black;"test; one; more test";134';
			//$line = '"test, one, more test",134,Samsung,E530';
			//$line = '"test; one; more test";134;Samsung;E530';
			//$line = 'Мобильные телефоны, Nokia, 1600 black,134';
			//$line = 'Мобильные телефоны; Nokia; 1600 black;134';
			//$line = '145';
			
			setlocale(LC_ALL, 'ru_RU');
			$reg_exp = "/^\"\w/";
			if(preg_match_all($reg_exp, $this->line, $regs1)){
				//print_r($regs1)."<br>";
				foreach ($regs1 as $key=>$val){
					for($i=0;$i<count($val);$i++){
						$this->line_integrity ++;						
					}
				}
				//print "<br>line_integrity_inside:$this->line_integrity<br>";				
			}
			
			$reg_exp = "/$separator\"[^$separator]/";
			if(preg_match_all($reg_exp, $this->line, $regs2)){
				//print_r($regs2)."<br>";
				foreach ($regs2 as $key=>$val){
					for($i=0;$i<count($val);$i++){
						$this->line_integrity ++;						
					}
				}
				//print "<br>line_integrity_inside:$this->line_integrity<br>";				
			}
			$reg_exp1 = "/[^$separator\"]{0,1}\"$separator/";
//			$reg_exp1 = "/[^$separator\"]{1}\"$separator/";
			$reg_exp2 = "/\w\"{3}$separator/";
//			$reg_exp3 = "/^\"$separator/";						
			if(preg_match_all($reg_exp1, $this->line, $regs3)){
				//print_r($regs3)."<br>";
				foreach ($regs3 as $key=>$val){
					for($i=0;$i<count($val);$i++){
						$this->line_integrity --;	
					}
				}
				//print "<br>line_integrity_inside:$this->line_integrity<br>";				
			}elseif (preg_match_all($reg_exp2, $this->line, $regs3)){
				//print_r($regs3)."<br>";
				foreach ($regs3 as $key=>$val){
					for($i=0;$i<count($val);$i++){
						$this->line_integrity --;	
					}
				}				
			}
/*
			elseif (preg_match_all($reg_exp3, $this->line, $regs3)){
				print_r($regs3)."<br>";
				foreach ($regs3 as $key=>$val){
					for($i=0;$i<count($val);$i++){
						$this->line_integrity --;	
					}
				}				
			}			
*/			
			
			
			$this->static_line .= $this->line;
			//print "----<br>";
			//print "line_integrity:$this->line_integrity<br><br>";
			if($this->line_integrity>0){
				continue;	
			}
			$this->line = $this->static_line;			
			
			
			while($this->line){
			//print "line:".$this->line."<br>";
/*				
				print "<br>******************************<br>";
				print "line_integrity:$this->line_integrity<br>";
				print "line_x:".$this->line."<br>";				
				print "******************************<br>";				
				print "last_line:".$this->line."<br>";
*/				
				# Проверка - содержит ли строка элементы в кавычках. 
				# Проверка на завершающую связку: кавычка+разделитель
				$this->reg_exp = '\"'.$separator;
				if(ereg ($this->reg_exp, $this->line, $this->regs)){
					#Делаем деление строки на 2 части: до появления кавычки+разделителя и после		
					$this->reg_exp = '/"'.$separator.'/';
					$this->temp = preg_split($this->reg_exp,$this->line,2,PREG_SPLIT_NO_EMPTY);
//print "<br>temp:<br>";
//print_r($this->temp);
					/**
	 				* Отрезаем первую половину строки, для того, что бы построить цикл только при условии,
	 				* что строка $line не пустая
	 				*/
					$this->reg_exp = '"'.$separator;
					$this->line = str_replace($this->temp[0].$this->reg_exp,'',$this->line);
//print "<br>------<br>";
//print "line_after_replace:".$this->line."<br><br>";
					#Ищем, есть ли в первой части начало(кавычка+разделитель) колонки заключенной в кавычки
					$this->reg_exp = $separator.'"';
					if(ereg ($this->reg_exp, $this->temp[0])){
						$this->reg_exp = '/'.$separator.'"/';
						$this->temp2 = preg_split($this->reg_exp,$this->temp[0],2,PREG_SPLIT_NO_EMPTY);		
//print "<br>temp2:<br>";
//print_r($this->temp2);
						#начинаем делить часть строки до начальной группы(кавычка+разделитель) <разделителю>
						$this->temp3 = split($separator,$this->temp2[0]);
//print "<br>temp3:<br>";
//print_r($this->temp3);
						/**
			 			* Удаляем лишние пробелы из содержимого колонок и записываем в конечный массив 
			 			* колонок
			 			*/
						foreach ($this->temp3 as $this->k=>$this->v) {
							array_push($this->price,trim($this->v));
						}
						#Теперь добавляем в конечный массив вторую часть $temp2
						$this->temp2[1] = preg_replace('/\"\"/','"',$this->temp2[1]);
						array_push($this->price,$this->temp2[1]);
		 				#Прибираем за собой мусор
						$this->temp2 = array();
						$this->temp3 = array();		
						#Если мы попадаем сюда, то это означает, что первая же колонка окружена кавычками	
					}else{
//print "<br>------:<br>";
//print $this->temp[0];
//print "<br>------:<br>";
						#$this->tmp_var = str_replace('"','',$this->temp[0]);
						$this->tmp_var = preg_replace('/^\"{1}/','',$this->temp[0]);
						$this->tmp_var = preg_replace('/\"\"/','"',$this->tmp_var);
//print $this->tmp_var."<br>";
						array_push($this->price,trim($this->tmp_var));
					}
					/**
					* Если мы здесь, значит значит кавычек в строке нет и всю строку надо разделять по 
					* <разделителю>
					*/
				}else{
					$this->temp4 = split($separator,$this->line);		
					
	 				#и сохраняем в конечном массиве
	 				foreach ($this->temp4 as $this->k=>$this->v) {
						array_push($this->price,trim($this->v));
					}
					$this->line = '';
	 				#Обнуляем строку и по-сути заканчиваем обработку строки
				}
				
				$this->static_line = '';
				$this->line_integrity = 0;
			}
#############################################################################
# Засовываем обработанную строку в массив
#############################################################################
			array_push($this->final_price,$this->price);		
		}	
//print "<br><br>";
		//print_r($this->final_price);		
		return $this->final_price;
		//print_r($final_price);		
	}
	function import_price($column, $rename_categories){
		$seller_id = $_SESSION['seller_id'];
		$final_price = $this->price_parser();
		
		$goods = new Goods($this->db);

#############################################################################		
# Перед инсертом делаем удаление всех товаров данного продавца
#############################################################################
		$num_deleted_rows = $this->delete_seller_price($seller_id);
		
#############################################################################		
# формируем наш массив(связываем номера колонок с типом) для импорта в базу
#############################################################################
		for($i=0;$i<count($final_price);$i++){
			for($j=1;$j<=count($column);$j++){
				if($column[$j]!='-1'){
					$this->temp_price[$i][$column[$j]] = $final_price[$i][($j-1)];
				}
			}
		}
		$inserted_rows_counter = 0;
#############################################################################		
# теперь  мне нужен объект строки в базе данных		
#############################################################################
		foreach ($this->temp_price as $val){
#############################################################################
# Обнуляем id проивзодителя и категории при каждом проходе по массиву
#############################################################################
			$vendor_id = null;
			$cat_id = null;
			
#############################################################################			
# Пункт 1 - поиск cat_id для вставки товара в базу
#############################################################################

#############################################################################
# Если искомая категория содержится в массиве замены(rename_categories), то нам не надо 
# искать ид в базе.
# Мы берем его из массива
#############################################################################
			//print "val:".$val['cat']."<br>";
			//print_r($rename_categories);

			if(array_key_exists($val['cat'],$rename_categories)){
				$cat_id = $rename_categories[$val['cat']];
			}else{
				$sql = "SELECT cat_id FROM catalog WHERE cat_name='".$val['cat']."'";
				//print "$sql<br>";
				$result = $this->db->query($sql);
				while ($row = $result->fetchrow(DB_FETCHMODE_ASSOC)){
					$cat_id = $row['cat_id'];
				}							
			}
				
#############################################################			
# Проверка в таблице vendor_transfer, это необходимо для отбраковки неправильно 
# написанных производителей, не знаю насколько востребованной будет эта функция, но все же
# реализуем ее
# Тут же идет проверка на то какой тип колонки был выбран:
# - "Производитель" 
# - "Производитель + товар"
# Если "Производитель + товар" - то делим строку на 2 части 
#############################################################
			if(array_key_exists('vendor',$val)){
				$vendor_name = htmlspecialchars($val['vendor'], ENT_QUOTES);
				if($val['gname']){$gname = htmlspecialchars($val['gname'], ENT_QUOTES);}
			}elseif(array_key_exists('vg',$val)){
				$temp = split(' ',$val['vg']);
				$vendor_name = htmlspecialchars($temp[0], ENT_QUOTES);
				$gname = htmlspecialchars($temp[1], ENT_QUOTES);
			}

			$sql = "SELECT vendor_id FROM vendor_transfer WHERE transfer_name='$vendor_name'";
			//print $sql;
			$result = $this->db->query($sql) or die ("Error in SQL query:$sql");
			//print $sql;
			while ($row = $result->fetchrow(DB_FETCHMODE_ASSOC)){
				$vendor_id = $row['vendor_id'];
			}
			if($vendor_id){
				
			}else{
				$vendor = new Vendor($this->db);
				$vendor_id = $vendor->is_exist($vendor_name, $cat_id);
#############################################################
# Пункт 2 - проверка на существование в базе производителя, если нет - создать и получить id
# Если производителя нет в базе, то мы его создаем и получаем его id
#############################################################
				if(!$vendor_id){
					$sql = "INSERT INTO vendors(cat_id, vendor_name) VALUES($cat_id, '$vendor_name')";
					$result = $this->db->query($sql);				
					if(!$result)print "Error in SQL query:$sql";
					$vendor_id = mysql_insert_id();
				}				
			}
#############################################################
# Пункт 3 - запись товара в базу
#############################################################
			//if($val['cat']){$cat = $val['cat'];}else{$cat = '';}
			//if($val['vendor']){$vendor = $val['vendor'];}else{$vendor = '';}
#############################################################
/**
 * Обработка цены	
 * Сначала получаем курс - если его нет у компании, то берем курс по умолчанию из таблицы curs
 * 
 * Проверяем поля(price_ua, price_usd, price_opt_ua, price_opt_usd) - если одна из цена в паре 
 * равна нулю, то вторую цену умножаем или делим на курс, в зависимости от того грн. или у.е
*/ 
#############################################################
# Получаем курс
#############################################################
			# Проверяем курс компании, если его нет - получаем дефолтный
			$seller = new Seller($this->db);
			$curs = $seller->get_seller_curs();
			if(!$curs){
				$curs = $seller->get_def_curs();
			}
#############################################################
			if($val['price_ua']){
				$price_ua = $val['price_ua'];
				$price_ua = preg_replace('/[^\.,\d]/','',$price_ua);
				$price_ua = str_replace(',','.', $price_ua);
			}else{
				$price_ua = 0;
			}			
			if($val['price_usd']){
				$price_usd = $val['price_usd'];
				$price_usd = preg_replace('/[^\.,\d]/','',$price_usd);				
				$price_usd = str_replace(',','.', $price_usd);				
			}else{
				$price_usd = 0;
			}
			if($val['price_opt_ua']){
				$price_opt_ua = $val['price_opt_ua'];
				$price_opt_ua = preg_replace('/[^\.,\d]/','',$price_opt_ua);
				$price_opt_ua = str_replace(',','.', $price_opt_ua);								
			}else{
				$price_opt_ua = 0;
			}
			if($val['price_opt_usd']){
				$price_opt_usd = $val['price_opt_usd'];
				$price_opt_usd = preg_replace('/[^\.,\d]/','',$price_opt_usd);				
				$price_opt_usd = str_replace(',','.', $price_opt_usd);
			}else{
				$price_opt_usd = 0;
			}
# Вуаля :) ёпт ёпт ёпт			
#############################################################
# Теперь у нас есть и курс и цены, начинаем проверку и заполняем нулевые позиции
#############################################################
			if($price_ua==0 and $price_usd!=0){
				$price_ua = $price_usd*$curs;
			}elseif($price_ua!=0 and $price_usd==0){
				$price_usd = $price_ua/$curs;
			}

			if($price_opt_ua==0 and $price_opt_usd!=0){
				$price_opt_ua = $price_opt_usd*$curs;
			}elseif($price_opt_ua!=0 and $price_opt_usd==0){
				$price_opt_usd = $price_opt_ua/$curs;
			}

#############################################################
			//print "desc:".$val['desc']."<br><br>";
			if($val['desc']){$desc = htmlspecialchars($val['desc'], ENT_QUOTES);}else{$desc = '';}
			//print "desc_after:".$desc."<br><br>";			
			if($val['guarantee']){$guarantee = preg_replace('/\D*/','',$val['guarantee']);}else{$guarantee = '';}
			if($val['url']){$url = $val['url'];}else{$url = '';}
			if($val['presence']){$presence = htmlspecialchars($val['presence'], ENT_QUOTES);}else{$presence = '';}
#############################################################			
# Проверка на дублирование строк по cat_id,seller_id,name - не знаю зачем она мне нужна
# Поэтому пока ее закоментирую
#############################################################									
//			$sql = "SELECT * FROM goods WHERE cat_id=$cat_id AND name='$gname' AND seller_id=$seller_id AND date_last_mod=CURDATE()";
//			$num_dublicated_rows = $this->count_price_rows($sql);
//			if(!$num_dublicated_rows){
			# Блокируем добавление позиций с пустыми ценами!
			if($price_ua!=0 or $price_usd!=0){
				$goods->add_new_position($cat_id, $vendor_id, $seller_id, $gname, $desc, $price_usd, $price_ua, $price_opt_usd, $price_opt_ua, $guarantee, $url, $presence);
				$inserted_rows_counter++;
			}				
//			}else{
//				print "<br>Попался дубликат!!!";
//			}
		}
		$this->smarty->assign("num_inserted_rows", $inserted_rows_counter);
		$this->smarty->assign("num_deleted_rows", $num_deleted_rows);	
		
#############################################################			
# А вот теперь временный файл можно удалить
#############################################################			
unlink($this->uploaddir ."/temp".$_SESSION['seller_id'].".csv");
		
	}
	/**
	 * Функция подсчета кол-ва всех позиций для определенного продавца
	 */
	function count_price_rows($sql){
		$result = mysql_query($sql);
		$num_rows = mysql_num_rows($result);
		return $num_rows;
	}
	function delete_seller_price($seller_id){

		#$sql = "DELETE FROM goods WHERE seller_id=$seller_id AND date_last_mod < CURDATE()";				
		$sql = "DELETE FROM goods WHERE seller_id=$seller_id";
		$res = mysql_query($sql);			
		if(!$res)print "Error in SQL query:$sql";		
		#Возвращаем кол-во удаленных строк
		$num_rows = mysql_affected_rows();
		if(!$num_rows){$num_rows=0;}
		return $num_rows;
	}
	/**
	 * Проверка на дублирование слодных колонок, когда пересекаются такие вещи как 
	 * "Категория + производитель + товар" и "Категория" и т.д
	 *
	 * @param unknown_type $column
	 */
	function dublicate_hard_columns($column){
		
		#catvg
		if( count(array_keys($column,'catvg')) and count(array_keys($column,'gname')) ){
			$this->error_message .= "Дублирование столбцов \"Категория + Производитель + товар\" и \"Товар\"<br>";
		}
		if( count(array_keys($column,'catvg')) and count(array_keys($column,'vendor')) ){
			$this->error_message .= "Дублирование столбцов \"Категория + Производитель + товар\" и \"Производитель\"<br>";
		}
		if( count(array_keys($column,'cat')) and count(array_keys($column,'catvg')) ){
			$this->error_message .= "Дублирование столбцов \"Категория + Производитель + товар\" и \"Категория\"<br>";		
		}
		#vg#############################
		if( count(array_keys($column,'catvg')) and count(array_keys($column,'vg')) ){
			$this->error_message .= "Дублирование столбцов \"Производитель + товар\" и \"Категория + Производитель + товар\"<br>";	
		}
		if( count(array_keys($column,'vendor')) and count(array_keys($column,'vg')) ){
			$this->error_message .= "Дублирование столбцов \"Производитель + товар\" и \"Производитель\"<br>";
		}
		if( count(array_keys($column,'gname')) and count(array_keys($column,'vg')) ){
			$this->error_message .= "Дублирование столбцов \"Производитель + товар\" и \"Производитель\"<br>";
		}		
		return $this->error_message;
	}
	/**
	 * Простая проверка на повторение одной и той же колонки несколько раз
	 *
	 */
	function dublicate_columns($column){
//		for($this->i=1;$this->i<=13;$this->i++){
//			if($column[$this->i]=='cat'){
//				for($this->j=$this->i+1;$this->j<13;$this->j++){
//					if($column[$this->j]=='catvg'){
//						$this->error_message .= "Дублирование столбцов \"Категория\" и \"Категория + Производитель + товар\" ";
//					}
//				}
//			}elseif ($column[$this->i]=='catvg'){
//				for($this->j=$this->i+1;$this->j<=13;$this->j++){
//					if($column[$this->j]=='vg'){
//						$this->error_message .= "Дублирование столбцов \"Категория + Производитель + товар\" и \"Производитель + товар\"<br>";
//					}elseif ($column[$this->j]=='vendor'){
//						$this->error_message .= "Дублирование столбцов \"Категория + Производитель + товар\" и \"Производитель\"<br>";
//					}elseif ($column[$this->j]=='gname'){
//						$this->error_message .= "Дублирование столбцов \"Категория + Производитель + товар\" и \"Товар\"<br>";
//					}
//				}			
//			}elseif ($column[$this->i]=='vendor'){
//				for($this->j=$this->i+1;$this->j<=13;$this->j++){
//					if($column[$this->j]=='vg'){
//						$this->error_message .= "Дублирование столбцов \"Производитель\" и \"Производитель + товар\"<br>";
//					}elseif ($column[$this->j]=='catvg'){
//						$this->error_message .= "Дублирование столбцов \"Производитель\" и \"Категория + Производитель + товар\"<br>";
//					}			
//				}
//			}
//		}
		#Делаем проверку на дублирование строк при сохранении
		if( count(array_keys($column,'vendor')) >1){
			$this->error_message .= "Дублирование столбца \"Производитель\"<br>";
		}
		if( count(array_keys($column,'cat')) >1){
			$this->show_rename_categories = false;
			$this->error_message .= "Дублирование столбца \"Категория\"<br>";
		}
		if( count(array_keys($column,'catvg')) >1){
			$this->error_message .= "Дублирование столбца \"Кат.+Произв.+товар\"<br>";
		}
		if( count(array_keys($column,'vg')) >1){
			$this->error_message .= "Дублирование столбца \"Произв.+товар\"<br>";
		}		
		if( count(array_keys($column,'gname')) >1){
			$this->error_message .= "Дублирование столбца \"Товар\"<br>";
		}		
		if( count(array_keys($column,'price_ua')) >1){
			$this->error_message .= "Дублирование столбца \"Цена(грн)\"<br>";
		}
		if( count(array_keys($column,'price_usd')) >1){
			$this->error_message .= "Дублирование столбца \"Цена(у.е)\"<br>";
		}
		if( count(array_keys($column,'price_opt_ua')) >1){
			$this->error_message .= "Дублирование столбца \"Цена опт(грн)\"<br>";
		}
		if( count(array_keys($column,'price_opt_usd')) >1){
			$this->error_message .= "Дублирование столбца \"Цена опт(у.е)\"<br>";
		}
		if( count(array_keys($column,'desc')) >1){
			$this->error_message .= "Дублирование столбца \"Описание\"<br>";
		}
		if( count(array_keys($column,'guarantee')) >1){
			$this->error_message .= "Дублирование столбца \"Гарантия\"<br>";
		}												
		if( count(array_keys($column,'url')) >1){
			$this->error_message .= "Дублирование столбца \"URL\"<br>";
		}
		if( count(array_keys($column,'presence')) >1){
			$this->error_message .= "Дублирование столбца \"Наличие\"<br>";
		}		
		return $this->error_message;
	}
	
	function obligatory_cols($column){
		if(array_search('cat',$column) or array_search('catvg',$column)){	

		}else {
			$this->column_verification = false;
			$this->show_rename_categories = false;
			$absent_column[]="Категория";
		}
		if(array_search('vendor',$column) or array_search('catvg',$column) or array_search('vg',$column)){

		}else {
			$this->column_verification = false;
			$absent_column[]="Производитель";			
		}
		if(array_search('gname',$column) or array_search('catvg',$column) or array_search('vg',$column)){
			
		}else {
			$this->column_verification = false;
			$absent_column[]="Товар";						
		}
		if(array_search('price_ua',$column) or array_search('price_usd',$column) or array_search('price_opt_ua',$column) or array_search('price_opt_usd',$column)){
			
		}else {
			$this->column_verification = false;
			$absent_column[]="Цена";									
		}		
		return $absent_column;
	}
}

?>