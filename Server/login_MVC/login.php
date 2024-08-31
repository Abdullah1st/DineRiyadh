<?php
// Ensuring legemitly access.
if ($_SERVER['REQUEST_METHOD'] === "POST"){

    $username = $_POST["username"];
    $password = $_POST["password"];
    $password = hash('md5', $password, false);

    try {
        // order is important as is below.
        require_once '../db_connection/connect.php';
        require_once 'login_model.php';
        require_once 'login_contr.php';
        
        // Error handlers:

        if(isEmpty($username, $password)){
            header("location:../../html/ui/admin/login.php");
            die();
        }

        $user = getUser($conn, $username);

        if(!isUsernameValid($user)){
            header("location:../../html/ui/admin/login.php");
            die();
        }
        echo "helo3<br>";
        if(!isPasswordValid($password, $user)){
            header("location:../../html/ui/admin/login.php");
            die();
        }
        
        // After this line everything is ok, and User should be logged in successfully.

        setcookie('userNAME', $username, time() + 60 * 60 * 24, '/');// security 0.1%
        header("location:../../html/ui/admin/admin.php");

    } catch (mysqli_sql_exception $exception) {
        die("Query failed: ". $exception->getMessage());
    }
} else {
    header('location:../../ui/admin/login.php');
    die();
}