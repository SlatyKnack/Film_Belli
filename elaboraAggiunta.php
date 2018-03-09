<?php 
	session_start();
?>
<html>
	<body bgcolor="lightgrey">
		<title>Film</title>
	</body >
	<head>
			
			<?php
				
			
					//require_once("movieList.php");//
				
				if(file_exists("movieList.json")){
					$json=file_get_contents('movieList.json');
					$movieList=json_decode($json,true);
				}
				
				
				function checkIndex($val)//controllo per vedere se lutente ha cercato qualcosa 
				{
					if(isset($val) && !empty(trim($val))){
						return trim($val);
					}else{
						return false;
					}
				}
				
				
				$orig=checkIndex($_REQUEST['original']); 
				$loc=checkIndex($_REQUEST['locale']);
				$imm=checkIndex($_REQUEST['Immagine']);
				$anno=checkIndex($_REQUEST['Anno']);
				$dur=checkIndex($_REQUEST['Durata']);
				$pae=checkIndex($_REQUEST['Paese']);
				$reg=checkIndex($_REQUEST['Regia']);
				$pl=checkIndex($_REQUEST['plot']);
				$trailer=checkIndex($_REQUEST['Trailer']);
				
				//Vreiabili attori
				$a1=checkIndex($_REQUEST['Attore1']);
				$a2=checkIndex($_REQUEST['Attore2']);
				$a3=checkIndex($_REQUEST['Attore3']);
				$a4=checkIndex($_REQUEST['Attore4']);
				$a5=checkIndex($_REQUEST['Attore5']);
				
				
				$i= count($movieList);
				
				$movieList[$i]['title']['original']= $orig;
				$movieList[$i]['title']['locale']= $loc;
				$movieList[$i]['year']=$anno;
				$movieList[$i]['lengt']=$dur;
				$movieList[$i]['country']=$pae;
				$movieList[$i]['direction']=$reg;
				$movieList[$i]['image']=$imm;
				$movieList[$i]['plot']=$pl;
				$movieList[$i]['like']=0;
				$movieList[$i]['dislike']=0;
				
				//causa casino con il file jason e altre cose che non tiesco a capire devo cambiare una parte della string del trailer
				///https://www.youtube.com/watch?v=
				
				$trailer= str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/v/', $trailer);
				
				$movieList[$i]['trailer']=$trailer;				
				///Inserimento attori
				$movieList[$i]['starring'][1]=$a1;
				$movieList[$i]['starring'][2]=$a2;
				$movieList[$i]['starring'][3]=$a3;
				$movieList[$i]['starring'][4]=$a4;
				$movieList[$i]['starring'][5]=$a5;
				
				
				//$_SESSION['i']++; ///aumeto della variabile che definisce la gransezza del vettore
				
				$f=fopen("movieList.json","w");
	
				fprintf($f,json_encode($movieList,JSON_PRETTY_PRINT));
				fclose($f);

				
				
				
				
				echo "Aggiunta completata!";
				echo "<p>torna alla <a href='./'>home</a>!</p>";
			?>
			
	</head>

</html>