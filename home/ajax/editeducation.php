<?php
    session_start();
    require_once("../../connect.php");
    if(isset($_POST['education']) && isset($_POST['editid'])){

        $userid = $_SESSION["slamuserid"];

        $education = mysqli_real_escape_string($con,$_POST['education']);
        $education = htmlentities($education);

        $editid = mysqli_real_escape_string($con,$_POST['editid']);
        $editid = htmlentities($editid);

        $query = "UPDATE education SET education='$education' WHERE id='$editid' and userid = '$userid'";
        if(mysqli_query($con, $query)){
            echo 1;
        }else{
            echo 0;
        }
    }
?>