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
			
			$passWord=checkParameters('Pass');
			$userName=checkParameters('User');
			$f=0;
			
			$txtJSON=file_get_contents('Credenziali.json');
			$Credenziali=json_decode($txtJSON,true);
			
			foreach($Credenziali as $lista => $vet){
				foreach($vet as $user => $nick){
					
					if($userName!=false && $passWord!=false && $nick['Username'] == $userName && $nick['Passowrd'] == hash('sha512', $passWord)){
						$f=1;
					}                    
				}
			}

		
			if($f == 1) {
				echo '<p>Bentornato <b>'.$Credenziali['Utenti'][$userName]['Nome'].' '.$Credenziali['Utenti'][$userName]['Cognome'].'</b> siamo lieti di rivederti</p>';
					$_SESSION["logged"]=true;
					$_SESSION["user"]=$Credenziali['Utenti'][$userName]['Username'];
					?>
						<p>torna alla <a href='index.php?'>home</a>!</p>
					<?php
			} else {
				header('location: Entra.php?Error=Utente+sconosciuto+o+Password+errata');
				die;
			}	
						
		?>
	</body>
</html>








