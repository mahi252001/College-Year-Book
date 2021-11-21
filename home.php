<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yearbook1";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
 ?>
<html>
	<head>
		<title>ONLINE COLLEGE YEAR BOOK</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

		<style>
			.fakeimg {
			height: 200px;
			background: #aaa;
			}
		</style>
	</head>
	<body style="background-image:url(code5.jpg);background-repeat:no-repeat;background-size:100% 100%;height:600">
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center">
  <!-- Brand -->
		  <!--<a class="navbar-brand" href="code3.png">Logo</a>-->
			<a class="navbar-brand" href="#">
    <img src="code3.png" alt="Logo" style="width:40px;">
  </a>

		  <!-- Links -->
		  <ul class="nav navbar-nav">
		    <li class="active">
		      <a class="nav-link"  href="#home">Home</a>
		    </li>
				<li class="active">
		      <a class="nav-link"  href="userlogin.php">Login</a>
		    </li>
				<li class="active">
		      <a class="nav-link"  href="register.php">Register</a>
		    </li>
  </body>
  </head>
  </html>
