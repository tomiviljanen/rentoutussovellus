<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
</head>
<body>

<form id="create user" method="post" action="createuser.php">


<label for="username">Koko nimi</label>
<input type="text" name="username" id="username" placeholder="Esim. Matti Matikainen"/>
<br>
<label for="password">Salasana</label>
<input type="password" name="password" id="password"/>
<br>
<label for="email">Sähköposti</label>
<input type="email" name="email" id="email" placeholder="Esim. matti@gmail.com"/>
<br>
<input type="Submit" value="Laheta">
</form>
<?php
// vieraskirjasql.php

//Yhteys
$yhteys = mysql_connect('localhost', 'root', 'cnfCa8hb');

//Tietokanta
mysql_select_db('rentoutussovellus', $yhteys);

//SQL-kysely
$result = mysql_query('SELECT * FROM users ORDER BY name ASC', $yhteys);

//Rivimäärä
$lkm = mysql_num_rows($result);

//Tulokset läpi
$i = 1;
while($i <= $lkm) {
	
	$rivi = mysql_fetch_assoc($result);
	
	echo "<p><b>Nimi:</b> " . $rivi['name'] . "<br><b>Suojattu salasana:</b> " . $rivi['pass'] . "<br><b>Sahkoposti:</b> " . $rivi['sahkoposti'];
	echo "<br><b>Onko admin:</b> " . $rivi['admin'];
	echo "<br><b>User id:</b> " . $rivi['user_id'];
	$i++;
}

mysql_close($yhteys);
?>
</body>
</html>