<?php
    session_start();
    require_once("../../connect.php");
    if(isset($_POST['image']) && isset($_POST['year']) && isset($_POST['del'])){
    	define('UPLOAD_DIR', '../../facelogimg/');

	    $image = mysqli_real_escape_string($con,$_POST['image']);
	    $image = htmlentities($image);

	    $year = mysqli_real_escape_string($con,$_POST['year']);
	    $year = htmlentities($year);

	    $imgtext = mysqli_real_escape_string($con,$_POST['imgtext']);
	    $imgtext = htmlentities($imgtext);

	    $del = mysqli_real_escape_string($con,$_POST['del']);
	    $del = htmlentities($del);

	    $userid = $_SESSION["sbuserid"];
	    $imagename = uniqid();

        $img = str_replace('data:image/jpeg;base64,', '', $image);
	    $img = str_replace(' ', '+', $img);
	    $data = base64_decode($img);
	    $file = UPLOAD_DIR.$imagename.time().'.jpeg';
	    $file1 = $imagename.time().'.jpeg';


		if(file_put_contents($file, $data)){

			unlink("../../facelogimg/".$del);

			$query="update facelog set image='$file1',caption='$imgtext' where userid='$userid' and year ='$year'";
			if(mysqli_query($con,$query)){
				echo json_encode(array('status' => true, 'result' => $file1));
			}else{
				echo json_encode(array('status' => false));
			}
		}
    }
?>