<?php
$users = array();
$users['dwes'] = "63a9f0ea7bb98050796b649e85481845"; // root
$users['admin'] = "81dc9bdb52d04dc20036dbd8313ed055"; // 1234
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])){
	header('WWW-Authenticate: Basic realm="Contenido restringido"');
	header("HTTP/1.0 401 Unauthorized");
	exit;
}
if (!array_key_exists($_SERVER["PHP_AUTH_USER"], $users) || $users[$_SERVER["PHP_AUTH_USER"]] != md5($_SERVER["PHP_AUTH_PW"])) {
    header('WWW-Authenticate: Basic realm="Contenido restringido"');
	header("HTTP/1.0 401 Unauthorized");
	echo "Debes introducir un usuario y contraseña!";
	exit;
}
?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>
Ejemplo Tema 3: Autenticacion
</title>
</head>
<body>
<?php
session_start();

if(isset($_POST['enviar'])){
	session_destroy();
}
$_SESSION['visitas']=array();
$_SESSION['visitas'][]=date('d/m/Y')." ".date('H:i:s');

if(!isset($_COOKIE['fecha_usuario'])){
	print "Bienvenido a la web!";
	setcookie("fecha_usuario", date('d/m/Y')." ".date('H:i:s'), time()+3600);

	
}
else{
	//print $_COOKIE['fecha_usuario'];
	for($x=0;$x<count($_SESSION['visitas']);$x++){
			print $_SESSION['visitas'][$x]."<br/>";
		}
}

?>
<input name="enviar" value="Borrar sesion" type="submit"></input>
</body>
</html>
