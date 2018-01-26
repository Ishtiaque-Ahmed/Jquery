<?php
require 'functions.php';
if(isset($_POST['q']))
{
		//print_r( $_POST['q']);
		connect();
		$temp=getActors_by_lastname($_POST['q']);
	//	print_r($temp);
	//	echo json_encode($temp);

		
		echo "<ul>";
		foreach ($temp as $key) {
				echo "<li>{$key['first_name']} {$key['last_name']}</li>";
		}
		echo "</ul>";
		

}
//echo "string";
?>