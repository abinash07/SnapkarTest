<?php 
$con = mysqli_connect('localhost','root','', 'snickar');
if(!$con){
	die("Database Connection Failed". mysqli_error($con));
}
$select_db = mysqli_select_db($con, 'snickar');
if(!$select_db){
	die("Database Selection Failed".mysqli_error($con));
}

$baseurl = 'http://localhost/snickar';
?>