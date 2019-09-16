<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php
		//1. include database, query, and functions files
		require('includes/db.php'); 
		$sql = "includes/home_query.sql"; 
		require('includes/home_functions.php'); 
		ini_set('memory_limit', '1024M'); 	

		//2. set results per page
		$perPage = 15;	
	?>
    <title>New Releases</title>
      <!-- Bootstrap CSS CDN -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
      <!-- Our Custom CSS -->
      <link rel="stylesheet" href="style.php">
      <!-- Font Awesome JS -->
      <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
      <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
   </head>
   <body>
      <div class="wrapper">
      <!-- Sidebar -->
		<?php 
			include('includes/sidebar_1.php');
		?>
	 <!-- End Sidebar -->
      <!-- Page Button Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Show/Hide Menu</span>
                    </button>					
                </div>
            </nav>
        </div>
		<div class="container">
		<?php
		echo "<br><br><br><br><h3>"."<a href='home.php'>New Releases"."</h3></a>";
		echo "<h6>"."Titles recently added to the library catalog."."</h6>";
		
		//3. open database
		$connection = pg_connect("host=$host dbname=$database port=$port user=$user password=$password") 
			or die("Failed to create connection to database: ". pg_last_error(). "<br/>");				

		//4. read and filter your query		
		$query = readQuery($sql);	

		//5. add limits and offsets to your query			
		$query = limitQuery($query, $perPage);			

		$results = pg_query($query);
									
		if (!$results) {
			echo "An error occurred.\n";
			exit;
		}					

		//6. get query results						
		$collection = pg_fetch_all($results);
		
		//7. get total rows
		$total_rows = getTotalRows($collection);			

		if (is_null($total_rows)) {
			echo "<br>";
			echo "0 results found.<br>";
		}
		
		else if (!is_null($total_rows)) {
			echo "<br>";						
			
			//8. print results
			tableHeaders();
												
			printTable($collection, $perPage, $alias, $secret);	
			
			echo "<br>";								
		}
		echo "<br>";	
		
		//9. close database 
		pg_close($connection);								
		?>								

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>
</html>