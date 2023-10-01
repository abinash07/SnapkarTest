<?php
session_start();
if(!isset($_SESSION["sbuserid"])){
header("location:login");
}else{
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../assets/css/style.css">
	<style>
		.addp{
			width: 95%;
			margin:10px 2.5%;
			border-radius: 5px;
			box-shadow: 0 1px 3px #c7c7c7;
		}
		.addp form{
			width: 95%;
			margin: 10px 2.5%;
		}
		#formhead{
			padding-top: 15px;
			text-align: center;
			font-family: 'Open Sans', sans-serif;
		}
		form lable{
			color: #262626;
			font-size: 14px;
			font-family: 'Open Sans', sans-serif;
		}
		.addp input[type=text], input[type=date]{
			width: 100%;
			color: #495057;
			padding: 12px 10px;
			margin: 10px 0 20px 0;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
			outline: none;
			border-radius: 5px;
			-webkit-transition: 0.5s;
			transition: 0.5s;
		}
		.addp input:focus { 
			border-color: #0b7dda;
			box-shadow: 0 0 10px #0b7dda;
		}
		.addp textarea{
			width: 100%;
			color: #495057;
			margin-top: 10px;
			margin-bottom: 20px;
			border: 1px solid #F0F0F0;
			outline: none;
			border-radius: 5px;
			-webkit-transition: 0.5s;
			transition: 0.5s;
			padding: 12px 10px;
			box-sizing: border-box;
			font-size: 14px;
			line-height: 1.5;
			font-family: 'Roboto', sans-serif;
		}
		.addp textarea:focus { 
			border-color: #0b7dda;
			box-shadow: 0 0 10px #0b7dda;
		}
		select{
			width: 100%;
			padding: 12px 10px;
			border: 1px solid #ccc;
			margin-bottom: 15px;
			margin-top: 5px;
			cursor : pointer;
			outline: none;
			border-radius: 5px;
			-webkit-transition: 0.5s;
			transition: 0.5s;
			background-color: #FFFFFF;
			font-family: 'Roboto', sans-serif;
		}
		select:focus { 
			border-color: #0b7dda;
			box-shadow: 0 0 10px #0b7dda;
		}
		.addp button{
			background-color: #1877F2;
			color: white;
			padding: 12px 20px;
			border: none;
			cursor: pointer;
			text-align: center;
			width: 100%;
			margin: 10px 0 15px 0;
			border-radius: 5px;
			position: relative;
		}
		.addp button:hover {
			opacity: 0.8;
		}
		#information{
			color: #8E8E8E;
			font-size: 12px;
			margin: -15px 0 20px 0;
		}
		#errormsg{
			color: red;
			font-size: 14px;
		}
		#CheckUsername{
			padding-left: 15px;
			font-size: 12px;
		}
		#CheckEmail{
			padding-left: 15px;
			font-size: 12px;	
		}
		#bluecolor{
			color: #0B7DDA;
		}
		#showsuccess{
			color: green;
		}
		#redcolor{
			color: red;
		}
		@media only screen and (min-width: 750px) {
			article{
				width: 50%;
				float: left;
				margin-left: 21.5%;
			}
			.addp{
				margin-top: 15px;
			}
		}
	</style>
