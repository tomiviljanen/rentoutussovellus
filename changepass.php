<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Log in</title>
</head>
<body>
<style>

div{
background-color: #A50E2D;
padding: 25px;
color: #dbdc2b;
text-align: center;
}
a{
color: #46a5e5;
}

</style>
<div>
<?php
session_start();
$newpass = $_POST['newpass'];
$verifypass = $_POST['verifypass'];
$oldpass = $_POST['oldpass'];
$userid = $_SESSION['userid'];
if(strcmp($newpass, $verifypass) == 0){	
	$hashedpass = password_hash($newpass, PASSWORD_DEFAULT);
}else{
	header("Location: error.php");
}

$yhteys = mysql_connect('localhost', 'root', 'rootpass');
//Choose database
mysql_select_db('rentoutussovellus', $yhteys);

//Get email and password with that matches the email that was inputted
$result = mysql_query("SELECT pass, user_id FROM users WHERE user_id = '$userid'", $yhteys);

//how many results
$lkm = mysql_num_rows($result);

//Tulokset läpi
$i = 1;

while($i <= $lkm) {
	
	$rivi = mysql_fetch_assoc($result);
	//Check to see if inputted password matches  the one on the database
	if(password_verify($oldpass, $rivi['pass'])){
		//Password matches
		mysql_query("UPDATE users SET pass = '$hashedpass' where user_id = $userid");
		echo "Salasanan vaihto onnistui, sinut ohjataan takaisin etusivulle 5 sekunnin kuluttua";
		echo "<br><a href=\"index.php\">Paina tästä linkistä jos sinua ei auttomaattisesti ohjata etusivulle</a>";
		header('refresh: 5; URL=index.php');
	}else{
		//Password doesnt match
		echo "Nykyinen salasana oli virheellinen";
		echo "<br><a href=\"index.php\">Takaisin</a>";
	}
	$i++;
}
?></div>
</body>
</html>
