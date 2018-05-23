<?php

function comprobar_si_es_valido($cadena,array $lista_negra){

	$valido=true;	
	
	for($x=0;$x<count($lista_negra);$x++){
		print strpos($cadena,$lista_negra[$x]);
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

$cadena="TTT";
$lista_negra=array("a","TTT");

$valido=comprobar_si_es_valido($cadena,$lista_negra);
if($valido){print "INSERT";}
else{print "INVALIDO";}

?>