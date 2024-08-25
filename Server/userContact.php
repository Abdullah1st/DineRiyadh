<?php

if ($_SERVER['REQUEST_METHOD'] != "POST"){
    header('location:../html/frontend/login.php');
}

if (($_COOKIE['userNAME'] and $_COOKIE['userPASS'])){}
else header('location:../html/BackEnd/login.php');

require_once "db_connection/connect.php";


$userName = $_POST["userName"];
$userMail = $_POST["userMail"];
$userMessage = $_POST["userMessage"];

//ensure that the name is not exist
$query = "SELECT userMail FROM customerMessages WHERE userMail = '$userMail';";

$result = mysqli_query($conn, $query);
$isExist = mysqli_num_rows($result) > 0;

//if not exist, inject the message
if (!($isExist )) {
$inserted_at = date('Y-m-d h:i:s A', time() - (3600 * 4));
$queryOfUser = "INSERT INTO customerMessages (id, customerName, userMail, messagesCount)
VALUES (`id`, `$customerName`, `$userMail`, 1);";
//                                          |      
//                                     first message
$queryOfMsgContent = "binding FK of messagesContent table into id of customerMssages.";
  try {
    mysqli_query($conn, $queryOfUser);
    mysqli_query($conn, $queryOfMsgContent);
    header("Location: ../html/FrontEnd/contact.html");
  } catch (mysqli_sql_exception) {
    echo "
    <h1 style=color:red;background-color:rgba(255,0,0,0.2);padding:20px>
    ERROR: Your message hasn't been sent to us :(
    </h1><br>Please try again";
  }
} else { // user mail is exist.
  echo "";
}
?>
