<?php
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    header('location:../../html/ui/admin/login.php');
}

require_once "../db_connection/connect.php";
include "encodeImg.php";
if (isset($_POST['editItem'])) {
    $itemName = $_POST["itemName"];
    $itemDescription = $_POST["itemDescription"];
    $encodedLogo = encode_logo($_FILES['itemLogo']['tmp_name'], $conn);
    $selected_item = $_POST['selectedItem'];

    $query = "UPDATE resturant SET name = '$itemName',
     description = '$itemDescription', logo = '$encodedLogo'
     WHERE name = '$selected_item';";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "Error: " . mysqli_error($conn);
        die();
    }
    header("location:../../html/ui/index.html");
}