<?php
header('Content-Type: text/html; charset=utf-8');
require_once('../connect.php');

$item = $_POST['item'];
$api_host = "http://localhost:8080";


if (isset($item)) {
    // $api_url = $api_host . "/palletcard/product/avs?item=" . $item;
    // $json_data = file_get_contents($api_url);
    // $response_data = json_decode($json_data);
    // //$user_data = $response_data->data;

    // echo $response_data;
    // //echo $user_data;

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $api_host . "/palletcard/product/avs?item=" . $item,
        CURLOPT_CUSTOMREQUEST => "GET"
    ));

    $response = curl_exec($curl);
    return ($response);
    curl_close($curl);
}
