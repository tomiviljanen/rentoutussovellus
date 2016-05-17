<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
</head>
<body>
<style>
body { margin:0; padding:0; }
div{
	background-color: #A50E2D;
	color: #dbdc2b;
	display: inline-block;
	min-width: 320px;
	text-align: center;
}

input[type="submit"]{
	margin-top: 25px;
}

</style>
<div>
	<!-- Kirjautuiminen sisään-->
	<form id="log in" method="post" action="login.php">
		<h2>Kirjaudu sisään</h2>
		<label for="email">Sähköposti</label><br>
		<input type="email" name="email" id="email"/>

		<br>
		<label for="password">Salasana</label><br>
		<input type="password" name="password" id="password"/>
		
		<br>
		<input type="submit" value="Lähetä">
	</form>
</div>
<div>
	<!-- Uuden käyttäjän teko-->
	<form id="create user" method="post" action="createuser.php">
		<h2>Tee uusi käyttäjä</h2>
		<label for="username">Koko nimi</label><br>
		<input type="text" name="username" id="username"/>
		
		<br>
		<label for="password">Salasana</label><br>
		<input type="password" name="password" id="password"/>
		
		<br>
		<label for="email">Sähköposti</label><br>
		<input type="email" name="email" id="email"/>

		<br>
		<input type="Submit" value="Laheta">
	</form>
</div>
</body>
</html>