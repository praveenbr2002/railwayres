<!DOCTYPE html>
<html>
<head>
	<title>Railway Reservation</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   <style type="text/css">
    table,th,td{
      border: 2px solid black;
      width: 550px;
      border-color: blue
    }
   </style>
</head>
<body style="background-image: url('engine.png');"> 
   <div style="background-color: white; width: 50%; margin: 100px auto; border: thin solid black; ">
   <center><h1 style= "color: blue">INDIAN RAILWAYS</h1></center>
   <center><h2 style= "color: #0047AB;font-family:georgia,garamond,serif;">Bearth/Seat Reservation</h2></center><br><br>
   <center><h2 style= "color: orange;font-family:georgia,garamond,serif;"><u>Check Available Trains</u></h2>
   <div style="margin: auto;">
      <form action ="#" method="POST">
         <center>
         <label for="org">ORIGIN:</label>
            <select id="org" name="org" required>
            <option value="CHENNAI">CHENNAI</option>
            <option value="DELHI">DELHI</option>
            <option value="KOLKATA">KOLKATA</option>
            <option value="MUMBAI">MUMBAI</option>
            </select><br><br>
         <label for="des">DESTINATION:</label>
            <select id="des" name="des" required>
            <option value="CHENNAI">CHENNAI</option>
            <option value="DELHI">DELHI</option>
            <option value="KOLKATA">KOLKATA</option>
            <option value="MUMBAI">MUMBAI</option>
            </select><br><br>
         <label>DATE OF JOURNEY:</label>
            <input type="Date" name="res_date" required><br><br>
         <button type="submit" name="search" class="btb btn-primary">SHOW TRAINS</button><br>
         </center>
      </form>

      <table>
         <tr>
            <th>Train Number</th>
            <th>Origin</th>
            <th>Destination</th>
            <th>Train Name</th>
         </tr><br>
         <?php
         $current_date = date('Y-m-d');
         $connection = mysqli_connect("localhost","root","","reservation");

         if(isset($_POST['search']))
         {
            $org = $_POST['org'];
            $des = $_POST['des'];
            $booked_date = $_POST['res_date'];

            if($current_date < $booked_date)
            {

               $query = "SELECT * FROM `trains` where Origin = '$org' and Destination= '$des' ";
               $query_run = mysqli_query($connection, $query);

               if(mysqli_num_rows($query_run) > 0)
               {
                  while($row = mysqli_fetch_array($query_run))
                  {
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
            else
            {
               echo "You cannot book a train for this date ";
            }
         }
         ?>

      </table><br><br>
      
      <form action="login.php" method="POST">
         <button type="submit" class="btn btn-primary">BOOK TICKETS</button>
      </form><br><br>
   </div>
   </div>
</body>
</html>