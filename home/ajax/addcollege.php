<?php
    session_start();
    require_once("../../connect.php");
    if(isset($_POST['college'])){

        $userid = $_SESSION["sbuserid"];
        $college = mysqli_real_escape_string($con,$_POST['college']);
        $college = htmlentities($college);

        $query = "INSERT INTO college (userid,college) VALUES ('$userid','$college')";
        if(mysqli_query($con, $query)){
            echo 1;
        }else{
            echo 0;
        }
    }
?>