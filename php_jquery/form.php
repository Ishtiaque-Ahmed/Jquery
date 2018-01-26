<html>
<head>
	<title>Form</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<h1>Select actor by alphabet</h1>
<div class="form-group">
	<form method="post" action="index.php">
	<select name="q" id="q">
		<?php
			$alphabet=str_split("abcdefghijklmnopqrstuvwxyz");
			foreach ($alphabet as $letter) {
				echo "<option value='$letter'>$letter</option>";
			}
		?>

	</select>
	<button type="submit" id="go">Go</button>
		
	</form>
</div>
<div>
	<p id="show_result"></p>
</div>

<script src="get_actors.js"></script>

</body>
</html>