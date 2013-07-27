<?php
session_start();
include("../Model/db.php");

$db = new db('paintball', 5556, 'CS360', 'CS360', 'LeahMVC', 'image', 'logininfo');

$username = $_POST['username'];
$password = $_POST['password'];

$valid = $db->checklogin($username, $password);

if ($valid)
{
	$_SESSION['username'] = $username;
	header('Location: ../View/uploadimage.php');
}
else
{
	//unset($_SESSION['username']);
	header('Location: ../View/login.php');
}

?>
