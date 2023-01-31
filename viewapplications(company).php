<?php
	session_start();
	include "dbconnect.php";

	if($_SESSION['user_array']['role'] != 'CompanyRepresentative'){
			header('location: jobseeker-dashboard.php');
		}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap.min.bundle.js"></script>

	
</head>
<body>

	<?php
	//READ LOGIN USER DATA
	$login_user_id = $_SESSION['user_array']['uid'];
	$result = mysqli_query($dbconnection,"SELECT * FROM users WHERE uid = $login_user_id");
	if($result){
		$login_user_array = mysqli_fetch_assoc($result);
	}else{
		die('Error '.mysqli_error($dbconnection));
	}
	?>

	<!------------ Navbar -->
	<nav class="navbar navbar-expand-lg ">
		  <a class="navbar-brand" href="#">Online Job Portal</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		    <div class="navbar-nav">
		      <a class="nav-link active" href="company-dashboard.php">Home <span class="sr-only">(current)</span></a>
		      <a class="nav-link" href="postJobs.php" >Post Jobs</a>
		      <a class="nav-link" href="viewJobs.php">View Jobs</a> <!-- included edit and delet functions -->
		      <a class="nav-link" href="viewapplications(company).php">View Applications</a>
		    </div>
		  </div>

		  <a href="logout.php"><button class="btn btn-secondary btn-lg">Logout</button></a>
	</nav>


	<!--------------------------- Body -->	
	<div class="container">
		<div class="row">
			<!----------------- VIEW APPLICATIONS ---------------->
			<div class="col-lg-2 col-md-2 col-sm-2"></div>
			<div class="col-lg-8 col-md-8 col-sm-8">
				<div class="card mt-5 mb-5">
					<div class="card-header text-center">
						<div class="card-title"><h4>Applications to your Company</h4></div>
					</div>

					<div class="card-body">
						<?php
							$query = "SELECT * FROM applications INNER JOIN jobs ON applications.jid = jobs.jid WHERE jobs.uid = $login_user_id";
							$result = mysqli_query($dbconnection,$query);
							foreach($result as $a){ ?>
								<table class="table table-bordered">						
										<tr>
											<td>Job Seeker Name:</td>
											<td><?php echo $a['aName'];  ?></td>
										</tr>
										<tr>
											<td>Job Seeker Email:</td>
											<td><?php echo $a['aEmail'];  ?></td>
										</tr>
										<tr>
											<td>Job Sekeer Phone Number</td>
											<td><?php echo $a['aPhNo'];  ?></td>
										</tr>
										<tr>
											<td>Job Seeker Address</td>
											<td><?php echo $a['aAddress'];  ?></td>
										</tr>
										<tr>
											<td>CV Form</td>
											<td>
												<a href="cvForm/<?php echo $a['aCV'] ?>" target="_blank">Click to download CvForm</a>
											</td>
										</tr>
										<tr>
											<td>Job Name:</td>
											<td><?php echo $a['jobTitle']; ?></td>
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