<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script
		  src="https://code.jquery.com/jquery-3.3.1.min.js"
		  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		  crossorigin="anonymous">
		  	
	</script>
	<style type="text/css">
		.stick{
			color: yellow;
		}
	</style>
</head>
<body>
<article>
	<h1></h1>
	<p>Lorem ipsum dolor</p>
	<p>
		After the h1
	</p>
</article>
<script type="text/javascript">
	$(document).ready(function()
	{
			$('h1').append("Nice");
			$('<h2></h2>',{
				text:"Inside",
				class: "stick"
			}).appendTo('article');
			$('h1').clone(true).appendTo('article');

	});

</script>
	

</body>
</html>