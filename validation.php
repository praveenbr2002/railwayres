<?php

session_start();

$connection = mysqli_connect("localhost","root","","reservation");

$name = $_POST['user'];
$pass = $_POST['password'];

$query= "SELECT * FROM users where Name = '$name' and Password = '$pass'";
$query_run= mysqli_query($connection,$query);

$num = mysqli_num_rows($query_run);

if($num==1){
	$_SESSION['username']= $name;
	header('location:myOrders.php');
}
else{
	header('location:invalid4.php');
}


?>