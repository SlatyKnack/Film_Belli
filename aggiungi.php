<?php 
	session_start();
?>
<html>
	<head >
		<title>Cerca Film</title>
		<script type="text/javascript">
		//funzione per gli attori
			function hide(v){
				
					if(v=='1'){
					
						document.getElementById('Attore1').style.display="inline";
						document.getElementById('Attore2').style.display="none";
						document.getElementById('Attore3').style.display="none";
						document.getElementById('Attore4').style.display="none";
						document.getElementById('Attore5').style.display="none";
						
					}else if(v=='2'){
						
						document.getElementById('Attore1').style.display="inline";
						document.getElementById('Attore2').style.display="inline";
						document.getElementById('Attore3').style.display="none";
						document.getElementById('Attore4').style.display="none";
						document.getElementById('Attore5').style.display="none";
						
					}else if(v=='3'){
						
						document.getElementById('Attore1').style.display="inline";
						document.getElementById('Attore2').style.display="inline";
						document.getElementById('Attore3').style.display="inline";
						document.getElementById('Attore4').style.display="none";
						document.getElementById('Attore5').style.display="none";
						
					}else if(v=='4'){
						
						document.getElementById('Attore1').style.display="inline";
						document.getElementById('Attore2').style.display="inline";
						document.getElementById('Attore3').style.display="inline";
						document.getElementById('Attore4').style.display="inline";
						document.getElementById('Attore5').style.display="none";
					}else if(v=='5'){
						
						document.getElementById('Attore1').style.display="inline";
						document.getElementById('Attore2').style.display="inline";
						document.getElementById('Attore3').style.display="inline";
						document.getElementById('Attore4').style.display="inline";
						document.getElementById('Attore5').style.display="inline";
					}else{
						
						document.getElementById('Attore1').style.display="none";
						document.getElementById('Attore2').style.display="none";
						document.getElementById('Attore3').style.display="none";
						document.getElementById('Attore4').style.display="none";
						document.getElementById('Attore5').style.display="none";
					}
				}
		
		</script>
	</head>
	<body bgcolor="lightgrey">
			
				
			<form method="GET" action="elaboraAggiunta.php" >
				<fieldset>
					<legend>INSERIRE DATI DEL FILM:</legend>
						<h4>Titiolo</h4>
							<input type="text" name="original" placeholder="Nome originale" required /><br/>
							<input type="text" name="locale" placeholder="Nome locale"  required />  
						<br/>
						<h4>Immagine</h4><input type="text" name="Immagine" placeholder="url immagine"  required />
						<br/><h4>Anno</h4><input type="text" name="Anno" placeholder="anno"   required/>
						<br/><h4>Durata</h4><input type="text" name="Durata" placeholder="in minuti"  required />
						<br/><h4>Paese</h4><input type="text" name="Paese" placeholder="paese"  required />
						<br/><h4>Regia</h4><input type="text" name="Regia" placeholder="regia"   required /><br/>
						<br/>
						<div style="position: absolute; top: 32px; left: 320px;">	
							<h4>Attori Principali</h4>
						
							<select name="select" onchange="hide(this.options[this.selectedIndex].value);" >
				
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>			
							</select>
							<br/>
							<br/><input id="Attore1" type="text" name="Attore1" placeholder="Attore 1" style="display: none;" />
							<br/><input id="Attore2" type="text" name="Attore2" placeholder="Attore 2" style="display: none;"/>
							<br/><input id="Attore3" type="text" name="Attore3" placeholder="Attore 3" style="display: none;"/>
							<br/><input id="Attore4" type="text" name="Attore4" placeholder="Attore 4" style="display: none;"/>
							<br/><input id="Attore5" type="text" name="Attore5" placeholder="Attore 5" style="display: none;"/>
						</div>
						
						<div style="position: absolute; top: 297px; left: 320px;">
							<h4>Trama</h4><textarea name="plot" cols="40" rows="5" required></textarea>
						</div>
						<div style="position: absolute; top: 460px; left: 320px;">
							<h4>Immagine</h4><input type="text" name="Trailer" placeholder="url trailer"  required />
						</div>
						
					
						<input type="submit" value="Inserisci" />
				</fieldset>
			</form>
			
			<form action="domande.php" method="POST">
			
				
			</form>
			
		</div>
			
	</body>

</html>