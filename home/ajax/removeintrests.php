<?php
	session_start();
	require_once('../../connect.php');
	if(isset($_POST['id'])){

        $userid = $_SESSION["sbuserid"];
        $id = mysqli_real_escape_string($con,$_POST['id']);
        $id = htmlentities($id);

        $query = "DELETE FROM intrests WHERE id='$id'";
        if(mysqli_query($con, $query)){
            echo 1;
        }else{
            echo 0;
        }

	}
?>