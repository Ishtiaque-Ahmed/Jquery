<?php

function connect()
{
	global $con;
	 echo "<table border=1>
        <tr>
        
        <th> Name </th>
   

        </tr>";
	try {

		$con=new PDO("mysql:host=localhost;dbname=sakila", "root","");
	  	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  	$sql="SELECT * FROM actor";
	  	$statement = $con->prepare($sql);
		$statement->execute();

			$count = $statement->rowCount();
	
			if( $count > 0 ) {

			   /*  $R = $statement->fetchAll( PDO::FETCH_ASSOC );
			     print_r($R);*/

			     foreach ($statement as $key) {
			     	 echo "<tr>";
			     	 echo "<td>" .$key['first_name']. "</td>";
			     	 echo "</tr>";

			     }

			    /* for( $x = 0; $x < count($R); $x++ ) {

			        echo "<tr>";
			        echo "<td>" . $R[ $x ]['actor_id'] . "</td>";
			        echo "<td>" . $R[ $x ]['first_name'] . "</td>";
			        echo "<td>" . $R[ $x ]['last_name'] . "</td>";
			        echo "</tr>";

			     }*/

			}
	  	
	}
	catch(PDOException $e)
	{
			echo $e->getMessage();
	}




}

connect();