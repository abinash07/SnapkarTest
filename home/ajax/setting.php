<?php
    session_start();
    require_once("../../connect.php");
    if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['phone'])){
        
        $userid = $_SESSION['slamuserid'];

        $username = mysqli_real_escape_string($con,$_POST['username']);
        $username = htmlentities($username);

        $email = mysqli_real_escape_string($con,$_POST['email']);
        $email = htmlentities($email);

        $phone = mysqli_real_escape_string($con,$_POST['phone']);
        $phone = htmlentities($phone);

        $query="update user set email='$email',phone='$phone',username='$username' where userid='$userid'";
        if(mysqli_query($con,$query)){
            echo 1;
        }else{
            echo 0;
        }
    }
?>