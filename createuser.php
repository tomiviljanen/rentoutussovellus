<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Create user</title>
</head>
<body>
<?php
//Variables
$firstname = $_POST['firstname'];
$surname = $_POST['surname'];
$hashedpass = password_hash($_POST['password'], PASSWORD_DEFAULT);
$email = $_POST['email'];

//Database
include('db.php');
$statement = $con->prepare("INSERT INTO users (fname, lname, sahkoposti, pass, admin) VALUES (?, ?, ?, ?, 0)");
$statement->bind_param('ssss', $firstname, $surname, $email, $hashedpass);
$statement->execute();
$con->close();
header("Location: login.html");

?>

</body>
</html>
