<?php
//any connection without login form should forwarded to the form
if ($_SERVER['REQUEST_METHOD'] != "POST"){
    header('location:../html/frontend/login.php');
}

if (($_COOKIE['userNAME'] and $_COOKIE['userPASS'])) {
} else header('location:../html/frontend/login.php');

require "db_connection/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $itemName = $_POST["itemName"];
  $itemDescription = $_POST["itemDescription"];
  $itemLogo = $_FILES['itemLogo']['tmp_name'];
  //encode image
  $itemLogo = file_get_contents($itemLogo);
  $itemLogo = $conn->real_escape_string($itemLogo);
  

  //ensure that the name is not exist
  $query = "SELECT name FROM item WHERE name = '$itemName'";
  $result = mysqli_query($conn, $query);
  $isExist = mysqli_num_rows($result) > 0;



  //if not exist, inject the item
  if (!($isExist )) {
    $inserted_at = date('Y-m-d h:i:s A', time() + 3600);
    $query = "INSERT INTO item (name, description, logo, inserted_at)
      VALUES ('$itemName', '$itemDescription', '$itemLogo', '$inserted_at')";
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
        ERROR: item didn't inserted into database
        </h1><br>
        $conn->error";
      }
  } else {
    echo"
        <h1 style=color:red;background-color:rgba(255,0,0,0.2);padding:20px>
        Error: Item might be exist in the database
        </h1>";
  }
}
?>

<!-- back to Admin page after 3 seconds -->
<script>
  setTimeout(() => {
    this.open("../html/frontend/Add.php", "_self")
  }, 5000);
</script>