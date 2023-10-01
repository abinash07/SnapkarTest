<?php
ob_start();
session_start();

  require_once("../connect.php");
  if(isset($_POST['userid']) ){

    $userid = mysqli_real_escape_string($con,$_POST['userid']);
    $userid = htmlentities($userid);

    $query = "select * from user where userid='$userid'";
    $run = mysqli_query($con,$query);
    if(mysqli_num_rows($run)> 0){
      $row = mysqli_fetch_array($run);
      $userid = $row['userid'];

      $_SESSION["sbuserid"]= $userid;

      if(isset($_SESSION["sbuserid"])){
        echo 1;
      }else{
        echo 0;
      } 
    }else{
      echo 0;
    }  
  }
?>