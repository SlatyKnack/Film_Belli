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
					echo  '<img src='.$moviesList[$n]['image'].' height="268" width="182">
							<div style=" position:  absolute; left: 380px; top: 8px;">
							<video height="235" controls>
							<source src="'.$moviesList[$n]['trailer'].'" type="video/mp4">
							</video></br>
							<p>
							<img src=Immagini/miPiace.png height="20" width="20">'.$moviesList[$n]['like'].'
							<img src=Immagini/nonMiPiace.png height="20" width="20">'.$moviesList[$n]['dislike'].'
							</p>
							</div>							
							<br/><br/>';   		///Immagine del film
					echo '<b>Titolo</b><br/><b>---Originale: </b> '.$moviesList[$n]['title']['original'];		///Titolo Oroginale
					
					if(trim($moviesList[$n]['title']['original']) != trim($moviesList[$n]['title']['locale']))	///se il titolo originale è diverso a quello
						echo '<br/><b>---Locale: </b>'.$moviesList[$n]['title']['locale'];						///locale stampo anche il locale
				
					echo '<br/><br/><b>Anno: </b>'.$moviesList[$n]['year'];			///anno
					echo '<br/><br/><b>Durata: </b>'.$moviesList[$n]['lengt'];		///Durata
					echo '<br/><br/><b>Paese: </b>'.$moviesList[$n]['country'];		///Paese
					echo '<br/><br/><b>Regia: </b>'.$moviesList[$n]['direction'];	///Regia
					
					echo '<br/><br/><b>Starring: </b>';									
					foreach($moviesList[$n]['starring'] as $s => $nomi){				///stampa di tutti gli attori principali
						if($nomi != false)
							echo '<br/>--- '.$nomi;
					}
					echo '<br/><br/><b>Trama: </b><br/>'.$moviesList[$n]['plot'].'<br/><br/>';		///Trama
					
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
				
				$n=checkIndex($_REQUEST['p']);
				
				//if($n != false)
					$f=film($moviesList,$n);
				
				//echo "$n";
				
				echo "<p>torna alla <a href='./'>home</a>!</p>";
				echo "<p><a href='aggiungi.php'>Aggungi film</a></p>"
				
				
				
				
				?>
			
	</head>

</html>