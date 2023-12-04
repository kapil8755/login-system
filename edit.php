<?php


include("db.php");

session_start();
$id = $_GET['id'];

$userprofile = $_SESSION['user'];
if ($userprofile == true) {
} else {
    header("location:login.php");
}


$sql = "select * from info WHERE Id='$id'";

$res = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($res);
// print_r($row);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $class = $_POST['class'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql= "UPDATE info SET name='$name',class='$class',username='$username',password='$password' WHERE id='$id'";
    $query = mysqli_query($conn,$sql);
    // print_r($query);
    header("location:display.php");
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
			</div>
			<div class="col-md-9">
				<div class="contact-form">
					<form  method="POST">
						<div class="form-group">
							<label class="control-label col-sm-2" for="fname">Full Name:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="fname"  name="name" autocomplete="off" value="<?php echo $row['name'] ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="lname">Class:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="lname" placeholder="Enter Class" name="class" value="<?php echo $row['class'] ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="email">Email:</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="email" placeholder="Enter Email" name="username" autocomplete="off" value="<?php echo $row['username'] ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="comment">Password:</label>
							<div class="col-sm-10">

								<input type="password" class="form-control" placeholder="Enter password" name="password" value="<?php echo $row['password'] ?>">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-default" name="submit">Update Data</button>
							</div>
						</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</body>

</html>