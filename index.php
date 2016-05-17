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

<label for="password">Salasana</label>
<input type="password" name="password" id="password"/>

<label for="email">Sähköposti</label>
<input type="email" name="email" id="email" placeholder="Esim. matti@gmail.com"/>

<input type="Submit" value="Laheta">
</form>
<?php
// vieraskirjasql.php

//Yhteys
$yhteys = mysql_connect('localhost', 'root', 'cnfCa8hb');

//Tietokanta
mysql_select_db('users', $yhteys);

//SQL-kysely
$result = mysql_query('SELECT name, pass, sahkoposti, admin, user_id FROM users ORDER BY name ASC', $yhteys);

//Rivimäärä
$lkm = mysql_num_rows($result);

//Tulokset läpi
$i = 1;
while($i <= $lkm) {
	
	$rivi = mysql_fetch_assoc($result);
	
	echo "<p>" . $rivi['name'] . " " . $rivi['pass'] . " (" . $rivi['sahkoposti'] . ")";
	echo "<br>Onko admin " . $rivi['admin'] . ", User id <b>" . $rivi['user_id'] . "€</b>";
	$i++;
}

mysql_close($yhteys);
?>
</body>
</html>