<!DOCTYPE HTML PUBLIC  "-//W3C//DTD HTML 4.01//EN"


<html>
<head>
	<meta charset = "UTF-8">
	<link rel = "stylesheet" type = "text/css" href = "css/index.css">
	<title>Авторизация - карточка подготовки паллет</title>
	
</head>
<body>
	<script src = "js/index.js"></script>
	<div id= "loginform" name = "loginform">
		<label for = "login">Ldap</label><br>
		<input type = "text" id = "login" name = "login" autofocus></input><br>
		<label for = "password" >Пароль</label><br>
		<input type = "password" id = "password" name = "password"></input><br>
		<button id = "loginbtn" name = "loginbtn" onclick = "loginbtn_clk()">Войти</button>
	</div>
	<div id= "version" name= "version">Версия 0.1 RC</div>
</body>

</html>