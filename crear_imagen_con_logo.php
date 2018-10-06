<!DOCTYPE html>
<html lang="es">
    <head><title>Imagen con logotipo</title>
</head>
<body>
<?php

function comprobar_ficheros(){
    if (!file_exists("imagenes")) {
        mkdir("imagenes", 777, true);
    }
    if (!file_exists("imagenes/output")) {
        mkdir("imagenes/output", 777, true);
    }
}

function obtener_extension($imagen){
    switch (substr($imagen, -3)) {
        case "png":
        case "PNG":
            $imagen = imagecreatefrompng($imagen);
            break;

        case "jpg":
        case "JPG":
            $imagen = imagecreatefromjpeg($imagen);
            break;
    }
    return $imagen;
};

function check_images($path){
    $dir = opendir($path);
    $extensiones = array("png", "PNG", "jpg", "JPG", "BMP", "bmp");
    $files = array();
    while ($current = readdir($dir)) {
        if ($current != "." && $current != "..") {
            if (is_dir($path . $current)) {
                showFiles($path . $current . '/');
            } else {
                if (substr($current, -4) == "jpeg" || substr($current, -4) == "JPEG") {
                    rename($current, substr($current, -4) . "jpg");
                }
                if (in_array(substr($current, -3), $extensiones)) {
                    $files[] = $current;
                }
            }
        }
    }
    return $files;
}

function redim($ruta1, $ruta2, $ancho, $alto){

    # se obtene la dimension y tipo de imagen
    $datos = getimagesize($ruta1);
    $ancho_orig = $datos[0]; # Anchura de la imagen original
    $alto_orig = $datos[1]; # Altura de la imagen original
    $tipo = $datos[2];
    if ($tipo == 1) { # GIF
    if (function_exists("imagecreatefromgif")) {
        $img = imagecreatefromgif($ruta1);
    } else {
        return false;
    }
    } else if ($tipo == 2) { # JPG
    if (function_exists("imagecreatefromjpeg")) {
        $img = imagecreatefromjpeg($ruta1);
    } else {
        return false;
    }
    } else if ($tipo == 3) { # PNG
    if (function_exists("imagecreatefrompng")) {
        $img = imagecreatefrompng($ruta1);
    } else {
        return false;
    }
    }
    # Se calculan las nuevas dimensiones de la imagen
    if ($ancho_orig > $alto_orig) {
        $ancho_dest = $ancho;
        $alto_dest = ($ancho_dest / $ancho_orig) * $alto_orig;
    } else {
        $alto_dest = $alto;
        $ancho_dest = ($alto_dest / $alto_orig) * $ancho_orig;
    }
    if ($ancho_dest > 130 && $alto_dest > 100) {
        // imagecreatetruecolor, solo estan en G.D. 2.0.1 con PHP 4.0.6+
        $img2 = @imagecreatetruecolor($ancho_dest, $alto_dest) or $img2 = imagecreate($ancho_dest, $alto_dest);

        // Redimensionar
        // imagecopyresampled, solo estan en G.D. 2.0.1 con PHP 4.0.6+
        @imagecopyresampled($img2, $img, 0, 0, 0, 0, $ancho_dest, $alto_dest, $ancho_orig, $alto_orig) or imagecopyresized($img2, $img, 0, 0, 0, 0, $ancho_dest, $alto_dest, $ancho_orig, $alto_orig);

        // Crear fichero nuevo, según extensión.
        switch ($tipo) {
            case 1:
                if (function_exists("imagegif")) {
                    imagegif($img2, $ruta2);
                }
                break;

            case 2:
                if (function_exists("imagejpeg")) {
                    imagejpeg($img2, $ruta2);
                }
                break;

            case 3:
                if (function_exists("imagepng")) {
                    imagepng($img2, $ruta2);
                }
                break;

        }
        $mensaje = true;
    } else {
        $mensaje = false;
    }
    return $mensaje;
}

function es_valido($imagen1, $logo){
    $imagen = getimagesize($imagen1); //Sacamos la información
    $imagen2 = getimagesize($logo);
    if ($imagen[0] >= $imagen2[0] && $imagen[1] >= $imagen2[1]) {
        return true;
    } else {
        return false;
    }
}

