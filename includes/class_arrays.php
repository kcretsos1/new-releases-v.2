<?php

//$perPage ="";
//$offset="";
//$limit ="";
// Subject Labels	
$subject_labels = array(
				"Agriculture",
				"Anthropology and Archaeology",
				"Art",
				"Astronomy",
				"Biology",
				"Business and Management",
				"Chemistry",
				"Computer Science and Mathematics",
				"Earth and Environmental Sciences",				
				"Economics",
				"Education",				
				"Engineering and Technology",
				"Food and Home Economics",
				"History",
				"Humanities and Library Science",
				"Language and Literature",
				"Law",					
				"Medicine",
				"Military Science",		
				"Music",				
				"Philosophy",
				"Photography",
				"Physics",
				"Political Science",
				"Psychology",
				"Recreation and Leisure",
				"Religion",
				"Science and Technology",
				"Social Sciences"
	);
	
// Subject URLs	
$subject_URL = array(
				"agriculture",
				"anthropology",
				"art",
				"astronomy",
				"biology",
				"business",
				"chemistry",
				"computer",
				"earth",				
				"economics",
				"education",				
				"engineering",
				"food",
				"history",
				"humanities",
				"language",
				"law",					
				"medicine",
				"military",		
				"music",				
				"philosophy",
				"photography",
				"physics",
				"political",
				"psychology",
				"recreation",
				"religion",
				"science",
				"social"
	);	

