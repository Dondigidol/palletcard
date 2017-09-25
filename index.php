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
		<label for = "login">Ldap</label><br>
		<input type = "text" id = "login" name = "login" autofocus></input><br>
		<label for = "password" >Пароль</label><br>
		<input type = "password" id = "password" name = "password"></input><br>
		<button id = "loginbtn" name = "loginbtn" onclick = "loginbtn_clk()">Войти</button>
	</div>
	<div id= "alerts" name= "alerts"></div>
	<div id= "version" name= "version">Версия 0.1 RC</div>
</body>

</html>