function crear_logo($fondo, $extension, $logo1, $extension2){

    $imagen1 = "imagenes/" . $fondo . "." . $extension;
    $logo = "imagenes/" . $logo1 . "." . $extension2;
    $name = "resultado" . ".png";
    $imagen = getimagesize($imagen1); //Sacamos la información
    $imagen2 = getimagesize($logo); //Sacamos la información

    do {

        $x = 1;

        if ($imagen[0] <= 550 && $imagen2[0] <= 320 || $imagen[1] <= 280 && $imagen2[1] <= 230) {

            if ($imagen[0] <= 550 && $imagen2[0] <= 320) {
                $imagen2[0] -= 10;
            }
            if ($imagen[1] <= 280 && $imagen2[1] <= 230) {
                $imagen2[1] -= 10;
            }
            $mensaje = redim($logo, $logo, $imagen2[0], $imagen2[1]);

        }

        $img1 = obtener_extension($imagen1); //Se indica la imagen "base"
        $img2 = obtener_extension($logo);

        $anchoimg1 = $imagen[0]; //Ancho
        $altoimg1 = $imagen[1]; //Alto

        $anchoimg2 = $imagen2[0]; //Ancho
        $altoimg2 = $imagen2[1]; //Alto
        $anchoimg1 -= $anchoimg2;
        $altoimg1 -= $altoimg2;

        imagecopyresampled(
            $img1,
            $img2,
            $anchoimg1, $altoimg1, 0, 0,
            imagesx($img2),
            imagesy($img2),
            imagesx($img2),
            imagesy($img2)
        );

        imagepng($img1, $name);
        rename($name, "imagenes/output/image_" . $x . ".png");
        imagedestroy($img1);
        imagedestroy($img2);

        $x++;

    } while ($mensaje);
    print '<h1 style="color:blue;margin:auto;text-align:center;background-color:#BCC6B6;">' . --$x . ' im&aacute;gen/es creadas!</h1>';
}

comprobar_ficheros();
$imagenes = check_images("imagenes");

if (isset($_POST['enviar']) && count($imagenes) > 0) {

    $_POST['logo'] = trim($_POST['logo']);
    $_POST['imagen'] = trim($_POST['imagen']);

    if (empty($_POST['logo'])) {
        print '<h1 style="color:red;text-align:center;">El logo no debe de estar vac&iacute;o</h1>';
    }

    if (empty($_POST['imagen'])) {
        print '<h1 style="text-align:center;color:red;">La imagen de fondo <span style="color:red;">no debe de estar vac&iacute;a</span></h1>';
    }

    if (!empty($_POST['logo']) && !file_exists("imagenes/" . $_POST['logo'] . "." . $_POST['extension2'])) {
        echo '<h2 style="text-align:center;">El logo <strong style="color:red;">' . $_POST['logo'] . "." . $_POST['extension2'] . ' no existe!</strong></h2><hr/>';
    }

    if (!empty($_POST['imagen']) && !file_exists("imagenes/" . $_POST['imagen'] . "." . $_POST['extension'])) {
        echo '<h2 style="text-align:center;">La imagen de fondo <strong style="color:red;">' . $_POST['imagen'] . "." . $_POST['extension'] . ' no existe!</strong></h2><hr/>';
    }

    if (count(check_images("imagenes/output")) > 0) {
        print '<h1 style="text-align:center;color:blue;">Ya hay imagenes en la carpeta imagenes/output</h1>';
    }

    else {

        if (!empty($_POST['imagen']) && file_exists("imagenes/" . $_POST['imagen'] . "." . $_POST['extension'])
            && !empty($_POST['logo']) && file_exists("imagenes/" . $_POST['logo'] . "." . $_POST['extension2']) &&
            count(check_images("imagenes/output")) == 0) {

            if (es_valido("imagenes/" . $_POST['imagen'] . "." . $_POST['extension'], "imagenes/" . $_POST['logo'] . "." . $_POST['extension2']
            )) {
                crear_logo($_POST['imagen'], $_POST['extension'], $_POST['logo'], $_POST['extension2']);
            }

            else {
                print '<h1 style="text-align:center;color:red;">La imagen de fondo debe ser mayor o igual que el logo</h1>';
            }
        }
    }
}

if (count($imagenes) > 0) {
    print '<hr/><div style="text-align:center;margin:auto;font-size:30px;"><ul>';
    foreach ($imagenes as $indice) {
        print '<li><span style="font-weight:bold;">' . $indice . '</span></li><br/>';
    }
    print '</ul></div>';
}

else {
    print '<h1 style="color:red;text-align:center;">No hay im&aacute;genes en la carpeta im&aacute;genes</h1>';
}
?>
<hr/>
        <form style="text-align:center;margin:auto;" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <br/><h1>Nombre de <span style="font-weight:bold;font-size:30px;">imagen de fondo</span></h1>
            <input placeholder="nombre sin .extension" style="text-align:center;height:50px;width:320px;font-size:30px;" name="imagen" type="text"/>
            <select style="text-align:center;height:50px;width:320px;font-size:30px;" name="extension">
                <option value="jpg"><h1 style="font-size:30px;">JPG</h1>
                </option>
                <option value="png"><h1 style="font-size:30px;">PNG</h1>
                </option>
            </select>
            <br/><br/>
                <h1 style="font-size:30px;">Logo</h1>
				<input placeholder="logo sin .extension " style="text-align:center;height:50px;width:280px;font-size:30px;" name="logo" type="text" value="logo"/>
			<select style="text-align:center;height:50px;width:320px;font-size:30px;" name="extension2">
                <option value="jpg"><h1 style="font-size:30px;">JPG</h1>
                </option>
                <option value="png"><h1 style="font-size:30px;">PNG</h1>
                </option>
            </select><br/><br/>
            <input style="text-align:center;height:50px;width:320px;font-size:30px;" name="enviar" type="submit"/>
        </form>
    </body>
</html>