//Call Number Filter	
$call_num_scope = array(
				" AND (UPPER(cn.call_number_prefix) = 'S' OR UPPER(cn.call_number_prefix) LIKE 'SB%' OR UPPER(cn.call_number_prefix) LIKE 'SD%' OR UPPER(cn.call_number_prefix) LIKE 'SF%' OR UPPER(cn.call_number_prefix) LIKE 'SH%') ", // Agriculture
				" AND (UPPER(cn.call_number_prefix) = 'C' OR UPPER(cn.call_number_prefix) LIKE 'CB%' OR UPPER(cn.call_number_prefix) LIKE 'CC%' OR UPPER(cn.call_number_prefix) LIKE 'CD%' OR UPPER(cn.call_number_prefix) LIKE 'CE%' OR UPPER(cn.call_number_prefix) LIKE 'CJ%' OR UPPER(cn.call_number_prefix) LIKE 'CN%' OR UPPER(cn.call_number_prefix) LIKE 'CR%' OR UPPER(cn.call_number_prefix) LIKE 'CS%' OR UPPER(cn.call_number_prefix) LIKE 'GN%' OR UPPER(cn.call_number_prefix) LIKE 'GR%' OR UPPER(cn.call_number_prefix) LIKE 'GT%') ", // Anthropology, Archaeology, and Geography
				" AND (UPPER(cn.call_number_prefix) LIKE 'N%' OR UPPER(cn.call_number_prefix) LIKE 'TT%') ", //Art
				" AND UPPER(cn.call_number_prefix) LIKE 'QB%' ", // Astronomy
				" AND (UPPER(cn.call_number_prefix) LIKE 'QH%' OR UPPER(cn.call_number_prefix) LIKE 'QK%' OR UPPER(cn.call_number_prefix) LIKE 'QL%' OR UPPER(cn.call_number_prefix) LIKE 'QR%' OR UPPER(cn.call_number_prefix) LIKE 'QM%' OR UPPER(cn.call_number_prefix) LIKE 'QP%') ", // Biology
				" AND (UPPER(cn.call_number_prefix) LIKE 'HD%' OR UPPER(cn.call_number_prefix) LIKE 'HF%') ", // Business/Management
				" AND UPPER(cn.call_number_prefix) LIKE 'QD%'  ", // Chemistry
				" AND (UPPER(cn.call_number_prefix) LIKE 'QA%' OR UPPER(cn.call_number_prefix) LIKE 'HA%') ", //Computer Science and Mathematics
				" AND (UPPER(cn.call_number_prefix) = 'G' OR UPPER(cn.call_number_prefix) LIKE 'GA%' OR UPPER(cn.call_number_prefix) LIKE 'GB%' OR UPPER(cn.call_number_prefix) LIKE 'GC%' OR UPPER(cn.call_number_prefix) LIKE 'GE%' OR UPPER(cn.call_number_prefix) LIKE 'GF%' OR UPPER(cn.call_number_prefix) LIKE 'QE%' OR UPPER(cn.call_number_prefix) LIKE 'TD%' )  ", // Earth and Environmental Sciences	
				" AND (UPPER(cn.call_number_prefix) LIKE 'HG%' OR UPPER(cn.call_number_prefix) LIKE 'HJ%' OR UPPER(cn.call_number_prefix) LIKE 'HX%') ", // Economics
				" AND UPPER(cn.call_number_prefix) LIKE 'L%' ", //Education			
				" AND (UPPER(cn.call_number_prefix) LIKE 'TA%' OR UPPER(cn.call_number_prefix) LIKE 'TC%' OR UPPER(cn.call_number_prefix) LIKE 'TF%' OR UPPER(cn.call_number_prefix) LIKE 'TH%' OR UPPER(cn.call_number_prefix) LIKE 'TJ%' OR UPPER(cn.call_number_prefix) LIKE 'TK%' OR UPPER(cn.call_number_prefix) LIKE 'TL%' OR UPPER(cn.call_number_prefix) LIKE 'TN%' OR UPPER(cn.call_number_prefix) LIKE 'TP%' OR UPPER(cn.call_number_prefix) LIKE 'TS%') ", // Engineering (Other)
				" AND UPPER(cn.call_number_prefix) LIKE 'TX%'", // Food and Home Economics
				" AND (UPPER(cn.call_number_prefix) LIKE 'D%' OR UPPER(cn.call_number_prefix) LIKE 'E%' OR UPPER(cn.call_number_prefix) LIKE 'F%') ", // History
				" AND (UPPER(cn.call_number_prefix) LIKE 'A%' OR UPPER(cn.call_number_prefix) LIKE 'Z') ", // Humanities and Library Science
				" AND (UPPER(cn.call_number_prefix) = 'P' OR UPPER(cn.call_number_prefix) LIKE 'PA' OR UPPER(cn.call_number_prefix) LIKE 'PB' OR UPPER(cn.call_number_prefix) LIKE 'PC' OR UPPER(cn.call_number_prefix) LIKE 'PD' OR UPPER(cn.call_number_prefix) LIKE 'PE' OR UPPER(cn.call_number_prefix) LIKE 'PF' OR UPPER(cn.call_number_prefix) LIKE 'PG' OR UPPER(cn.call_number_prefix) LIKE 'PH' OR UPPER(cn.call_number_prefix) LIKE 'PJ' OR UPPER(cn.call_number_prefix) LIKE 'PK' OR UPPER(cn.call_number_prefix) LIKE 'PL' OR UPPER(cn.call_number_prefix) LIKE 'PM' OR UPPER(cn.call_number_prefix) LIKE 'PN' OR UPPER(cn.call_number_prefix) LIKE 'PQ' OR UPPER(cn.call_number_prefix) LIKE 'PR' OR UPPER(cn.call_number_prefix) LIKE 'PS' OR UPPER(cn.call_number_prefix) LIKE 'PT' OR UPPER(cn.call_number_prefix) LIKE 'PZ') ", //Language and Literature
				" AND UPPER(cn.call_number_prefix) LIKE 'K%'", // Law			
				" AND UPPER(cn.call_number_prefix) LIKE 'R%'", // Medicine
				" AND (UPPER(cn.call_number_prefix) LIKE 'U%' OR UPPER(cn.call_number_prefix) LIKE 'V%') ", // Military Science
				" AND UPPER(cn.call_number_prefix) LIKE 'M%' ", // Music
				" AND (UPPER(cn.call_number_prefix) = 'B' OR UPPER(cn.call_number_prefix) LIKE 'BC%' OR UPPER(cn.call_number_prefix) LIKE 'BD%' OR UPPER(cn.call_number_prefix) LIKE 'BH%' OR UPPER(cn.call_number_prefix) LIKE 'BJ%') ", // Philosophy
				" AND UPPER(cn.call_number_prefix) LIKE 'TR%' ", //Photography
				" AND UPPER(cn.call_number_prefix) LIKE 'QC%' ", // Physics
				" AND UPPER(cn.call_number_prefix) LIKE 'J%' ", // Political Science
				" AND UPPER(cn.call_number_prefix) LIKE 'BF%' ", //Psychology
				" AND (UPPER(cn.call_number_prefix) LIKE 'GV%' OR UPPER(cn.call_number_prefix) LIKE 'SK%') ", // Recreation/Leisure
				" AND (UPPER(cn.call_number_prefix) LIKE 'BL%' OR UPPER(cn.call_number_prefix) LIKE 'BM%' OR UPPER(cn.call_number_prefix) LIKE 'BP%' OR UPPER(cn.call_number_prefix) LIKE 'BQ%' OR UPPER(cn.call_number_prefix) LIKE 'BR%' OR UPPER(cn.call_number_prefix) LIKE 'BS%' OR UPPER(cn.call_number_prefix) LIKE 'BT%' OR UPPER(cn.call_number_prefix) LIKE 'BV%' OR UPPER(cn.call_number_prefix) LIKE 'BX%') ", // Religion
				" AND (UPPER(cn.call_number_prefix) = 'Q' OR UPPER(cn.call_number_prefix) = 'T') ", // Science/Technology
				" AND (UPPER(cn.call_number_prefix) = 'H' OR UPPER(cn.call_number_prefix) LIKE 'HE%' OR UPPER(cn.call_number_prefix) LIKE 'HM%' OR UPPER(cn.call_number_prefix) LIKE 'HN%' OR UPPER(cn.call_number_prefix) LIKE 'HQ%' OR UPPER(cn.call_number_prefix) LIKE 'HS%' OR UPPER(cn.call_number_prefix) LIKE 'HT%' OR UPPER(cn.call_number_prefix) LIKE 'HV%') " // Social Sciences
	);	
	

