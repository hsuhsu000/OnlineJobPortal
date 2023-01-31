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

	//SHOW EDITION FORM
	$edition_form_status = false;
	if(isset($_REQUEST['login_user_id_to_update'])){
		$edition_form_status = true;
		$login_user_id_to_update = $_REQUEST['login_user_id_to_update']; //declare login user id
		$query = "SELECT * FROM users WHERE uid = $login_user_id_to_update";
		$result = mysqli_query($dbconnection,$query);
		if($result){
			$login_user_info_array = mysqli_fetch_assoc($result);
		}
		else{
			die ('Error: '.mysqli_error($dbconnection));
		}
	}

	//UPDATE DATA
	if(isset($_REQUEST['update_button'])){
		$user_id = $_POST['user_id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$password = $_POST['password'];
		$role = $_POST['role'];

		$query = "UPDATE users SET uname = '$name', uemail = '$email', uaddress = '$address', upassword = '$password', role = '$role' WHERE uid = $user_id";
		$result = mysqli_query($dbconnection,$query);
		if($result){
			echo "<script>alert('A User Updated Successfully');</script>";
			header('location: company-dashboard.php');
		}
		else{
			die('Error: '.mysqli_error($dbconnection));
		}
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
	<div class="container-fluid mt-5 mb-5">
		<div class="row">
			<div class="col-lg-4 col-lg-4 col-lg-4">
				<div class="card ml-5">
					<div class="card-header">
						<h3>User Info:</h3>
					</div>

					<div class="card-body">
						<div>
						Role:
						<span class="badge badge-success"><?php echo $login_user_array['role'];  ?></span>
						</div>

						<div>
							Name: <?php echo $login_user_array['uname']; ?>
						</div>

						<div>
							Email: <?php echo $login_user_array['uemail']; ?>
						</div>

						<div>
							Address: <?php echo $login_user_array['uaddress']; ?>
						</div>

						<div>
							Password: <?php echo $login_user_array['upassword']; ?>
						</div>

					</div>
					
					<div class="card-footer">
						<a href="jobseeker-dashboard.php?login_user_id_to_update=<?php echo $login_user_array['uid']; ?>" class="btn btn-secondary">Edit Your Profile</a>
					</div>
				</div><br><br>

						<?php if($edition_form_status == true): ?>
						<div class="card ml-5">
							<div class="card-header">
								<div class="card-title"><h3>User Edition Form</h3></div>
							</div>

							<div class="card-body">
								<form action="jobseeker-dashboard.php" method="POST">
									<input type="hidden" name="user_id" value="<?php echo $login_user_info_array['uid']; ?>">
									<div class="form-group">
										<label>Name</label>
										<input type="text" name="name" class="form-control" value="<?php echo $login_user_info_array['uname']; ?>">	
									</div>

									<div class="form-group">
										<label>Email</label>
										<input type="text" name="email" class="form-control" value="<?php echo $login_user_info_array['uemail'];  ?>">
									</div>

									<div class="form-group">
										<label>Address</label>
										<input type="text" name="address" class="form-control" value="<?php echo $login_user_info_array['uaddress'];  ?>">									
									</div>

									<div class="form-group">
										<label>Password</label>
										<input type="password" name="password" class="form-control" value="<?php echo $login_user_info_array['upassword'];  ?>">
									</div>

									<div class="form-group">
										<label>Role</label>
										<select name="role" class="form-control">
											<option>Select Role</option>
											<option value="JobSeeker" <?php if($login_user_info_array['role'] == "JobSeeker") { ?> selected <?php }   ?>>
												JobSeeker
											</option>

											<option value="CompanyRepresentative" <?php if($login_user_info_array['role'] == "CompanyRepresentative"){ ?> selected <?php }  ?>>
												CompanyRepresentative
											</option>
										</select>
									</div>								
							</div>
							<div class="card-footer">
								<button type="submit" name="update_button" class="btn btn-secondary">
									Update
								</button>
							</div>
							</form>
						</div>						
					<?php endif ?>
			</div>

			<!-- <div class="col-lg-2 col-md-2 col-sm-2"></div> -->

			<div class="col-md-8">						
					<div class="card">
						<div class="card-header">
							<div class="card-title"><h3>Available Jobs</h3></div>
						</div>

						<div class="card-body">
				
							<?php
								$result = mysqli_query($dbconnection, "SELECT * FROM jobs");
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
								
						<?php } ?>
							
						</div>
					</div>			
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