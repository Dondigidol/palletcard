<?php
//session_start();
header('Content-Type: text/html; charset=utf-8');
require_once('../connect.php');

$item = $_POST['item'];
$store = 39; //$_SESSION["shop"];
$api_host = "http://localhost:8080";


if (isset($item)) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $api_host . "/palletcard/product/2080?item=" . $item . "&store=" . $store,
        CURLOPT_CUSTOMREQUEST => "GET"
    ));

    $response = curl_exec($curl);
    return ($response);
    curl_close($curl);
}