//Catatloging Date Filter		
$date_scope = array(
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '2 year'::INTERVAL)  ", // Agriculture
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '2 year'::INTERVAL)  ", // Anthropology, Archaeology
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '1 year'::INTERVAL) ", //Art
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '2 year'::INTERVAL) ", // Astronomy
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '1 year'::INTERVAL) ", // Biology
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '2 month'::INTERVAL) ", // Business/Management
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '1 year'::INTERVAL) ", // Chemistry
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '2 month'::INTERVAL) ", //Computer Science and Mathematics
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '1 year'::INTERVAL)  ", // Earth and Environmental Sciences	
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '5 month'::INTERVAL) ", // Economics
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '1 year'::INTERVAL) ", //Education			
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '2 month'::INTERVAL) ", // Engineering
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '2 year'::INTERVAL) ", // Food and Home Economics
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '6 month'::INTERVAL) ", // History
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '1 year'::INTERVAL) ", // Humanities and Library Science
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '4 month'::INTERVAL) ", //Language and Literature
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '5 month'::INTERVAL) ", // Law			
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '3 month'::INTERVAL) ", // Medicine
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '1 year'::INTERVAL) ", // Military Science
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '1 year'::INTERVAL) ", // Music
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '9 month'::INTERVAL) ", // Philosophy
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '6 month'::INTERVAL) ", //Photography
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '9 month'::INTERVAL) ", // Physics
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '6 month'::INTERVAL) ", // Political Science
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '1 year'::INTERVAL) ", //Psychology
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '1 year'::INTERVAL) ", // Recreation/Leisure
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '9 month'::INTERVAL) ", // Religion
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '6 month'::INTERVAL) ", // Science/Technology
				" AND (b.cataloging_date_gmt <= NOW() AND b.cataloging_date_gmt >= NOW() - '4 month'::INTERVAL) " // Social Sciences
	);		
	
	
