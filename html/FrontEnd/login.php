<?php
if (($_COOKIE['userNAME'] and $_COOKIE['userPASS'])){
  header("location:Admin.php");
}
?>
<!DOCTYPE HTML>
<html>

<head>
  <meta charset="UTF-8">
  <title>login</title>
  <link rel="stylesheet" type="text/css" href="../../style/style.css" />
  <style type="text/css">
    body {
      height: 100%;
      background: url("../../logo/pexels-mloky96-35761.jpg") no-repeat center center;
      background-size: cover;
    }

    header {
      background-color: transparent;
    }
  </style>
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
        <li><a href="contact.html">Contact Us</a></li>
      </ul>
      <ul id="admin">
        <li><a class="selected" href="admin.php">Login</a></li>
      </ul>
    </nav>
  </header>

  <div class="wrapper">
    <section id="section">
      <div id="content">
        <div class="container">
          <form action="../../Server/login.php" method="post">
            <div class="card">
              <h1 class="login">Log in</h1>

              <div class="inputBox">
                <input type="text" name="username" required autocomplete="on">
                <span class="user">Username</span>
              </div>

              <div class="inputBox">
                <input type="password" name="password" required>
                <span>Password</span>
              </div>

              <button type="submit" name="login" class="enter">Enter</button>

            </div>
          </form>
        </div>
      </div>
    </section>

    <br>

    <footer style="background-color: rgba(98, 44, 102, 0.6);">
      <p>
				&copy; 2024 / IMAMU / CCIS / IT390 <sup>TM</sup>
      </p>
      <button onclick="toTop()">
				<span  class="box upButton">
					UP
				</span>
			</button>
		</footer>
	</div>
	<script src="../JS/script.js"></script>
</body>

</html>