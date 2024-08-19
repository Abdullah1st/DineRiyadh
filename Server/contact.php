<?php

if ($_SERVER['REQUEST_METHOD'] != "POST"){
    header('location:../html/frontend/login.php');
}

if (($_COOKIE['userNAME'] and $_COOKIE['userPASS'])){}
else header('location:../html/BackEnd/login.php');

require "db_connection/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST["userName"];
    $usermail = $_POST["userMail"];
    $usermessage = $_POST["userMessage"];

    $query = "INSERT INTO contact (name, email, message)
    VALUES ('$username', '$usermail', '$usermessage')";

    $result = mysqli_query($conn, $query);
    echo "<center style='font-size: 30px;margin-top: 300px;'><p>Thanks for rating</center>";
}
?>
