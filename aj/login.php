<?php
session_start();
require_once '../connect.php';

$user = $_POST["user"];
$userPW = $_POST["userPW"];

if (is_numeric($user) && strlen($user)==8){
	error_reporting(E_ERROR | E_PARSE);
	$ldap = connect_to_ldap($user, $userPW, 'config.ini');
	$data = $ldap->getUserInfo();
	$_SESSION['user_id'] = $user;
	$_SESSION['username'] = $data[0]["displayname"][0];
	$_SESSION['shop'] = $data[0]["postofficebox"][0];
	$_SESSION['otdel_id'] = $data[0]["extensionattribute5"][0];
	echo 'true';
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$ldap->close();
} else {
	echo "Ошибка! Необходимо авторизоваться под личным лдапом!";
}
?>