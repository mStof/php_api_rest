<?php

$url = "https://grupo-4.infinityfreeapp.com/Mobile/ex-01/proxy.php?";
$response = file_get_contents($url);

if ($response === FALSE) {
    die("Erro ao acessar a API");
}

$data = json_decode($response, true);

print_r($data);

?>

