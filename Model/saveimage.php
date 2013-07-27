<?php
//responsible for saving an uploaded image to some pre-determined directory

include("db.php");

function saveImage($fileName, $tmpFileName, $fileSize, $fileType, $title, $description)
{
	//save to ../Images/<filename>
	$guid = guid();
	$targetPath = '../Images/' . $guid;
	
	if (move_uploaded_file($tmpFileName, $targetPath))
	{
		//also need to add it in the database
		$db = new db('paintball', 5556, 'CS360', 'CS360', 'LeahMVC', 'image', 'logininfo');
	
		$imageTbl = $db->imageTable;

	
		$beginRating = 0;
		//id, title, description, path, rating, submissionDate
		$query = "INSERT INTO image (title, description, path, rating, submissiondate)
				VALUES ('$title', '$description', '$targetPath', '$beginRating', NOW())";
				
		$stmt = $db->dbh->prepare($query);
		$stmt->execute();
		
		return true;
	}
	else
	{
		return false;
	}
}

function guid()
{
    if (function_exists('com_create_guid'))
    {
        return com_create_guid();
    }
    else
    {
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);
        $uuid = chr(123)
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12)
                .chr(125);
        return $uuid;
    }
}

?>
