<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap.min.bundle.js"></script>	
</head>
<body>
	<!--------- PHP CODES -->
	<?php
		include "dbconnect.php";
		$nameError = "";
		$emailError = "";
		$addressError = "";
		$passwordError = "";
		$roleError = "";
		if(isset($_POST['register_button'])){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			$password = $_POST['password'];
			$role = $_POST['role'];

			if(empty($name)){
				$nameError = "Required!!!!";
			}
			if(empty($email)){
				$emailError = "Required!!!!";
			}
			if(empty($address)){
				$addressError = "Required!!!!";
			}
			if(empty($password)){
				$passwordError = "Required!!!!";
			}
			if(empty($role)){
				$roleError = "Required!!!!";
			}
			if(!empty($name) && !empty($email) && !empty($address) && !empty($password) && !empty($role)){
				$query = "INSERT INTO users(uname,uemail,uaddress,upassword,role) VALUES ('$name','$email','$address','$password','$role')";
				$result = mysqli_query ($dbconnection,$query);
				if($result == true){
					echo "<script>alert('Registeration Successful!')</script>";
					header ('location: login.php');
				}
				else{
					die('Error '.mysqli_error($dbconnection));
				}
			}
		}
	?>

	<!--------Navigation Bar -->
	<nav class="navbar navbar-expand-lg">
		  <a class="navbar-brand" href="#">Online Job Portal</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav">
		      <li class="nav-item active">
		        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="register.php">SING UP</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="login.php">LOGIN</a>
		      </li>
		    </ul>
		  </div>
	</nav>

	<!-------- Body --------->
	<div class="container mt-5 mb-5">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3"></div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="card">
					<div class="card-header">
						<div class="card-title"><h3>Registeration Form</h3></div>
					</div>
					<div class="card-body">
						<form action="register.php" method="POST">
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control <?php if($nameError != ""){?> is-invalid <?php } ?>">
								<i class="text-danger"><?php echo $nameError; ?></i>
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="text" name="email" class="form-control <?php if($emailError != "") {?> is-invalid <?php } ?>">
								<i class="text-danger"><?php echo $emailError; ?></i>
							</div>
							<div class="form-group">
								<label>Address</label>
								<input type="text" name="address" class="form-control <?php if($addressError != "") {?> is-invalid <?php } ?>">
								<i class="text-danger"><?php echo $addressError; ?></i>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control <?php if($passwordError != "") {?> is-invalid <?php } ?>">
								<i class="text-danger"><?php echo $passwordError; ?></i>
							</div>
							<div class="form-group">
								<label>Role</label>
								<select name="role" class="form-control <?php if($roleError != "") {?> is-invalid <?php } ?>">
									<option>Select Role</option>
									<option>JobSeeker</option>
									<option>CompanyRepresentative</option>
								</select>
								<i class="text-danger"><?php echo $roleError; ?></i>
							</div>						
					</div>
					<div class="card-footer">
						<button type="submit" name="register_button" class="btn btn-secondary btn-lg">
							Register
						</button>
					</div>
					</form>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3"></div>
		</div>
	</div>


	<!----- Footer -->
	<footer class="footer">
	<div class="container">
		<div class="row text-center">
			<div class="col-lg-4 col-md-12 col-sm-12 col-12">
				<p><a href="index.php">About JobsForYou</a></p>
				<p><a href="">hsushwesinoo2002@gmail.com</a></p>
			</div>

			<div class="col-lg-4 col-md-12 col-sm-12 col-12">
				<p><a href="register.php">Create Account</a></p>
				<p><a href="login.php">Login Account</a></p>
			</div>

			<div class="col-lg-4 col-md-12 col-sm-12 col-12">
				<p><a href="#">Facebook</a></p>

				<p><a href="#">Twitter</a></p>

				<p><a href="#">Instagram</a></p>
			</div>
		</div>
		<h5 class="text-center">JobsForYou2021. All rights reserved.</h5><hr>
		<p class="text-center">Developed by Hsu Shwe Sin Oo</p>
	</div>
</footer>

</body>
</html>