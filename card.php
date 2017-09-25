<?php
session_start();
if (!isset($_SESSION["ldap"])){
	header("location: index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<meta charset = "UTF-8">
	<link rel = "stylesheet" type = "text/css" href = "css/card.css">
	<title>Карточка подготовки паллеты</title>	
</head>
<body>
<?php echo $_SESSION["shop"]; ?>
	<script type= "text/javascript" src= "js/card.js"></script>
	<script type= "text/javascript" src= "js/jquery.js"></script>
	<div id= "header" name= "header">
		<a href= "index.php" onclick= "logout();">Выйти</a>
	</div>
	<div id= "triangle" name="triangle"></div>
	<div id= "logo" name="logo" ></div>
	<div id= "alerts" name= "alerts"></div>
</html>