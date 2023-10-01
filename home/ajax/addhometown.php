<?php
    session_start();
    require_once("../../connect.php");
    if(isset($_POST['scid'])){

        $userid = $_SESSION["sbuserid"];
        $scid = mysqli_real_escape_string($con,$_POST['scid']);
        $scid = htmlentities($scid);

        $query = "UPDATE aboutme SET living='$scid',home='$scid' WHERE userid ='$userid'";
        if(mysqli_query($con, $query)){
            echo 1;
        }else{
            echo 0;
        }
    }   
?>