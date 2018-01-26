<?php

function connect()
{
	global $con;
	try {

		$con=new PDO("mysql:host=localhost;dbname=sakila", "root","");
	  	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  }
	  catch(PDOException $e)
	  {
	  	echo $e->getMessage();
	  }
}

function getActors()
{
	global $con;
	$sql="SELECT first_name,last_name FROM actor";
	$statement=$con->prepare($sql);
	$statement->execute();
}
function getActors_by_lastname( $letter )
{
	global $con;
	$sql="SELECT first_name,last_name FROM actor where last_name Like :letter Limit 50";
	$statement=$con->prepare($sql);
	$statement->execute(array (':letter'=>$letter."%"));
	return $statement->fetchAll( PDO::FETCH_ASSOC );
}