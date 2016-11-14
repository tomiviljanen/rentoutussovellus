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
$userid = $_SESSION['userid'];

include('db.php');
	$statement_password = $con->prepare("UPDATE users SET sahkoposti = ? WHERE user_id = ?");
	$statement_password->bind_param('si', $newmail , $_SESSION['userid']);
	$statement_password->execute();
	$statement_password->close();
	$_SESSION['email'] = $newmail;
	header("Location: index.php")
?>
</div>
</body>
</html>
