<?php

session_start();
if(!isset($_SESSION['username'])){
	header('location:login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Cancel Tickets</title>
	<link rel="stylesheet" type="text/css" href="style4.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
	<a class="float-right" href="logout.php"> LOGOUT </a>
	<h1><p style="color:white">Welcome <?php echo $_SESSION['username']; ?></p></h1> 
	</div>

	<div style="background-color: white; width: 50%; margin: auto; border: thin solid black; ">
		<center><h1 style= "color: blue">INDIAN RAILWAYS</h1></center>
		<center><h2 style= "color: orange;font-family:georgia,garamond,serif;"><u>Ticket Cancellation</u></h2></center><br><br>
	<div style="margin: auto;">
      <form action ="cancelValidate.php" method="POST">
         <center>
         <label>PNR Number:</label>
         	<input type="number" name="PNR_number" required><br><br>
         <label>Number of Persons:</label>
         	<input type="number" name="Number_Of_Passengers" min="1" max="6" required><br><br>
         <button type="submit" name="book" class="btn btn-primary">Proceed</button><br><br>
         </center>
      </form>
      <a href="myOrders.php"><center><font style="color: red"><u><b>Cancel</b></u></font></center></a><br><br>
  	</div>
	</div>


</html>