</head>
<body>

	<?php
		require_once('../connect.php');
		$slamuserid = $_SESSION["sbuserid"]; 
		$query = "select * from user where userid='$slamuserid'";
		$run = mysqli_query($con,$query);
		$row = mysqli_fetch_array($run);
		$name = $row['name'];
		$username = $row['username'];
		$userid = $row['userid'];

		$verify = $row['verify'];
		$email = $row['email'];
		$phone = $row['phone'];
	?>
	<div class="top">
		<p id="bar" onclick="opennav()" ><i class="fa fa-long-arrow-left"></i></p>
		<a id="snap" href="<?php echo $baseurl; ?>/index">Profile picture</a>
		<a id="img" href="<?php echo $baseurl; ?>/home/myaccount"><img class="uimage" src="<?php echo $baseurl; ?>/assets/image/noimg.jpg"></a>
		<a id="card" href="menu"><i class="fa fa-th"></i></a>
		<a id="top29" href="index">Search</a>
		<a id="top29" href="home/addpost">New Post</a>
		<a id="top29" href="home/explore">Explore</a>
		<a id="top29" href="index">Home</a>
	</div>
	<div class="space"></div>

	<section>
		<div class="leftbar">
			<?php include('../leftbar.php'); ?>
		</div>
		<article>
			<div class="addp">
				<p id="formhead">Account Setting</p>
				<form id="settingForm">

					<lable>Username <span id="CheckUsername"></span></lable>
					<input type="text" id="username" name="username" value="<?php echo $username; ?>" required>
					<p id="information">Everyone can see this</p>

					<lable>Email <span id="CheckEmail"></span></lable>
					<input type="text" id="email" name="email" value="<?php echo $email; ?>"  required>
					<p id="information">Only You Can See This</p>

					<lable>Phone</lable>
					<input type="text" id="phone" name="phone" value="<?php echo $phone; ?>"  required>
					<p id="information">Only You Can See This</p>

					<p id="errormsg"></p>
					<p id="showsuccess" style="display: none;">You have successfully saved!!</p>
					<button id="settingBtn" type="submit" name="submit"><div id="loader"><div class="spnier"></div></div> UPDATE</button>
				</form>
			</div>
		
		</article>
	</section>
	<?php include('../bottom.php'); ?>
	<script>
		const opennav = () =>{
			history.go(-1);
		}

		if(localStorage.getItem("sbtoken") === null){
    		location.href="../login";
  		}else{
		    const userdata = JSON.parse(localStorage.getItem("sbtokenp"));
		    var uimgdata="<?php echo $baseurl; ?>/userprofile/"+userdata.image;
		    $(".uimage").prop("src",uimgdata);
  		}

		$("#username").keyup(function(){
			checkAvailability();
		});
		function checkAvailability() {
			var username = $("#username").val();

			$.ajax({
				url: "ajax/checkusername",
				data:'username='+$("#username").val(),
				type: "POST",
				beforeSend: function () {
					$("#settingBtn").attr('disabled','disabled');
				},
				success:function(data){
					if(data==1){
						$("#CheckUsername").html("<span id='bluecolor'>Username Available.</span>");
						$("#settingBtn").removeAttr('disabled').css('opacity',1);
					}else{
						$("#CheckUsername").html("<span id='redcolor'>Username Not Available,</span>");   
						$("#settingBtn").attr('disabled','disabled').css('opacity',0.6);
					}
				},
				complete: function () {
				// $("#addaddress").removeAttr('disabled').css('opacity',1);
				}
			});
		}



		$("#email").keyup(function(){
			checkEmail();
		});
		function checkEmail() {
			var email = $("#email").val();
			$.ajax({
				url: "ajax/checkemail",
				data:'email='+$("#email").val(),
				type: "POST",
				beforeSend: function () {
					$("#settingBtn").attr('disabled','disabled');
				},
				success:function(data){
					if(data==1){
						$("#CheckEmail").html("<span id='bluecolor'>Email Id Available.</span>");
						$("#settingBtn").removeAttr('disabled').css('opacity',1);
					}else{
						$("#CheckEmail").html("<span id='redcolor'>This email id already in use</span>");   
						$("#settingBtn").attr('disabled','disabled').css('opacity',0.6);
					}
				},
				complete: function () {
				// $("#addaddress").removeAttr('disabled').css('opacity',1);
				}
			});
		}



		$('#settingForm').submit(function(e){
		e.preventDefault();
			var username = $('#username').val();
			var email = $('#email').val();
			var phone = $('#phone').val();
			$.ajax({
				url : "ajax/setting",
				type : "POST",
				data: {username: username, email: email, phone: phone},
				cache: false,
				beforeSend: function(){
		            $("#cover").show();
		            $("#loader").show();
				},
				success: function(data){
					if(data == 1){
						$('#showsuccess').show().delay(5000).fadeOut();
					}else{
						$("#errormsg").html("*Something Error Please Try After Some Time Later.");
					}
				},
				complete: function(){
		            $("#cover").hide();
		            $("#loader").hide();
				}
			});
		});
	</script>
</body>
</html>
<?php } ?>