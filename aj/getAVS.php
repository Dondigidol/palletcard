<?php
header('Content-Type: text/html; charset=utf-8');
require_once('../connect.php');

$params = parse_ini_file("../config.ini");

$item = $_POST['item'];
$token = $params["blender_xApiKey"];
$api_host = isset($params["blender_apiServer"]) ? $params["blender_apiServer"] : "http://localhost";


if (isset($item)) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $api_host . "/palletcard/product/avs?item=" . $item,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array("x-api-key: $token"),
    ));

    $response = curl_exec($curl);
    return ($response);
    curl_close($curl);
}
