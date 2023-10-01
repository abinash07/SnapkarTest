<?php
    session_start();
    require_once("../../connect.php");
    if(isset($_POST['image']) && isset($_POST['year'])){
    	define('UPLOAD_DIR', '../../facelogimg/');

	    $image = mysqli_real_escape_string($con,$_POST['image']);
	    $image = htmlentities($image);

	    $year = mysqli_real_escape_string($con,$_POST['year']);
	    $year = htmlentities($year);

	    $imgtext = mysqli_real_escape_string($con,$_POST['imgtext']);
	    $imgtext = htmlentities($imgtext);

	    $userid = $_SESSION["sbuserid"];
	    $imagename = uniqid();

        $img = str_replace('data:image/jpeg;base64,', '', $image);
	    $img = str_replace(' ', '+', $img);
	    $data = base64_decode($img);
	    $file = UPLOAD_DIR.$imagename.time().'.jpeg';
	    $file1 = $imagename.time().'.jpeg';

	    $date = time();

		if(file_put_contents($file, $data)){
			$query = "INSERT INTO facelog (userid,year,image,caption,status,time) VALUES ('$userid','$year','$file1','$imgtext',1,'$date')";
			if(mysqli_query($con,$query)){
				echo json_encode(array('status' => true, 'result' => $file1));
			}else{
				echo json_encode(array('status' => false));
			}
		}
    }
?>