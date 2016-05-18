<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Create user</title>
</head>
<body>
<?php
//Variables
$firstname = make_safe($_POST['firstname']);
$surname = make_safe($_POST['surname']);
$hashedpass = password_hash($_POST['password'], PASSWORD_DEFAULT);
$email = $_POST['email'];
if (empty ($password) || empty ($email)) { 
echo "<h3>Alueet eiv&aumlt saa olla tyhjiä</h3>";
echo "<a href=\"login.php\">Takaisin</a>";} else {
//Connect to database
$yhteys = mysql_connect('localhost', 'root', 'rootpass');
//Choose the database
mysql_select_db('rentoutussovellus', $yhteys);
//Add user to database
mysql_query("INSERT INTO users (fname, lname, pass, sahkoposti, admin) VALUES ('$firstname', '$surname', '$hashedpass', '$email', 'false')");
//Disconnect from database
mysql_close($yhteys);
//Redirect back to index page
header("Location: login.php");
}
?>

</body>
</html>
