<?php
    session_start();
    require_once("../../connect.php");
    if(isset($_POST['work'])){

        $userid = $_SESSION["sbuserid"];
        $work = mysqli_real_escape_string($con,$_POST['work']);
        $work = htmlentities($work);

        $query = "INSERT INTO work (userid,work) VALUES ('$userid','$work')";
        if(mysqli_query($con, $query)){
            echo 1;
        }else{
            echo 0;
        }
    }
?>