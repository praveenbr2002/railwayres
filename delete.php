<?php

session_start();
$connection = mysqli_connect("localhost","root","","reservation");

$reg= "DELETE from bookings where Payment_Status=0";
mysqli_query($connection,$reg);
header('location:myOrders.php');	

?>