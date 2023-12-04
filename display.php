<?php
include("db.php");
session_start();
$user = $_SESSION['user'];
if ($user== true) {
} else {
    header("location:login.php");
}

$sql = "SELECT * FROM info WHERE username='$user'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <style>
        .table{
            margin: auto;
            margin-top: 5%;
            margin-bottom: 2%;
        }

        body{
  background-image: url('./2.jpg');
background-size:cover;
width: 100vw;
height: 100vh;
}
     </style>

</head>

<body>
<table class="table table-dark w-50">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Class</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col" colspan="2">Opertion</th>
    </tr>
  </thead>

  <?php
while($rows=mysqli_fetch_assoc($result)){

    echo "<center><h3 style='color:white' margin-top:'20px';>Welcome To $rows[name]</h3></center>";

    ?>

    
  <tbody>
    <tr>
      
      <td><?php echo $rows['id']; ?></td>
      <td><?php echo $rows['name']; ?></td>
      <td><?php echo $rows['class']; ?></td>
      <td><?php echo $rows['username']; ?></td>
      <td><?php echo $rows['password']; ?></td>
      <td><a href="edit.php?id=<?php echo $rows['id'];?>" class="btn btn-primary">Edit</a></td>
      <td><a href="delete.php?id=<?php echo $rows['id'];?>" class="btn btn-primary">Delete</a></td>
    </tr>
  </tbody>

  <?php
}
  ?>
  
</table>

<center><a href="logout.php"  class="btn btn-primary">Logout</a></center>


</body>

</html>