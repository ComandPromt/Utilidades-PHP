<?php

if($_POST['nombre']=="" || $_POST['nombre']==null){
	echo '<h1> Introduce el nombre del archivo de texto</h1><hr/>';	
}

if($_POST['prefijo']=="" || $_POST['prefijo']==null){
	echo '<h1> Introduce un prefijo para los archivos</h1><hr/>';	
}

else{

	if(isset($_POST['enviar'])){
		if(!file_exists($_POST['nombre'].".txt")){
			echo '<h1>Crea un archivo de texto llamado '.$_POST['nombre'].'</h1><hr/>';
		}
	
	else{
	
		$lineas = file($_POST['nombre'].".txt");

		foreach ($lineas as $num_línea => $lineas) {
	
			$palabra = trim($lineas);
			$palabra = str_replace("  ", " ", $palabra);

			if( $palabra!="" && $palabra!=" " && substr($palabra[0],0,1)>=0 || ord($palabra[0])>=65){

					if(ord($palabra[0])>=65 && count($palabras)>0){
						$palabras[count($palabras)-1] .= $palabra." ";
					}
					else{
						if(substr($palabra,-1)!=" "){
							$palabras[] = $palabra." ";
						}
						else{
							$palabras[] = $palabra;
						}
					}
			}
		}

		$y=0;
		$indices=array();
	
		for($x=0;$x<count($palabras);$x++){

			if(strlen($palabras[$x])>1){
				$indices[].=substr($palabras[$x],0,strpos($palabras[$x],$_POST['separador']));
			}
	
		}

		if(!file_exists($_POST['nombre'])){
			mkdir($_POST['nombre'],0777);
		}

		for($x=0;$x<count($palabras);$x++){
			$miArchivo = fopen($_POST['nombre'].'/'.$_POST['prefijo'].$indices[$x].'.php', 'w') or die('<h1>No se puede abrir/crear el archivo!</h1>');
			$file = fopen($_POST['nombre'].'/'.$_POST['prefijo'].$indices[$x].'.php', "w+");
			fwrite($file, "<?php\n");
			fwrite($file, "/* $palabras[$x] */\n");
			fwrite($file, "?>");
			fclose($file);
		}
		echo '<h1>Proceso terminado</h1>';
	}
	}
}
?>

<form style="text-align:center;margin:auto;" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<p>Nombre de archivo
		<input  style="text-align:center;" name="nombre" type="text" value="tareas"></input>
	</p>
	<p>Prefijo de archivo
		<input  style="text-align:center;" name="prefijo" type="text" ></input>
	</p>
	<p>Separador
		<input style="text-align:center;" name="separador" type="text" value="."></input>
	</p>
	<input type="submit" name="enviar"/>
</form>
