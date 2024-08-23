<?php
//any connection without login form should be forwarded to the form
if ($_SERVER['REQUEST_METHOD'] != "POST"){
    header('location:../html/frontend/login.php');
}

require_once "db_connection/connect.php";


//  isset($_POST['login']) => less secure
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    //avoid SQL injection
    $username1 = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password1 = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $password1 = hash('md5', $password1, false);

    $query = "SELECT username FROM administrators WHERE 
    username = '$username1' and password = '$password1';";

    //returns a mysqli_result object -> true, OR false in faliure
    $result = mysqli_query($conn, $query);
    if ($result) {

        if (mysqli_num_rows($result) > 0) {
            
    //name and password cookies for test purpose, TOKEN ID must be implemented
            setcookie('userNAME', $username1, time() + 60 * 60 * 24, '/');
            setcookie('userPASS', $password1, time() + 60 * 60 * 24, '/');
            header("location:../html/FrontEnd/admin.php");
        } else header("location:../html/FrontEnd/login.php");
        
    } else header("location:../html/FrontEnd/about.html");
}
