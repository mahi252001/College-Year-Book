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
		<title>ONLINE COLLEGE YEAR BOOK</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>

		<style>
			.fakeimg {
			height: 200px;
			background: #aaa;
			}
		</style>
	</head>
		<body style="background-image:url('code6.jpg');background-size:100% 100%">
			<?php
			$status="";

				if(isset($_POST['add'])) {

					$year=$_POST['year'];
					$email=$_POST['email'];


					$achievement=$_POST['achievement'];

					$filename = $_FILES["uploadfile"]["name"];
					$tempname = $_FILES["uploadfile"]["tmp_name"];
						$folder = "image/".$filename;

					$sql="INSERT INTO studentachievement VALUES ('$year','$email','$achievement','$filename')";
					$result=mysqli_query($conn,$sql);
					if(($result))
					{
						echo '<script type="text/javascript">alert("information added successfully ")</script>';

						if (move_uploaded_file($tempname, $folder)) {
							$msg = "Image uploaded successfully";
						}else{
							$msg = "Failed to upload image";
					}

					}
					else {
						echo '<script type="text/javascript">alert("STUDENT NOT REGISTERED ")</script>';
						?>
						<script type="text/javascript">
						window.location.href="register.php"</script>
						<?php
					}
				}


			?>

			<form action="student achievement.php" method="post" enctype="multipart/form-data">
		<div class="container" style="margin-top:3%;background-color:white;padding-top:3%;padding-bottom:3%;width:600">
				<center><h1 style="padding-bottom:3%;padding-top:3%">STUDENT ACHIEVEMENT FORM </h1></center>
			<div class="row">
				<div class="col-sm-4">
					<label for="year">SELECT YEAR </label>
				</div>
				<div class="col-sm-6">
					<input type="text" name="year" class="date-own form-control" style="border-radius:18px" placeholder="select year" required>
					<script type="text/javascript">
						$('.date-own').datepicker({
						minViewMode: 2,
						format: 'yyyy'
						});
				</script>
				</div>
			</div><br/>
			<div class="row">
				<div class="col-sm-4">
					<label for="email">EMAIL </label>
				</div>
				<div class="col-sm-6">
					<input type="email" name="email" class="form-control" style="border-radius:18px" placeholder="enter your email" required>
				</div>
			</div><br/>
			<div class="row">
				<div class="col-sm-4">
    			<label for="achievement">ACHIEVEMENT </label>
				</div>
				<div class="col-sm-6">
					<textarea  name="achievement" class="form-control" style="border-radius:18px" placeholder="enter your achievement" required></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
		<div class="form-group">
			<input type="file" class="form-control-file border" name="uploadfile">
		</div>
				</div>
			</div>

					<input type="submit" name="add" value="ADD" style="margin-left:50%" class="btn btn-success" >

	</div>
		</form>

  </body>
  </html>
