<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
</head>
<body>
<?php
session_start();






?>
<style>
body { margin:0; padding:0; }
div{
	background-color: #A50E2D;
	color: #dbdc2b;
	display: block;
	min-width: 320px;
	max-width: 480px;
	text-align: center;
	margin: 0 auto;
	padding: 25px 0px 25px 0px;
}

input[type="submit"]{
	margin-top: 25px;
}

</style>
<div>
	<!-- Kirjautuiminen sisään-->
	<form id="log in" method="post" action="loginverify.php">
		<h2>Kirjaudu sisään</h2>
		<label for="email">Sähköposti</label><br>
		<input type="email" name="email" id="email" required/>

		<br>
		<label for="password">Salasana</label><br>
		<input type="password" name="password" id="password" required/>
		
		<br>
		<input type="submit" value="Kirjaudu sisään">
	</form>
</div>
<div>
	<!-- Uuden käyttäjän teko-->
	<form id="create user" method="post" action="createuser.php">
		<h2>Tee uusi käyttäjä</h2>
		<label for="firstname">Etunimi</label><span>*</span><br>
		<input type="text" name="firstname" id="firstname" required/>
		<br />
		<label for="surname">Sukunimi</label><span>*</span><br>
		<input type="text" name="surname" id="surname" required/>
		<br>
		<label for="password">Salasana</label><span>*</span><br>
		<input type="password" name="password" id="password" required/>
		
		<br>
		<label for="email">Sähköposti</label><span>*</span><br>
		<input type="email" name="email" id="email" required/>
		<br>
		<span>*-kentät ovat pakollisia</span>
		<br>
		<input type="Submit" value="Luo käyttäjä">

	</form>
</div>
</body>
</html>