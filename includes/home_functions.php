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

        function readQuery($filename) {
			$fcommand = fopen($filename, "r");
            $query = fread($fcommand, filesize($filename));				
            return $query;
		}											

        function limitQuery($query, $perPage) {
			$perPage = $perPage * 4;
			$query .= " LIMIT ".$perPage;
			return $query;
        }
			
		function getTotalRows($collection) {
			$i = 0;

			if(empty($collection)) {
				return null;
			}				
				
			while ($i < (count($collection))) {
				$i++;
			}
			return $i;				
		}						
								
		function tableHeaders() {
			// Start table headers
			echo '<table id = "myTable">';
			echo "<tr>";
			echo "<th class='.col-'> </th>";
			echo "<th class='.col-'> </th>";
			echo "<th class='.col-'> </th>";
			echo "</tr>";
			// end table headers
		}								

			function printTable($collection, $perPage, $user, $password) {														
				// Loop through each bib record element
				$i = 0; // count each result of query including no ISBNs
				$col = 0; // up to three columns
				$c = 1; // count each result with ISBN
				while ($i < (count($collection))) { // START LOOP
					echo '<tr>'; // START ROW
					while (($col < 3) AND ($i < count($collection))) {
						if ($i == count($collection)) {
							$col = 3;
						}
						else {
							if ($c <= $perPage) {
								printCell($collection, $i, $user, $password);
							}
							$i++;
							$c++;
							$col++;
						}
					}
					echo '</tr>'; // END ROW						
					$col = 0;
				} // END LOOP
				echo '</table>'; // END TABLE				
				}	

		function checkISBN($collection, $i, $user, $password) {
			// build URL for ISBN image
			// get dimensions, print book jacket (if available)
			// flag success of finding book jacket
			if ($i < count($collection)){
				$base = 'https://contentcafe2.btol.com/ContentCafe/Jacket.aspx?';
				$urlEnd = $collection[$i]['isbn'];
					
				if (is_null($collection[$i]['isbn'])) {
					return -1;						
				}
					
				$end = array(
					'UserID' => $user,
					'Password' => $password,
					'Return' => '1',
					'Type' => 'L',
					'Value' => $urlEnd
				);		

				$url = $base.http_build_query($end);			 
				$flag = getdims($url, $collection, $i, $user, $password);
				return $flag;					
			}
		}		

		function getdims ($url, $collection, $i, $user, $password) {
			// call a curl to get image dimensions,
			// print cell if book jacket is found
			// return a flag if successful			
			$flag = 0;
			$ch = curl_init();
			$opts = [ CURLOPT_RETURNTRANSFER => 1 , CURLOPT_URL => $url];
			curl_setopt_array($ch , $opts);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);	
			$response = curl_exec($ch);

			// Process image
			$image = imagecreatefromstring( $response );
			$dims = [ imagesx( $image ), imagesy( $image ) ];
			list($width, $height) = $dims;
			
			//If no book jacket, skip to next
			if (($width <= 1) AND ($height <= 1)) {
				imagedestroy($image);
				return $flag;
			}
			// else print cell and book jacket
			else {
				printCell($collection, $i, $user, $password);
				imagedestroy($image);
				$flag++;
				return $flag;
			}				  
		}												
								
		function printCell($collection, $i, $user, $password) {
			if ($i <= count($collection)) {
				echo '<td class=".col-">'; // START COLUMN	
				printBookJacket($collection, $i, $user, $password);
			}
			echo '</td>'; // END COLUMN
		}

		function printBookJacket($collection, $i, $user, $password) {
			if ($i <= count($collection)){
				$alt = $collection[$i]['title'];
				$title = $alt;
				$alt = str_replace("'", "", $alt);
				if (strlen($title) > 37) {
					$title = substr($title,0,37)."...";
				}
										
				if (is_null($collection[$i]['isbn'])) { // NO ISBN FOUND
					echo '<b>'.$collection[$i]['lcc'].'</b><br>';
					echo '<a href="'.$collection[$i]['catalog_url'].'rel="noopener noreferrer" target="_blank">'."<img src='https://via.placeholder.com/150x200/000000/FFFFFF/?text=+' alt='".$alt."' width='180' height='280' />";
					echo '<br><p><u>'.$title.'</a></p>';
					getFormat($collection, $i);
				}
				else	{ // ISBN FOUND	
					$isbn = $collection[$i]['isbn'];
					$isbn_url = getImage($isbn, $user, $password);
					echo '<b>'.$collection[$i]['lcc'].'</b><br>';
					echo '<a href="'.$collection[$i]['catalog_url'].'rel="noopener noreferrer" target="_blank">'."<img src=".$isbn_url." alt='".$alt."' width='180' height='280' />";
					echo '<br><p><u>'.$title.'</a></u></p>';
					getFormat($collection, $i);
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

		function getFormat($collection, $i) {
			if ($collection[$i]['mat_type'] == 'book') {
				echo "<img src='media_book.gif' alt='Book' width='60' height='60'/>";
			}
			else if ($collection[$i]['mat_type'] == 'electronic book') {
				echo "<img src='media_ebook.gif' alt='Electronic Book' width='60' height='60'/>";
			}
			else if ($collection[$i]['mat_type'] == 'journal') {
				echo "<img src='media_journal.gif' alt='Journal' width='60' height='60'/>";
			}
			else if ($collection[$i]['mat_type'] == 'electronic journal') {
				echo "<img src='media_ejournal.gif' alt='Electronic Journal' width='60' height='60'/>";
			}
			else if ($collection[$i]['mat_type'] == 'thesis') {
				echo "<img src='media_thesis.gif' alt='Thesis' width='60' height='60'/>";
			}
			else if ($collection[$i]['mat_type'] == 'electronic thesis') {
				echo "<img src='media_ethesis.gif' alt='Electronic Thesis' width='60' height='60'/>";
			}
			else if ($collection[$i]['mat_type'] == 'music recording') {
				echo "<img src='media_cdmusic.gif' alt='Music Recording' width='60' height='60'/>";
			}
			else if ($collection[$i]['mat_type'] == 'streaming music') {
				echo "<img src='media_streamingmusic.gif' alt='Streaming Music' width='60' height='60'/>";
			}
			else if ($collection[$i]['mat_type'] == 'video') {
				echo "<img src='media_film.gif' alt='Video' width='60' height='60'/>";
			}
			else if ($collection[$i]['mat_type'] == 'streaming video') {
				echo "<img src='media_streamingvideo.gif' alt='Streaming Video' width='60' height='60'/>";
			}
			else if ($collection[$i]['mat_type'] == 'non-music audio recording') {
				echo "<img src='media_nonmusicrecording.gif' alt='Non-Music Audio Recording' width='60' height='60'/>";
			}
			else if ($collection[$i]['mat_type'] == 'streaming audio') {
				echo "<img src='media_streamingaudio.gif' alt='Streaming Audio' width='60' height='60'/>";
			}
			else if ($collection[$i]['mat_type'] == 'electronic resource') {
				echo "<img src='media_eresource.gif' alt='Electronic Resource' width='60' height='60'/>";
			}
			else if ($collection[$i]['mat_type'] == 'database') {
				echo "<img src='media_database.gif' alt='Database' width='60' height='60'/>";
			}
			else if ($collection[$i]['mat_type'] == 'computer file') {
				echo "<img src='media_computerfile.gif' alt='Computer File' width='60' height='60'/>";
			}
			else if ($collection[$i]['mat_type'] == 'microform') {
				echo "<img src='media_microform.gif' alt='Microform' width='60' height='60'/>";
			}
			else if ($collection[$i]['mat_type'] == 'instructional material') {
				echo "<img src='media_instructional.gif' alt='Instructional Material' width='60' height='60'/>";
			}
			else if ($collection[$i]['mat_type'] == 'mixed material') {
				echo "<img src='media_mixedmat.gif' alt='Mixed Material' width='60' height='60'/>";
			}
			else if ($collection[$i]['mat_type'] == '3D object') {
				echo "<img src='media_3dobject.gif' alt='Three-Dimensional Object' width='60' height='60'/>";
			}
			else if ($collection[$i]['mat_type'] == '2D graphic') {
				echo "<img src='media_2dgraphic.gif' alt='Two-Dimensional Graphic' width='60' height='60'/>";
			}
			else if ($collection[$i]['mat_type'] == 'map') {
				echo "<img src='media_map.gif' alt='Map' width='60' height='60'/>";
			}
			else if ($collection[$i]['mat_type'] == 'map manuscript') {
				echo "<img src='media_map.gif' alt='Map' width='60' height='60'/>";
			}
			else if ($collection[$i]['mat_type'] == 'manuscript') {
				echo "<img src='media_manuscript.gif' alt='Manuscript' width='60' height='60'/>";
			}
			else if ($collection[$i]['mat_type'] == 'printed music score') {
				echo "<img src='media_printedmusic.gif' alt='Music Score' width='60' height='60'/>";
			}
			else if ($collection[$i]['mat_type'] == 'printed music score manuscript') {
				echo "<img src='media_printedmusic.gif' alt='Music Score' width='60' height='60'/>";
			}
			else if ($collection[$i]['mat_type'] == 'kit') {
				echo "<img src='media_kit.gif' alt='Kit' width='60' height='60'/>";
			}
			else {
				echo "<img src='media_other.gif' alt='other resource' width='60' height='60'/>";
			}
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