<?php

	include("../Model/db.php");
	
	$rating = $_POST["rating"];
	$imageID = $_POST["imageid"];
	
	$db = new db('paintball', 5556, 'CS360', 'CS360', 'LeahMVC', 'image', 'logininfo');

	$newRating = $db->changeImageRating($imageID, $rating);
	
	echo $newRating;

?>
