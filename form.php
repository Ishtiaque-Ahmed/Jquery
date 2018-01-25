<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
<h1>Select actor by alphabet</h1>
<div class="form-group">
	<form method="post" action="#">
	<select>
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



</body>
</html>

