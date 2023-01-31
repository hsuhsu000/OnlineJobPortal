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

	<!--------------------------- Body ------------------------------------------->
	<div class="container-fluid mt-5 mb-5">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4">
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
						<a href="company-dashboard.php?login_user_id_to_update=<?php echo $login_user_array['uid']; ?>" class="btn btn-secondary">Edit Your Profile</a>
					</div>
				</div><br><br>

						<?php if($edition_form_status == true): ?>
						<div class="card ml-5">
							<div class="card-header bg-primary">
								<div class="card-title"><h3>User Edition Form</h3></div>
							</div>

							<div class="card-body">
								<form action="company-dashboard.php" method="POST">

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
								<button type="submit" name="update_button" class="btn btn-primary">
									Update
								</button>
							</div>
							</form>
						</div>					
					<?php endif ?>
			</div>

			

			<div class="col-lg-8 col-md-8 col-sm-8">
				<div class="row ml-5">
						<div>
							<h3>Welcome to Online Job Portal</h3>
						<p>
							Here, you can upload job vacancies to enhance your company!  <br> Available functions are here!
						</p>
						</div>					
				</div>
				
				<div class="row mt-3 ml-5">
					<div class="col-lg-4 col-md-4 col-sm-4">
						<button class="btn btn-warning btn-sm">Insert Job Category</button><br><br>
						<button class="btn btn-warning btn-sm">View Job Category</button><br><br>
						<button class="btn btn-warning btn-sm">Update Job Category</button><br><br>
						<button class="btn btn-warning btn-sm">Delete Job Category</button>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4">
						<button class="btn btn-warning btn-sm">Insert Job SubCategory</button><br><br>
						<button class="btn btn-warning btn-sm">View Job SubCategory</button><br><br>
						<button class="btn btn-warning btn-sm">Update Job SubCategory</button><br><br>
						<button class="btn btn-warning btn-sm">Delete Job SubCategory</button>
					</div>
				</div>

			</div>
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