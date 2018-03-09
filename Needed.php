<?php 
	session_start();
?>
<html>
	<body bgcolor="lightgrey">
		<title>login</title>
	</head>
	<body>
			<?php
			if(isset($_REQUEST['Error'])&&!empty(trim($_REQUEST['Error']))) {
				echo '<div class="error">'.$_REQUEST['Error'].'</div>';
				unset($_REQUEST);
			}
		?>
			<div>
				</br>
				<a href='Iscrizione.php'>Isctiviti</a>!</br>
				<a href='Entra.php'>Log in</a>!</p>
			</div>
	</body>
</html>