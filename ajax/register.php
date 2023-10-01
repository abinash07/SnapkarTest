<?php
  ob_start();
  session_start();

  require_once("../connect.php");
  if(isset($_POST['name']) && isset($_POST['phone'])){
 
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $name=htmlentities($name);
    $firstname = strtok($name, " ");

    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $phone = htmlentities($phone);

    $password = mysqli_real_escape_string($con,$_POST['password']);
    $password = htmlentities($password);
    $pass = password_hash($password, PASSWORD_BCRYPT);

    $reffer = mysqli_real_escape_string($con,$_POST['reffer']);
    $reffer = htmlentities($reffer);

    $date = time();
    $token = bin2hex(random_bytes(35));

    $cid = "select * from user order by 1 DESC limit 1";
    $runid = mysqli_query($con,$cid);
    if(mysqli_num_rows($runid) > 0){
      $rowid = mysqli_fetch_array($runid);
      $lid = $rowid['id'];
    }else{
      $lid = 0;
    }
    
    $refferid ="SK".date("Y").$lid;
    $username = $firstname.$lid;
    $userid = uniqid().$lid;


    $lastlogin = time()+19800;

    if(strpos($phone, '@') !== false) {
      $email = $phone;
      $query1 = "select * from user where email ='$email'";
      $phone = "No Record";
    }else{
      $email = 'No Record';
      $query1 = "select * from user where phone ='$phone'";
    }
    
    $run = mysqli_query($con,$query1);
    if(mysqli_num_rows($run)>0){
        $message=array('level'=>2);
        echo $result=json_encode($message);
    }else{

        $query="insert into user (userid,name,email,phone,userlink,password,reffer,username,date,token,verify) values ('$userid','$name','$email','$phone','$password','$pass','$reffer','$username','$date','$token','0')";

        if(mysqli_query($con,$query)){
          $userData = array(
            'userid' => $userid,
            'username' => $username,
            'name' => $name,
            'verify' => 0,
            'image' => 'noimg.jpg',
            'bluetick' => 0,
            'bio' => 'Hi you can knock me',
            'living'=>'',
            'home'=>''
          );

          $_SESSION["sbuserid"]= $userid;
          $message=array('level'=>1,'result'=>$userData);
          echo $result=json_encode($message);
        }else{
            $message=array('level'=>0);
            echo $result=json_encode($message);
        }
    }
  }
?>