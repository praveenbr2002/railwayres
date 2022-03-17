<!DOCTYPE html>
<html>
<head>
	<title>User Login and Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<button class="float-right" ><a href="index.php"> GO BACK </a></button> 
	</div>
	<br><br>
	<h1><center><p><font color: white>INDIAN RAILWAYS</p></center></h1>	
	<h1><center><p style="font-style: italic; color: white;">Please Login before booking Ticket</p></center></h1>
<div class="container">
	<div class="login-box">
	<div class="row">
		<div class="col-md-6 login-left">
			<h2>Login Here</h2>
			<form action="validation.php" method="POST">
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="user" title="Please enter only alphabets" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" required>
				</div>
				<center>
				<button type="submit" class="btn btn-primary">Login</button>
				</center>
			</form>
		</div>
		<div class="col-md-6 login-right">
			<h2>Register Here</h2>
			<form action="registration.php" method="POST">
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="user" minlength="3" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="Email" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" minlength="3" class="form-control" required>
				</div>
				<center>
				<button type="submit" class="btn btn-primary">Register</button>
				</center>
			</form>
		</div>
	</div>
	</div>
</div>

</body>
</html>