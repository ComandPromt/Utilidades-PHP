<?php

function enviar($para, $asunto, $mensaje, $archivo,$remitente){

    include_once 'class.phpmailer.php';
    include_once 'class.smtp.php';

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;

//Nuestra cuenta
    $mail->Username = 'email@gmail.com';
    $mail->Password = 'Password'; //Su password

//Agregar destinatario
    $mail->FromName = $remitente;
    $mail->AddAddress($para);
    $mail->Subject = $asunto;
    $mail->Body = $mensaje;
    /*
    Añadir una imagen incrustada
    $mail->AddEmbeddedImage("rocks.png", "my-attach", "rocks.png"); 
    $mail->Body = 'Embedded Image: <img alt="PHPMailer" src="cid:my-attach"> Here is an image!'; 
    */
//Para adjuntar archivo
    $mail->AddAttachment($archivo['tmp_name'], $archivo['name']);
    $mail->MsgHTML($mensaje);

//Avisar si fue enviado o no y dirigir al index

    if ($mail->Send()) {
        echo '<script type="text/javascript">
            alert("Enviado Correctamente");
         </script>';
    } else {
        echo '<script type="text/javascript">
            alert("NO ENVIADO, intentar de nuevo");
         </script>';
    }
}

if(isset($_POST['enviar'])){
    enviar($_POST['email'], $_POST['asunto'], $_POST['mensaje'], $_FILES['hugo'],"Test");
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Correo</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    </head>
    <body>
        <div class="wrap">

           <section id="principal">
                <form id="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                    <div class="campos">
                        <label>Para:</label>
                        <input type="email" name="email" required><br/><br/>
                    </div>
                    <div class="campos">
                        <label>Asunto:</label>
                        <input type="text" name="asunto"><br/><br/>
                    </div>
                    <div class="campos">
                        <label>Mensaje:</label>
                        <textarea name="mensaje"></textarea><br/><br/>
                    </div>

                    <label>Imagen:</label>
                    <input type="file" name="hugo" id="imagen" />

                    <input id="submit" type="submit" name="enviar" value="Enviar mail">
                </form>

            </section>
        </div>
    </body>
</html>