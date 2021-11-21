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
			<title>EVENTS INFORMATION</title>
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


	<body>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center">
	<!-- Brand -->
			<!--<a class="navbar-brand" href="code3.png">Logo</a>-->
			<a class="navbar-brand" href="#">
		<img src="code3.png" alt="Logo" style="width:40px;">
	</a>

			<!-- Links -->
			<ul class="nav navbar-nav">

				<li class="nav-item">
					<a class="nav-link" href="home.php">Logout</a>
				</li>
			</ul>
		</nav>

		<table align="center" border="5px" style="width:1200px; line-height:40px;">
			<tr>
				<center><th colspan="3" border="4px"><h2>EVENTS RECORD</h2></th></center>
			</tr>
			<t>
				<th>year</th>

				<th>name</th>

				<th>category</th>


			</t>
			<?php
			$msg="";
			$sql="";
			if(isset($_POST['view'])) {
				$year=$_POST['year'];
				$category=$_POST['category'];



				$sql="SELECT * FROM events  WHERE YEAR='".$year."' AND CATEGORY='".$category."' ";


				//$stmt=$conn->prepare($sql);
				//$stmt->bind_param("sss",$username,$password,$usertype);
				//$stmt->execute();
				//$result=$stmt->get_result();
				//$row=$result->fetch_assoc();
				$result=mysqli_query($conn,$sql);
				if($result){

					while($rows=mysqli_fetch_array($result)){
						?>
							<tr>
							  <td><?php echo $rows['YEAR'];  ?></td>

							  <td><?php echo $rows['NAME'];  ?></td>

							  <td><?php echo $rows['CATEGORY'];  ?></td>

							</tr>
						<?php


					}
				}
			}
		?>
		</table>

</body>
</html>