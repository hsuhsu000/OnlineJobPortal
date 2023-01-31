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


	//postJobs
	if(isset($_POST['post_button'])){
		
		
		$uid = $_POST['uid'];
		//echo $uid;
		$logo=$_FILES['logo']['name'];
		$tmp=$_FILES['logo']['tmp_name'];

		if($logo){
			move_uploaded_file($tmp, "images/$logo");
		}
		//echo $logo;	

		$jobTitle = $_POST['jobtitle'];
		//echo $jobTitle;
		$companyName = $_POST['companyname'];
		//echo $companyName;
		$category = $_POST['category'];
		//echo $category;
		$jobType = $_POST['jobtype'];
		//echo $jobType;
		$jobLocation = $_POST['joblocation'];
		//echo $jobLocation;
		$skillRequired = $_POST['skillrequired'];
		//echo $skillRequired;
		$jobDescription = $_POST['jobdescription'];
		//echo $jobDescription;
		$salary = $_POST['salary'];
		//echo $salary;
		
		$query = "INSERT INTO jobs (uid, companyLogo, jobTitle, companyName, category, jobType, jobLocation, skillRequired, jobDescription, salary) VALUES ('$uid', '$logo', '$jobTitle', '$companyName', '$category', '$jobType', '$jobLocation', '$skillRequired', '$jobDescription', '$salary')";
		$result = mysqli_query($dbconnection,$query);
		if($result){
			echo "<script>alert('Job Posted Successfully');</script>";
			header ("location: viewJobs.php");
		}
		else{
			die('Error: '.mysqli_error($dbconnection));
		}
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
			<div class="col-lg-2 col-md-2 col-sm-2"></div>
			<div class="col-lg-8 col-md-8 col-sm-8">
				<div class="card mt-5 mb-5">
					<div class="card-header">
						<div class="card-title">
							<h4>Post a Job</h4>
						</div>
					</div>					
					<div class="card-body">
						<form action="postJobs.php" method="POST" enctype="multipart/form-data">
							<!-- <input type="hidden" name="jid"> -->
							<input type="hidden" name="uid" value="<?php echo $login_user_array['uid']; ?>">
							  <div class="row">
								    <div class="col">
								    	<label>Company Logo</label>
								      	<input type="file" class="form-control" name="logo">
								    </div>
								    <div class="col">
								    	<label>Job Location</label>
								      	<input type="text" class="form-control" name="joblocation">
								    </div>
							  </div><br>
							  <div class="row">
								    <div class="col">
								    	<label>Job Title</label>
								      	<input type="text" class="form-control" name="jobtitle">
								    </div>

								    <div class="col">
								    	<label>Skill Required</label>
								      	<input type="text" class="form-control" name="skillrequired">
								    </div>
							  </div><br>
							  <div class="row">
								    <div class="col">
								    	<label>Company Name</label>
								      	<input type="text" class="form-control" name="companyname">
								    </div>

								    <div class="col">
								    	<label>Job Description</label>
								      	<!-- <input type="text" class="form-control" name="jobdescription"> -->
								      	<textarea class="form-control" name="jobdescription"></textarea>
								    </div>
							  </div><br>
							  <div class="row">
								    <div class="col">
								    	<label>Category</label>
								      	<!-- <input type="text" class="form-control" name="category"> -->
								      	<select class="form-control" name="category">
								      		<option>Administration, business and management</option>
								      		<option>Computing and ICT</option>
								      		<option>Construction and building</option>
								      		<option>Design, arts and crafts</option>
								      		<option>Education and training</option>
								      		<option>Hospitality, catering and tourism</option>
								      		<option>Manufacturing and production</option>
								      		<option>Retail and customer services</option>
								      		<option>Transport, distribution and logistics</option>
								      	</select>
								    </div>

								    <div class="col">
								    	<label>Salary</label>
								      	<input type="text" class="form-control" name="salary">
								    </div>
							  </div><br>
							  <div class="row">
								    <div class="col">
								    	<label>Job Type</label>
								      	<!-- <input type="text" class="form-control" name="jobtype"> -->
								      	<select class="form-control" name="jobtype">
								      		<option>Full-Time</option>
								      		<option>Part-Time</option>
								      	</select>
								    </div>

								    <div class="col">
								    	<label>Company Representative Name</label>
								      	<input type="text" class="form-control" name="crepresentativename" value="<?php echo $login_user_array['uname']; ?>" readonly="readonly">
								    </div>
							  </div>						
					</div>
					<div class="card-footer">
						<!-- <a href="postJobs.php" class="btn btn-primary btn-lg" type="submit" name="post_button">Post Job</a> -->
						<button class="btn btn-secondary btn-lg" name="post_button">Post Job</button>
					</div>

					</form>
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