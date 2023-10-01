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
		.link{
			color: #262626;
			text-decoration: none;
		}
		.slams{
			width: 95%;
			margin: 10px 2.5%;
		}
		.leftslams{
			float: left;
			padding: 10px 20px;
			border-radius: 5px;
			background-color: #F0F0F0;
		}
		.leftslams p{
			font-size: 30px;
		}
		.rightslams{
			float: left;
			margin-left: 10px;
		}
		#slamsslam{
			font-size: 14px;
			font-family: 'Open Sans', sans-serif;
		}
		#peoples{
			padding-top: 5px;
			font-size: 12px;
		}
		.cityname{
			font-size: 12px;
		}
		.slamfollow{
			float: right;
		}
		.slamfollow button{
			border: none;
			color: #FFFFFF;
			font-size: 12px;
			margin-top: 15px;
			padding: 5px 15px;
			border-radius: 2px;
			background-color: #0B7DDA;
		}
		.fa-gradient {
			background: -webkit-gradient(linear, left top, left bottom, from(#D50F0F), to(#f00));
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
		}
		#verified{
			font-size: 14px;
			color: #0B7DDA;
			padding-top: -100px;
			margin-left: 5px;
		}
		.slams::after {
			content: "";
			clear: both;
			display: table;
		}

		.member{
			width: 97.5%;
			border-radius: 5px;
			margin: 25px 0 10px 2.5%;
			/*background-color: red;*/
		}
		.member p{
			padding-bottom: 15px;
			font-family: 'Open Sans', sans-serif;
		}
		.slamprofile{
			float: left;
			width: 30.7%;
			height: 140px;
			overflow: hidden;
			position: relative;
			margin: 0 2.5% 2.5% 0;
			background-color: #000000;
		}
		.slamprofile img{
			width: 100%;
			height: 100%;
			object-fit: cover;
		}
		.features{
			position: absolute;
			width: 100%;
			bottom: 0;
			background-image: linear-gradient(rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.8));
		}
		#stext{
			font-size: 12px;
			padding: 50px 2.5% 2px 2.5%;
			color: #FFFFFF;
		}
		#sicon2{
			padding-bottom: 5px;
			padding-left: 2.5%;
			color: #FFFFFF;
			font-size: 10px;
		}
		.member::after {
			content: "";
			clear: both;
			display: table;
		}
		@media only screen and (min-width: 450px) {
			.slamprofile{
				width: 30.7%;
				height: 180px;
				margin: 0 2.5% 2.5% 0;
			}
			.slamprofile img{
				width: 100%;
				height: 100%;
				/*object-fit: cover;*/
			}
		}
		@media only screen and (min-width: 550px) {
			.slamprofile{
				width: 30.7%;
				height: 200px;
				margin: 0 2.5% 2.5% 0;
			}
			.slamprofile img{
				width: 100%;
				height: 100%;
				/*object-fit: cover;*/
			}
		}
		@media only screen and (min-width: 750px) {
/*			article{
				width: 52%;
				float: left;
				margin-left: 18%;
			}*/
			.slamprofile{
				width: 14.1%;
				height: 200px;
				margin: 0 2.5% 2.5% 0;
			}
			.slamprofile img{
				width: 100%;
				height: 200px;
			}
		}

	</style>
</head>
<body>
	<?php require_once('../connect.php'); ?>

	<?php
		$slamuserid = $_SESSION["sbuserid"]; 

		$lcode = mysqli_real_escape_string($con,@$_GET['lcode']);
		$lcode = htmlentities($lcode);

	?>
	<div class="top">
		<p id="bar" onclick="opennav()" ><i class="fa fa-long-arrow-left"></i></p>
		<a id="snap" href="<?php echo $baseurl; ?>/index">My account</a>
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

			<a href="<?php echo $baseurl; ?>/home/locationdetails?name='Bhagada'&lcode='6'" class="link">
				<div class="slams">
					<div class="leftslams">
						<p><i class="fa fa-map-marker fa-gradient"></i></p>
					</div>
					<div class="rightslams">
						<p id="slamsslam">Bhagada <span id="verified"><i class="fa fa-check-circle"></i></span></p>
						<p class="cityname">Bhadrak, Odisha, India</p>
						<p id="peoples"><i class="fa fa-user"></i> 150 Peoples</p>
					</div>
					<div class="slamfollow">
						<button>Follow</button>
					</div>
				</div>
			</a>


			<div class="member">
				<p>Peoples in this area</p>
				<div class="pages" id="allpages">
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

		function allpages(offset){
			$.ajax({
				url : "ajax/members",
				type : "POST",
				data : {offset: offset},
				cache: false,
				beforeSend: function () {
					$("#loader2").show();
				},
				success : function(data){
					$("#allpages").html(data);
				},
				complete: function () {
					$("#loader2").hide();
				}
			});
		}
		var offset = 1;
		allpages(offset);

	</script>
</body>
</html>
<?php } ?>