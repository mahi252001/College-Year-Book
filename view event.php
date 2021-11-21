<html>
	<head>
		<title>View Event</title>
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

	<body style="background-image:url('code1.jpg');background-size:100% 100%">
			<form action="view event table.php" method="post">
	<div class="container" style="margin-top:3%;background-color:white;padding-top:3%;padding-bottom:3%;width:600">
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
				<label for="category">SELECT</label>
			</div>
			<div class="col-sm-6">
						<div class="form-group">

								<input type="radio" name="category" value="teacher" class="custom-radio">&nbsp;TEACHER|
								<input type="radio" name="category" value="student" class="custom-radio">&nbsp;STUDENT|
								<input type="radio" name="category" value="general" class="custom-radio">&nbsp;GENERAL

						</div>
			</div>
		</div><br/>

		<input type="submit" name="view" value="VIEW" style="margin-left:50%" class="btn btn-success" >
  </div>


	</form>
	</body>
  </html>
