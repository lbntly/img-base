function upvote(imgid)
{
	$.post
	(
		'../Controller/rateimage.php',
		{ rating: "like", imageid: imgid },
		function(data)
		{
			var selector = '#' + imgid;
			$(selector).empty().append(data);
		}
	);
} 
			
function downvote(imgid)
{
	$.post
	(
		'../Controller/rateimage.php',
		{ rating: "dislike", imageid: imgid },
		function(data)
		{
			var selector = '#' + imgid;
			$(selector).empty().append(data);
		}
	);
}
