<?php
if (!$_COOKIE["userNAME"]) { //test purpose
	require '../../../Server/login_MVC/login.php';
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	require "../../../Server/db_connection/connect.php";

	$inserted_at = date('Y-m-d h:i:s A', time() + 3600);
	$body = filter_input(INPUT_POST, "body", FILTER_SANITIZE_SPECIAL_CHARS);

	$query = "INSERT INTO comment (name, body, inserted_at)
	VALUES ('$userName', '$body', '$inserted_at')";
	$result = mysqli_query($conn, $query);

	$commentSent = 1;
} else $commentSent = 0;

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Admin Control</title>
	<link rel="stylesheet" type="text/css" href="../../../style/style.css" />
	<link rel="icon" href="/html/BackEnd/icons/bx-plus.png">
</head>

<body>
	<header id="top">
		<a href="../index.html" id="logo">
			<img src="../../../logo/Dine RiyadhLogo white.png" />
		</a>
		<nav>
			<ul id="user">
				<li><a href="../index.html">Home</a></li>
				<li><a href="../welcome.html">Welcome</a></li>
				<li><a href="../about.html">About Us</a></li>
				<li><a href="../contact.html">Contact Us</a></li>
			</ul>
			<ul id="admin">
				<li><a class="selected" href="admin.php">Admin Control</a></li>
			</ul>
		</nav>
	</header>

	<div class="wrapper">
		<section id="section">

			<div id="site_content">
				<div id="adminContent">
					<div id="contentHeader">
						<h1>Control</h1>
						<p>This page is where you can <span>add, delete, or edit</span>
							a resturant from the home page</p>
					</div>

					<div>
						<ul>
							<li id="add"><i class="fa-solid fa-plus"></i><a href="add.php">Add resturant</a></li>
							<div>
								<li id="delete"><i class="fa-solid fa-xmark"></i><a href="delete.php">Delete resturant</a></li>
								<li id="edit"><i class="fa-regular fa-pen-to-square"></i><a href="edit.php">Edit resturant</a></li>
							</div>
						</ul>
					</div>
					<?php // ../../server/Add.php 
					?>

					<form method="post" action="admin.php">
						<div id="comment">
							<h3>Admin comments:</h3>

							<textarea name="body" required placeholder="any complaint" cols=50 rows=10></textarea>
							<div class="flex">
								<input class="enter" type="submit" value="Send">
								<p style="margin-left:100px;">
									<?php
									if ($commentSent) {
										echo "<h2>Thanks, your comment has been sent</h2>";
									}
									?>
								</p>
							</div>
						</div>
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
	<script src="../../JS/script.js"></script>

</body>

</html>