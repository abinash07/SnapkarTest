<?php
    session_start();
    require_once("../../connect.php");
    if(isset($_POST['scid'])){

        $userid = $_SESSION["sbuserid"];
        $scid = mysqli_real_escape_string($con,$_POST['scid']);
        $scid = htmlentities($scid);


        $bio = "Hey you can knock me on snicker";

        $query2 = "SELECT * FROM aboutme WHERE userid = '$userid'";
        $run2 = mysqli_query($con, $query2);
        if(mysqli_num_rows($run2) > 0){
            $query = "UPDATE aboutme SET home='$scid' WHERE userid ='$userid'";
            if(mysqli_query($con, $query)){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            $query = "INSERT INTO aboutme (userid,bio,living,home) VALUES ('$userid','$bio','$scid','$scid')";
            if(mysqli_query($con, $query)){
                echo 1;
            }else{
                echo 0;
            }
        }
    }   
?>