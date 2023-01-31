<?php
	session_start();
	include "dbconnect.php";

	// if($_SESSION['user_array']['role'] != 'CompanyRepresentative'){
	// 		header('location: jobseeker-dashboard.php');
	// 	}

	
	

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
	<?php
		//READ LOGIN USER DATA
		$login_user_id = $_SESSION['user_array']['uid'];
		$result = mysqli_query($dbconnection,"SELECT * FROM users WHERE uid = $login_user_id");
		if($result){
			$login_user_array = mysqli_fetch_assoc($result);
		}else{
			die('Error '.mysqli_error($dbconnection));
		}

		//jobarray 
		$job_id = $_SESSION['jobarr']['jid'];
		$result = mysqli_query($dbconnection,"SELECT * FROM jobs WHERE jid = $job_id");
		if($result){
			$jobarr_to_view = mysqli_fetch_assoc($result);
		}
		else{
			die('Error '.mysqli_error($dbconnection));
		}				

		//INSERT INTO APPLICATION
		if(isset($_POST['apply_button'])){
			
			$uid = $_POST['uid'];
			$jid = $_POST['jid'];
			$name = $_POST['name'];
			//echo $name;
			$email = $_POST['email'];
			//echo $email;
			$phno = $_POST['phno'];
			//echo $phno;
			$address = $_POST['address'];
			//echo $address;
			$cv = $_FILES['cv']['name'];
			$tmp = $_FILES['cv']['tmp_name'];
			if($cv){
				move_uploaded_file($tmp, "cvForm/$cv");
			}
			//echo $cv;
			$query = "INSERT INTO applications (uid, jid, aName, aEmail, aphNo, aAddress, aCV) VALUES ('$uid', '$jid', '$name','$email','$phno','$address','$cv')";
			$result = mysqli_query($dbconnection,$query);
			
			if($result){
				 // $application_array = mysqli_fetch_assoc($result);
				 // $_SESSION['application_array'] = $application_array;
				//echo '<script>alert("A job has been applied successfully.")</script>';
				header('location: view_applied_jobs(jobseeker).php');
			}
			else{
				die('Error: '.mysqli_error($dbconnection));
			}					
		}		
	?>

	<div class="container mt-5 mb-5">
		<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-2"></div>

			<div class="col-lg-8 col-md-8 col-sm-8">
				<div class="card">
					<div class="card-header">
						<div class="card-title">
							<h4 class="text-center">Job Submission Form</h4>
						</div>
					</div>

					<div class="card-body">							
						<form action="job_submission_form.php" method="POST" enctype="multipart/form-data">							
							<input type="hidden" name="jid" value="<?php echo $jobarr_to_view['jid']; ?>">
							<input type="hidden" name="uid" value="<?php echo $login_user_array['uid']; ?>">
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control">
							</div>

							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" class="form-control">
							</div>

							<div class="form-group">
								<label>Phone Number</label>
								<input type="text" name="phno" class="form-control">
							</div>

							<div class="form-group">
								<label>Address</label>
								<input type="text" name="address" class="form-control">
							</div>

							<div class="form-group">
								<label>CV Form</label>
								<input type="file" name="cv" class="form-control">
							</div>

							<div class="form-group">								
									<button class="btn btn-secondary" name="apply_button" onclick="return confirm('Are you sure to submit this job?')">Apply Job</button>							
							</div>							
						</form>
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