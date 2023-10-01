<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&family=Roboto&display=swap" rel="stylesheet">
<style>
body{
  font-family: 'Roboto', sans-serif;
  background-color: #F0F0F0;
}
*{
  margin: 0;
  box-sizing: border-box
}
#link{
  text-decoration: none;
}
.addp{
  width: 95%;
  margin-left: 2.5%;
  background-color: white;
  margin-top: 5px;
  border-radius: 5px;
  box-shadow: 0 1px 3px #c7c7c7;
}
form{
    margin-left: 5%;
    width: 90%;
}
.addp h1{
    text-align: center;
    padding-top: 10px;
}
#flick{
    color: #0b7dda;
    font-family: 'Open Sans', sans-serif;
}
#test{
    color: red;
    font-family: 'Open Sans', sans-serif;
}
#label{
    color: #212529;
}
#po{
    text-align: center;
    padding-top: 5px;
    padding-bottom: 20px;
}
#lo{
    text-align: center;
    padding-top: 15px;
    padding-bottom: 5px;
}
#f{
    text-decoration:none;
    float: right;
    color: black;
}
#f:hover{
    color: #0b7dda;
}
#create{
    color: #1877F2;
}
input[type=text], input[type=password], input[type=email], input[type=number] {
    width: 100%;
    color: #495057;
    padding: 12px 20px;
    margin: 10px 0 20px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    outline: none;
    border-radius: 5px;
    -webkit-transition: 0.5s;
    transition: 0.5s;
}
input:focus { 
    border-color: #0b7dda;
    box-shadow: 0 0 10px #0b7dda;
}
#loginBtn {
    background-color: #0b7dda;
    color: white;
    padding: 15px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    text-align: center;
    width: 100%;
    border-radius: 5px;
}
#loginBtn:hover {
    opacity: 0.8;
}
.fa-eye{
    color: #1877F2;
}
.error_form{
    padding: 10px 0;
    color: rgb(216, 15, 15);
    bottom: 20;
}
@media only screen and (min-width: 750px) {
    .formbody{
        width: 40%;
        margin-left: 30%;
        margin-top: 25px;
    }
}

/**********************************************For modal****************************************/
#modal{
    background: rgba(0,0,0,0.7);
    position: fixed;
    left: 0;
    top:0;
    width: 100%;
    height: 100%;
    z-index: 100;
    display: none;
}
#modal-form{
    background: #fff;
    width: 55%;
    position: relative;
    top: 20%;
    left: calc(50% - 32%);
    padding: 15px;
    border-radius: 4px;
    text-align: center;
}
#modal-form h2{
    text-align: center;
    margin: 10px 0 0 0;
    padding-bottom: 10px;
    font-size: 14px;
    font-family: 'Open Sans', sans-serif;
}
#modal-form p{
    font-size: 14px;
    line-height: 1.5;
}
#close-btn{
    color: #1877F2;
    cursor: pointer;
    padding: 10px 0 0 60%;
}
#right-btn{
    background: #1877F2;
    color: white;
    width: 50px;
    height: 50px;
    line-height: 50px;
    text-align: center;
    border-radius: 50%;
    position: absolute;
    top: -30px;
    left: 40%;
    cursor: pointer;
}
@media (min-width: 750px){
    #modal-form{
        background: #fff;
        width: 40%;
        position: relative;
        top: 20%;
        left: calc(50% - 20%);
        padding: 15px;
        border-radius: 4px;
        text-align: center;
    }
    #right-btn{
        background: #1877F2;
        color: white;
        width: 50px;
        height: 50px;
        line-height: 50px;
        text-align: center;
        border-radius: 50%;
        position: absolute;
        top: -30px;
        left: 45%;
        cursor: pointer;
    }
}
/*******************************************For modal ****************************************/


/*******************************************For loader***************************************/
#loader3{
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 100;
    display: none;
}
#loader1{
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 100;
    display: none;
}
#loader2{
    top: 40%;
    position: relative;
    padding: 15px 0;
    border-radius: 4px;
}
.loader {
    border: 10px solid #f3f3f3;
    border-radius: 50%;
    border-top: 10px solid #3498db;
    width: 40px;
    height: 40px;
    margin-left: calc(50% - 10%);
    -webkit-animation: spin 1s linear infinite;
    animation: spin 1s linear infinite;
}
@-webkit-keyframes spin {
    0% { -webkit-transform: rotate(0deg); }
    100% { -webkit-transform: rotate(360deg); }
}
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
@media (min-width: 600px) {
    #loader2{
        width: 40%;
        position: relative;
        top: 40%;
        left: calc(50% - 25%);
        padding: 15px;
        border-radius: 4px;
        text-align: center;
    }
}
/*******************************************Loader End***************************************/



