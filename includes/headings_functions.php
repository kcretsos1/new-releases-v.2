<!DOCTYPE html>
<html>
   <body>
		<?php		
		//*********START FUNCTIONS************************************************************************************************************
			function clean($string) {
				$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
				return preg_replace('/[^A-Za-z0-9?.=&\-]/', '', $string); // Removes special chars.
			}
									
			function getPage($url) {				
				$url = $url.".php?&p=";			
				return $url;
			}					

			function filterQuery($filename, $location, $date, $groupBy, $orderBy) {
				$fcommand = fopen($filename, "r");
				$query = fread($fcommand, filesize($filename));				
				// Add  WHERE criteria to SQL file query
				$query .= $location;
				$query .= $date;
				$query .= $groupBy;
				$query .= $orderBy;			
				return $query;
			}					
								
			function getTotalRows($collection) {
				$i = 0;
				$c = $i + 1;

				if(empty($collection)) {
					return null;
				}				
				
				while ($i < (count($collection))) {
					$i++;
					$c++;
					}
					return $i;				
			}						
								
			function limitQuery($query, $perPage, $offset) {
				$limit = " LIMIT ".$perPage." OFFSET ".$offset." ";
				$query .= $limit;		
				return $query;
			}	
								
           function tableHeaders() {
            		// Start table headers
            		echo '<table id = "myTable">';
            		echo "<tr>";
            		echo "<th class='.col-'> </th>";
            		echo "<th class='.col-'> </th>";
            		echo "</tr>";
            		// end table headers
            }	

            function printTable($collection, $offset, $total_rows, $user, $password) {				          		
            		// Loop through each bib record element
            		$i = 0; // counter
            		$c = 1 + $offset; // counter starting with 1st result
					while ($i < (count($collection))) { // START LOOP
            			echo '<tr>'; // START ROW
						if ($c <= $total_rows) {
            					printCell($collection, $i, $c, $user, $password);
								}
            					$i++;
            					$c++;
            			echo '</tr>'; // END ROW						
            			//$col = 0;
            		} // END LOOP
            	echo '</table>'; // END TABLE				
            }												
								
            function printCell($coll, $i, $c, $user, $password) {
            	if ($i < count($coll)) {			
					echo '<td class=".col-">'; // START COLUMN	
					printBookJacket($coll, $i, $user, $password);
					echo '</td>'; // END COLUMN
					echo '<td class=".col-">'; // START COLUMN	
					getTitle($coll, $i);
					echo '</td>'; // END COLUMN				
            	}
            }
				
            function getTitle($collection, $i) {
            	if ($i < count($collection)){
					$title = $collection[$i]['title'];
					if (strlen($title) > 120) {
						$title = substr($title,0,120)."...";
					}
            			echo '<a href="'.$collection[$i]['catalog_url'].'rel="noopener noreferrer" target="_blank">'.'<br><u><b>'.$title.'</b></u></a>';
						echo '<br>';
						echo "<small><ul>". nl2br(str_replace('| ', "\n", $collection[$i]['subject'])).'</ul></small>';
            	}
            }					

				function printBookJacket($collection, $i, $user, $password) {
					if ($i <= count($collection)){
						$alt = $collection[$i]['title'];
						$title = $alt;
						$alt = str_replace("'", "", $alt);
										
						if (is_null($collection[$i]['isbn'])) { // NO ISBN FOUND
							echo '<a href="'.$collection[$i]['catalog_url'].'rel="noopener noreferrer" target="_blank">'."<img src='https://via.placeholder.com/150x200/000000/FFFFFF/?text=+' alt='".$alt."' width='150' height='200' />";
							echo '<br><small>'.$collection[$i]['mat_type'].'</small>';
						}
						else	{ // ISBN FOUND	
							$isbn = $collection[$i]['isbn'];
							$isbn_url = getImage($isbn, $user, $password);							
							echo '<a href="'.$collection[$i]['catalog_url'].'rel="noopener noreferrer" target="_blank">'."<img src=".$isbn_url." alt='".$alt."' width='150' height='200' />";
							echo '<br><small>'.$collection[$i]['mat_type'].'</small>';
						}
					}
				}				

				function getImage($isbn, $user, $password) {
					$base = 'https://contentcafe2.btol.com/ContentCafe/Jacket.aspx?';
					$end = array(
						'UserID' => $user,
						'Password' => $password,
						'Return' => 'T',
						'Type' => 'L',
						'Value' => $isbn
					);		
					$url = $base.http_build_query($end);
					return $url;
				}				
								
				// Create pagination navigation menu
				function paginate($tp, $p, $u, $s, $e) {
					// tp = total pages, p = pages, u = url, s = start, e = end
				?>
				<!--Start header pagination menu-->
					<?php if($tp > 1) { ?>
						<ul class="pagination pagination-sm justify-content-left">
							<!-- Link of the first page -->
							<?php //echo '&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'; ?>
							<li class='page-item <?php ($p <= 1 ? print 'disabled' : '')?>'>
								<a class='page-link' href='<?php echo $u?>1'><<</a>
							</li>
							<!-- Link of the first page -->
							<li class='page-item <?php ($p <= 1 ? print 'disabled' : '')?>'>
								<a class='page-link' href='<?php echo $u?><?php ($p>1 ? print($p-1) : print 1)?>'>Previous</a>
							</li>
							<!-- Links of the pages with page number -->
							<?php for($i=$s; $i<=$e; $i++) { ?>
								<li class='page-item <?php ($i == $p ? print 'active' : '')?>'>
									<a class='page-link' href='<?php echo $u?><?php echo $i;?>'><?php echo $i;?></a>
								</li>
							<?php } ?>
							<!-- Link of the next page -->
							<li class='page-item <?php ($p >= $tp ? print 'disabled' : '')?>'>
								<a class='page-link' href='<?php echo $u?><?php ($p < $tp ? print($p+1) : print $tp)?>'>Next</a>
							</li>
							<!-- Link of the last page -->
							<li class='page-item <?php ($p >= $tp ? print 'disabled' : '')?>'>
								<a class='page-link' href='<?php echo $u?><?php echo $tp;?>'>>>                      
								</a>
							</li>
						</ul>
							 <!--End header pagination menu-->				
						<?php } 
					}			
								
			//*********END FUNCTIONS************************************************************************************************************		
		?>								
	</body>
</html>