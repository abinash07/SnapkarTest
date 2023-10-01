<?php
require_once("../../connect.php");
if(isset($_POST['username'])){

    $username = mysqli_real_escape_string($con,$_POST['username']);
    $username = htmlentities($username);

	$query2 = "select * from user where username ='$username'";
	$run2 = mysqli_query($con,$query2);
	$count = mysqli_num_rows($run2);
	if($count == 0){
		echo 1;
	}else{
		echo 0;
	}
}
?>