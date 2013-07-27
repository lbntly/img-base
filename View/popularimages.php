<html>
    <head>
        <title>View Popular Images</title>
        <script type="text/JavaScript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/JavaScript" src="vote.js"></script>
    </head>
<body>

<?php include("../Controller/handleimages.php"); ?>
<?php include("viewtools.php"); ?>
<?php theNav() ?>


<h1>Browse Most Popular Images</h1>

<?php 
	$images = getPopularImages(); 
	
	foreach ($images as $image)
	{
		echo '<h3>' . $image['title'] . '</h4>';
		echo '<img width="500px" src="' . $image['path'] . '">';
		echo '<p>' . $image['description'] . '</p>';
		echo '<p>Rating:</p><div id=' . $image['id'] . '>' . $image['rating'] . '</div>';
		//the image id is passed in the input as the 'name' attribute
		echo '<button type="button" onclick="upvote(' . $image['id'] . ')" class="like">Vote Up</button>';
		echo '<button type="button" onclick="downvote(' . $image['id'] . ')" class="dislike">Vote Down</button>';
	}
	
?>

</body>
</html>
