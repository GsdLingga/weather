<?php

require require 'firebase-php-master/src/firebaseLib.php';
$param1 = $_GET["temp"];
$param2 = $_GET["hum"];

$url = 'https://weather-38991-default-rtdb.firebaseio.com/'; 
$token = 'XAzl3cnxtXThfKHgTAcx83HNJgR8OWxHUt8cnwFY'; 

$DEFAULT_PATH = '/DTproduction';

$_devicestatus= array(
'suhu' => $param1,
'kelembaban' => $param2,
);

 

$firebase = new \Firebase\FirebaseLib($url, $token);
$firebase->update($DEFAULT_PATH, $_devicestatus);

print("Update Berhasil");
?>