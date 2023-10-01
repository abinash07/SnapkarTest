<?php
    session_start();
    require_once("../../connect.php");
    if(isset($_POST['intrests'])){

        $userid = $_SESSION["sbuserid"];
        $intrests = mysqli_real_escape_string($con,$_POST['intrests']);
        $intrests = htmlentities($intrests);


        $query = "INSERT INTO intrests (userid,intrest) VALUES ('$userid','$intrests')";
        if(mysqli_query($con, $query)){
            echo 1;
        }else{
            echo 0;
        }
    }
?>