$format_scope = array(
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u'))  ", // Agriculture
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u'))  ", // Anthropology, Archaeology
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u')) ", //Art
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u')) ", // Astronomy
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u')) ", // Biology
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u')) ", // Business/Management
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u')) ", // Chemistry
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u')) ", //Computer Science and Mathematics
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u'))  ", // Earth and Environmental Sciences	
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u')) ", // Economics
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u')) ", //Education			
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u')) ", // Engineering
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u')) ", // Food and Home Economics
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u')) ", // History
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u')) ", // Humanities and Library Science
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u')) ", //Language and Literature
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u')) ", // Law			
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u')) ", // Medicine
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u')) ", // Military Science
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u')) ", // Music
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u')) ", // Philosophy
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u')) ", //Photography
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u')) ", // Physics
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u')) ", // Political Science
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u')) ", //Psychology
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u')) ", // Recreation/Leisure
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u')) ", // Religion
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u')) ", // Science/Technology
				" AND ((brp.material_code = 'a') OR (brp.material_code = 'u')) " // Social Sciences			
		);
		
$groupBy_scope = array(
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", // Agriculture
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", // Anthropology, Archaeology
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", //Art
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", // Astronomy
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", // Biology
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", // Business/Management
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", // Chemistry
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", //Computer Science and Mathematics
				" GROUP BY 1,2,3,4,5,6,7,8,9,10  ", // Earth and Environmental Sciences	
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", // Economics
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", //Education			
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", // Engineering
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", // Food and Home Economics
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", // History
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", // Humanities and Library Science
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", //Language and Literature
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", // Law			
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", // Medicine
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", // Military Science
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", // Music
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", // Philosophy
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", //Photography
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", // Physics
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", // Political Science
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", //Psychology
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", // Recreation/Leisure
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", // Religion
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 ", // Science/Technology
				" GROUP BY 1,2,3,4,5,6,7,8,9,10 " // Social Sciences		
		);

$orderBy_scope = array(
				" ORDER BY 5 DESC  ", // Agriculture
				" ORDER BY 5 DESC  ", // Anthropology, Archaeology
				" ORDER BY 5 DESC ", //Art
				" ORDER BY 5 DESC ", // Astronomy
				" ORDER BY 5 DESC ", // Biology
				" ORDER BY 5 DESC ", // Business/Management
				" ORDER BY 5 DESC ", // Chemistry
				" ORDER BY 5 DESC ", //Computer Science and Mathematics
				" ORDER BY 5 DESC  ", // Earth and Environmental Sciences	
				" ORDER BY 5 DESC ", // Economics
				" ORDER BY 5 DESC ", //Education			
				" ORDER BY 5 DESC ", // Engineering
				" ORDER BY 5 DESC ", // Food and Home Economics
				" ORDER BY 5 DESC ", // History
				" ORDER BY 5 DESC ", // Humanities and Library Science
				" ORDER BY 5 DESC ", //Language and Literature
				" ORDER BY 5 DESC ", // Law			
				" ORDER BY 5 DESC ", // Medicine
				" ORDER BY 5 DESC ", // Military Science
				" ORDER BY 5 DESC ", // Music
				" ORDER BY 5 DESC ", // Philosophy
				" ORDER BY 5 DESC ", //Photography
				" ORDER BY 5 DESC ", // Physics
				" ORDER BY 5 DESC ", // Political Science
				" ORDER BY 5 DESC ", //Psychology
				" ORDER BY 5 DESC ", // Recreation/Leisure
				" ORDER BY 5 DESC ", // Religion
				" ORDER BY 5 DESC ", // Science/Technology
				" ORDER BY 5 DESC " // Social Sciences		
		);				
			
	?>