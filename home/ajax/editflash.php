<?php
    session_start();
    require_once("../../connect.php");
    if(isset($_POST['image']) && isset($_POST['dialogue']) && isset($_POST['del'])){
    	define('UPLOAD_DIR', '../../flashimg/');

	    $image = mysqli_real_escape_string($con,$_POST['image']);
	    $image = htmlentities($image);

	    $dialogue = mysqli_real_escape_string($con,$_POST['dialogue']);
	    $dialogue = htmlentities($dialogue);

		$del = mysqli_real_escape_string($con,$_POST['del']);
	    $del = htmlentities($del);

	    $newimageforupdate = mysqli_real_escape_string($con,$_POST['newimageforupdate']);
	    $newimageforupdate = htmlentities($newimageforupdate);

	    $userid = $_SESSION["sbuserid"];
	    $imagename = uniqid();

	    if($newimageforupdate){
	        $img = str_replace('data:image/jpeg;base64,', '', $image);
		    $img = str_replace(' ', '+', $img);
		    $data = base64_decode($img);
		    $file = UPLOAD_DIR.$imagename.time().'.jpeg';
		    $file1 = $imagename.time().'.jpeg';

		    $date = time();

			if(file_put_contents($file, $data)){

				unlink("../../flashimg/".$del);

				$query="update flash set image='$file1',dialog='$dialogue' where userid='$userid'";

				if(mysqli_query($con,$query)){
					echo json_encode(array('status' => true, 'result' => $file1));
				}else{
					echo json_encode(array('status' => false));
				}
			}
		}else{
			$query="update flash set dialog='$dialogue' where userid='$userid'";

			if(mysqli_query($con,$query)){
				echo json_encode(array('status' => true, 'result' => $image));
			}else{
				echo json_encode(array('status' => false));
			}
		}
    }
?>