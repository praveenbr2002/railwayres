<?php

session_start();

$current_date = date('Y-m-d');
$connection = mysqli_connect("localhost","root","","reservation");
$dor = $_POST['res_date'];

if($current_date < $dor)
{
		$Name = $_SESSION['username'];
		$tn = $_POST['Train_Number'];
		$nop = $_POST['Number_Of_Passengers'];

		$query= "SELECT * FROM trains where Train_No='$tn' ";		
		$query_run= mysqli_query($connection,$query);
		$row = mysqli_fetch_array($query_run);
		$org = $row['Origin'];
		$des = $row['Destination'];
		$num = mysqli_num_rows($query_run);
		if($num>0)
		{ 
			echo "Hi";
			$reg= "insert into bookings(Train_No,Origin,Destination,Number_Of_Passengers,Date,Name) values('$tn','$org','$des','$nop','$dor','$Name')";
			mysqli_query($connection,$reg);	
			header('location:payment.php');	                                                                                                             
		}
		else
		{
			echo "There are currently no trains available between $org and $des represented by the current train number ( '$tn' )";
			header('location:invalid1.php');
		}
}
else
{
       echo "You cannot book a train for $dor ";
       header('location:invalid2.php');
}

?>