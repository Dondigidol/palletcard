<?php
session_start();

try {
	unset($_SESSION["ldap"]);
	unset($_SESSION["username"]);
	unset($_SESSION["job"]);
	unset($_SESSION["root"]);
	session_destroy();
	header("location: ./index.php");
} catch (Exception $e) {
	return $e.getMessage();
}


?>