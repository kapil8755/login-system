<?php

include("db.php");


if (isset($_POST['submit'])) {
	if ($_POST['name'] !== "" && $_POST['class'] !== "" && $_POST['username'] !== "" && $_POST['password'] !== "") {


		$name = $_POST['name'];
		$class = $_POST['class'];
		$user = $_POST['username'];
		$pass = $_POST['password'];

		$sql = "INSERT INTO info (name,class,username,password)VALUES('$name','$class','$user','$pass')";



		if (mysqli_query($conn, $sql) == true) {
			$_SESSION['message'] = 'Succesfully Register';
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

</head>

<body>
	<div class="container contact">
		<div class="row">
			<div class="col-md-3">
				<div class="contact-info">
					<img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image" />
					<h2>Register Now</h2>
					<h4> Welcome To My Website</h4>
				</div>

				<?php

				if (isset($_SESSION['message'])) {

				?>
					<h2 style="color: green;"> <?php echo $_SESSION['message']; ?> </h2>
				<?php
					unset($_SESSION['message']);
				}

				?>



				<a href="login.php"> <button class="btn btn-primary">Go to Login</button></a>

			</div>
			<div class="col-md-9">
				<div class="contact-form">
					<form method="POST">
						<div class="form-group">
							<label class="control-label col-sm-2" for="fname">Full First:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="name" autocomplete="off" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="lname">Class:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="lname" placeholder="Enter Class" name="class" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="email">Email:</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="email" placeholder="Enter Email" name="username" autocomplete="off" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="comment">Password:</label>
							<div class="col-sm-10">

								<input type="password" class="form-control" placeholder="Enter password" name="password" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary" name="submit">Submit</button>
								<!-- <a href="login.php"> <button class="btn btn-primary">Go to Login</button></a> -->
							</div>


						</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</body>

</html>