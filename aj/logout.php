<?php
session_start();

try {
	unset($_SESSION['user_id']);
	unset($_SESSION["username"]);
	unset($_SESSION["shop"]);
	unset($_SESSION["otdel_id"]);	
	
	session_destroy();
	header("location: ./index.php");
} catch (Exception $e) {
	return $e.getMessage();
}


?>