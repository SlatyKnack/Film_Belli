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
		?>
		
		<form method='post' action='log_in.php'>
			<fieldset style="width: 0; position: absolute;left: 42%;top: 10%;">
				<input type='text' placeholder='Username' name='User' title='username' pattern="{4,}"/><br/>
				<input type='password' placeholder='Password' name='Pass' title='password' pattern="{8,}"/><br/><br/>
				<input type='submit' value='Log-in'/> 
			</fieldset>
		</form>
	
	</body>
</html>