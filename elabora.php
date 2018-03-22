<?php 
	session_start();
?>
<html>
	<body bgcolor="lightgrey">
		<title>Film</title>
	</body >
	<head>
			
			<?php
				
				
				
				//se la movieList non è mai stata  richiesta lo fa
				if(file_exists("movieList.json")){
					$json=file_get_contents('movieList.json');
					$moviesList=json_decode($json,true);
				}
				//echo 'hello'.$_SESSION['i'];
				
				function checkIndex($val)//controllo per vedere se lutente ha cercato qualcosa 
				{
					if(isset($val) && !empty(trim($val))){
						return trim($val);
					}else{
						return false;
					}
				}
				
				
				function film($moviesList,$n)// stampa di tutti i dati del film
				{
					//GLOBAL $_SESSION['MoviesList'];
					
					echo '<table border="1" cellspacing="0" cellpadding="0"  width="100%"> ';
					echo '<tr>';
					echo  '<td rowspan="2" height="198" width="132"><a href="singleFilm.php?p='.$n.'"><img src='.$moviesList[$n]['image'].' height="198" width="132"></a></td>';   		///Immagine del film
					echo '<td align="left"><b> '.$moviesList[$n]['title']['original'].'</b></td>';		///Titolo Oroginale
					echo '</tr>';
					
				//	if(trim($moviesList[$n]['title']['original']) != trim($moviesList[$n]['title']['locale']))	///se il titolo originale è diverso a quello
				//		echo '<br/><b>---Locale: </b>'.$moviesList[$n]['title']['locale'];						///locale stampo anche il locale
				/*
					echo '<br/><br/><b>Anno: </b>'.$moviesList[$n]['year'];			///anno
					echo '<br/><br/><b>Durata: </b>'.$moviesList[$n]['lengt'];		///Durata
					echo '<br/><br/><b>Paese: </b>'.$moviesList[$n]['country'];		///Paese
					echo '<br/><br/><b>Regia: </b>'.$moviesList[$n]['direction'];	///Regia
					
					echo '<br/><br/><b>Starring: </b>';									
					foreach($moviesList[$n]['starring'] as $s => $nomi){				///stampa di tutti gli attori principali
						if($nomi != false)
							echo '<br/>--- '.$nomi;
					}
					*/
					echo '<tr><td><b>Trama: </b><br/>'.$moviesList[$n]['plot'].'</td></tr>';		///Trama
					
					echo '</table></br>';
					return 1;							//ritorna 1 per capire se è stato stampato un Film o meno
				}
				
				function star($moviesList,$v,$n)			///FUNZIONE che cera tra tutti i nomi degli attori
				{
					//GLOBAL $_SESSION['MoviesList'];
					foreach($moviesList[$n]['starring'] as $s => $nomi){
						if(strpos(strtolower(trim($nomi)), strtolower($v)) !== false)
							return true;	//se si è cercato un mome che esiste 
					}
					
					return false;			//se il nome cercato non esiste
				}
				
				
				//GLOBAL $_SESSION['MoviesList'];
				
				$i=0;
				$j=0;
				$var=0;
				$f=0;
				$v=checkIndex($_REQUEST['titolo']);///prendo qello che mi arriva dalla pagina index
				
				
				if($v != false){
					foreach($moviesList as $movie){	//
						$i++;					//trova la grandezza del vettore  e quindi quanti film ci sono nella lista 
					}
				
				for($j=0; $j < $i; $j++){
					if( strpos(strtolower(trim($moviesList[$j]['title']['original'])), strtolower($v)) !== false || ///In questo modo mi dice se le due
						strpos(strtolower(trim($moviesList[$j]['title']['locale'])), strtolower($v)) !== false || 	///stringhe hanno qualcosa in comune 
						$v == trim($moviesList[$j]['year']) || $v == trim($moviesList[$j]['lengt']) || 
						$v == trim($moviesList[$j]['country']) || $v == trim($moviesList[$j]['direction']) || star($moviesList,$v,$j)==true ){
							
						$f=film($moviesList,$j);	///funzione stampa
					}else{
						if($f == 0)		
							$var=1;	
					}
				}
				
					if(strtolower($v) == "spaghett"){
						echo "<div style='text-align: center;'>";
						echo "<embed src='Immagini/SOMEBODY TOUCHA MY SPAGHET.mp4' width='480' height='370'/></div><br/>";
					}
				}else{
					echo "Il film da lei cercato non puo essere trovato";
				}
				
				if($var == 1 && $f == 0){
					echo "Il film da lei cercato non puo essere trovato";
				}
				
				echo "<p>torna alla <a href='./'>Home!</a><br/>";
				if($_SESSION["logged"])
					echo "<a href='aggiungi.php'>Aggiungi film</a></p>";
				else{
					echo "<p><a href='Needed.php?Error=Per+aggiungere+un+nuovo+film+accedere+oppure+iscriversi+!'>Aggiungi film</a></p>";
				}
				
			
			echo "<div style='relative: absolute;  right: 20px;'>
				
				<b><a href='Iscrizione.php'>Sign in!</a></b><br/>
				<b><a href='Entra.php'>Log in!</a></b>
			</div>	";
			?>
	</head>

</html>