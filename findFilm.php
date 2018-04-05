<?php

	header('Content-Type: application/json');

	function readJSON($fileJSON = 'movieList.json') {
		$f = false;
		$JSONarrayAssoc = false;
		
		if(is_file($fileJSON)) {
			$f = fopen($fileJSON, 'r');
			$JSONarrayAssoc = json_decode(
				fread($f, filesize($fileJSON)),
				true
			);
			fclose($f);
		}
		
		return ($f && $JSONarrayAssoc) ? $JSONarrayAssoc : false;
	}
	
	function checkParameter($var = '') {
		return (
			isset($_REQUEST[$var]) &&
			!empty(trim($_REQUEST[$var]))
			) 
			? trim($_REQUEST[$var])
			: false;
	}
	$i=0;

	//$f= $_REQUEST['f'];
	$f= checkParameter('f');
	
	
	if($f !== false){
		
		$movieList= json_decode(file_get_contents('movieList.json'),true);
		
		//echo var_dump($movieList);
		if($f !== '*'){
			
			$tempFilms= [];
			
			foreach($movieList as $movie){	
						$i++;					
			}
			
			for($j=0; $j < $i; $j++){
					if( strpos(strtolower(trim($movieList[$j]['title']['original'])), strtolower($f)) !== false || 
						strpos(strtolower(trim($movieList[$j]['title']['locale'])), strtolower($f)) !== false ){
						$tempFilms[]= $movieList[$j];
						
					}
			}
			
			
			/*foreach($movieList as $movie){
				if(strlen($movie['title']['original']) >= strlen($f) && substr_count(strtolower($movie['title']['original']), strtolower($f) ) > 0 ){
					$tempFilms[]= $movie;
				}                      
			}*/
			//$f=fopen("gino.json","w");
			//fwrite($f,json_encode($tempFilms,JSON_PRETTY_PRINT));
			
			echo json_encode($tempFilms);
		}
		else {
			echo json_encode($movieList);
		}
		
	}

?>







