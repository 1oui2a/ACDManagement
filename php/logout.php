<?php
	session_start();
	session_destroy();
?>

	<!DOCTYPE html>
<html>

<head>
    <title>Logged out</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color: lightblue;
		}
		h1 {
			text-align: center;
			color: #4CAF50;
		}
		p {
			text-align: center;
		}
	

		</style>
</head>
<body>
	<h1>Logged out</h1>
	<p>Click here to <a href="login.php">login</a></p>
	<p>Click here to view the database <a href="index.php">Database Home Page</a></p>
</body>
</html>

