<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Job Portal</title>
	<link rel="stylesheet" type="text/css" href="stylejp.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<link rel="icon" href="image/favicon.ico" type="image/x-icon">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php
include 'dbconnection.php';

if(isset($_POST['']))





<!-------- navigation ------>
<nav class="navbar navbar-expand-lg navbar-light navbar-default" style=" letter-spacing: 2px; font-size: 18px; font-weight: 100px;">
  	<a class="navbar-brand" href="#"><h3>JobsForYou</h3></a>
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  	</button>

  	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    	<div class="navbar-nav left" style="margin-left: 80px;">
	      	<a class="nav-link active" href="home.php">Home <span class="sr-only">(current)</span></a>
	      	<a class="nav-link" href="jobs.php">Search Jobs</a>
	      	<a class="nav-link" href="companyprofiles.php">Company Profiles</a>
    	</div>
  	</div>

  	<div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="margin-left: 500px;">
  		<div class="navbar-nav right">
  			<a class="nav-link" href="jseeker_login.php">Login</a>
	      	<a class="nav-link" href="jseeker_register.php">Sign Up</a>
	      	<button type="button" class="btn btn-primary" style="padding: 0px; font-size: 20px;"><a class="nav-link" href="company.html"><h5>For Company</h5></a></button>
  		</div>
  	</div>
</nav>
<!-------- navigation ------>


<!-------- content --------->

<div class="container">
	<div class="row">
	
		<div class="col-lg-12 col-md-12 col-sm-12 text-center my-5" >
		
		<h2>JobSeeker Registration</h2><br>
		
	
		<center>
		<table class="login-form">
		
		<form action="" method="post" style="border:4px solid black" >
		<tr>
			<td>Name:</td>
			<td><input type="text" name="name"></td>
		</tr>
		
		<tr>
			<td>Email:</td>
			<td><input type="email" name="email"></td>
		</tr>

		<tr>
			<td>Phone No:</td>
			<td><input type="text" name="phno"></td>
		</tr>

		<tr>
			<td>Address:</td>
			<td><input type="text" name="address"></td>
		</tr>
		

		<tr>
			<td>Gender:</td>
			<td>
			<input type="radio" name="gender" value="male">Male
			<input type="radio" name="gender" value="female">Female
			</td>
		</tr>
		
		<tr>
			<td>Password:</td>
			<td><input type="password" name="pwd"></td>
		</tr>

		<tr>
			<td><input type="submit" name="register" value="Register" class="btn btn-primary"></td>
		</tr>
		
		</form>
		
		</table>
		</center>
		
		
		</div>
		
	</div>
</div>
<!-------- content --------->



<!---------- footer -->
<footer class="mt-5">
	<div class="container">
		<div class="row text-center">
			<div class="col-lg-4 col-md-12 col-sm-12 col-12">
				<p><a href="about.php" style="color: black;">About JobsForYou</a></p>

				<p><a href="contactus.php" style="color: black;">Contact Us</a></p>

				<p><a href="faq.php" style="color: black;">FAQ</a></p>
			</div>

			<div class="col-lg-4 col-md-12 col-sm-12 col-12">
				<p><a href="jobs.php" style="color: black;">Jobs by Specialization</a></p>

				<p><a href="companyprofiles.php" style="color: black;">Jobs by Company</a></p>
			</div>

			<div class="col-lg-4 col-md-12 col-sm-12 col-12">
				<p><a href="#" style="color: black;">Facebook</a></p>

				<p><a href="#" style="color: black;">Twitter</a></p>

				<p><a href="#" style="color: black;">Instagram</a></p>
			</div>
		</div>
		<h5 class="text-center">JobsForYou2021. All rights reserved.</h5><hr>
		<p class="text-center">Developed by Hsu Shwe Sin Oo</p>
	</div>
</footer>

<!---------- footer -->
</body>
</html>