<?php
    session_start();
    require_once("../../connect.php");
    if(isset($_POST['image']) && isset($_POST['dialogue'])){
    	define('UPLOAD_DIR', '../../flashimg/');

	    $image = mysqli_real_escape_string($con,$_POST['image']);
	    $image = htmlentities($image);

	    $dialogue = mysqli_real_escape_string($con,$_POST['dialogue']);
	    $dialogue = htmlentities($dialogue);


	    $userid = $_SESSION["sbuserid"];
	    $imagename = uniqid();

        $img = str_replace('data:image/jpeg;base64,', '', $image);
	    $img = str_replace(' ', '+', $img);
	    $data = base64_decode($img);
	    $file = UPLOAD_DIR.$imagename.time().'.jpeg';
	    $file1 = $imagename.time().'.jpeg';

	    $date = time();

		if(file_put_contents($file, $data)){
			$query = "INSERT INTO flash (userid,dialog,image,status,time) VALUES ('$userid','$dialogue','$file1',1,'$date')";
			if(mysqli_query($con,$query)){
				echo json_encode(array('status' => true, 'result' => $file1));
			}else{
				echo json_encode(array('status' => false));
			}
		}
    }
?>