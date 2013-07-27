<?php 
session_start();

if (!isset($_SESSION['username']))
	Header("Location: login.php");
?>

<html>
    <head>
        <title>Upload Image</title>
    </head>
<body>
<?php include("../Controller/handleimages.php"); ?>
<?php include("viewtools.php"); ?>
<?php theNav(); ?>

<h1>Upload an Image</h1>

<form enctype="multipart/form-data" action="../Controller/imageuploader.php" method="POST">
	Choose a file to upload: 
		<input name="uploadedfile" type="file"><br>
	Please enter a title: 
		<input name="title" type="text" maxlength="50"><br>
	Please enter a brief description:
		<input name="description" type="text" maxlength="200"><br>
	<input type="submit" value="Upload File" />
</form>
<p><a href="../Controller/logout.php">Logout</a></p>

</body>
</html>
