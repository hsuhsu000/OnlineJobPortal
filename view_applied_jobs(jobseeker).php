<?php
	session_start();
	include "dbconnect.php";

	//READ LOGIN USER DATA
	$login_user_id = $_SESSION['user_array']['uid'];
	$result = mysqli_query($dbconnection,"SELECT * FROM users WHERE uid = $login_user_id");
	if($result){
		$login_user_array = mysqli_fetch_assoc($result);
	}else{
		die('Error '.mysqli_error($dbconnection));
	}

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
	<script src="js/bootstrap.bundle.min.js"></script>

	
</head>
<body>


	<!------------ Navbar -->
	<nav class="navbar navbar-expand-lg navbar-light">
		  <a class="navbar-brand" href="#">Online Job Portal</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		    <div class="navbar-nav">
		      <a class="nav-link active" href="jobseeker-dashboard.php">Home <span class="sr-only">(current)</span></a>
		      <a class="nav-link" href="findJobs.php">Find Jobs</a>
		      <a class="nav-link" href="view_applied_jobs(jobseeker).php">
		      	View Your Jobs

		      	<i class="fa fa-user" style="color: black; font-size:20px;"></i>
		      	
		      </a>
		    </div>
		  </div>

		  <a href="logout.php"><button class="btn btn-secondary btn-lg">Logout</button></a>
	</nav>

	<!--------------------------- Body -->
	<div class="container mt-5 mb-5">
		<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-2"></div>

			<div class="col-lg-8 col-md-8 col-sm-8">
				<div class="card">
					<div class="card-header">
						<div class="card-title"><h3 class="text-center">Your Jobs</h3></div>
					</div>
					<div class="card-body">
						<?php
							$query = "SELECT * FROM applications INNER JOIN jobs ON applications.jid = jobs.jid WHERE applications.uid = '$login_user_id'";
							$result = mysqli_query($dbconnection,$query);
							foreach($result as $a){ ?>
								<table class="table table-bordered">						
										<tr>
											<td>Company Logo:</td>
											<td>
											<?php   
												$p = "images/".$a['companyLogo'];
												echo "<img src='$p' width='150px' height='150px'>";
											?>	
											</td>
										</tr>
										<tr>
											<td>Job Title:</td>
											<td><?php echo $a['jobTitle'];  ?></td>
										</tr>
										<tr>
											<td>Company Name:</td>
											<td><?php echo $a['companyName'];  ?></td>
										</tr>											
										<tr>
											<td>Category:</td>
											<td><?php echo $a['category'];  ?></td>
										</tr>
										<tr>
											<td>Job Type:</td>
											<td><?php echo $a['jobType'];  ?></td>
										</tr>
										<tr>
											<td>Job Location:</td>
											<td><?php echo $a['jobLocation'];  ?></td>
										</tr>
										<tr>
											<td>Skill Required:</td>
											<td><?php echo $a['skillRequired'];  ?></td>
										</tr>
										<tr>
											<td>Job Description:</td>
											<td><?php echo $a['jobDescription'];  ?></td>
										</tr>
										<tr>
											<td>Salary:</td>
											<td><?php echo $a['salary'];  ?></td>
										</tr>		
								</table> 
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2"></div>
		</div>
	</div>




	
	
	
	

	<!--------------------------- Footer -->
	<footer>
	<div class="container">
		<div class="row text-center">
			<div class="col-lg-4 col-md-12 col-sm-12 col-12">
				<p><a href="index.php" style="color: black;">About JobsForYou</a></p>
				<p><a href="" style="color: black;">hsushwesinoo2002@gmail.com</a></p>
			</div>

			<div class="col-lg-4 col-md-12 col-sm-12 col-12">
				<p><a href="register.php" style="color: black;">Create Account</a></p>
				<p><a href="login.php" style="color: black;">Login Account</a></p>
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


</body>
</html>