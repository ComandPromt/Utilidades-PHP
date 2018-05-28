<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Subir archivos al servidor</title>
<meta name ="author" content ="Norfi Carrodeguas">
<style type="text/css" media="screen">
body{font-size:1.2em;}
</style>
</head>
<body>
<form enctype='multipart/form-data' action='' method='post'>
<input name='uploadedfile' type='file'><br>
<input type='submit' value='Subir archivo'>
</form>
<?php 
error_reporting(0);
$target_path = "uploads/";
$avatar=$_FILES['uploadedfile']['name'];
$nombre = substr($avatar, 0, -4);
	$extension= substr($avatar, -4);
	if(strlen($nombre)>15){
		$nombre=substr($avatar, 0, 15);
		$avatar=$nombre.$extension; 
	}
$target_path = $target_path . basename($avatar);
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) 
{ 
include("redimensionar.php");
echo "<span style='color:green;'>El archivo ". basename( $avatar). " ha sido subido</span><br>";
}else{
echo "Ha ocurrido un error, trate de nuevo!";
} 
?>

</body>
</html>