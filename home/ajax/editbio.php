<?php
    session_start();
    require_once("../../connect.php");
    if(isset($_POST['bio']) && isset($_POST['occupation']) && isset($_POST['localname']) && isset($_POST['dob']) && isset($_POST['website'])){
        
        $userid = $_SESSION['sbuserid'];

        $bio = mysqli_real_escape_string($con,$_POST['bio']);
        $bio = htmlentities($bio);

        $occupation = mysqli_real_escape_string($con,$_POST['occupation']);
        $occupation = htmlentities($occupation);

        $localname = mysqli_real_escape_string($con,$_POST['localname']);
        $localname = htmlentities($localname);

        $dob = mysqli_real_escape_string($con,$_POST['dob']);
        $dob = htmlentities($dob);

        $relation_status = mysqli_real_escape_string($con,$_POST['relation_status']);
        $relation_status = htmlentities($relation_status);

        $website = mysqli_real_escape_string($con,$_POST['website']);
        $website = htmlentities($website);


        $query2 ="update aboutme set bio='$bio',occupation='$occupation',localname='$localname',dob='$dob',relation_status = '$relation_status', website='$website' where userid='$userid'";
        
        if(mysqli_query($con,$query2)){
            echo 1;
        }else{
            echo 0;
        }
    }
?>