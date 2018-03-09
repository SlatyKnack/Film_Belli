<?php 
	session_start();
?>
<html>
	<head>
		<title>login</title>
	</head>
	<body bgcolor="lightgrey">
		<?php
			function checkParameters($stParam = '') {
				if(isset($_REQUEST[$stParam]) && !empty(trim($_REQUEST[$stParam]))){
					return trim($_REQUEST[$stParam]);
				}
				else return false;
			}
			$check=0;
			$name=0;
			$p1=checkParameters('Pass');
			$p2=checkParameters('Pass2');
			$u=checkParameters('User');
			
			//echo"$p1,,$p2";
			if($p1 !== $p2){
				header('location: Iscrizione.php?Error=Passowrd+deve+essere+confermata+correttamente');
				die;
			}
			
			$f_name='Credenziali.json';
			$txtJSON='';
			
			if(is_file($f_name)){
				$f=fopen($f_name,'r') or die('ERRORE');
				$txtJSON=fread($f,filesize($f_name));
				fclose($f);
				$check=1;
			}
			
			$Credenziali=json_decode($txtJSON,true);
			
			foreach($Credenziali['Utenti'] as $us => $Us){
				foreach($Us as $usr){
					if($usr === $u)
						$name= 1;
				}
				
			}
			//$Credenziali['Utenti'][$u]['Username'] === $u
			if($check == 1 && $name == 1){
				header('location: Iscrizione.php?Error=Utente+gia+in+uso');
				die;
			}
				
			
			
			
			$Credenziali['Utenti'][checkParameters('User')]['Nome']= checkParameters('Nome');
			$Credenziali['Utenti'][checkParameters('User')]['Cognome']= checkParameters('Cognome');
			$Credenziali['Utenti'][checkParameters('User')]['Username']= checkParameters('User');
			$Credenziali['Utenti'][checkParameters('User')]['Passowrd']= hash('sha512', $p1);
			$Credenziali['Utenti'][checkParameters('User')]['Films']['nessunFilm']['like']='';
			
					
			$txtJSON=json_encode($Credenziali,JSON_PRETTY_PRINT);	
			
			$f=fopen($f_name,'w') or die('ERRORE');
			fwrite($f,$txtJSON);
			fclose($f);
					
				
					
			echo"Iscrizione completata!!!<br/><p>torna alla <a href='./'>home</a>!</p>";
		?>
	</body>
</html>