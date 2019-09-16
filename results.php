<html>
	<head>
	</head>
	<body>
		<?php
		//Main
		require('includes/db.php'); //Database Credentials
		$sql = "includes/query.sql"; //SQL file
		
		$connection = pg_connect("host=$host dbname=$database port=$port user=$user password=$password") 
			or die("Failed to create connection to database: ". pg_last_error(). "<br/>");
			
		$query = readQuery($sql);
		$results = pg_query($query);		
		$collection = pg_fetch_all($results);		
		printResults($collection);
		
		pg_close($connection);
		
		//Functions
		function readQuery($filename) {
			$fcommand = fopen($filename, "r");
			$query = fread($fcommand, filesize($filename));						
			return $query;
		}

		function printResults($collection)	{
			$i = 0;
			echo $i;
			while ($i < count($collection)) {
			//	echo "test";
				echo $collection[$i]['catalog_url'];
            	//echo '<a href="'.$collection[$i]['catalog_url'].'rel="noopener noreferrer" target="_blank">'.'<br><u><b>'.$collection[$i]['title'].'</b></u></a>';
			echo '<br>';
			$i++;
			}
		}	
		?>
	</body>
</html>