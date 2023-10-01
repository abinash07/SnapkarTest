<?php
    session_start();
    require_once("../../connect.php");
    //if(isset($_POST['bio']) && isset($_POST['occupation']) && isset($_POST['localname']) && isset($_POST['dob']) && isset($_POST['website'])){
        
        $userid = $_SESSION['sbuserid'];

        $facebook = mysqli_real_escape_string($con,$_POST['facebook']);
        $facebook = htmlentities($facebook);

        $instragram = mysqli_real_escape_string($con,$_POST['instragram']);
        $instragram = htmlentities($instragram);

        $linkdin = mysqli_real_escape_string($con,$_POST['linkdin']);
        $linkdin = htmlentities($linkdin);

        $twitter = mysqli_real_escape_string($con,$_POST['twitter']);
        $twitter = htmlentities($twitter);

        $youtube = mysqli_real_escape_string($con,$_POST['youtube']);
        $youtube = htmlentities($youtube);

        $query = "SELECT * FROM socialmedia WHERE userid='$userid'";
        $run = mysqli_query($con, $query);
        if(mysqli_num_rows($run)>0){
            $query2 ="update socialmedia set facebook='$facebook',instragram='$instragram',linkdin='$linkdin',twitter='$twitter',youtube='$youtube' where userid='$userid'";
        }else{
            $query2 ="INSERT INTO socialmedia (userid,facebook,instragram,linkdin,twitter,youtube) VALUES ('$userid','$facebook','instragram','$linkdin','$twitter','$youtube')";
        }
        if(mysqli_query($con,$query2)){
            echo 1;
        }else{
            echo 0;
        }
    //}
?>