<?php
require_once("../../connect.php");
if(isset($_POST['email'])){

    $email = mysqli_real_escape_string($con,$_POST['email']);
    $email = htmlentities($email);

	$query2 = "select * from user where email ='$email'";
	$run2 = mysqli_query($con,$query2);
	$count = mysqli_num_rows($run2);
	if($count == 0){
		echo 1;
	}else{
		echo 0;
	}
}
?>