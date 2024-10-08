<?php
//any non-post request should be forwarded to the form
if ($_SERVER['REQUEST_METHOD'] != "POST"){
    header('location:../../html/ui/admin/login.php');
}

if ($_COOKIE['userNAME']) {
} else header('location:../../html/ui/admin/login.php');

require_once "../db_connection/connect.php";
include "encodeImg.php";
  $itemName = $_POST["itemName"];
  $itemDescription = $_POST["itemDescription"];
  $encodedLogo = encode_logo($_FILES['itemLogo']['tmp_name'], $conn);
  

  //ensure that the name is not exist
  $query = "SELECT name FROM resturant WHERE name = '$itemName';";
  $result = mysqli_query($conn, $query);
  $isExist = mysqli_num_rows($result) > 0;



  //if not exist, insert the item
  if (!($isExist )) {
    $inserted_at = date('Y-m-d h:i:s A', time() - (3600 * 4));
    $query = "INSERT INTO resturant (id, name, description, logo, inserted_at)
      VALUES (id, '$itemName', '$itemDescription', '$encodedLogo', CURRENT_TIMESTAMP);";
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

?>

<!-- back to Admin page after 3 seconds -->
<script>
  setTimeout(() => {
    this.open("../../html/ui/admin/functions/add.php", "_self")
  }, 5000);
</script>