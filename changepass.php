<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Change pass</title>
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
$oldpass = $_POST['oldpass'];
$userid = $_SESSION['userid'];
$hashedpass = password_hash($newpass, PASSWORD_DEFAULT);

include('db.php');
	$statement_password = $con->prepare("SELECT pass FROM users WHERE user_id = ?");
	$statement_password->bind_param('i', $_SESSION['userid']);
	$statement_password->execute();
	$statement_password->bind_result($old_pass);
	$statement_password->fetch();
	$statement_password->close();
	if(password_verify($oldpass, $old_pass)){
		$statement_newpassword = $con->prepare("UPDATE users SET pass= ? WHERE user_id= ?");
		$statement_newpassword->bind_param('si', $hashedpass, $userid);
		$statement_newpassword->execute();
		header('Location: index.php');
	}else{
		echo "old password is not correct";
	}
?>
</div>
</body>
</html>
