<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Log in</title>

</head>

<body>

<?php //lisaasql.php
$email = $_POST['email'];
$password = $_POST['password'];
$loggedin = false;
if (empty ($password) || empty ($email)) { 
echo "<h3>Alueet eiv&aumlt saa olla tyhjiä</h3>";
echo "<a href=\"index.php\">Takaisin</a>";} else {
//Otetaan yhteys tietokantapalvelimeen
$yhteys = mysql_connect('localhost', 'root', 'cnfCa8hb');
// Valitaan oikea tietokanta
mysql_select_db('rentoutussovellus', $yhteys);
$result = mysql_query("SELECT sahkoposti, pass FROM users WHERE sahkoposti = '$email'", $yhteys);

$lkm = mysql_num_rows($result);

//Tulokset läpi
$i = 1;
if($lkm == 0){
		echo "Sähköposti ja salasana eivät täsmää";
		
		
	}else{
while($i <= $lkm) {
	
	$rivi = mysql_fetch_assoc($result);

	if(password_verify($password, $rivi['pass'])){
		echo "Kirjatuminen sisään onnistui, sinut uudelleen ohjataan etusivulle";
	}else{
		echo "Sähköposti ja salasana eivät täsmää";
	}
	
	$i++;
}
	}
			echo "<br><a href=\"index.php\">Takaisin</a>";

// Katkaistaan yhteys
mysql_close($yhteys);

}
?>

</body>
</html>
