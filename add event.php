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
			$sql="";

				if(isset($_POST['add'])) {
					$year=$_POST['year'];

					$name=$_POST['name'];
          $category=$_POST['category'];

				$sql="INSERT INTO events VALUES ('$year','$name','$category')";

				$result=mysqli_query($conn,$sql);
					if(($result))
					{
						echo '<script type="text/javascript">alert("information added successfully ")</script>';
							?>
							<script type="text/javascript">
							window.location.href="home.php"</script>
							<?php
					}
					else {
						$status = '
					 <div class="alert alert-danger">
						 <strong>Failed!</strong> Not added!
					 </div>';
					}
				}
			?>
			<div class="col" id="status">
				<?php echo $status ?>
			</div>
			<form action="add event.php" method="post">
		<div class="container" style="margin-top:3%;background-color:white;padding-top:3%;padding-bottom:3%;width:600">
				<center><h1 style="padding-bottom:3%;padding-top:3%"> EVENT FORM </h1></center>
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
					<label for="name"> EVENT NAME  </label>
				</div>
				<div class="col-sm-6">
					<input type="text" name="name" class="form-control" style="border-radius:18px" placeholder="enter event name" required>
				</div>
			</div><br/>


      <div class="row">
				<div class="col-sm-4">
					<label for="category"> CATEGORY  </label>
				</div>
				<div class="col-sm-6">
          <div class="form-group">

              <input type="radio" name="category" value="teacher" class="custom-radio">&nbsp;TEACHER|
              <input type="radio" name="category" value="student" class="custom-radio">&nbsp;STUDENT|
              <input type="radio" name="category" value="general" class="custom-radio">&nbsp;GENERAL

          </div>
				</div>
			</div><br/>



					<input type="submit" name="add" value="ADD" style="margin-left:50%" class="btn btn-success" >

	</div>
		</form>

  </body>
  </html>
