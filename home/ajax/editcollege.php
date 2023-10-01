<?php
    session_start();
    require_once("../../connect.php");
    if(isset($_POST['college']) && isset($_POST['editid'])){

        $userid = $_SESSION["slamuserid"];

        $college = mysqli_real_escape_string($con,$_POST['college']);
        $college = htmlentities($college);

        $editid = mysqli_real_escape_string($con,$_POST['editid']);
        $editid = htmlentities($editid);

        $query = "UPDATE college SET college='$college' WHERE id='$editid' and userid = '$userid'";
        if(mysqli_query($con, $query)){
            echo 1;
        }else{
            echo 0;
        }
    }
?>