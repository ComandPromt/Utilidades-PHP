<?php

$imagen1="a.jpg"; 

$imagen2="b.png"; 

$name="resultado".".png";

$img1 = imagecreatefromjpeg($imagen1); //Se indica la imagen "base"

$img2 = imagecreatefrompng($imagen2);

$imagen = getimagesize($imagen1);    //Sacamos la información
$anchoimg1 = $imagen[0];              //Ancho
$altoimg1 = $imagen[1];               //Alto

$imagen2 = getimagesize($imagen2);    //Sacamos la información
$anchoimg2 = $imagen2[0];           //Ancho
$altoimg2 = $imagen2[1];            //Alto
 
$anchoimg1-=$anchoimg2;
$altoimg1-=$altoimg2;

imagecopyresampled(
$img1,
$img2,
$anchoimg1,$altoimg1, 0, 0,
imagesx($img2),
imagesy($img2),
imagesx($img2),
imagesy($img2)
);

imagepng($img1, $name);

imagedestroy($img1);

imagedestroy($img2);

echo "Created!";

?>
