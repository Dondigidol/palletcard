<?php
header('Content-Type: text/html; charset=utf-8');

require_once('../connect.php');
//============подключение к MS SQL===================================================
$mysql = connect_to_mysql2('config.ini');
//-----------------------------------------------------------------------------------

if ($mysql->set_connection()){	
	ini_set('max_execution_time', 10);
	if (isset($_POST["lm"])){
		$result=$mysql->getItem($_POST["lm"]);
	} elseif (isset($_POST["sku"])){
		$result=$mysql->getItem($_POST["sku"]);
	}

	if ($result != null && array_key_exists(0, $result)){
		$result = $result[0][0] . "|" . $result[0][1] . "|" . $result[0][2];
	} else {
		$result = "||";
	}
	
	echo $result;
}

$mysql->close();

?>