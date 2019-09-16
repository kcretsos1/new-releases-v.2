<?php
// Subject Labels	
$collection_labels = array(
				"Location 1",
				"Location 2",
				"Location 3",
				"Location 4",
	);
	
// Subject URLs	
$collection_URL = array(
				"headings0",
				"headings1",
				"headings2",
				"headings3",
	);	

//Location filter
$location_scope = array(
				" AND brl.location_code LIKE 'mn%' ", // Lesiure Reading Collection
				" AND ((brl.location_code LIKE 'm%') AND (brl.location_code NOT LIKE 'mn%') AND (brl.location_code NOT LIKE 'multi%')) ", //Marian Library
				" AND brl.location_code LIKE 'ru%' ", //US Catholic
				" AND ((brl.location_code LIKE 'ra%') OR (brl.location_code LIKE 're%')) ", //Archives and Rare Books
		);	
	

//Catatloging Date Filter		
$date_scope = array(
				"", // Lesiure Reading Collection
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '1 year'::INTERVAL) ", //Marian Library
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '1 year'::INTERVAL) ", //US Catholic
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '1 year'::INTERVAL) " //Archives and Rare Books
	);	

//GroupBy Filter
$groupBy_scope = array(
				" GROUP BY 1,2,3,4,5,6,7,8 ", // Lesiure Reading Collection
				" GROUP BY 1,2,3,4,5,6,7,8  ", //Marian Library
				"  GROUP BY 1,2,3,4,5,6,7,8  ", //US Catholic
				"  GROUP BY 1,2,3,4,5,6,7,8  ", //Archives and Rare Books
	);		

//Order By Filter	
$orderBy_scope = array(
				" ORDER BY 5 DESC ", // Lesiure Reading Collection
				" ORDER BY 5 DESC ", //Marian Library
				" ORDER BY 5 DESC ", //US Catholic
				" ORDER BY 5 DESC ", //Archives and Rare Books
	);		
			
	?>