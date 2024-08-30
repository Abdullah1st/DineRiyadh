<?php

// Ensuring legal access.
if ($_SERVER['REQUEST_METHOD'] === "POST"){
    //avoid SQL injection
    $username1 = $_POST["username"];
    $password1 = $_POST["password"];
    $password1 = hash('md5', $password1, false);

    try {
        require_once '../db_connection/connect';
        
    } catch (mysqli_sql_exception $exception) {
        die("Query failed: ". $exception->getMessage());
    }
}
else {
    header('location:../html/frontend/login.php');
    die();
}

require_once "db_connection/connect.php";



    

