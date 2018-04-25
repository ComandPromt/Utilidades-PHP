<form action="n19_2.php" method="post">
<br/>

<strong>Desde la tabla del &nbsp;</strong><input  style="text-align: center" type="number" name="numero" placeholder="Semi Obligatorio 1">
<br></br>
<strong>Hasta la tabla del &nbsp;</strong><input  style="text-align: center" type="number" name="numero3" placeholder="Semi Obligatorio 1">
<br></br>
<strong>Desde el &nbsp;</strong><input  style="text-align: center" type="number" name="numero1" placeholder="Obligatorio">
<br></br>
<strong>Hasta el &nbsp;</strong><input style="text-align: center" type="number" name="numero2" placeholder="Obligatorio">
<br></br>
<strong>Tablas que quieras (separadas por espacios) &nbsp;</strong><input style="text-align: center" type="text" name="numero4" placeholder="Semi Obligatorio 2">
<br></br>
<center>
<input type="submit" name="enviar" value="Enviar">
<input type="submit" name="limpiar" value="Limpiar">
</center>
</form>
 
<?php

$numero=$_REQUEST['numero'];
$numero1=$_REQUEST['numero1'];
$numero2=$_REQUEST['numero2'];
$numero3=$_REQUEST['numero3'];
$numero4=$_REQUEST['numero4'];
print "<br/>";
print "<hr></hr>";

if (($numero>0 && $numero2>0) && $numero1<=$numero2)
{



if ($numero3!="" && $numero4=="")
{
///TEXTAREA DESPLEGABLE
	
	for($numero;$numero<=$numero3;$numero++){
	
print "<center><h1>Tabla del <strong>$numero<strong> desde el <strong>$numero1</strong> hasta el <strong>$numero2</strong></h1></center>";
print "<center>";


	for($numero1;$numero1<=$numero2;$numero1++)
	
	{
		
		 $p=$numero*$numero1 ;
	  echo $numero .' x ' . $numero1 .' = '. $p ;
      echo"</br>" ;
		
	}
	
$numero1=$_REQUEST['numero1'];
echo"<br></br>" ;
	}
 
print "</center>"; 
}

else{
	
if ($numero3=="" && $numero4=="")
{

print "<center><h1>Tabla del <strong>$numero<strong> desde el <strong>$numero1</strong> hasta el <strong>$numero2</strong></h1></center>";
print "<center>";

///TEXTAREA DESPLEGABLE

	for($numero1;$numero1<=$numero2;$numero1++){
		$p=$numero*$numero1 ;
	  echo $numero .' x ' . $numero1 .' = '. $p ;
      echo"</br>" ;

	}
 
print "</center>"; 
	
}	

}
 
///FIN TEXT AREA DESPLEGABLE

}

else{
	
	if($numero1!="" && $numero2!="" && $numero4!=""){
	
	function truncateFloat($number, $digitos)
{
    $raiz = 10;
    $multiplicador = pow ($raiz,$digitos);
    $resultado = ((int)($number * $multiplicador)) / $multiplicador;
    return number_format($resultado, $digitos);
 
}

	//Tablas separadas por espacios

$porciones = explode(" ", $numero4);

$numero3=count($porciones);

for ($i=0;$i<count($porciones);$i++){ 
   for($j=0;$j<count($porciones);$j++){ 
          if ($porciones[$i]< $porciones[$j]){ 
                  $temp = $porciones[$i]; 
                  $porciones[$i]=$porciones[$j]; 
                  $porciones[$j]=$temp; 
           } 
   } 

}

for($i=0;$i<$numero3;$i++){
	
	if($porciones[$i]==""){
		$porciones[$i]=$numero3;

	}
	
print "<center><h1>Tabla del <strong>$porciones[$i]<strong> desde el <strong>$numero1</strong> hasta el <strong>$numero2</strong></h1></center>";
print "<center>";

	for($numero1;$numero1<=$numero2;$numero1++)
	
	{
		
		 $p=$porciones[$i]*$numero1 ;
	  echo $porciones[$i] .' x ' . $numero1 .' = '. $p ;
      echo"<br></br>" ;
	
	}
	
	$numero1=$_REQUEST['numero1'];	


	}
 
print "</center>"; 

}
}

if($limpiar=="Limpiar") {
echo"";
}

?>
