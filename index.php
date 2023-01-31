<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="stylesheet.css"> -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap.min.bundle.js"></script>
	<style>		
		nav{
	background-color: #e0b3ff;	
	font-size: 20px;
}

a {
  display: block;
  color: black;
  text-align: center;
  /*padding: 14px 16px;*/
  text-decoration: none;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  
}

li {
  float: left;
}

nav a {
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #ebccff;
}

footer{
	background-color: #e0b3ff;
	padding-top: 10px;
	font-size: 20px;
	display: block;
	color: black;
}

p{
	font-size: 20px;
	text-align: justify;
}

		.card{
  /*background-color: yellow;*/
  position: relative;
  width: 350px;
  height: 400px;
  border-radius: 15px;
  margin: 0 auto;
  box-shadow: 0 10px 15px rgba(0,0,0,0.3);
  text-align: center;
  transition: 0.3s;
  background-color: rgb(187, 153, 255);
  opacity: 1; 
}

.card i{
  /*background-color: red;*/
  padding-top: 30px;
  width: 200px;
  height: 150px;
  font-size: 150px;
}

.card a{
  width: 200px;
}

.card:hover {
  opacity: 0.8;
  transform:scale(1.03);

}

.card p{
  text-align: center;
  color: red;
}
</style>
</head>
<body>
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
	<div class="container mt-3 mb-5">
		<h3 class="text-center mt-5">Create An Account</h3>
		<div class="row mt-5">
		  <div class="col-sm-6">		  	
		    <div class="card">	
		      <div class="card-header">
		      	<h5>Job Seeker Account</h5>
		      </div>	    
		      <div class="card-body">
		        <i class="fas fa-user"></i><br><br><br>
		        <p>Please Select Job Seeker as Role</p>
		      </div>
		      <div class="card-footer">
		      	<a href="register.php" class="btn btn-secondary">Register</a>
		      </div>
		    </div>
		  </div>
		  <div class="col-sm-6">		  	
		    <div class="card">	
		      <div class="card-header">
		      	<h5>Company Account</h5>
		      </div>	    
		      <div class="card-body">
		        <i class="fas fa-briefcase"></i><br><br>
		        <p>Please Select Company Representative as Role</p>
		      </div>
		      <div class="card-footer">
		      	<a href="register.php" class="btn btn-secondary">Register</a>
		      </div>
		    </div>
		  </div>
		</div>

		<div class="row mt-5">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<h2 class="text-center pb-3">About Online Job Portal</h2>
				<p>Our vision is to connect businesses with talent and improve lives through better careers. We are one of Asia’s leading online employment marketplaces. Helping facilitate the matching and communication of job opportunities between jobseekers and employers, in Myanmar. <br><br>
				We are committed to continuously improving the value we provide to jobseekers and employers. To deliver on this, we continue to evolve our product and service offerings to better facilitate the matching of jobseekers to employers.</p>
			</div>
		</div>		
	</div>


	<!----- Footer -->
	<footer>
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