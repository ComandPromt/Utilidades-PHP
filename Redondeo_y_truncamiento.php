<?php

function media($v1,$v2,$v3)

{
	$media=($v1+$v2+$v3)/3;
	return $media;

}

/**
* funcion para convertir un numero a decimal con X digitos
* @param String $number
* @param Int $digitos cantidad de digitos a mostrar
* @return Float
*/

function truncateFloat($number, $digitos)
{
    $raiz = 10;
    $multiplicador = pow ($raiz,$digitos);
    $resultado = ((int)($number * $multiplicador)) / $multiplicador;
    return number_format($resultado, $digitos);
 
}

//Media de tres valores

$v1=2;
$v2=8;
$v3=10;

$resultado=media($v1,$v2,$v3);

print "La media de los valores: <strong>$v1</strong>,<strong>$v2</strong> y <strong>$v3</strong> sin truncar es: <strong>$resultado</strong>";

$resultado=truncateFloat($resultado,2);

print "<br><br/>";
print "La media de los valores: <strong>$v1</strong>,<strong>$v2</strong> y <strong>$v3</strong> truncada es: <strong>$resultado</strong>";
print "<br><br/>";
$resultado=round($resultado,1);
print "La media de los valores: <strong>$v1</strong>,<strong>$v2</strong> y <strong>$v3</strong> redondeada es: <strong>$resultado</strong>";

?>