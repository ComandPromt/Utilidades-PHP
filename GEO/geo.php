<?php
 $user_ip = '90.168.200.243';
 $geo = json_decode(file_get_contents("http://extreme-ip-lookup.com/json/$user_ip"));
 switch($geo->country){
     case 'Spain':
    $country ="es";
    break;

    case 'France':
    $country ="fr";
    break;
    
    case 'Germany':
    $country ="de";
    break;
    case 'United States':
    $country ="us";
    break;
    case 'Norway':
    $country ="no";
    break;
    case 'Belgium':
    $country ="be";
    break;
   

 }
 
 $region = $geo->region;

 echo '<img src="city.png"/>'.$geo->city;
 echo '<img src="'.$country.'.png"/>';



 echo "Region: ".$region."<br/>";

?>