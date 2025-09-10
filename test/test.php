<?php

$url = "https://grupo-4.infinityfreeapp.com/Mobile/ex-01/proxy.php?";
$cUrl = curl_init($url);
curl_setopt($cUrl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($cUrl);
curl_close($ch);
echo json_decode($resposta_api, true);

?>

