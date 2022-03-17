<?php

session_start();

$current_date = date('Y-m-d');
$connection = mysqli_connect("localhost","root","","reservation");
$doj = $_POST['exp_date'];

if($current_date < $doj)
{
	$Name = $_SESSION['username'];

	$reg= "UPDATE bookings SET Payment_Status=1 where Name='$Name'";
	mysqli_query($connection,$reg);
	echo "Successful";
	header("location:enjoy.php");		                                                                                                             
}
else
{
       echo "Invalid entry of Expiry date";
       header('location:invalid5.php');
}

?>