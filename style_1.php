<?php
/*** set the content type header ***/
/*** Without this header, it wont work ***/
header("Content-type: text/css");


$font_family = 'Arial, sans-serif';
$font_size = '1em';
$border = '1px solid';
//border-collapse: separate;
?>

.wrapper {
    display: flex;
    align-items: stretch;
}

#outer-container {
	display: table;
	width: 100%;
	height: 100%;
}

#sidebar {
	display: table-cell;
	vertical-align: top;	
    min-width: 300px;
    max-width: 300px;
    min-height: 100vh;
	padding: 10px;
}

#content {
	display: table-cell;
	width: 1%;
	vertical-align: top;
	horizontal-align: left;
	padding: 10px;
}

#container {
	display: table-cell;
	width: 70%;
	vertical-align: top;
	horizontal-align: left;
	padding: 10px;
}

html {
	height: 100%;
}

body {
	margin: 0;
	height: 100%;
}

.column {
  float: left;
  width: 10%;
  padding: 10px;
}

a[data-toggle="collapse"] {
    position: relative;
}

.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
}

@media (max-width: 1100px) {
    #sidebar {
        margin-left: -250px;
    }
    #sidebar.active {
        margin-left: 0;
    }
}

/*
    ADDITIONAL DEMO STYLE, NOT IMPORTANT TO MAKE THINGS WORK BUT TO MAKE IT A BIT NICER :)
*/
@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";


body {
    font-family: 'Poppins', sans-serif;
    background: #fafafa;
}

p {
    font-family: 'Poppins', sans-serif;
    font-size: 1.0em;
    font-weight: 200;
    line-height: 1.4em;
}

a, a:hover, a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}

#sidebar {
    /* don't forget to add all the previously mentioned styles here too */
    background: #003366;
    color: #fff;
    transition: all 0.3s;
}

#sidebar .sidebar-header {
    padding: 20px;
    background: #003366;
}

#sidebar ul.components {
    padding: 20px 0;
    border-bottom: 1px solid #003366;
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
}
#sidebar ul li a:hover {
    color: #003366;
    background: #fff;
}

#sidebar ul li.active > a, a[aria-expanded="true"] {
    color: #fff;
    background: #003366;
}
ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #003366;
}

td {
padding 10px 12px;	
border: <?=$border?> #DDD;
}

.column {
  width: 25%;
  padding: 20px;
}

table tr th:nth-child(1){
       text-align: center;
}

table tr td:nth-child(1){
	text-align: center;
	padding-left: 10px;
	padding-right: 10px;
	padding-top:10px;
	padding-bottom:10px;	
}

table tr th:nth-child(2){
	text-align: center;
}

table tr td:nth-child(2){
	text-align: center;
	padding-left: 10px;
	padding-right: 10px;
	padding-top:10px;
	padding-bottom:10px;
}

table tr th:nth-child(3){
	text-align: center;
}

table tr td:nth-child(3){
	text-align: center;
	padding-left: 10px;
	padding-right: 10px;
	padding-top:10px;
	padding-bottom:10px;
}

th {
background: #003366;
color: #FFF;
padding: 4px 6px;
border-collapse: separate;
}

@media only screen and (max-width: 800px) {
	

}