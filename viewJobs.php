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

	//EDIT JOBS
	$jobs_update_form_status = false;
	if(isset($_GET['job_id_to_edit'])){
		$jobs_update_form_status = true;
		$job_id_to_edit = $_GET['job_id_to_edit'];
		$query = "SELECT * FROM jobs WHERE jid = $job_id_to_edit";
		$result = mysqli_query($dbconnection,$query);
		if($result){
			$jobs_array = mysqli_fetch_assoc($result);
		}
		else{
			die('Error: '.mysqli_error($dbconnection));
		}
	}

	//DELETE JOBS
	if(isset($_GET['job_id_to_delete'])){
		$job_id_to_delete = $_GET['job_id_to_delete'];
		$query = "DELETE FROM jobs WHERE jid = $job_id_to_delete";
		$result = mysqli_query($dbconnection,$query);
		if($result){
			echo "<script>alert('A job deleted successfully!');</script>";
			header('location: viewJobs.php');
		}
		else{
			die('Error: '.mysqli_error($dbconnection));
		}
	}

	//UPDATE JOBS
	if(isset($_POST['update_button'])){
		$jid = $_POST['jid'];
		$uid = $_POST['uid'];
		//echo $uid;
		$logo=$_FILES['logo']['name'];
		$tmp=$_FILES['logo']['tmp_name'];

		
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
		if($logo){
			move_uploaded_file($tmp, "images/$logo");
			$result = mysqli_query($dbconnection,"UPDATE jobs SET companyLogo = '$logo', jobTitle = '$jobTitle', companyName = '$companyName', category = '$category', jobType = '$jobType', jobLocation = '$jobLocation', skillRequired = '$skillRequired', jobDescription = '$jobDescription', salary = '$salary' WHERE jid = $jid");
			header('location: viewJobs.php');
		}	
		else{
			$result = mysqli_query($dbconnection,"UPDATE jobs SET jobTitle = '$jobTitle', companyName = '$companyName', category = '$category', jobType = '$jobType', jobLocation = '$jobLocation', skillRequired = '$skillRequired', jobDescription = '$jobDescription', salary = '$salary' WHERE jid = $jid");
			header('location: viewJobs.php');
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
			<!----------------- VIEW JOBS ---------------->
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="card mt-5 mb-5">
					<div class="card-header text-center">
						<div class="card-title"><h4>Uploaded Jobs</h4></div>
					</div>
					<div class="card-body">
						<?php
							$query = "SELECT * FROM jobs WHERE uid = '$login_user_id'";
							$result = mysqli_query($dbconnection,$query);
							foreach($result as $jobs){ 
								$_SESSION['jobs'] = $jobs; ?>
								<table class="table table-responsive">							
										<tr>
											<td>Company Logo:</td>
											<td>
											<?php   
												$p = "images/".$jobs['companyLogo'];
												echo "<img src='$p' width='150px' height='150px'>";
											?>	
											</td>
										</tr>
										<tr>
											<td>Job Title:</td>
											<td><?php echo $jobs['jobTitle'];  ?></td>
										</tr>
										<tr>
											<td>Company Name:</td>
											<td><?php echo $jobs['companyName'];  ?></td>
										</tr>											
										<tr>
											<td>Category:</td>
											<td><?php echo $jobs['category'];  ?></td>
										</tr>
										<tr>
											<td>Job Type:</td>
											<td><?php echo $jobs['jobType'];  ?></td>
										</tr>
										<tr>
											<td>Job Location:</td>
											<td><?php echo $jobs['jobLocation'];  ?></td>
										</tr>
										<tr>
											<td>Skill Required:</td>
											<td><?php echo $jobs['skillRequired'];  ?></td>
										</tr>
										<tr>
											<td>Job Description:</td>
											<td><?php echo $jobs['jobDescription'];  ?></td>
										</tr>
										<tr>
											<td>Salary:</td>
											<td><?php echo $jobs['salary'];  ?></td>
										</tr>
										<tr>
											<td>
												<a href="viewJobs.php?job_id_to_edit=<?php echo $jobs['jid']; ?>" class="btn btn-secondary">Edit Job</a>
											</td>
											<td>
												<a href="viewJobs.php?job_id_to_delete=<?php echo $jobs['jid']; ?>" class="btn btn-secondary" onclick="return confirm('Are you sure to delete')">Delete Job</a>
											</td>
										</tr>		
								</table> 
						<?php } ?>
					</div>

					<!-- <div class="card-footer text-center">
						<a href="viewJobs.php" class="btn btn-primary btn-lg">Edit Job</a>

						<a href="viewJobs.php" class="btn btn-primary btn-lg">Delete Job</a>
					</div> -->
				</div>
			</div>

			<!----------------- UPDATE JOBS -------------->
			<div class="col-lg-6 col-md-6 col-sm-6">
				<?php if($jobs_update_form_status == true):  ?>
				<div class="card mt-5 mb-5">
					<div class="card-header text-center">
						<div class="card-title">
							<h4>Update a Job</h4>
						</div>
					</div>
				
					<div class="card-body">
						<form action="viewJobs.php" method="POST" enctype="multipart/form-data">

							<input type="hidden" name="jid" value="<?php echo $jobs_array['jid']; ?>">
							  <input type="hidden" name="uid" value="<?php echo $login_user_array['uid']; ?>">

							  <div class="row">

							  		<div class="col">
								    	<label>Company Logo</label><br>
								    	
								      	<img src="<?php echo 'images/'.$jobs_array['companyLogo']; ?>" width='150px' height='150px'> <br><br>
								      	<input type="file" class="form-control" name="logo">
								    </div>								    								    
							  </div><br>

							  <div class="row">
							  		<div class="col">
								    	<label>Job Location</label>
								      	<input type="text" class="form-control" name="joblocation" value="<?php echo $jobs_array['jobLocation']; ?>">
								    </div>
							  </div>

							  <div class="row">
								    <div class="col">
								    	<label>Job Title</label>
								      	<input type="text" class="form-control" name="jobtitle" value="<?php echo $jobs_array['jobTitle']; ?>">
								    </div>

								    <div class="col">
								    	<label>Skill Required</label>
								      	<input type="text" class="form-control" name="skillrequired" value="<?php echo $jobs_array['skillRequired']; ?>">
								    </div>
							  </div><br>

							  <div class="row">
								    <div class="col">
								    	<label>Company Name</label>
								      	<input type="text" class="form-control" name="companyname" value="<?php echo $jobs_array['companyName']; ?>">
								    </div>

								    <div class="col">
								    	<label>Job Description</label>
								      	<input type="text" class="form-control" name="jobdescription" value="<?php echo $jobs_array['jobDescription']; ?>">
								    </div>
							  </div><br>

							  <div class="row">
								    <div class="col">
								    	<label>Category</label>
								      	<input type="text" class="form-control" name="category" value="<?php echo $jobs_array['category']; ?>">
								    </div>

								    <div class="col">
								    	<label>Salary</label>
								      	<input type="text" class="form-control" name="salary" value="<?php echo $jobs_array['salary']; ?>">
								    </div>
							  </div><br>

							  <div class="row">
								    <div class="col">
								    	<label>Job Type</label>
								      	<input type="text" class="form-control" name="jobtype" value="<?php echo $jobs_array['jobType']; ?>">
								    </div>

								    <div class="col">
								    	<label>Company Representative Name</label>
								      	<input type="text" class="form-control" name="companyrepresentativename" value="<?php echo $login_user_array['uname']; ?>" readonly="readonly">
								    </div>
							  </div>						
					</div>
				
					<div class="card-footer">
						<!-- <a href="viewJobs.php" name="update_button" class="btn btn-primary btn-lg" type="submit">Update Job</a> -->
						<button class="btn btn-primary btn-lg" name="update_button">Update Job</button>
					</div>
					</form>
				</div>
			<?php endif ?>
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


</body>
</html>