<?php

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
		<title>Login in form</title>
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
	<?php
	$msg="";
	if(isset($_POST['LOGIN'])) {
		$username=$_POST['username'];
		$password=$_POST['password'];
	//$password=sha1($password);
		$usertype=$_POST['usertype'];

		if($usertype=="admin"){
		$sql="SELECT * FROM admins WHERE username='".$username."' AND password='".$password."' ";
		}
		else if($usertype=="student"){

		$sql="SELECT * FROM students WHERE username='".$username."' AND password='".$password."' ";
		}
		else if($usertype=="teacher"){
		$sql="SELECT * FROM teachers WHERE username='".$username."' AND password='".$password."' ";
		}
		$result=mysqli_query($conn,$sql);
		if($result){

			while($row=mysqli_fetch_array($result)){


				echo '<script type="text/javascript">alert("you are login successfully and logined as '.$row['NAME'].'")</script>';
				if($usertype=="admin"){
					?>
					<script type="text/javascript">
					window.location.href="admin.php"</script>
					<?php

				}else if ($usertype=="student"){

					?>
					<script type="text/javascript">
					window.location.href="student.php"</script>
					<?php
				}
				else if($usertype=="teacher"){
					?>
					<script type="text/javascript">
					window.location.href="teacher.php"</script>
					<?php
				}



			}


		}
		else
		{
			 $msg="username or password is Incorrect!";
		}
	}
?>
<body style="background-image:url(code2.jpg);background-repeat:no-repeat;background-size:100% 100%;height:600">
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" >

			<div class="container" style="margin-top:3%;background-color:white;padding-top:3%;padding-bottom:3%;width:600;">
				<center><h1 style="padding-bottom:3%;padding-top:3%">LOG IN </h1></center>
				<div class="row">
					<div class="col-sm-4">
						<label>USER NAME  </label>
					</div>
					<div class="col-sm-6">
						<input type="email" name="username" class="form-control" style="border-radius:18px" placeholder="enter your user name" required>
					</div>
				</div><br/>
				<div class="row">
					<div class="col-sm-4">
						<label>PASSWORD </label>
					</div>
					<div class="col-sm-6">
						<input type="password" name="password" class="form-control" style="border-radius:18px" placeholder="enter your password" required>
					</div>
				</div><br/>
				<div class="row">
					<div class="col-sm-4">
						<label for="usertype">SELECT</label>
					</div>
					<div class="col-sm-6">
								<div class="form-group">

								    <input type="radio" name="usertype" value="teacher" class="custom-radio">&nbsp;TEACHER|
								    <input type="radio" name="usertype" value="student" class="custom-radio">&nbsp;STUDENT|
								    <input type="radio" name="usertype" value="admin" class="custom-radio">&nbsp;ADMIN
								  </select>
								</div>
					</div>
				</div><br/>

<div class="form-group">
	<a href="userlogin.html" class="btn btn-danger" style="margin-left:40%" role="button">CANCEL</a>
	<input type="submit" name="LOGIN" value="LOGIN"  class="btn btn-success">

</div>


<h5 class="text-danger text-center"><?= $msg; ?></h5>
			</form>


								<br/>
								<a href=" " style="margin-left:30%">FORGOT USERNAME/PASSWORD </a><br/>
								<a href="register.php"  style="margin-left:30%">SIGN UP</a>
		</div>
	</body>
</html>
