<?php
	session_start();
	include "dbconnect.php";
?>

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

<?php
	$error = "";
	if(isset($_POST['login_button'])){
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);

		$query = "SELECT * FROM users WHERE uemail = '$email' AND upassword = '$password' ";
		$result = mysqli_query($dbconnection,$query);
		$count = mysqli_num_rows($result);

		if($count === 1){

			$user_array = mysqli_fetch_assoc($result);
			$_SESSION['user_array'] = $user_array;
			
			if($user_array['role'] == 'CompanyRepresentative'){
				header('location: company-dashboard.php');
			}
			else{
				header('location: jobseeker-dashboard.php');
			}
		}


		else{
			 $error = "Invalid email or password";
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
						<div class="card-title"><h3>Login Form</h3></div>
					</div>																
					<form action="login.php" method="POST">
							<div class="card-body">
									<?php if($error != ""): ?>
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
									  <strong><?php  echo $error; ?></strong>
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									</div>
									<?php endif ?>

									<div class="form-group">
										<label>Email</label>
										<input type="text" name="email" class="form-control">
									</div>

									<div class="form-group">
										<label>Password</label>
										<input type="password" name="password" class="form-control">
									</div>																	
							</div>
							<div class="card-footer">
								<button type="submit" name="login_button" class="btn btn-secondary btn-lg">
									Login
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