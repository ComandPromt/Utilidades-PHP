<form action="" method="post" enctype="multipart/form-data" name="formulario"> 
Cantidad de archivos a subir:
<select name="cantidad"> 
<script type="text/javascript"> 
for(x=1;x<=10;x++){ 
document.write("<option value="+ x +">"+ x+"</option>"); 
} 
</script> 
</select>
<input type="submit" name="submit1" value="OK">
<input type="submit" name="submit3" value="Limpiar!">
<p>

<?php

function truncateFloat($number, $digitos)
{
    $raiz = 10;
    $multiplicador = pow ($raiz,$digitos);
    $resultado = ((int)($number * $multiplicador)) / $multiplicador;
    return number_format($resultado, $digitos);
 
}

// directorio de almacenamiento de los archivos
$directorio = $_SERVER['DOCUMENT_ROOT']."/Download/";

if(isset($_POST['submit3'])){ 
print "<hr/>";
echo "ID<input type=\"number\" name=\"como[]\" id=\"como1\"><br>";
print "<br/>";
echo "Archivo<input type=\"file\" name=\"archivo[]\"><br>";
print "<br/>";
echo "Nombre<input type=\"text\" name=\"como[]\" id=\"como2\"><br><br/>";
echo "SHA256<input type=\"text\" name=\"como[]\" id=\"como3\"><br><br/>"; 
echo "<input type=\"submit\" name=\"submit2\" value=\"Enviar!\">"; 
}



if(isset($_POST['submit1'])){ 

for($i=1;$i<=$_POST['cantidad'];++$i){ 
print "<hr/>";
echo "ID<input type=\"number\" name=\"como[]\" id=\"como1\"><br>";
print "<br/>";
echo "Archivo<input type=\"file\" name=\"archivo[]\"><br>";
print "<br/>";
echo "Nombre<input type=\"text\" name=\"como[]\" id=\"como2\"><br><br/>";
echo "SHA256<input type=\"text\" name=\"como[]\" id=\"como3\"><br><br/>"; 

}
 
echo "<input type=\"submit\" name=\"submit2\" value=\"Enviar!\">"; 
} 
  
if ( !empty($_POST["como"]) && is_array($_POST["como"]) ) { 

    foreach ( $_POST["como"] as $como ) { 
            
            print "$como"; 
    
     }
  
}




  
if(isset($_POST['submit2'])){ 

$cantidad2 = count($_FILES["archivo"]); 


for($j=0;$j<=$cantidad2;$j++){ 
$archivo = $_FILES["archivo"]["tmp_name"][$j];  
$tamanio = $_FILES["archivo"]["size"][$j]; 
$tipo    = $_FILES["archivo"]["type"][$j]; 
$nombre  = $_FILES["archivo"]["name"][$j]; 
$x=$j; 


do{ 

$x++;
 
if( $archivo != "" ){ 
$fp = fopen($archivo, "rb"); 
$contenido = fread($fp, $tamanio); 
$contenido = addslashes($contenido); 
fclose($fp); 

///////////////// BD


///


$tamanio/=1024;

$tamanio.=" KB";

$tamanio/=1024;

if ($tamanio>0 && $tamanio<1){
	$tamanio*=1024;
$tamanio=truncateFloat($tamanio,2);
	$tamanio.=" KB";
}

else
{
$tamanio=truncateFloat($tamanio,2);
$tamanio.=" MB<br><br/>";	
}


                  
if(copy($archivo, $directorio.$nombre)) { 
echo '<b>'.$nombre.'</b><br><br/>'; 
print $hola;
print $tamanio;
print "<br><br/>";

} 
} 
}
while($x<$j); 
} 
} 

?>
</form>