<?php
	session_start();
	$dbconn = mysql_connect("localhost","root","") or die ("Connection to database failed");	
	mysql_select_db("designershop");

	/*Online Code
	
	$dbconn = mysql_connect("localhost","darshan","Dar200$$") or die ("Connection to database failed");	
	mysql_select_db("darshanbelgaum");*/
?>