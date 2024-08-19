<?php
if (($_COOKIE['userNAME'] and $_COOKIE['userPASS'])){}
else header('location:login.php');
?>
<!DOCTYPE HTML>
<html>

<head>
  <meta charset="UTF-8">
  <title>Home page</title>
  <link rel="stylesheet" type="text/css" href="../../style/style.css" />
</head>

<body>
  <header id="top">
    <a href="index.html" id="logo">
      <img src="../../logo/Dine RiyadhLogo white.png" />
    </a>
    <nav>
      <ul id="user">
        <li><a href="index.html">Home</a></li>
        <li><a href="welcome.html">Welcome</a></li>
        <li><a href="about.html">About Us</a></li>
        <li><a href="Contact.html">Contact Us</a></li>
      </ul>
      <ul id="admin">
        <li><a class="selected" href="Admin.php">Admin Control</a></li>
      </ul>
    </nav>
  </header>

  <div class="wrapper">
    <section id="section">
      <div id="site_content">
        <div id="editItems">
          <h2>Edit Item</h2>
          <!-- Edit item form -->
          <form action="../../server/edit.php" method="post">
            <label for="itemSelect">Select an item to edit:</label>
            <select id="itemSelect" name="itemSelect" required>
              <option value="CHI-SPACC">CHI-SPACC</option>
              <option value="Bianca">Bianca</option>
              <option value="SCOTTS">SCOTT'S</option>
              <option value="Gymkhana">Gymkhana</option>
              <option value="Raoul's">Raoul's</option>
              <option value="LA-Rustica">LA-Rustica</option>
            </select>

            <label for="itemName">Item Name:</label>
            <input type="text" id="itemName" name="itemName" required>

            <label for="itemDescription">Item Description:</label>
            <textarea id="itemDescription" name="itemDescription" rows="4" required></textarea>

            <label for="itemLogo">Item Logo URL:</label>
            <input type="url" id="itemLogo" name="itemLogo" required>

            <input class="submit" type="submit" name="editItem" value="Edit">
          </form>
        </div>
      </div>
    </section>
    <br>
    <footer>
      <p>
				&copy; 2024 / IMAMU / CCIS / IT390 <sup>TM</sup>
      </p>
      <button onclick="toTop()">
        <span class="box upButton">
          UP
        </span>
      </button>
    </footer>
  </div>
  <script src="../JS/script.js"></script>
  <script>
    function showItemData() {
      var selectedItem = document.getElementById("itemSelect").value;
      // You can fetch the existing data for the selected item from the server and populate the fields.
      // For demonstration purposes, I'm setting some default values.
      document.getElementById("itemName").value = selectedItem;
      document.getElementById("itemDescription").value = "Description for " + selectedItem;
      document.getElementById("itemLogo").value = "URL for " + selectedItem;
      document.getElementById("editForm").style.display = "block";
    }

    function editItem() {
      var editedItemName = document.getElementById("itemName").value;
      var editedItemDescription = document.getElementById("itemDescription").value;
      var editedItemLogo = document.getElementById("itemLogo").value;
      // You can send the edited data to the server for processing.
      alert("Item edited:\nName: " + editedItemName + "\nDescription: " + editedItemDescription + "\nLogo URL: " + editedItemLogo);
      // Add further logic to handle the edit on the server or perform other actions.
    }

    function toTop() {
      window.open('#top', '_self')
    }
  </script>
</body>

</html>