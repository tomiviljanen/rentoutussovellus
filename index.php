<?php
session_start();
if(empty($_SESSION['userid']))
    {
    header('Location:login.php');;
    }else{
echo "Hello " . ucfirst($_SESSION["firstname"]) . " " . ucfirst($_SESSION["surname"]);







}
?>