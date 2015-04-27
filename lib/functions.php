<?php
	// connect to the database!
function dbConnect(){
	$DB_HOST = "localhost";
	$DB_USERNAME = "root";
	$DB_PASSWORD = "";
	
	$GLOBALS['DB'] = mysql_connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD) or 
		die("Error: Can't connect to database! Please check your username and password");
		
	mysql_select_db("project",$GLOBALS['DB']) or die(mysql_error($GLOBALS['DB']));
}

function init(){
	if(!isset($_SESSION)) session_start();
	dbConnect();
}
?>