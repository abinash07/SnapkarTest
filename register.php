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

.addp{
  width: 95%;
  margin-left: 2.5%;
  background-color: white;
  margin-top: 25px;
  border-radius: 5px;
  margin-bottom: 10px;
  box-shadow: 0 1px 3px #c7c7c7;
}
.addp img{
  width: 50%;
  margin-left: 24%;
  height: auto;
  margin-top: 20px;
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
 color: #0B7DDA;
 font-family: 'Open Sans', sans-serif;
}
#test{
 color: red;
 font-family: 'Open Sans', sans-serif;
}
#label{
  color: #212121;
  font-size: 14px;
  font-family: 'Open Sans', sans-serif;
}
#po{
  text-align: center;
  padding-top: 5px;
  padding-bottom: 20px;
}
#term{
  text-align: center;
  padding-top: 5px;
  padding-bottom: 20px;
  font-size: 12px;
}
#lo{
  text-align: center;
  padding-top: 15px;
  padding-bottom: 5px;
  font-family: 'Open Sans', sans-serif;
}
#login{
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
.addp button {
  background-color: #0b7dda;
  color: white;
  padding: 15px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  text-align: center;
  width: 100%;
  border-radius: 5px;
  position: relative;
}
.addp button:hover {
  opacity: 0.8;
}
#flogin{
  color: #1877f2;
}
#error{
  color: red;
  padding: 10px 0 20px 0;
}
#name_error{
  color: red;
  margin-left: 10px;
}
#email_error{
  color: red;
  margin-left: 10px;
}
#mobile_error{
  color: red;
  margin-left: 10px;
}
#password_error{
  color: red;
  margin-left: 10px;
}
@media only screen and (min-width: 750px) {
    .formbody{
        width: 40%;
        margin-left: 30%;
        margin-top: 90px;
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
#cover{
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 100;
    display: none;
}
#loader{
    position: absolute;
    top: calc(50% - 13px);
    left: calc(50% - 80px);
    border-radius: 4px;
    display: none;
}
.spnier {
    border: 5px solid #f3f3f3;
    border-radius: 50%;
    border-top: 5px solid #3498db;
    width: 25px;
    height: 25px;
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
/*******************************************Loader End***************************************/
</style>
</head>
<body>

<div id="cover"> </div>

<div id="modal">
  <div id="modal-form">
    <h2>Message !!</h2>
    <p>This Phone/Email Already Exit, Go To Login.</p>
    <div id="close-btn">Ok</div>
    <div id="right-btn"><i class="fa fa-check"></i></div>
  </div>
</div>

<?php
  require_once('connect.php');
  $reffer = @$_GET['reffer'];
  $reffer = mysqli_real_escape_string($con, $reffer);
  $reffer = htmlentities($reffer);
  if(empty($reffer)){
    $reffer = "Codebox";
  }

?>
<div class="formbody">
    <div class="addp">
        <form id="RegisterFrom">
          <h3 id="lo">Create Account</h3>
          <p id="po">Already Have Account <a id="login" href="login">Login Here</a> </p>
          <p><span id="error"></span></p>

          <label for="name" id="label">Full Name <span id="name_error"></span></label>
          <input type="text" placeholder="Enter Your Full Name" id="name" name="name"  required>

          <label for="email" id="label">Phone / Email Id <span id="email_error"></span></label>
          <input type="email" placeholder="Enter Email id" id="email" name="email" required>

          <label for="password" id="label">Password &nbsp;<i onclick="myFunction(this)" class="fa fa-eye"></i></label><span id="password_error"></span>
          <input type="password" placeholder="Enter Password" id="password" name="password" required>

          <input type="hidden" id="reffer"  name="reffer" value="<?php echo @$reffer; ?>" required>

          <button id="register" type="submit" name="submit">  <div id="loader"><div class="spnier"></div></div> REGISTER </button>
          <p id="term">By Register You Agree Our <a id="flogin" href="term">Terms & Conditons</a> And <a id="flogin" href="privacy">Privacy Policy</a> </p>
        </form>
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

$(document).ready(function(){

  var error_fname = false;
  var error_email = false;
  var error_password = false;

  $("#name").keyup(function(){
    check_name();
  });
  $("#email").keyup(function(){
    check_email();
  });
  $("#password").keyup(function(){
    check_password();
  });

  function check_name() {
    var namecheck = /^[.a-z A-Z]{3,30}$/;
    var name = $("#name").val();
    if(namecheck.test(name) && name !== '') {
      $("#name_error").hide();
      $("#name").css("border-bottom","2px solid #34F458");
      error_fname = true;
    }else{
      $("#name_error").show();
      $("#name").css("border-bottom","2px solid #F90A0A");
      $("#name_error").html("*Should contain only characters");
      error_fname = false;
    }
  }


  function check_email() {
    var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var email = $("#email").val();
    var emailln = email.length;
    if(pattern.test(email) && email !== '' && emailln > 10) {
      $("#email_error").hide();
      $("#email").css("border-bottom","2px solid #34F458");
      error_email = true;
    }else{
      $("#email_error").show();
      $("#email").css("border-bottom","2px solid #F90A0A");
      $("#email_error").html("**Invalid Email");
      error_email = false;
    }
  }


  function check_password() {
    var password = $("#password").val().length;
    if (password > 2 && password !== '') {
      $("#password_error").hide();
      $("#password").css("border-bottom","2px solid #34F458");
      error_password = true;
    }else{
      $("#password_error").show();
      $("#password").css("border-bottom","2px solid #F90A0A");
      $("#password_error").html("*Minimum 3 Character Required.");
      error_password = false;
    }
  }



  $("#register").on("click",function(e){
    e.preventDefault();

    error_fname = false;
    error_email = false;
    error_password = false;
    check_name();
    check_email();
    check_password();

    if(error_fname === false){
      check_name();
    }else if(error_email === false){
      check_email();
    }else if(error_password === false){
      check_password();
    }else{

        var name = $("#name").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var reffer = $("#reffer").val();

        $.ajax({
          url : "ajax/register",
          type : "POST",
          data : {name: name, phone: email, password: password, reffer: reffer},
          dataType: "json",
          cache: false,
          beforeSend: function () {
            $("#cover").show();
            $("#loader").show();
          },
          success: function(data){
            console.log(data);
            if(data.level == 1){
              $("#RegisterFrom").trigger("reset");
              localStorage.setItem('sbtoken',JSON.stringify(data.result));
              localStorage.setItem('sbtokenp',JSON.stringify(data.result));
              location.href='home/findlocation';
            }if(data.level == 0){
              $("#error").html("*Something Error Please Try After Some Time Later.");
            }if(data.level == 2){
              $("#modal").show();
            }
          },
          complete: function () {
            $("#cover").hide();
            $("#loader").hide();
          }
        });

    }
  });


  $("#close-btn").on("click",function(){
    $("#modal").hide();
    location.href="login";
  });

});
</script>

</html>
</body>