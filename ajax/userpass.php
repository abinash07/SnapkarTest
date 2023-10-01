<?php
    session_start();
    require_once("../connect.php");
    $sbuserid = $_SESSION["sbuserid"]; 

    $query = "SELECT home from aboutme where userid='$sbuserid'";
    $run = mysqli_query($con,$query);
    $row = mysqli_fetch_array($run);
    $home = $row['home'];
    if(!empty($home)){
        echo 1;
    }else{
        echo 0;
    }

?>
