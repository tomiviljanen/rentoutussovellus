<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Create user</title>
</head>
<body>
<?php
//Variables
$username = $_POST['username'];
$password = $_POST['password'];
$hashedpass = password_hash($password, PASSWORD_DEFAULT);
$email = $_POST['email'];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
//if empty do this instead
if (empty($username) || empty ($password) || empty ($email)) { 
echo "<h3>Alueet eiv&aumlt saa olla tyhjiä</h3>";
echo "<a href=\"index.php\">Takaisin</a>";} else {
//Connect to database
$yhteys = mysql_connect('localhost', 'root', 'cnfCa8hb');
//Choose the database
mysql_select_db('rentoutussovellus', $yhteys);
//Add user to database
mysql_query("INSERT INTO users (name, pass, sahkoposti, admin) VALUES ('$username', '$hashedpass', '$email', 'false')");
//Disconnect from database
mysql_close($yhteys);
//Redirect back to index page
header("Location: index.php"); 
}
?>

</body>
</html>
