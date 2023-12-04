<?php
include("./db.php");
$id=$_GET['id'];

$sql="DELETE FROM info WHERE id='$id'";

$res=mysqli_query($conn,$sql);
header("Location:login.php");
?>