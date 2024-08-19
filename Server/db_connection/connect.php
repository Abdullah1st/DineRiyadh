<?php
	$domain = "localhost";
	$username = "abdullah";
	$password = "vladHere";
	$database_name = "DineRiyadh";
	
	try {
	  $conn = mysqli_connect($domain, $username, $password, $database_name);
	} catch (mysqli_sql_exception) {
	  exit("
	  <h1 style=color:red;background-color:rgba(255,0,0,0.2);padding:20px>
	  Connection failed
	  </h1>
	  ");
	}
?>