<?php

// Ensuring legemitly access.
if ($_SERVER['REQUEST_METHOD'] === "POST"){
    //avoid SQL injection
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password = hash('md5', $password, false);

    try {
        // order is important as is below.
        require_once '../db_connection/connect';
        require_once 'login_model.php';
        require_once 'login_contr.php';
        
        // Error handlers:
        if(isEmpty($username, $password)){
            die('');
        }

    } catch (mysqli_sql_exception $exception) {
        die("Query failed: ". $exception->getMessage());
    }
}
else {
    header('location:../../html/ui/admin/login.php');
    die();
}