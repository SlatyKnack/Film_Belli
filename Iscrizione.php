<?php 
	session_start();
?>
<html>
	<head>
		<title>login</title>
	</head>
	<body bgcolor="lightgrey">
		<?php
			if(isset($_REQUEST['Error'])&&!empty(trim($_REQUEST['Error']))) {
				echo '<div class="error">'.$_REQUEST['Error'].'</div>';
				unset($_REQUEST);
			}
			
			function checkParameters($stParam = '') {
				if(isset($_REQUEST[$stParam]) && !empty(trim($_REQUEST[$stParam]))){
					return trim($_REQUEST[$stParam]);
				}
				else return false;
			}
			if(isset($_REQUEST["exit"])) $e=$_REQUEST["exit"];
			
			
			if($_SESSION["logged"] == true){
				
				if(isset($_REQUEST["exit"])){
					if($e == true){
						$_SESSION["logged"]=false;
						$_SESSION["user"]='';
						header('location: Iscrizione.php');
						unset($e);
						
					}
				}else{
					echo 'Already Logged!!</br>
								<a href="Iscrizione.php?exit=true">Exit!</a>';
					die;
				}
				
			}else{
			?>
		
			<form method='post' action='sign_in.php'>
				<fieldset style="width: 0; position: absolute;left: 42%;top: 10%;">
					<input type='text' placeholder='Nome' name='Nome' title='nome'/><br/>
					<input type='text' placeholder='Cognome' name='Cognome' title='cognome'/><br/>
					<input type='text' placeholder='Username' name='User' title='username' pattern="{4,}"/><br/>
					<input type='password' placeholder='Password' name='Pass' title='password' pattern="{8,}"/><br/>
					<input type='password' placeholder='Conferma Password' name='Pass2' title='confrma password' pattern="{8,}"/><br/><br/>
					<input type='submit' value='sign-in'/> 
				</fieldset>
			</form>
			
			<div>
			<a href="index.php?exit=true">Home!</a>
			</div>
			
			<?php		
				}		
			?>
		
	</body>
</html>