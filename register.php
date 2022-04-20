<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "yearbook1";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connectione

	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}
	?>
<html>
	<head>
		<title>Registration form</title>
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

	<body style="background-image:url('code1.jpg');background-size:100% 100%">
		<?php
		$status="";

			if(isset($_POST['submit'])) {
				$name=$_POST['name'];
				$username=$_POST['username'];
				$password=$_POST['password'];
				$mobilenumber=$_POST['mobilenumber'];
				$address=$_POST['address'];
				$gender=$_POST['gender'];
					$dob=$_POST['dob'];
						$branch=$_POST['branch'];
				$usertype=$_POST['usertype'];
				//$sql="";
				$sql="INSERT INTO users(userid,name,username,password,email,mobilenumber,gender,address,usertype) VALUES (?,?,?,?,?,?,?,?,?)";
				$stmt=$conn->prepare($sql);
				$stmt->bind_param("sssssssss",$userid,$name,$username,$password,$email,$mobilenumber,$gender,$address,$usertype);
				$stmt->execute();
				$result=$stmt->get_result();
					if($usertype=="admin"){
						$sql="INSERT INTO admins VALUES ('$name','$username','$password','$mobilenumber','$address','$gender','$branch','$dob')";
					}
					else if ($usertype=="student"){

						$sql="INSERT INTO students VALUES ('$name','$username','$password','$mobilenumber','$address','$gender','$branch','$dob')";
					}
					else if($usertype=="teacher"){
						$sql="INSERT INTO teachers VALUES ('$name','$username','$password','$mobilenumber','$address','$gender','$branch','$dob')";
					}
				$result=mysqli_query($conn,$sql);
				if(($result))
				{
					echo '<script type="text/javascript">alert("Registered successfully ")</script>';
						?>
						<script type="text/javascript">
						window.location.href="userlogin.php"</script>
						<?php

				}
				else {
					$status = '
				 <div class="alert alert-danger">
					 <strong>Failed!</strong> USERNAME ALREADY EXISTS!
				 </div>';
				}
			}
		?>
		<div class="col" id="status">

			<?php echo $status ?>


		</div>
		<form action="register.php" method="post">
	<div class="container" style="margin-top:3%;background-color:white;padding-top:3%;padding-bottom:3%;width:600">
		<center><h1 style="padding-bottom:3%;padding-top:3%">REGISTERATION FOREM </h1></center>
		<div class="row">
			<div class="col-sm-4">
				<label for="name"> NAME  </label>
			</div>
			<div class="col-sm-6">
				<input type="text" name="name" class="form-control" style="border-radius:18px" placeholder="enter your name" required>
			</div>
		</div><br/>
		<div class="row">
			<div class="col-sm-4">
				<label for="username">USER NAME  </label>
			</div>
			<div class="col-sm-6">
				<input type="email" name="username" class="form-control" style="border-radius:18px" placeholder="enter user name" required>
			</div>
		</div><br/>
		<div class="row">
			<div class="col-sm-4">
				<label for="password">PASSWORD </label>
			</div>
			<div class="col-sm-6">
				<input type="password" name="password" class="form-control" style="border-radius:18px" placeholder="enter password" required>
			</div>
		</div><br/>

		<div class="row">
			<div class="col-sm-4">
				<label for="mobilenumber">MOBILE NUMBER </label>
			</div>
			<div class="col-sm-6">
				<input type="mobile_number" name="mobilenumber" class="form-control" style="border-radius:18px" placeholder="enter your mobile number" required>
			</div>
		</div><br/>
		<div class="row">
			<div class="col-sm-4">
				<label for="dob">DOB </label>
			</div>
			<div class="col-sm-6">
				<input type="date" name="dob" class="form-control" style="border-radius:18px" placeholder="enter your dob" required>
			</div>
		</div><br/>
		<div class="row">
			<div class="col-sm-4">
				<label for="branch">DEPARTMENT </label>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<select class="form-control" name="branch" id="sel1"  style="border-radius:18px" placeholder="select your branch" required>
						<option>--SELECT--</option>
						<option>CS</option>
						<option>IS</option>
						<option>EC</option>
						<option>CIVIL</option>
						<option>MECH</option>
					</select>
				</div>
			</div>
		</div><br/>
		<div class="row">
			<div class="col-sm-4">
				<label for="gender">GENDER </label>
			</div>
			<div class="col-sm-6">
				<div class="form-check-inline">
					<label class="form-check-label">
						<input type="radio" class="form-check-input" name="gender" value="male">MALE
					</label>
				</div>
			<div class="form-check-inline">
				<label class="form-check-label">
					<input type="radio" class="form-check-input" name="gender" value="female">FEMALE
				</label>
			</div>
			</div>
		</div><br/>
		<div class="row">
			<div class="col-sm-4">
				<label for="address">ADDRESS </label>
			</div>
			<div class="col-sm-6">
				<textarea  name="address" class="form-control" style="border-radius:18px" placeholder="enter your address" required></textarea>
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

						</div>
			</div>
		</div><br/>
				<input type="submit" name="submit" value="REGISTER" style="margin-left:40%" class="btn btn-success" >
				<a href="register.html" class="btn btn-danger"role="button" >RESET</a>

	</form>

</div>


	</body>
</html>
