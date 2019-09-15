<?php
session_start();
require_once '../connect.php';

$user = $_POST["user"];
$userPW = $_POST["userPW"];

if (is_numeric($user) && strlen($user)==8){

	$data = connect_to_ldap($user, $userPW, 'config.ini');

	if ($data)
	{
		$_SESSION['ldap'] = $user;
		$_SESSION['username'] = $data[0]["displayname"][0];
		$_SESSION['shop'] = $data[0]["postofficebox"][0];
		$_SESSION['otdel_id'] = $data[0]["extensionattribute5"][0];
		echo 'true';
	}

} else {
	echo "Ошибка! Необходимо авторизоваться под личным лдапом!";
}
?>