.user{
  cursor: pointer;
  height: 130px;
}
#shead{
  margin: 20px 2.5% 0 2.5%;
  font-family: 'Open Sans', sans-serif;
}
.slambook{
  width: 95%;
  margin: 10px 2.5% 5px 2.5%;
  border: solid #F0F0F0;
  border-width: 0 0 1px 0;
}
.simg{
  float: left;
}
.simg img{
  width: 60px;
  height: 60px;
  margin: 8px 0 5px 0;
  border: 2px solid #E4E7FA;
  border-radius: 100%;
}
.stext{
  padding-top: 10px;
  padding-left: 2.5%;
  float: left;
}
#check{
  color: green;
}
#stext2{
  padding-top: 5px;
}
#stext3{
  padding-top: 5px;
  font-size: 14px;
  color: #595959;
}
.sicon{
  float: right;
  margin-right: 2.5%;
}
#chevron{
  margin-top: 30px;
  color: #1877F2;
}
.slambook::after {
  content: "";
  clear: both;
  display: table;
}
@media only screen and (min-width: 750px) {
    .user{
        width: 40%;
        margin-left: 30%;
    }
}
</style>
</head>
<body>

<?php
  require_once('connect.php');
  $page = @$_GET['page'];
  $page = mysqli_real_escape_string($con, $page);
  $page = htmlentities($page);
  if(empty($page)){
    $page = "index";
  }
?>

<div id="loader1">
  <div id="loader2">
    <div class="loader"></div>
  </div>
</div>

<div id="modal">
  <div id="modal-form">
    <h2>Message !!</h2>
    <p>This phone/email do not have account, Please Register First</p>
    <div id="close-btn">Register Now</div>
    <div id="right-btn"><i class="fa fa-check"></i></div>
  </div>
</div>

<div class="user" id="recent" onclick="goto();"></div>

<div class="formbody">
    <div class="addp">
        <form id="loginForm" method="post">
            <h1><a id="link" href="index"><span id="flick">Slambook</span></a></h1>
            <p id="po"> Welcome back. </p>

            <label id="label">Email Id <span class="error_form" id="email_error_message"></span></label>
            <input type="text" placeholder="Enter Your Email Id" id="email" name="email" required>

            <label id="label">Password &nbsp;<i onclick="myFunction(this)" class="fa fa-eye"></i> <a id="f" href="forgot">Forgot?<a></label>
            <input type="password" placeholder="Enter Password" name="password" id="password" required>

            <button id="loginBtn" type="submit" name="submit">LOGIN</button>
        </form>

        <p id="po"> Don't have account? <a id="create" href="register?page=<?php echo $page; ?>">Create Here</a></p>
    </div>
</div>
    
<script>
  function myFunction(x) {
      x.classList.toggle("fa-eye-slash");
      var x = document.getElementById("password");
      if (x.type === "password") {
          x.type = "text";
      } else {
          x.type = "password";
      }
  }
</script>



<script>
if(localStorage.getItem("sbtokenp") === null){}else{

  const userid = JSON.parse(localStorage.getItem("sbtokenp")).userid;
  const sbtokenp = localStorage.getItem("sbtokenp");

  function loadaddress(userid){
    $.ajax({
      url : "ajax/finduser",
      type : "POST",
      data : {userid: userid},
      success : function(data){
        $("#recent").html(data);
      }
    });
  }
  loadaddress(userid);

  function goto() {
  var page = '<?php echo $page; ?>';
  $.ajax({
      url : "ajax/keeplogin",
      type : "POST",
      data : {userid: userid},
      cache: false,
      success: function(data){
        if(data == 1){
          // localStorage.setItem('sbtokenp',sbtokenp);
          localStorage.setItem('sbtoken',sbtokenp);
          location.href=page;
        }else{
          
        }
      }
   });
  }


}


</script>

<script>
$(document).ready(function(){

  $("#loginBtn").on("click",function(e){
  e.preventDefault();

    var email = $("#email").val();
    var password = $("#password").val();
    var page = '<?php echo $page; ?>';

    $.ajax({
      url : "ajax/login",
      type : "POST",
      data : {email: email, password: password},
      dataType: "json",
      cache: false,
      beforeSend: function () {
        $("#loader1").show();
      },
      success: function(data){
        if(data.level == 1){
          localStorage.setItem('sbtoken',JSON.stringify(data.result));
          localStorage.setItem('sbtokenp',JSON.stringify(data.result));
          location.href=page;
        }if(data == 2){
          $("#error").html("*Password does not Match, Click on Forgot");
        }if(data == 3){
          $("#modal").show();
        }
      },
      complete: function () {
        $("#loader1").hide();
      }
    });
  });

  $("#close-btn").on("click",function(){
    $("#modal").hide();
    location.href="register";
  });

});
</script>

</html>
</body>