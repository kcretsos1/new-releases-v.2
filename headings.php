<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php
		//1. include database, query, arrays, and functions files
		require('includes/db.php'); 
		$sql = "includes/headings_query.sql";
		require('includes/headings_functions.php');
		require('includes/headings_arrays.php');
		ini_set('memory_limit', '1024M');	

		//2. set index and pass filters
		$index = 0;
		$collection_name = $collection_labels[$index];
		$url = $collection_URL[$index];
		$location = $location_scope[$index];
		$date = $date_scope[$index];
		$groupBy = $groupBy_scope[$index];
		$orderBy = $orderBy_scope[$index];
		// 0. Location 1
		// 1. Location 2
		// 2. Location 3
		// 3. Location 4
	?>
    <title>New <?php echo $collection_name." "; ?>Titles</title>
      <!-- Bootstrap CSS CDN -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
      <!-- Our Custom CSS -->
      <link rel="stylesheet" href="styling_2.php">
      <!-- Font Awesome JS -->
      <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
      <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
   </head>
   <body>
      <div class="wrapper">
      <!-- Sidebar -->
		<?php 
			include('includes/sidebar_2.php');
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
		echo "<br><br><br><br><h3>".$collection_name."</h3>";
		echo "<h6>"."Titles recently added to the library catalog."."</h6>";
		
		//3. open database connection
		$connection = pg_connect("host=$host dbname=$database port=$port user=$user password=$password") 
			or die("Failed to create connection to database: ". pg_last_error(). "<br/>");	
		
		//4. get page and offset	
		$perPage = 15;

		if (isset($_GET['p'])) {
			$page = $_GET['p'];
		} 
		else {
			$page = 1;
		}
		
		$offset = ($page-1) * $perPage;
		if ($offset < 0) {
			$offset = 0;
		}						

		$url = clean(getPage($url));

		//5. read and filter query		
		$query = filterQuery($sql, $location, $date, $groupBy, $orderBy);

		$results = pg_query($query);
									
		if (!$results) {
			echo "An error occurred.\n";
			exit;
		}

		$collection = pg_fetch_all($results);

		//6. get the total rows
		$total_rows = getTotalRows($collection); //for counting total results		

		//7. add per page and offset limits		
		$query = limitQuery($query, $perPage, $offset);			

		$results = pg_query($query);
									
		if (!$results) {
			echo "An error occurred.\n";
			exit;
		}					

		//8. get query results with new limits							
		$collection = pg_fetch_all($results);

		if (is_null($total_rows)) {
			echo "<br>";
			echo "0 results found.<br>";
		}
		
		else if (!is_null($total_rows)) {
			echo "<br>";

			//9. get total pages
			$total_pages = ceil($total_rows/$perPage);
			$adjacents = 2;
										
			// exit program for unwanted URL manipulation
			if ($page > $total_pages) {
				exit;
			}	

			//10. get page range for pagination		
			if ($total_pages <= (1 +($adjacents*2))) {
				$start = 1;
				$end = $total_pages;
			}
										
			else {
				if (($page - $adjacents) > 1) {
					if (($page + $adjacents) < $total_pages) {
						$start = ($page - $adjacents);
						$end = ($page + $adjacents);
					}
					else {
						$start = ($total_pages - (1+($adjacents*2)));
						$end = $total_pages;
					}
				}
											
				else {
					$start = 1;
					$end = (1+($adjacents*2));
				}
			}			
			
			//11. paginate results
			paginate($total_pages, $page, $url, $start, $end);						
												
			//12. Print results
			tableHeaders();
			printTable($collection, $offset, $total_rows, $alias, $secret);	

			paginate($total_pages, $page, $url, $start, $end);					
			echo "<br>";					
		} 
		echo "<br>";	
		
		//13. close connection
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