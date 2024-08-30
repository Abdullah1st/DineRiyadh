<?php
if ($_SERVER['REQUEST_METHOD'] != "POST"){
    header('location:../../html/ui/admin/login.php');
}

if (($_COOKIE['userNAME'] and $_COOKIE['userPASS'])){}
else header('location:../../html/ui/admin/login.php');

require_once "../db_connection/connect.php";

if (isset($_POST['editItem'])) {
    $itemName = $_POST["itemName"];
    $itemDescription = $_POST["itemDescription"];
    $itemLogo = $_POST["itemLogo"];

    $query = "UPDATE item Set name = '$itemName',
     description = '$itemDescription', logo = '$itemLogo';";

    $result = mysqli_query($conn, $query);
    if (!$result)
        echo "Error: " . mysqli_error($conn);
    die();
}
