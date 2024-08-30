<?php
if (($_COOKIE['userNAME'] and $_COOKIE['userPASS'])){}
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
        <li><a href="../../Contact.html">Contact Us</a></li>
      </ul>
      <ul id="admin">
        <li><a class="selected" href="../admin.php">Admin Control</a></li>
      </ul>
    </nav>
  </header>

  <div class="wrapper">
    <section id="section">
      <div id="site_content">
        <div id="deleteItems">
          <h2>Here you can Delete an Item</h2>

          <!-- Delete item form -->
          <form action="../../../../Server/delete.php" method="post">
            <label style="font-size: 23px;" for="itemSelect">Select an item to delete:</label>
            <select id="itemSelect" name="deleteItem" required>
              <option value="CHI-SPACC">CHI-SPACC</option>
              <option value="Bianca">Bianca</option>
              <option value="SCOTTS">SCOTT'S</option>
              <option value="Gymkhana">Gymkhana</option>
              <option value="Raoul's">Raoul's</option>
              <option value="LA-Rustica">LA-Rustica</option>
            </select>

            <input class="submit" type="submit" value="Delete">
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
  <script src="../../../JS/script.js"></script>
</body>

</html>