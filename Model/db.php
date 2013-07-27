<?php
class db
{
    public $imageTable;
    public $loginTable;
    public $dbh;

	/*
	
	db: LeahMVC
	
	CREATE TABLE image (
		id INT AUTO_INCREMENT, 
		title VARCHAR(50),
		description VARCHAR(200),
		path VARCHAR(200),
		rating INT,
		submissiondate TIMESTAMP,
		PRIMARY KEY ( id )
	);
	
	CREATE TABLE logininfo (
		username VARCHAR(20) NOT NULL,
		password VARCHAR(20) NOT NULL
	);
	
	*/
	
	 
    public function __construct($host, $port, $user, $passwd, $dbname, $imgTbl, $loginTbl)
    {
        $this->imageTable = $imgTbl;
        $this->loginTable = $loginTbl;

        $dsn = "mysql:host=" . $host . ";port=" . $port . ";dbname=" . $dbname;
        try
        {
			$this->dbh = new PDO($dsn, $user, $passwd);
        }
        catch (PDOException $e)
        {
			die("Unable to connect to database with dsn=[$dsn]: ". $e->getMessage());
        }
    }
    
    public function retrieveImageData($imageID)
    {
    }
    
    public function getRecentImages()
    {
		$imageTbl = $this->imageTable;
		$query = "SELECT * FROM $imageTbl ORDER BY submissiondate DESC LIMIT 10";
		try
		{
			$i = 0;
			foreach($this->dbh->query($query) as $row)
			{
				$images[$i++] = $row;
			}
			return $images;
		}
		catch (PDOException $e)
		{
			die("Error: " . $e->getMessage());
		}
    }
    
    public function getPopularImages()
    {
		$imageTbl = $this->imageTable;
		$query = "SELECT * FROM $imageTbl ORDER BY rating DESC LIMIT 10";
		try
		{
			$i = 0;
			foreach($this->dbh->query($query) as $row)
			{
				$images[$i++] = $row;
			}
			return $images;
		}
		catch (PDOException $e)
		{
			die("Error: " . $e->getMessage());
		}
	}
    
    public function changeImageRating($imageID, $rating)
    {
		
		$imageTbl = $this->imageTable;
		
		$crQuery = $this->dbh->prepare("SELECT rating FROM $imageTbl WHERE id=$imageID");
		$crQuery->execute();
		$row = $crQuery->fetch();
		$currentRating = $row['rating'];
		
		if ($rating=='like')
			$newRating = $currentRating+1;
		else if ($rating=='dislike')
			$newRating = $currentRating-1;
		
		$query = "UPDATE $imageTbl SET rating = $newRating WHERE id=$imageID";
		$stmt = $this->dbh->prepare($query);
		$stmt->execute();
		
		return $newRating;
    }
    
    public function checklogin($username, $password)
    {
		if (empty($username) || empty($password))
			return FALSE;
		
		$loginTbl = $this->loginTable;
		$query = $this->dbh->prepare("SELECT * FROM $loginTbl WHERE username='$username'");
		$query->execute();
		$row = $query->fetch();
		$dbPass = $row['password'];
		
		return ($password == $dbPass);
    }
    
}

?>
