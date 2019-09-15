<?php
session_start();
if (isset($_SESSION["ldap"])){
	header("location: card.php");
}
?>

<html>
<head>
	<meta charset = "UTF-8">
	<link rel = "stylesheet" type = "text/css" href = "css/index.css">
	<link rel = "stylesheet" type = "text/css" href = "css/main.css">
	<title>Авторизация - карточка подготовки паллет</title>	
</head>
<body>
	<script type= "text/javascript" src= "js/index.js"></script>
	<script type= "text/javascript" src= "js/jquery.js"></script>
	<div id= "header" name= "header">
		<p>Карточка подготовки паллет</p>		
	</div>
	<div id= "triangle" name="triangle"></div>
	<div id= "logo" name="logo" ></div>
	<div id= "loginform" name = "loginform">
		<form onsubmit = "loginbtn_clk(); return false;">
			<label for = "login">Ldap</label><br>
			<input type = "text" id = "login" name = "login" autofocus></input><br>
			<label for = "password" >Пароль</label><br>
			<input type = "password" id = "password" name = "password"></input><br>
			<input type = "submit" id = "loginbtn" name = "loginbtn" value = "Войти"></input>
		</form>
	</div>
	<div id= "alerts" name= "alerts"></div>
	<div id= "version" name= "version">Версия 9.2019</div>
</body>

</html>