 # Función dos Fechas

---
Restricciones
---

- Esta función calcula el tiempo que ha pasado entre dos fechas ( en años meses y días)

- Tiene en cuenta los años bisiestos anteriores a 3344

- Tiene en cuenta el 30 de febrero del año 3344 en adelante

- No se permite el 29 de febrero en años no bisiestos (anteriores a 3344)

- No se permite el 30 de febrero en años anteriores a 3344

- No se permite introdudcir años de dos cifras o menos

[Dos fechas](https://github.com/ComandPromt/Utilidades-PHP/blob/master/dos_fechas.php)

 # Comprobar enlaces
 
 - Verifica la existenciade una página web (si esta en linea)
 
 [Comprobar enlaces](https://github.com/ComandPromt/Utilidades-PHP/blob/master/Comprobador_enlaces_con_formulario.php)

 # Redondeo y truncamiento
 
 - Función para redondear y truncar
 
 [Redondeo y truncamiento](https://github.com/ComandPromt/Utilidades-PHP/blob/master/Redondeo_y_truncamiento.php)
 
  # Tablas de multiplicar
 
 - Muestra la tabla de multiplicar del número elegido
 
 [Tabla de multiplicar](https://github.com/ComandPromt/Utilidades-PHP/blob/master/Tablas%20de%20multiplicar.php)
 
 # Antispam
 
 - Di adiós a los spams
 
 [Antispam](https://github.com/ComandPromt/Utilidades-PHP/blob/master/antispam.php)
 
 # Calculo de la media de valores variables
 
[Calcular la media de valores variables](https://github.com/ComandPromt/Utilidades-PHP/blob/master/calcular_media_valores_variables.php)

 # Velocidad de transferencia
 - Calcula la velocidad de transferencia
[Velocidad de transferencia](https://github.com/ComandPromt/Utilidades-PHP/blob/master/calcular_velocidad_transferencia.php)

 # Código fuente de página
 - Extrae el código fuente de página
[Extraer el codigo fuente de una pagina](https://github.com/ComandPromt/Utilidades-PHP/blob/master/codigo_fuente_de_pagina.php)

 # Conversor de grados Celcius a Farengeith y viceversa
 - Extrae el número de una BD
[Celcius 2 Farengeith](https://github.com/ComandPromt/Utilidades-PHP/blob/master/grados_celcius_to_farengeith.php)

 # Marca de agua
 - Crea una marca de agua en una imagen
[Marca de agua](https://github.com/ComandPromt/Utilidades-PHP/blob/master/marca_de_agua.php)

 # Extraer valores de un select sin formulario
[Extraer valores de select sin formulario](https://github.com/ComandPromt/Utilidades-PHP/blob/master/select_to_php_none_form.php)
 
 # Subida de ficheros
 - Create a folder called uploads
 - Crea una carpeta llama uploads
[Subida de ficheros con formularios](https://github.com/ComandPromt/Utilidades-PHP/blob/master/subir.php)

# Subida múltiple
- Sube varios ficheros a través de un formulario
[Subida múltiple](https://github.com/ComandPromt/Utilidades-PHP/blob/master/subida_multiple.php)

# Funcion esEntero
```php
function es_entero($number){

 $number = explode(".",$number); 

 if ($number[1] =="") {
  return true;
 }

 else {
  return false;
 } 
 
}

```
# Funcion Ordenar Numeros
```php
function ordenar_numeros($porciones,$separador){
	
	$porciones = explode($separador, $porciones);
	
	$dom=count($porciones);
	
	for ($i=0;$i<$dom;$i++){ 
	
	for($j=0;$j<count($porciones);$j++){
		
			if ($porciones[$i]< $porciones[$j]){
				
					$temp = $porciones[$i];
					
					$porciones[$i]=$porciones[$j];
					
					$porciones[$j]=$temp; 
			} 
	} 
	
	}
	
	$numeros=implode ($porciones);
	return $numeros;

}

//Llamada a la funcion

//Debemos llamar a la funcion con los numeros que queramos

//Y el separador que queramos,eso si, el separador tiene

//Que ser el mismo en los dos parametros,en este caso

//El separador es -

//print ordenar_numeros("4-2-6-1-3-5","-");

//Devolvera 123456
```

# Funcion Mostrar Codigo

```php
function mostrar_codigo($file){ 
  $lines = implode(range(1, count(file($file))), '<br />'); 
  $content = highlight_file($file, true); 
  
  echo ' 
    < style type="text/css"> 
        .num { 
        float: left; 
        color: gray; 
        font-size: 13px;    
        font-family: monospace; 
        text-align: right; 
        margin-right: 6pt; 
        padding-right: 6pt; 
        border-right: 1px solid gray;} 
        body {margin: 0px; margin-left: 5px;} 
        td {vertical-align: top;} 
        code {white-space: nowrap;} 
    < / style>'; 
       
  echo "< table>< tr>< td class=\"num\">\n$lines\n< / td>< td>\n$content\n< / td>< / tr>< / table>"; 
} 
mostrar_codigo("archivo.php"); 
```

# Funcion Recoge
```php
//Funcion para eliminar los caracteres especiales enviador por formulario
//Tambien elimina los espacios en blanco antes y despues del texto introducido en dicho formulario

function recoge($var,$var2){
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
		
		if($var2==""){
			header("location:#");
			exit();
		}
		
		if($tmp==""){
			//Hemos dejado en blanco el input y nos redirecciona a la misma pagina
			header("location:$var2");
			exit();
		}
		
		else
		{
			return $tmp;
		}
}

// Primer parametro: el nombre del input del formulario 
// Segundo parametro: el nombre del formulario
// Si el formualario y la funcion estan en el mismo archivo
// Devemos dejar en blanco el segundo parametro ej. recoge("nombre_input","");

print $nombre   = recoge("nombre","formulario.php");
```

# Pasar la primera letra a mayuscula

```php
function pasar_la_primera_letra_a_mayuscula($letra){

$letra=trim($letra);

$letra[0]=strtoupper($letra[0]);

for($i=1;$i<=strlen($letra)-1;$i++){
	
if(ctype_upper($letra[$i])){
$letra[$i]=strtolower($letra[$i]);	

}

}

return $letra;

}

//Llamada a la funcion
//$palabra=pasar_la_primera_letra_a_mayuscula("pRueBA");
//print $palabra;
```

# Comprobar enlace en linea

```php
function verificar_url($url){ 
    //abrimos el archivo en lectura 
    $id = @fopen($url,"r"); 
    //hacemos las comprobaciones 
    if ($id) $abierto = true; 
    else $abierto = false; 
    //cerramos el archivo 
    @fclose($id); 
    //devolvemos el valor 
    return $abierto; 
}
```
