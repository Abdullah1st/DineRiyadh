<?php
if ($_COOKIE['userNAME']){}
else header('location:../login.php');
?>
<!DOCTYPE HTML>
<html>

<head>
  <meta charset="UTF-8">
  <title>Home page</title>
  <link rel="stylesheet" type="text/css" href="../../../../style/style.css" />
</head>

<body>
  <header id="top">
    <a href="../../index.html" id="logo">
      <img src="../../../../logo/Dine RiyadhLogo white.png" />
    </a>
    <nav>
      <ul id="user">
        <li><a href="../../index.html">Home</a></li>
        <li><a href="../../welcome.html">Welcome</a></li>
        <li><a href="../../about.html">About Us</a></li>
        <li><a href="../../contact.html">Contact Us</a></li>
      </ul>
      <ul id="admin">
        <li><a class="selected" href="../admin.php">Admin Control</a></li>
      </ul>
    </nav>
  </header>

  <div class="wrapper">
    <section id="section">
      <div id="site_content">
        <div id="addItems">
          <h2>Here you can insert the item's name, description, and logo</h2>

          <!-- Add item form -->
          <form method="post" action="../../../../Server/admin_contr/addItem.php" enctype="multipart/form-data">
            <label for="itemName">Item Name:</label>
            <input type="text" name="itemName" required>
            
            <label for="itemDescription">Item Description:</label>
            <textarea name="itemDescription" rows="4" required></textarea>
            
            <label for="itemLogo">Item Logo URL:</label>
            <input type="file" name="itemLogo" required>


            <input class="submit" type="submit" name="addItem" value="Add">
          </form>
        </div>
      </div>
    </section>

    <br>

    <footer>
      <p>
				&copy; 2024 / IMAMU / CCIS <sup>TM</sup>
      </p>
      <button onclick="toTop()">
        <span class="box upButton">
          UP
        </span>
      </button>
    </footer>
  </div>
  <script src="../../../JS/script.js"></script>
</body>

</html>