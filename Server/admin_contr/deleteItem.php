<?php
if ($_SERVER['REQUEST_METHOD'] != "POST"){
    header('location:../../html/ui/admin/login.php');
}

if (($_COOKIE['userNAME'] and $_COOKIE['userPASS'])){}
else header('location:../../html/ui/admin/login.php');

require_once "../db_connection/connect.php";

$resturantName = $_POST['deleteItem'];

$query = "DELETE FROM `item` where itemName='$resturantName';";
$result = mysqli_query($conn, $query);
if (!$result)
    die("Error!");
