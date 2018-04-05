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
			html {
			overflow: hidden;
			}
			p{
				margin-top: 10%;
				margin-left: 26%;
			}
		
		</style>
				<script>
		function showHint()
		{
			
			let f = encodeURIComponent(document.getElementById('F').value);
			
			
			if(f.length > 0)
			{
				let xhr = new XMLHttpRequest();
				
			    xhr.onreadystatechange= function(){
					let myFilm, stRes = ''; 
					
					if(this.readyState == 4 && this.status == 200){
						
						myFilm = JSON.parse(this.responseText);
						console.log(myFilm);
						
						if(myFilm.length > 0){
							
							stRes+=`<table border="0" cellspacing="0" cellpadding="0"  width="100%">`
							
							for(let i= 0; i < myFilm.length; i++){
								stRes+= `<tr>`;
								stRes+= `<td height="50" width="32"><a href="singleFilm.php?p=${myFilm[i].n}"><img src=${myFilm[i].image} height="50" width="35"></a></td>`;
								stRes+= `<td>${myFilm[i].title.original}</td>`;
								stRes+= `</tr>`;
							}
							stRes+=`</table>`;
						}
						document.getElementById("txtHint").innerHTML= stRes;
										
					}
						
				};
				
				//xhr.open("GET", `findbookbytitle.php?f=${f}`, true);
				xhr.open("GET", `findFilm.php?f=${f}`, true);
				
				xhr.send();		
			}else{
				document.getElementById("txtHint").innerHTML= '';
				return;
			}
			
		}
		
		</script>
		
	</head>
	<body bgcolor="lightgrey">
			
			<p><img src="Immagini/Film.png"></p>
				
			<form method="GET" action="elabora.php" align="center">
			
				<input type="text" id="F" onkeyup="showHint()" name="titolo" placeholder="cerca film"  align="center" />
				
				<input type="submit" value="Search" />
			
			</form>
			
			<div style=" position: absolute; top: 50%; left: 41.7%;"><span id="txtHint" ></span></div>
			
			
			
			
			
			<div style="position: absolute;  right: 20px; top: 15px;">
				
				<b><a href='Iscrizione.php'>Sign in!</a></b><br/>
				<b><a href='Entra.php'>Log in!</a></b>
			</div>	
			<div style="   position: absolute;  bottom: -1%;   left: -1%; width: 125px;">
			<?php
				if($_SESSION["logged"])
					echo "<p><a href='aggiungi.php'>Aggiungi film</a></p>";
				else{
					echo "<p><a href='Needed.php?Error=Per+aggiungere+un+nuovo+film+accedere+oppure+iscriversi+!'>Aggiungi film</a></p>";
				}
			?>
			</div>
			
	</body>

</html>