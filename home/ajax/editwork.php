<?php
    session_start();
    require_once("../../connect.php");
    if(isset($_POST['work']) && isset($_POST['editid'])){

        $userid = $_SESSION["sbuserid"];

        $work = mysqli_real_escape_string($con,$_POST['work']);
        $work = htmlentities($work);

        $editid = mysqli_real_escape_string($con,$_POST['editid']);
        $editid = htmlentities($editid);

        $query = "UPDATE work SET work='$work' WHERE id='$editid' and userid = '$userid'";
        if(mysqli_query($con, $query)){
            echo 1;
        }else{
            echo 0;
        }
    }
?>