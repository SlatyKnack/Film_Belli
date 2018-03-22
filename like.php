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
			

			///Credenziali
			if(file_exists("Credenziali.json")){
				$txtJSON=file_get_contents('Credenziali.json');
			}
			$Credenziali=json_decode($txtJSON,true);
			
			
			///
			if(file_exists("movieList.json")){
					$json=file_get_contents('movieList.json');
			}
			$moviesList=json_decode($json,true);
			
			
			$c='';
	
			
			if(isset($Credenziali['Utenti'][$_SESSION["user"]]['Films'][$moviesList[$n]['title']['original']])){	
						$c=true;
						
			}else{
				//echo 000;
				if($v == 0 ){
							echo '+';
							$moviesList[$n]['like']++;
							$Credenziali['Utenti'][$_SESSION["user"]]['Films'][$moviesList[$n]['title']['original']]['like']=true;
						}
						else{
							echo '-';
							$moviesList[$n]['dislike']++;
							$Credenziali['Utenti'][$_SESSION["user"]]['Films'][$moviesList[$n]['title']['original']]['like']=false;						
						}
			}
				
					if($c == true){
						if($v == 0 && $Credenziali['Utenti'][$_SESSION["user"]]['Films'][$moviesList[$n]['title']['original']]['like'] != true){
							echo 'kill me1';
							$moviesList[$n]['like']++;
							$moviesList[$n]['dislike']--;
							$Credenziali['Utenti'][$_SESSION["user"]]['Films'][$moviesList[$n]['title']['original']]['like']=true;
						}
						else{if($v == 1 && $Credenziali['Utenti'][$_SESSION["user"]]['Films'][$moviesList[$n]['title']['original']]['like'] == true){
							echo 'kill me2';
							$moviesList[$n]['dislike']++;
							$moviesList[$n]['like']--;
							$Credenziali['Utenti'][$_SESSION["user"]]['Films'][$moviesList[$n]['title']['original']]['like']=false;	}					
						}
					}
				
				
			
					
					
			$f=fopen("Credenziali.json",'w') or die('ERRORE');
			fwrite($f,json_encode($Credenziali,JSON_PRETTY_PRINT));
			fclose($f);
			
			
			$f=fopen("movieList.json","w") or die('ERRORE');
			fwrite($f,json_encode($moviesList,JSON_PRETTY_PRINT));
			fclose($f);
					
					
			header('location: singleFilm.php?p='.$n);
		?>
	</body>
</html>