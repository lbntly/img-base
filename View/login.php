<?php session_start(); ?>
<?php
if (isset($_SESSION['username']))
{
	header('Location: uploadimage.php');
}
?>
<html>
    <head>
        <title>Login</title>
    </head>
<body>
<?php include("viewtools.php"); ?>
<?php theNav(); ?>
<h1>Please Login to Upload Images</h1>
	<table border="0">
	<form method="POST" action="../Controller/checklogin.php">
	<tr><td>Username</td><td>:</td><td><input type="text" name="username" size="20"></td></tr>
	<tr><td>Password</td><td>:</td><td><input type="password" name="password" size="20"></td></tr>
	<tr><td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" value="Login"></td></tr>
	</form>
	</table>

</body>
</html>
