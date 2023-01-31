<?php

$dbconnection = mysqli_connect('localhost','root','','onlinejobportal');
if($dbconnection == false){
	die('Error '.mysqli_connect_error($dbconnection));
}

?>