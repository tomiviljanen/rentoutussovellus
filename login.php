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
//Variables
$email = $_POST['email'];
$password = $_POST['password'];
//if empty give this instead
if (empty ($password) || empty ($email)) { 
echo "<h3>Alueet eiv&aumlt saa olla tyhjiä</h3>";
echo "<a href=\"index.php\">Takaisin</a>";} else {
//Connect to database server
$yhteys = mysql_connect('localhost', 'root', 'rootpass');
//Choose database
mysql_select_db('rentoutussovellus', $yhteys);

//Get email and password with that matches the email that was inputted
$result = mysql_query("SELECT sahkoposti, pass FROM users WHERE sahkoposti = '$email'", $yhteys);

//how many results
$lkm = mysql_num_rows($result);

//Tulokset läpi
$i = 1;
if($lkm == 0){
		echo "Sähköposti ja salasana eivät täsmää";	
	}else{
while($i <= $lkm) {
	
	$rivi = mysql_fetch_assoc($result);
	//Check to see if inputted password matches  the one on the database
	if(password_verify($password, $rivi['pass'])){
		//Password matches
		echo "Kirjatuminen sisään onnistui, sinut uudelleenohjataan etusivulle";
	}else{
		//Password doesnt match
		echo "Sähköposti ja salasana eivät täsmää";
	}
	$i++;
	}
}
//Back to sign in page link
echo "<br><a href=\"index.php\">Takaisin</a>";
//Close connection to database
mysql_close($yhteys);
}
?>
</div>
</body>
</html>
