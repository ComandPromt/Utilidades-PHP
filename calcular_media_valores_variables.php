<head>
<link rel="stylesheet" type="text/css" href="estilos.css">

</head>
<body bgcolor="ffffff">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
<h1>Introduce n&uacute;meros separados por espacios para calcular la media</h1>
	<input type="text" name="como" id="como1" value="">
	
	<button type="submit">Enviar</button>

</form>

<?php
/*
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

$pizza  = $_GET["como"];

$pizza= explode(" ",$pizza);

$letra=true;

for ($i=0;$i<count($pizza);){
	
	if(is_numeric($pizza[$i]))
	{$letra=false;$i++;}
	else{$letra=true;$i=count($pizza);}
}

if($letra==false){

$pizza  = $_GET["como"];
$porciones = explode(" ", $pizza);

//Comprobamos que se has introducido numeros

print "<strong><a>Numeros introducidos:</<a></strong>";
print " ";
if ( !empty($porciones) && is_array($porciones) ) { 

    foreach ( $porciones as $como ) { 
	$como=trim($como);
            echo $como; 
          print " ";
     }
    
}

for($i=0;$i<count($porciones);$i++)
	
	{
		$media=$porciones[$i]+$media;
	
	}
	
$media=$media/count($porciones);

$resultado=truncateFloat($media,2);

print "<br><br/>";
print "La media de los valores truncada es: <strong>$resultado</strong>";

$resultado=round($media);

print "<br><br/>";
print "La media de los valores redondeada es: <strong>$resultado</strong>";

}

print "</body>";

?>
