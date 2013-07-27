<?php
        include("../Model/db.php");
        
        

		function getRecentImages()
		{
			$db = new db('paintball', 5556, 'CS360', 'CS360', 'LeahMVC', 'image', 'logininfo');
			return $db->getRecentImages();
		}
		
		function getPopularImages()
		{
			$db = new db('paintball', 5556, 'CS360', 'CS360', 'LeahMVC', 'image', 'logininfo');
			return $db->getPopularImages();
		}
		
		
?>
