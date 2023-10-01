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
		.slams{
			width: 95%;
			margin: 10px 2.5%;
		}
		.slams a{
			color: #262626;
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
			padding-top: 5px;
			font-family: 'Open Sans', sans-serif;
		}
		.peoples{
			color: #0B7dda;
		}
		#peoples{
			padding-top: 5px;
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
			height: auto;
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
		@media only screen and (min-width: 750px) {
			article{
				width: 52%;
				float: left;
				margin-left: 18%;
			}
		}
	</style>
</head>
<body>
	<?php require_once('../connect.php'); ?>

	<?php
		$slamuserid = $_SESSION["sbuserid"]; 
		$query = "select * from user where userid='$slamuserid'";
		$run = mysqli_query($con,$query);
		$row = mysqli_fetch_array($run);
		$name = $row['name'];
		$username = $row['username'];
		$userid = $row['userid'];
		$image = $row['image'];
		$verify = $row['verify'];

	?>
	<div class="top">
		<p id="bar" onclick="opennav()" ><i class="fa fa-long-arrow-left"></i></p>
		<a id="snap" href="<?php echo $baseurl; ?>/index">My account</a>
		<a id="img" href="<?php echo $baseurl; ?>/home/myaccount"><img src="<?php echo $baseurl; ?>/profile/<?php echo $image; ?>"></a>
		<a id="card" href="menu"><i class="fa fa-th"></i></a>
		<a id="top29" href="index">Search</a>
		<a id="top29" href="home/addpost">New Post</a>
		<a id="top29" href="home/explore">Explore</a>
		<a id="top29" href="index">Home</a>
	</div>
	<div class="space"></div>

	<section>
		<div class="leftbar">
			<br>
			<a href="index.php"> <i id="ioconf" class="fa fa-home"></i> Home</a>
			<a href="home/myaccount"><i id="ioconf" class="fa fa-user-plus"></i> My Account</a>
			<a href="home/myaccount"><i id="ioconf" class="fa fa-user-circle-o"></i> My Posts</a>
			<a href="home/addpost"><i id="ioconf" class="fa fa-plus"></i> Create New Post</a>
			<hr>
			<a href="home/search"><i id="ioconf" class="fa fa-search"></i> Search</a>
			<a href="home/saved"><i id="ioconf" class="fa fa-bookmark-o"></i> My Saved </a>
			<a href="home/explore"><i id="ioconf" class="fa fa-compass"></i> Explore</a>
			<a href="home/addpost"><i id="ioconf" class="fa fa-plus"></i> New Post</a>
			<hr>
			<a href="aboutus"><i id="ioconf" class="fa fa-info-circle"></i> About us</a>
			<a href="mailto:thesnapkar@gmail.com"><i id="ioconf" class="fa fa-envelope"></i> Contact us</a>
			<a href="term"><i id="ioconf" class="fa fa-legal"></i> Term & Condition</a>
			<a href="privacy"><i id="ioconf" class="fa fa-lock"></i> Privacy policy</a>
		</div>
		<article>
			<div class="slams">
				<a href="locationdetails">
					<div class="leftslams">
						<p><i class="fa fa-map-marker fa-gradient"></i></p>
					</div>
					<div class="rightslams">
						<p id="slamsslam">Bhagada <span id="verified"><i class="fa fa-check-circle"></i></span></p>
						<p id="peoples"><i class="fa fa-user peoples"></i> 150 Peoples</p>
					</div>
				</a>
				<div class="slamfollow">
					<button>Follow</button>
				</div>
			</div>

			<div class="member">
				<p>Peoples in this area</p>
				<a href="#">
					<div class="slamprofile">
						<img id="img1" src="../profile/637f6a78ae47c1669294712.jpeg">
				      <div class="features">
						<p id="stext">Biswajit Patra</p>
						<p id="sicon2">Take 2</p>
				      </div>
					</div>
				</a>
				<a href="#">
					<div class="slamprofile">
						<img id="img1" src="../profile/637f7d3630cc71669299510.jpeg">
				      <div class="features">
						<p id="stext">Biswajit Patra</p>
						<p id="sicon2">Take 2</p>
				      </div>
					</div>
				</a>
				<a href="#">
					<div class="slamprofile">
						<img id="img1" src="../profile/637f7e15c3f2f1669299733.jpeg">
				      <div class="features">
						<p id="stext">Biswajit Patra</p>
						<p id="sicon2">Take 2</p>
				      </div>
					</div>
				</a>
				<a href="#">
					<div class="slamprofile">
						<img id="img1" src="../profile/637f7e810a5e21669299841.jpeg">
				      <div class="features">
						<p id="stext">Biswajit Patra</p>
						<p id="sicon2">Take 2</p>
				      </div>
					</div>
				</a>
				<a href="#">
					<div class="slamprofile">
						<img id="img1" src="../profile/637f7f531adc71669300051.jpeg">
				      <div class="features">
						<p id="stext">Biswajit Patra</p>
						<p id="sicon2">Take 2</p>
				      </div>
					</div>
				</a>
				<a href="#">
					<div class="slamprofile">
						<img id="img1" src="../profile/637f59c65fc5f1669290438.jpeg">
				      <div class="features">
						<p id="stext">Biswajit Patra</p>
						<p id="sicon2">Take 2</p>
				      </div>
					</div>
				</a>
				<a href="#">
					<div class="slamprofile">
						<img id="img1" src="../profile/637f7e15c3f2f1669299733.jpeg">
				      <div class="features">
						<p id="stext">Biswajit Patra</p>
						<p id="sicon2">Take 2</p>
				      </div>
					</div>
				</a>
				<a href="#">
					<div class="slamprofile">
						<img id="img1" src="../profile/637f586fbdbd01669290095.jpeg">
				      <div class="features">
						<p id="stext">Biswajit Patra</p>
						<p id="sicon2">Take 2</p>
				      </div>
					</div>
				</a>
				<a href="#">
					<div class="slamprofile">
						<img id="img1" src="../profile/637f7f531adc71669300051.jpeg">
				      <div class="features">
						<p id="stext">Biswajit Patra</p>
						<p id="sicon2">Take 2</p>
				      </div>
					</div>
				</a>
				<a href="#">
					<div class="slamprofile">
						<img id="img1" src="../profile/637f7e15c3f2f1669299733.jpeg">
				      <div class="features">
						<p id="stext">Biswajit Patra</p>
						<p id="sicon2">Take 2</p>
				      </div>
					</div>
				</a>
				<a href="#">
					<div class="slamprofile">
						<img id="img1" src="../profile/637f586fbdbd01669290095.jpeg">
				      <div class="features">
						<p id="stext">Biswajit Patra</p>
						<p id="sicon2">Take 2</p>
				      </div>
					</div>
				</a>
				<a href="#">
					<div class="slamprofile">
						<img id="img1" src="../profile/637f7f531adc71669300051.jpeg">
				      <div class="features">
						<p id="stext">Biswajit Patra</p>
						<p id="sicon2">Take 2</p>
				      </div>
					</div>
				</a>
			</div>

		</article>
	</section>
	<?php include('../bottom.php'); ?>
	<script>
		const opennav = () =>{
			history.go(-1);
		}
	</script>
</body>
</html>
<?php } ?>