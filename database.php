<?php
	session_start();
	$dbconn = mysql_connect("localhost","root","") or die ("Connection to database failed");	
	mysql_select_db("designershop");
	date_default_timezone_set("Asia/Kolkata");
?>