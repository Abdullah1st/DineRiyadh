<?php
// $domain = "localhost";
// $username = "vladimir";
// $password = "vladHere";
// $database_name = "DineRiyadh";

$conn = new mysqli("localhost", "vladimir", "vladHere", "DineRiyadh");

if ($conn->connect_errno) {
	die("
	  <h1 style=color:red;background-color:rgba(255,0,0,0.2);padding:20px>
	  Connection failed
	  </h1>
	  ");
}