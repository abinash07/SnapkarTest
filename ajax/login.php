<?php 
ob_start();
session_start();
require_once("../connect.php");

if(isset($_POST['email']) && isset($_POST['password'])){

  $email = mysqli_real_escape_string($con,$_POST['email']);
  $email = htmlentities($email);

  $password = mysqli_real_escape_string($con,$_POST['password']);
  $password = htmlentities($password);

  $emailquery ="select * from user where email='$email' || phone='$email'";
  $equery = mysqli_query($con,$emailquery);
  $emailcount= mysqli_num_rows($equery);

  
  if($emailcount){

    $email_pass = mysqli_fetch_assoc($equery);
    $db_pass = $email_pass['password'];
    $userid = $email_pass['userid'];
    $pass_decode= password_verify($password, $db_pass);

    if($pass_decode){
      $query3 = "SELECT u.userid, u.username, u.name, u.verify, ui.image, ui.bluetick, am.bio, am.living, am.home FROM user as u LEFT JOIN userinfo as ui ON u.userid = ui.userid LEFT JOIN aboutme as am ON u.userid = am.userid WHERE u.userid = '$userid'";
      $run3 = mysqli_query($con,$query3);
      $row3 = mysqli_fetch_assoc($run3);
      $userData = array(
        'userid' => $row3['userid'],
        'username' => $row3['username'],
        'name' => $row3['name'],
        'verify' => $row3['verify'],
        'image' => $row3['image'],
        'bluetick' => $row3['bluetick'],
        'bio' => $row3['bio'],
        'living'=> $row3['living'],
        'home'=> $row3['home']
      );

      $_SESSION["sbuserid"]= $userid;
      $message=array('level'=>1,'result'=>$userData);
      echo $result=json_encode($message);
    }else{
      echo 2;
    }
  }else{
    echo 3;
  }
}
?>