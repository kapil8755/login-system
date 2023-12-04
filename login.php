<?php

include("db.php");
session_start();

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $pwd = $_POST['password'];
  $query = "select * from info where username= '$username' && password='$pwd'";

  $result = mysqli_query($conn, $query);
  $data = mysqli_num_rows($result);

  if ($data>=1) {
    $_SESSION['user'] =$username;
    $_SESSION['password'] = $pwd;
    header("location:display.php");
  } else {
    $_SESSION['message'] = 'Login Failed';
  }


}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style1.css">
  <style>
.one{
  text-align: center;
  font-size: 30px;
  font-weight: bold;
  margin-top: 5px;
  color: red;
}
  </style>

  <title>Login Form</title>
</head>

<body>
  <form  method="POST">
    <h1>Login Form</h1>

<?php

if (isset($_SESSION['message']))
{

  ?>
 <span class="one"> <?php echo $_SESSION['message'];?> </span>
 <?php 
    unset($_SESSION['message']);
}


?>

    <div class="mb-3" class="center">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Email" name="username" autocomplete="off">
      <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Your password" name="password">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    <div class="mb-3 form-check">
      <a href="register.php">
        New Member? Register Now
      </a>
    </div>
  </form>

  <script>
    
  </script>
</body>
</html>