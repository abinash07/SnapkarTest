<?php
ob_start();
session_start();

  require_once("../connect.php");
  if(isset($_POST['autouser']) ){

    $autouser = mysqli_real_escape_string($con,$_POST['autouser']);
    $autouser = htmlentities($autouser);

    $query = "select * from user where userid='$autouser'";
    $run = mysqli_query($con,$query);
    $row = mysqli_fetch_array($run);
    $userid = $row['userid'];
    $name = $row['name'];
    $image = $row['image'];

    $result=['status'=>1,'name'=>$name,'image'=>$image];
    $_SESSION["sbuserid"]= $userid;

  	if(isset($_SESSION["sbuserid"])){
  		echo json_encode($result);
  	}else{
  		echo 0;
  	}    
  }
?>