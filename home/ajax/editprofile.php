<?php
    session_start();
    require_once("../../connect.php");
    if(isset($_POST['image']) && isset($_POST['del'])){
    	define('UPLOAD_DIR', '../../userprofile/');

	    $image = mysqli_real_escape_string($con,$_POST['image']);
	    $image = htmlentities($image);

	    $del = mysqli_real_escape_string($con,$_POST['del']);
	    $del = htmlentities($del);

	    $userid = $_SESSION["sbuserid"];
	    $imagename = uniqid();

        $img = str_replace('data:image/jpeg;base64,', '', $image);
	    $img = str_replace(' ', '+', $img);
	    $data = base64_decode($img);
	    $file = UPLOAD_DIR.$imagename.time().'.jpeg';
	    $file1 = $imagename.time().'.jpeg';

	    $date = time();

		if(file_put_contents($file, $data)){
			if($del != "noimg.jpg"){
				unlink("../../userprofile/".$del);
			}
			$query="update userinfo set image='$file1',imgdate=$date where userid='$userid'";
			if(mysqli_query($con,$query)){
				//echo 1;
				echo json_encode(array('status' => true, 'result' => $file1));
			}else{
				//echo 0;
				echo json_encode(array('status' => false));
			}
		}
    }
?>