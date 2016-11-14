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
//Variables
$email = $_POST['email'];
$password = $_POST['password'];
//if empty give this instead
if (empty ($password) || empty ($email)) { 
echo "<h3>Alueet eiv&aumlt saa olla tyhjiä</h3>";
echo "<a href=\"login.php\">Takaisin</a>";} else {
//Connect to database server
include('db.php');
$statement = $con->prepare("SELECT fname, lname, sahkoposti, pass, user_id FROM users WHERE sahkoposti = ?");
$statement->bind_param('s', $email);
$statement->execute();
$statement->bind_result($fname, $lname, $sahkoposti, $pass, $user_id);
$statement->fetch();

if(password_verify($password, $pass)){
	$_SESSION["userid"] = $user_id;
	$_SESSION["firstname"] = $fname;
	$_SESSION["surname"] = $lname;
	$_SESSION["email"] = $sahkoposti;
	session_write_close();
	header("Location: index.php");
}else{
	echo "Salasana ja sähköposti eivät täsmää";
}
//Back to sign in page link
echo "<br><a href=\"login.php\">Takaisin</a>";
//Close connection to database
$con->close();
}
?>
</div>
</body>
</html>
