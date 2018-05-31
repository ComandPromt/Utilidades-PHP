<?php

//Funcion para mostrar cualquier numero con n digitos

	function truncateFloat($number, $digitos){
		$raiz = 10;
		$multiplicador = pow ($raiz,$digitos);
		$resultado = ((int)($number * $multiplicador)) / $multiplicador;
		return number_format($resultado, $digitos);
	}
	
	print truncateFloat(12.33333333333,1);
?>