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
$newmail = $_POST['newmail'];
$verifymail = $_POST['verifymail'];
$userid = $_SESSION['userid'];
if(strcmp($newmail, $verifymail) == 0){	
	$checkmail = $newmail;
}else{
	header("Location: error.php");
}

$yhteys = mysql_connect('localhost', 'root', 'rootpass');
//Choose database
mysql_select_db('rentoutussovellus', $yhteys);

//Get email and password with that matches the email that was inputted
mysql_query("UPDATE users SET sahkoposti = '$checkmail' where user_id = $userid");
$_SESSION['email'] = $checkmail;
echo "Sähköpostin vaihto onnistui, sinut ohjataan takaisin etusivulle 5 sekunnin kuluttua";
echo "<br><a href=\"index.php\">Paina tästä linkistä jos sinua ei auttomaattisesti ohjata etusivulle</a>";
header('refresh: 5; URL=index.php');

?></div>
</body>
</html>
