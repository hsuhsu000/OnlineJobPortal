<?php
	session_start();
	include "dbconnect.php";

	if($_SESSION['user_array']['role'] != 'JobSeeker'){
			header('location: company-dashboard.php');
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
	<script src="js/bootstrap.bundle.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>


</head>
<body>

	<!-- PHP CODES -->
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
	<div class="container mt-5 my-5">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 ">				
				  <form class="form-inline justify-content-center">
				    <input class="form-control mr-sm-2" type="search" placeholder="Enter Job Title" aria-label="Search" name="search" style="width:500px; ">
				    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search_button" >Search</button>
				  </form>				
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-lg-4 col-md-4 col-sm-4">
				<h5>Filter By:</h5>
				<div class="btn-group dropright">
					  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:150px;" >
					    Job-Type
					  </button>
					  <div class="dropdown-menu">
					   		<a class="dropdown-item" href="findJobs.php?fulltime">Full-Time</a>
					   		<a class="dropdown-item" href="findJobs.php?parttime">Part-Time</a>
					  </div>
				</div><br><br>
				<div class="btn-group dropright">
					  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:150px;">
					    Job Category
					  </button>
					  <div class="dropdown-menu">
					   		
					   			<?php
									$result = mysqli_query($dbconnection, "SELECT * FROM jobs");
									foreach($result as $jobs){?>
										<a class="dropdown-item" href="findJobs.php?jobcategory=<?php echo $jobs['category']; ?>"><?php echo $jobs['category']."<br>";?></a>
								<?php } ?>					   		
					  </div>
				</div><br><br>
				<div class="btn-group dropright">
					  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:150px;">
					    Job Position
					  </button>
					  <div class="dropdown-menu">
					   		
					   			<?php
									$result = mysqli_query($dbconnection, "SELECT * FROM jobs");
									foreach($result as $jobs){?>
										<a class="dropdown-item" href="findJobs.php?jobtitle=<?php echo $jobs['jobTitle']; ?>"><?php echo $jobs['jobTitle']."<br>";?></a>
								<?php } ?>
					  </div>
				</div>
			</div>

			<div class="col-lg-8 col-md-8 col-sm-8">
				<div class="card">
						<div class="card-header">
							<div class="card-title"><h3>Available Jobs</h3></div>
						</div>

						<div class="card-body">
							<!-- Full Time -->
							<?php
							if(isset($_GET['fulltime'])){
								$result = mysqli_query($dbconnection, "SELECT * FROM jobs WHERE jobType = 'Full-Time'");
								foreach($result as $jobs){ ?>
									 
									<div class="card">
										<div class="card-body">
											<div class="row">
												<div class="col-md-3 float-left">
												<img src="<?php echo 'images/'.$jobs['companyLogo']; ?>" width='150px' height='150px'>
												</div>
											
												<div class="col-md-5 float-right">
													<p>Company Name : <?php echo $jobs['companyName']; ?> | <?php echo $jobs['jobType'];?></p> 
													<p>Job Title : <?php echo $jobs['jobTitle']; ?> | <?php echo $jobs['category']; ?></p>
													<p>Salary : <?php echo $jobs['salary']; ?> MMK </p>
													<a href="jobseeker_viewJobs.php?jid_to_view=<?php echo $jobs['jid']; ?>" class="btn btn-secondary">View Jobs</a>
												</div>
											</div>										
										</div>
									</div>								
						<?php } }?>						
						<!-- Part Time -->
							<?php
							if(isset($_GET['parttime'])){
								$result = mysqli_query($dbconnection, "SELECT * FROM jobs WHERE jobType = 'Part-Time'");
								foreach($result as $jobs){ ?>
									 
									<div class="card">
										<div class="card-body">
											<div class="row">
												<div class="col-md-3 float-left">
												<img src="<?php echo 'images/'.$jobs['companyLogo']; ?>" width='150px' height='150px'>
												</div>
											
												<div class="col-md-5 float-right">
													<p>Company Name : <?php echo $jobs['companyName']; ?> | <?php echo $jobs['jobType'];?></p> 
													<p>Job Title : <?php echo $jobs['jobTitle']; ?> | <?php echo $jobs['category']; ?></p>
													<p>Salary : <?php echo $jobs['salary']; ?> MMK </p>
													<a href="jobseeker_viewJobs.php?jid_to_view=<?php echo $jobs['jid']; ?>" class="btn btn-secondary">View Jobs</a>
												</div>
											</div>										
										</div>
									</div>								
						<?php } }?>

						<!-- Job Category -->
							<?php
							if(isset($_GET['jobcategory'])){
								$jobcategory = $_GET['jobcategory'];
								$result = mysqli_query($dbconnection, "SELECT * FROM jobs WHERE category = '$jobcategory'");
								foreach($result as $jobs){ ?>
									 
									<div class="card">
										<div class="card-body">
											<div class="row">
												<div class="col-md-3 float-left">
												<img src="<?php echo 'images/'.$jobs['companyLogo']; ?>" width='150px' height='150px'>
												</div>
											
												<div class="col-md-5 float-right">
													<p>Company Name : <?php echo $jobs['companyName']; ?> | <?php echo $jobs['jobType'];?></p> 
													<p>Job Title : <?php echo $jobs['jobTitle']; ?> | <?php echo $jobs['category']; ?></p>
													<p>Salary : <?php echo $jobs['salary']; ?> MMK </p>
													<a href="jobseeker_viewJobs.php?jid_to_view=<?php echo $jobs['jid']; ?>" class="btn btn-secondary">View Jobs</a>
												</div>
											</div>											
										</div>
									</div>							
						<?php } }?>

						<!-- Job Title -->
						<?php
							if(isset($_GET['jobtitle'])){
								$jobtitle = $_GET['jobtitle'];
								$result = mysqli_query($dbconnection, "SELECT * FROM jobs WHERE jobTitle = '$jobtitle'");
								foreach($result as $jobs){ ?>
									 
									<div class="card">
										<div class="card-body">
											<div class="row">
												<div class="col-md-3 float-left">
												<img src="<?php echo 'images/'.$jobs['companyLogo']; ?>" width='150px' height='150px'>
												</div>
											
												<div class="col-md-5 float-right">
													<p>Company Name : <?php echo $jobs['companyName']; ?> | <?php echo $jobs['jobType'];?></p> 
													<p>Job Title : <?php echo $jobs['jobTitle']; ?> | <?php echo $jobs['category']; ?></p>
													<p>Salary : <?php echo $jobs['salary']; ?> MMK </p>
													<a href="jobseeker_viewJobs.php?jid_to_view=<?php echo $jobs['jid']; ?>" class="btn btn-secondary">View Jobs</a>
												</div>
											</div>
											
										</div>
									</div>								
						<?php } }?>

						<!-- Search Job Title -->
						<?php
							if(isset($_GET['search_button'])){
								$search = $_GET['search'];
								$result = mysqli_query($dbconnection, "SELECT * FROM jobs WHERE jobTitle = '$search'");
								foreach($result as $jobs){ ?>
									 
									<div class="card">
										<div class="card-body">
											<div class="row">
												<div class="col-md-3 float-left">
												<img src="<?php echo 'images/'.$jobs['companyLogo']; ?>" width='150px' height='150px'>
												</div>
											
												<div class="col-md-5 float-right">
													<p>Company Name : <?php echo $jobs['companyName']; ?> | <?php echo $jobs['jobType'];?></p> 
													<p>Job Title : <?php echo $jobs['jobTitle']; ?> | <?php echo $jobs['category']; ?></p>
													<p>Salary : <?php echo $jobs['salary']; ?> MMK </p>
													<a href="jobseeker_viewJobs.php?jid_to_view=<?php echo $jobs['jid']; ?>" class="btn btn-secondary">View Jobs</a>
												</div>
											</div>
											
										</div>
									</div>
								
						<?php  } }	?>
						</div> <!-- end of card body -->
					</div> <!-- end of card -->		
			</div>
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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
</body>
</html>