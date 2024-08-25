<?php

if ($_SERVER['REQUEST_METHOD'] != "POST"){
    header('location:../html/frontend/login.php');
}

if (($_COOKIE['userNAME'] and $_COOKIE['userPASS'])){}
else header('location:../html/BackEnd/login.php');

require_once "db_connection/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $userName = filter_input(INPUT_POST, "userName", FILTER_SANITIZE_SPECIAL_CHARS);
    $userMail = filter_input(INPUT_POST, "userMail", FILTER_SANITIZE_SPECIAL_CHARS);
    $userMessage = filter_input(INPUT_POST, "userMessage", FILTER_SANITIZE_SPECIAL_CHARS);

  //ensure that the email is not exist
  $query = "SELECT name FROM customersMessages WHERE email = '$userMail';";
  $result = mysqli_query($conn, $query);
  $isExist = mysqli_num_rows($result) > 0;

  //if not exist, insert the message
if (!($isExist)) {
    $inserted_at = date('Y-m-d h:i:s A', time() - (3600 * 4));
    $query = "INSERT INTO customersMessages 
    VALUES ('id', '$userName', '$userMail', '$userMessage' , 1);";
    try {
      $result = mysqli_query($conn, $query);
      echo "
            <h1 style=color:green;background-color:rgba(0,255,0,0.2);padding:20px>
            Item has been added successfully
            </h1>
            ";
    } catch (mysqli_sql_exception) {
      echo "
          <h1 style=color:red;background-color:rgba(255,0,0,0.2);padding:20px>
          ERROR: message hasn't been sent to us
          </h1><br>
          ";
    }
  } else {
    echo "
          <h1 style=color:red;background-color:rgba(255,0,0,0.2);padding:20px>
          Error: Item might be exist in the database
          </h1>";
  }

    $result = mysqli_query($conn, $query);
    echo "<center style='font-size: 30px;margin-top: 300px;'><p>Thanks for rating</center>";
}
?>
