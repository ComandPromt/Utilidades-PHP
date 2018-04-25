<?php

error_reporting(0);

function limpia_espacios($cadena){
	$cadena = str_replace(' ', '', $cadena);
	return $cadena;
}

function verificar_url($url= NULL ) {
    if( empty( $url ) ){
        return false;
    }
    $ch = curl_init( $url );
 
    //Establecer un tiempo de espera
    curl_setopt( $ch, CURLOPT_TIMEOUT, 5 );
    curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 5 );
    //establecer NOBODY en true para hacer una solicitud tipo HEAD
    curl_setopt( $ch, CURLOPT_NOBODY, true );
    //Permitir seguir redireccionamientos
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
    //recibir la respuesta como string, no output
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    $data = curl_exec( $ch );
    //Obtener el código de respuesta
    $httpcode = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
    //cerrar conexión
    curl_close( $ch );
    //Aceptar solo respuesta 200 (Ok), 301 (redirección permanente) o 302 (redirección temporal)
    $accepted_response = array( 200, 301, 302 );
    if( in_array( $httpcode, $accepted_response ) ) {
        return true;
    } else {
        return false;
    }
}

function urlvalida($url){ 
	$rest0 = substr($url,11);
	
	if($rest0[0]=="." ){
		$rest0=false;
	}
	
	else{
		$rest0=true;
	}

	$rest = substr($url,-4);
	if ($rest[0]=="." || $rest[1]=="."){
		if($rest[2]=="." || $rest[0]=="." && $rest[1]=="."){
			$rest1=false;
		}
		
		else{
			$rest1=true;	
		}
	}
	
	if($rest0 && $rest1){
		$rest1=true;
	}
	
	else{
		$rest1=false;	
	}
 
	return $rest1;
}
 
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
    <input type="Text" size="25" maxlength="100" name="url" value="http://www."> 
    <input type="Submit" name="verificar" value="Verificar!"/> 
</form>
	
<?php
if(isset($_POST['verificar'])){

	$url=$_POST['url'];
	$url=limpia_espacios($url);
	if (!isset($url)){
		$url="  ";
		$abierto="  ";
	}
		
	else{
		
		$abierto=urlvalida($url);
		
		if ($abierto==false){
			print $abierto;
			$url=" ";
			$abierto=" ";
		}
		
		else{	
			$abierto = verificar_url($url);
			if ($abierto || $url=="http://www.1and1.com"){
				$abierto="YES";
			}
		
			else{	
				$abierto="NO";
			}
		}
	}
	
	print "<table border='3'>";
		
	print " <tr>
			<td><center><strong>URL</strong></center></td>
			<td><strong>Online</strong></td>
			</tr>";
	print " <tr>
			<td>$url</td>
			<td><center>$abierto</center></td>
			</tr>
			</table>";
}
print '</body>';
?>
