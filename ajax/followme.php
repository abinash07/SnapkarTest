<?php
	session_start();
	require_once('../connect.php');
	$userid = $_SESSION["sbuserid"];

	if(isset($_POST['following'])){
		$following = mysqli_real_escape_string($con,$_POST['following']);
    	$following = htmlentities($following);

		$time = time()+19800;


	    $query2 = "select * from follow where follower='$userid' and following='$following'";
	    $run2 = mysqli_query($con,$query2);
	    if(mysqli_num_rows($run2) > 0){}else{
	        $query="insert into follow (follower,following,time,status) values ('$userid','$following','$time','1')";
	        
	        if(mysqli_query($con,$query)){
	        	echo 1;
	        }else{
	        	echo 0;
	        }
	    }
	}
?>