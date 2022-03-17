<?php
session_start();


?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Payment Portal</title>
	<link rel="stylesheet" type="text/css" href="style3.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body style="background-image: url('image4.jpg');">
  <div class="container">
  <a class="float-right" href="logout.php"><b><u>LOGOUT</u></b> </a>
  </div>
	<div class="payment">
	<div style="background-color: white; width: 50%; margin: auto; border: thin solid black; ">
	
   	<center><h1 style= "color: blue">INDIAN RAILWAYS</h1></center>
   	<center><h2 style= "color: orange;font-family:georgia,garamond,serif;"><u>Payment Portal</u></h2></center><br><br>
   	<center><h3 style= "color: blue">Amount to be paid: 
      <?php
         $connection = mysqli_connect("localhost","root","","reservation");
         $nop = $_SESSION['nofp'];
         $amoun = $nop * 80;
         echo $amoun;
      ?>

    only</h3></center><br><br>
   	<div style="margin: auto;">
      	<form action ="pay.php" method="POST">
        	<center>
        	<label for="pm">PAYMENT METHOD:</label>
            <select id="pm" name="pm" required>
            	<option value="CREDIT">CREDIT CARD</option>
            	<option value="DEBIT">DEBIT CARD</option>
            </select><br><br>
         	<label>BANK ACCOUNT NUMBER:</label>
         	<input type="text" name="Account_Number" placeholder="1234-5678-9123-4567" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}" required><br><br>
         	<label>EXPIRY DATE:</label>
            	<input type="Date" name="exp_date" required>
            <label>CVV:</label>
         	<input type="text" name="cvv" placeholder="123" pattern="[0-9]{3}" required><br><br>
         	<button type="submit" name="pay" class="btb btn-primary">PAY</button><br><br>
         	</center>
      	</form>
    </div>
    <a href="CancelPay.php"><center><font style="color: red"><u><b>Cancel Payment</b></u></font></center></a><br><br>
    </div>
	</div>

</body>
</html>