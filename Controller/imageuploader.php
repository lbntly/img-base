<?php

	include("../Model/saveimage.php");
	include("../View/viewtools.php");

	$fileName = $_FILES['uploadedfile']['name'];
	$tmpFileName = $_FILES['uploadedfile']['tmp_name'];
	$fileSize = $_FILES['uploadedfile']['size'];
	$fileType = $_FILES['uploadedfile']['type'];
	
	$title = $_POST['title'];
	$description = $_POST['description'];

	$isImage = (($fileType == 'image/gif') || 
				($fileType == 'image/jpeg') || 
				($fileType == 'image/pjpeg') || 
				($fileType == 'image/png'));
	
	//10000000 - 10 mb
	if (($fileSize > 10000000) || !$isImage)
	{
		echo 'Cannot upload file; must be an image file (gif/jpeg/png) under 10 mb. Press the back button on your browser to try again.';
	}
	else if (empty($title) || empty($description) || empty($fileName))
	{
		echo 'Please include a file, title, & description. Press the back button on your browser to try again.';
	}
	else
	{
		if (saveImage($fileName, $tmpFileName, $fileSize, $fileType, $title, $description))
		{
			theNav();
			echo '<br>The file ' . basename($fileName) . ' was successfully uploaded.';
		}
		else
		{
			echo 'Error uploading file, pls try once more. Press the back button on your browser to try again.';
		}
	}
	
?>
