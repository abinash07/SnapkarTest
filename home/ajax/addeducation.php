<?php
    session_start();
    require_once("../../connect.php");
    if(isset($_POST['education'])){

        $userid = $_SESSION["sbuserid"];
        $education = mysqli_real_escape_string($con,$_POST['education']);
        $education = htmlentities($education);

        $query = "INSERT INTO education (userid,education) VALUES ('$userid','$education')";
        if(mysqli_query($con, $query)){
            echo 1;
        }else{
            echo 0;
        }
    }
?>