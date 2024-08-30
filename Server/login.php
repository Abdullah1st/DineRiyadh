<?php
//any connection without login form should be forwarded to the form
if ($_SERVER['REQUEST_METHOD'] != "POST"){
    header('location:../html/frontend/login.php');
}

require_once "db_connection/connect.php";


    //avoid SQL injection
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    // $hashedPassword = hash('md5', $password, false);
    // Down is another way of hashing
    // $hashingPeriod = [
    //     'cost' => 14
    // ];
    // $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $hashingPeriod);
    // bring the password from databast, then verify it ------------------------------
    $query = "SELECT username FROM administrators WHERE
    username = '$username' and password = '$password';";
    //          using password_verify() function        ------------------------------
    $result = mysqli_query($conn, $query);
    if ($result) {

        if (mysqli_num_rows($result) > 0) {
            
    //name and password cookies for test purpose, TOKEN ID must be implemented
            setcookie('userNAME', $username, time() + 60 * 60 * 24, '/');
            setcookie('userPASS', $password, time() + 60 * 60 * 24, '/');
            header("location:../html/FrontEnd/admin.php");
        } else header("location:../html/FrontEnd/login.php");
        
    } else header("location:../html/FrontEnd/about.html");
