<h1>Convertidor de temperaturas Celsius / Fahrenheit (Resultado)</h1>
<?php
$temp=$_REQUEST['temperatura'];
$unidad=$_REQUEST['unidad'];
echo "<center><p><strong>$temp º";
 if ($unidad == 'c'){
 echo "C";
 }
 elseif ($unidad== 'f') {
 echo "F";
 }
 if ($unidad == 'c'){
	 $grados=number_format ( 1.8*$temp+32,2);
	 $unidad2="ºF";
 }
 else {
	 $grados= number_format(($temp-32)/1.8,2);
	 $unidad2="ºC";
 }
 echo " son $grados $unidad2";
 echo "</strong></p></center>";
?>
<a href="temperatura.php" title="Atras"><img src="../img/atras.png" /></a>
