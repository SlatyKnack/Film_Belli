<?php 
	session_start();
	
	if(!isset($_SESSION["logged"])){	///viene settato solo all'inizio a false 
		$_SESSION["logged"]=false;		///Cambierà a true nel momento in cui l'utente avrà fatto il login
		$_SESSION["user"]='';
	}
	/*
	if(!$_SESSION["logged"]){
		echo "kill me";
	}
	*/
?>
<html>
	<head >
		<title>Cerca Film</title>
		
		<style>
			p{
				margin-top: 10%;
				margin-left: 26%;
			}
		
		</style>
	</head>
	<body bgcolor="lightgrey">
			
			<p><img src="Immagini/Film.png"></p>
				
			<form method="GET" action="elabora.php" align="center">
			
				<input type="text" name="titolo" placeholder="cerca film"  align="center" />
				
				<input type="submit" value="Search" />
			
			</form>
			
			
			<div style="position: absolute;  right: 20px; top: 15px;">
				
				<b><a href='Iscrizione.php'>Sign in!</a></b><br/>
				<b><a href='Entra.php'>Log in!</a></b>
			</div>	
			
	</body>

</html>