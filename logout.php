<?php include("../../includes/session_start.php"); ?>
<?php
include("../../includes/dbconfig.php");
$username=$_SESSION['username'];
$name=$_SESSION['name'];
 $sql = "INSERT into user_logs (username,name,action)  values('$username','$name','Successfully Logged out')";

mysqli_query($dbconnection,$sql) or die("ERROR : " . mysqli_error($dbconnection));
session_destroy();
header("location:./index.php");
?>