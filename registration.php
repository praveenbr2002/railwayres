<?php

session_start();


$connection = mysqli_connect("localhost","root","","reservation");

$name = $_POST['user'];
$pass = $_POST['password'];
$email= $_POST['Email'];

$query= "SELECT * FROM users where name = '$name'";
$query_run= mysqli_query($connection,$query);

$num = mysqli_num_rows($query_run);

if($num==1){
	echo "Username has already been taken";
	header('location:invalid3.php');
}
else{
	$reg= "insert into users(Name,Password,Email) values('$name','$pass','$email')";
	mysqli_query($connection,$reg);
	echo "Registration successful";
	header('location:successful.php');

}


?>