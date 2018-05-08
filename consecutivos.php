<?php
session_start();
date_default_timezone_set('Europe/Madrid');
function consecutivos($array){
	if($array[0]!=null && $array[0]==1){
		$numAnt = array();
		$x=0;
		foreach($array as $pos => $num){
			if($pos>0){
				if(!($numAnt[($pos-1)]+1)==$num){
					$noc=array();
					$noc1=$numAnt[($pos-1)];
					$noc[] = $noc1;
					if($noc[1]-$noc[0]!=1){
						$numero=$noc[0]+1;
					}
				}
			}
			$numAnt[$pos]=$num; 
			$x++;
		}
		if($numAnt[0]!=1 && $array[0] !=1){
			$numero=$numAnt[0]-1;
			
		}
		else{
			$validar=false;
			for($x=0;$x<count($numAnt);$x++){
				if($numero==null){
				
					if($numAnt[$x]+1==$numAnt[$x+1]){
						$validar=true;
					}
					else{
						$numero=$numAnt[$x]+1;
					}
				}
			}
			if($numero==null){
				if(!$validar ){
					$numero=$array[$x-1]-1;
				}
				else{
					$numero=array_pop($array)+1;
				}
			}
			
		}
	}
	else{
		$numero=1;
	}
	return $numero;
}

$hostbd="localhost";
$userbd="root";
$passbd="rootroot";
$bd="ahorcado";
$conexion=mysqli_connect($hostbd,$userbd,$passbd,$bd);
mysqli_select_db($conexion,$bd);
$consulta=mysqli_query($conexion,"SELECT id FROM palabras ORDER BY id");
$numeros=array();
while ($fila = mysqli_fetch_row($consulta)){
	$numeros[]=(int)$fila[0];
}

print consecutivos($numeros);

?>