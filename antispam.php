<?php

function comprobar_si_es_valido($cadena,array $lista_negra){

	$valido=true;	
	
	for($x=0;$x<count($lista_negra);$x++){
		$numero=strpos($cadena,$lista_negra[$x]);

		if(gettype($numero)=="boolean"){
			$valido=true;	
		}
		else{
			if($numero>=0){
				
				$valido=false;	
				$x=count($lista_negra);
			}
		}

	}
	
	return $valido;
}

$lista_negra=array("fuck","bitch");

$valido=comprobar_si_es_valido("prueba",$lista_negra);

if($valido){
// INSERT, UPDATE ..
}

?>
