<?php
$tnum;
session_start();
if(!isset($_SESSION['username'])){
	header('location:login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
   <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   <style type="text/css">
    table,th,td{
      border: 2px solid black;
      width: 550px;
      border-color: blue
    }
   </style>
</head>
<body>
	<div class="container">
	<a class="float-right" href="logout.php"> LOGOUT </a>
	<h1><p style="color:white">Welcome <?php echo $_SESSION['username']; ?></p></h1> 
	</div>

	<div style="background-color: white; width: 50%; margin: auto; border: thin solid black; ">
		<center><h1 style= "color: blue">INDIAN RAILWAYS</h1></center>
		<center><h2 style= "color: orange;font-family:georgia,garamond,serif;"><u>Ticket Booking</u></h2></center><br>
	<div style="margin: auto;">
      <h3 style= "color: green;font-family:georgia,garamond,serif;">&nbsp;<u>To check Train Number</u></h3>
      <form action ="#" method="POST">
         <center>
         <label for="org">ORIGIN:</label>
            <select id="org" name="org" required>
            <option value="CHENNAI">CHENNAI</option>
            <option value="DELHI">DELHI</option>
            <option value="KOLKATA">KOLKATA</option>
            <option value="MUMBAI">MUMBAI</option>
            </select><br>
         <label for="des">DESTINATION:</label>
            <select id="des" name="des" required>
            <option value="CHENNAI">CHENNAI</option>
            <option value="DELHI">DELHI</option>
            <option value="KOLKATA">KOLKATA</option>
            <option value="MUMBAI">MUMBAI</option>
            </select><br><br>
         <button type="submit" name="search" class="btb btn-primary">Click Here</button><br>
         <table>
         <tr>
            <th>Train Number</th>
            <th>Origin</th>
            <th>Destination</th>
            <th>Train Name</th>
         </tr><br>
         <?php
         $connection = mysqli_connect("localhost","root","","reservation");

         if(isset($_POST['search']))
         {
            $org = $_POST['org'];
            $des = $_POST['des'];

            $query = "SELECT * FROM `trains` where Origin = '$org' and Destination= '$des' ";
            $query_run = mysqli_query($connection, $query);

            if(mysqli_num_rows($query_run) > 0)
           {
               while($row = mysqli_fetch_array($query_run))
               {
                  $tnum = $row['Train_No'];
                  ?>
                  <tr>
                     <td><?php echo $row['Train_No']; ?></td>
                     <td><?php echo $row['Origin']; ?></td>
                     <td><?php echo $row['Destination']; ?></td>
                     <td><?php echo $row['Train_Name']; ?></td>
                  </tr>
                  <?php
               }
            }
            else
            {
               echo "There are currently no trains available between $org and $des";
            }
            
         }
         ?>
         </table><br>
         </center>
      </form>
      <h3 style= "color: green;font-family:georgia,garamond,serif;">&nbsp;<u>To Book Tickets</u></h3>
      <form action ="booking.php" method="POST">
         <center>
         <label>Train Number:</label>
            <input type="number" name="Train_Number" value="<?php echo $tnum?>" readonly required><br>
         <label>Number of Persons:</label>
         	<input type="number" name="Number_Of_Passengers" min="1" max="6" required><br><br>
         <label>DATE OF JOURNEY:</label>
            <input type="Date" name="res_date" required><br><br>
         <button type="submit" name="book" class="btn btn-primary">Book Tickets</button><br><br>
         </center>
      </form>
  	</div>
	</div>

</body>
</html>