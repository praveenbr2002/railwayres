<?php

session_start();
if(!isset($_SESSION['username'])){
	header('location:login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>My Reservations</title>
   <style type="text/css">
    table,th,td{
      border: 2px solid black;
      width: 550px;
      border-color: black
    }
    </style>
	<link rel="stylesheet" type="text/css" href="style4.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
	<a class="float-right" href="logout.php"> LOGOUT </a>
	<h1><p style="color:white">Welcome <?php echo $_SESSION['username']; ?></p></h1> 
	</div>

	<div style="background-color: LightBlue; width: 50%; margin: auto; border: thin solid black; ">
		<center><h1 style= "color: darkblue">My Reservations</h1></center>
	<div style="margin: auto;">
      <form action ="booking.php" method="POST">
         <center>
         <table style="width:90%">
                <tr>
                   <th>PNR</th>
                   <th>Train No</th>
                   <th>Origin</th>
                   <th>Destination</th>
                   <th>No.of tickets</th>
                   <th>Date</th>
                </tr><br>
         <?php
         $current_date = date('Y-m-d');
         $user = $_SESSION['username'];
         $connection = mysqli_connect("localhost","root","","reservation");
         $query = "SELECT * FROM `bookings` where Name = '$user' and Payment_Status = 1";
         $query_run = mysqli_query($connection, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                
               while($row = mysqli_fetch_array($query_run))
               {
                ?>
                  <tr>
                     <td><?php echo $row['PNR']; ?></td>
                     <td><?php echo $row['Train_No']; ?></td>
                     <td><?php echo $row['Origin']; ?></td>
                     <td><?php echo $row['Destination']; ?></td>
                     <td><?php echo $row['Number_Of_Passengers']; ?></td>
                     <td><?php echo $row['Date']; ?></td>
                  </tr>
                  <?php
               }
                  
            }
            else
            {
               echo "You dont have any past reservations";
            }
         ?>
         </table><br><br>
         <h6><center>Please Note the <font style= "color: blue">PNR</font> for cancelling tickets</center></h6>
         </center>
      </form>
  	</div>
	</div>

    <div> 
    <br>
    <center>
    <form action="home.php" method="POST">
        <button type="submit" class="btn btn-primary">BOOK TICKETS</button>
    </form><br>
    <form action="cancel.php" method="POST">
        <button type="submit" style="background-color:red; border:NONE" class="btb btn-primary">CANCEL TICKETS</button><br><br>
    </form>
    </center>
    </div>

</body>
</html>