<?php	
	session_start();

	$connection = mysqli_connect("localhost","root","","reservation");
	$pnr = $_POST['PNR_number'];
	$nop = $_POST['Number_Of_Passengers'];
	$name = $_SESSION['username'];

	$query1= "SELECT * FROM bookings where PNR = '$pnr' and Name = '$name'";
	$query_run1= mysqli_query($connection,$query1);
	$num1 = mysqli_num_rows($query_run1);

	if($num1==1)
	{
		$query2= "SELECT * FROM bookings where PNR = '$pnr' and Number_Of_Passengers >= '$nop' ";
		$query_run2= mysqli_query($connection,$query2);
		$num2 = mysqli_num_rows($query_run2);
		if($num2==1)
		{	 
			$row = mysqli_fetch_array($query_run2);
			$exist_nop = $row['Number_Of_Passengers'];
			$diff = $exist_nop - $nop;
			$reg = "UPDATE bookings SET Number_Of_Passengers = '$diff' where PNR = '$pnr'";
			mysqli_query($connection,$reg);
			header("location:postcancel.php");

			$query3 = "DELETE from bookings where Number_Of_Passengers = 0 and PNR = '$pnr'";
			$query_run3= mysqli_query($connection,$query3);
		}
		else
		{
			header('location:invalid7.php');
		}
	}
	else
	{
		header('location:invalid6.php');
	}


?>