<?php

function comprobar_si_existe_email($email){

    $key = "RAo7L07adVEweWS0hObUB";
    $url = "https://app.verificaremails.com/api/verifyEmail?secret=".$key."&email=".$email;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
    $response = curl_exec($ch);
    curl_close($ch);
	return $response;
}

echo comprobar_si_existe_email("prueba@gmail.com");

?>