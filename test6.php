<!DOCTYPE html>
<html>
<head>
	<title></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style type="text/css">
		div.container{
			margin: auto;
			position: relative;
		}
		
			
		</style>
</head>
<body>

		<div class="container"> 
			<h1>Welcome</h1>
		<form action="#" method="post">
		
				<input type="text" name="username" required>
				<p><textarea name="comment" required></textarea></p>
				<p><button class="btn" type="submit">Submit</button></p>
			
		</form>
	</div>
		
	<script type="text/javascript">
	$('form').on('submit',function(e){
		$.post('save.php',$(this).serialize(),function(data){
				console.log(data);
		});

		e.preventDefault();
	});



	</script>
</body>
</html>