<?php 
	session_start();
?>
<html>
	<head>
		<title>login</title>
	</head>
	<body bgcolor="lightgrey">
		<?php
			
			function checkIndex($val)//controllo per vedere se lutente ha cercato qualcosa 
			{
					if(isset($val) && !empty(trim($val))){
						return trim($val);
					}else{
						return false;
					}
			}
			
			
			$n=checkIndex($_REQUEST['p']);
			$v=checkIndex($_REQUEST['v']);
			
			$f_name='Credenziali.json';
			$txtJSON='';
			
			if(is_file($f_name)){
				$f=fopen($f_name,'r') or die('ERRORE');
				$txtJSON=fread($f,filesize($f_name));
				fclose($f);
				$check=1;
			}
			$Credenziali=json_decode($txtJSON,true);
			
			
			if(file_exists("movieList.json")){
					$json=file_get_contents('movieList.json');
					}
			$moviesList=json_decode($json,true);
			
			$c='';
		
		
			//$i=count($Credenziali['Utenti'][$_SESSION["user"]]['Films']);
			
			//var_dump($Credenziali['Utenti'][$_SESSION["user"]]['Films'][1]);
			//var_dump($moviesList[$n]['title']['original']);
			
			if(isset($Credenziali['Utenti'][$_SESSION["user"]]['Films'])){	
				foreach($Credenziali['Utenti'][$_SESSION["user"]]['Films'] as $film => $indice){
						if($indice == $moviesList[$n]['title']['original'])
							echo $indice;
							$c=true;
					}
			}else{
				//echo 000;
				if($v == 0 ){
							$moviesList[$n]['like']++;
							$Credenziali['Utenti'][$_SESSION["user"]]['Films'][$moviesList[$n]['title']['original']]['like']=true;
						}
						else{
							$moviesList[$n]['dislike']++;
							$Credenziali['Utenti'][$_SESSION["user"]]['Films'][$moviesList[$n]['title']['original']]['like']=false;						
						}
			}
			
				if($c == false){
					//echo $j.' '.$i;
					//if($j == $i-1){ 
						//$Credenziali['Utenti'][$_SESSION["user"]]['Films'][]=$moviesList[$n]['title']['original']['like'];
						//echo 'kill me';
						if($v == 0 ){
							echo 'like';
							$moviesList[$n]['like']++;
							$Credenziali['Utenti'][$_SESSION["user"]]['Films'][$moviesList[$n]['title']['original']]['like']=true;
						}
						else{
							echo 'dislike';
							$moviesList[$n]['dislike']++;
							$Credenziali['Utenti'][$_SESSION["user"]]['Films'][$moviesList[$n]['title']['original']]['like']=false;						
						}
				}else{
					if($c == true){
						if($v == 0 && $Credenziali['Utenti'][$_SESSION["user"]]['Films'][$moviesList[$n]['title']['original']]['like'] != true){
							//echo 'kill me1';
							$moviesList[$n]['like']++;
							$moviesList[$n]['dislike']--;
							$Credenziali['Utenti'][$_SESSION["user"]]['Films'][$moviesList[$n]['title']['original']]['like']=true;
						}
						else{if($v == 1 && $Credenziali['Utenti'][$_SESSION["user"]]['Films'][$moviesList[$n]['title']['original']]['like'] == true){
							//echo 'kill me2';
							$moviesList[$n]['dislike']++;
							$moviesList[$n]['like']--;
							$Credenziali['Utenti'][$_SESSION["user"]]['Films'][$moviesList[$n]['title']['original']]['like']=false;	}					
						}
					}
				}
				
			/*	}else{
						if($v == 0 && $Credenziali['Utenti'][$_SESSION["user"]]['Films'][$moviesList[$n]['title']['original']] == 0){
							$Credenziali['Utenti'][$_SESSION["user"]]['Films'][$moviesList[$n]['title']['original']]=1;
							$moviesList[$n]['like']++;
							$moviesList[$n]['dislike']--;
						}else{
							$Credenziali['Utenti'][$_SESSION["user"]]['Films'][$moviesList[$n]['title']['original']]=0;
							$moviesList[$n]['dislike']++;
							$moviesList[$n]['like']--;
						}
				}*/
			
					
					
			$f=fopen($f_name,'w') or die('ERRORE');
			fwrite($f,json_encode($Credenziali,JSON_PRETTY_PRINT));
			fclose($f);
			
			
			$f=fopen("movieList.json","w") or die('ERRORE');
			fwrite($f,json_encode($moviesList,JSON_PRETTY_PRINT));
			fclose($f);
					
					
			header('location: singleFilm.php?p='.$n);
		?>
	</body>
</html>