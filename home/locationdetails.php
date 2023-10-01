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
		.profileimage{
			width: 100px;
			height: 100px;
			text-align: center;
			position: relative;
			margin: 70px 0 50px calc(50% - 50px);
			border-radius: 100%;
			background-color: #F0F0F0;
			border: 4px solid #E4E7FA;
		}
		#locationicon{
			font-size: 50px;
			padding-top: 15px;
		}
		.bottom-right {
			position: absolute;
			bottom: 12px;
			right: 37%;
			background-color: #FFFFFF;
			box-shadow: 0 1px 3px #c7c7c7;
			padding: 5px 10px;
			border-radius: 3px;
		}
		.fa-camera{
			color: #0B7DDA;
		}
		#verified{
			/*  background-color: red;*/
			font-size: 14px;
			color: #0B7DDA;
			padding-top: -100px;
		}
		.snapprofiledetails{
			text-align: center;
		}
		.snapprofiledetails h2{
			font-family: 'Open Sans', sans-serif;
		}
		.snapprofiledetails h3{
			color: #595959;
			font-size: 15px;
			font-family: 'Open Sans', sans-serif;
		}
		.snapprofilebuttons{
			width: 95%;
			text-align: center;
			margin: 30px auto 20px auto;
			display: inline-block;
		}
		.snapprofilebutton{
			display: inline-block;
			text-align: center;
		}
		#snapprofilebuttons{
			border: none;
			color: #FFFFFF;
			padding: 7px 15px;
			border-radius: 3px;
			margin: 5px;
			background-color: #0B7DDA;
			text-align: center;
			font-family: 'Roboto', sans-serif;
		}
		#snapprofilebuttonsf{
			border: none;
			color: #FFFFFF;
			padding: 7px 15px;
			border-radius: 3px;
			margin: 5px;
			background-color: #0B7DDA;
			text-align: center;
			font-family: 'Roboto', sans-serif;
		}
		#snapprofileicon{
			border: none;
			color: #FFFFFF;
			padding: 7px 10px;
			border-radius: 3px;
			margin: 5px;
			background-color: #0B7DDA;
			text-align: center;
			font-family: 'Roboto', sans-serif;
		}
		.snapprofile::after {
			content: "";
			clear: both;
			display: table;
		}

		.aboute{
			width: 95%;
			margin: 5px 2.5% 10px 2.5%;
		}
		#intro{
			font-size: 15px;
			padding: 0 0 15px 0;
			font-family: 'Open Sans', sans-serif;
		}
		.aboute pre{
			white-space: pre-wrap;
			overflow: auto;
			padding: 2px 0 5px 0;
			text-align: left;
			line-height: 1.5;
			overflow: hidden;
			font-family: 'Roboto', sans-serif;
			color: #262626;
			font-size: 14px;
			margin-top: -10px;
		}
		.aboute a{
			color: #0B7DDA;
			font-size: 12px;
			float: right;
			text-decoration: none;
		}
		.aboute::after {
			content: "";
			clear: both;
			display: table;
		}

		.details{
			width: 95%;
			margin: 5px 2.5% 15px 2.5%;
		}
		#details{
			font-size: 15px;
			padding: 0 0 10px 0;
			font-family: 'Open Sans', sans-serif;
		}
		.mapdetails{
			width: 100%;
		}
		.mapdetails p{
			line-height: 1.5;
			font-size: 14px;
		}
		.mapdetails .fa{
			color: #0B7DDA;
		}
		.leftdetils{
			float: left;
		}
		.leftdetils p{
			margin-right: 5px;
		}
		.rightdetails{
			float: left;
		}
		.rightdetails a{
			color: #0B7DDA;
			text-decoration: none;
		}
		.details::after {
			content: "";
			clear: both;
			display: table;
		}
		.contributter{
			width: 95%;
			margin: 5px 2.5% 15px 2.5%;	
		}
		#contributter{
			font-size: 15px;
			padding: 0 0 15px 0;
			font-family: 'Open Sans', sans-serif;
		}
		.cprofile{
			width: 100%;
			text-align: center;

		}
		.cprofiles{
			width: 25%;
			float: left;
			margin-bottom: 20px;
		}
		.cprofiles img{
			height: 50px;
			width: 50px;
			border-radius: 100%;
			border: 4px solid #E4E7FA;
		}
		.cprofiles p{
			font-size: 12px;
		}
		.contributter::after {
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
			<div class="snapprofile">
				<div class="profileimage">
					<p id="locationicon"><i class="fa fa-map-marker fa-gradient"></i></p>
				</div>
				<div class="snapprofiledetails">
					<h2><?php echo $name; ?> <?php if ($verify==1) {  ?><span id="verified"><i class="fa fa-check-circle"></i></span><?php } ?></h2>
					<h3>@<?php echo $username; ?></h3>
				</div>
				<div class="snapprofilebuttons">
					<div class="snapprofilebutton">
				        <?php
				        $query11 = "select * from follow where follower='$userid' and following='$userid'";
				        $run11 = mysqli_query($con,$query11);
				        if(mysqli_num_rows($run11) > 0){
				        ?>
				        <button id="snapprofilebuttons"><i class="fa fa-user"></i> Following</button>
				      <?php }else{ ?>
				        <button id="snapprofilebuttonsf" onclick="followme();">
				          <span id='changeme'><i class="fa fa-user-plus"></i> Follow </span>
				        </button>
				      <?php } ?>
					</div>
					<div class="snapprofilebutton">
						<a href="editinfo"><button id="snapprofilebuttons"><i class="fa fa-pencil"></i> Edit profile</button></a>
					</div>
					<div class="snapprofilebutton notifi">
						<a href="setting"><button id="snapprofileicon"><i class="fa fa-cog"></i></button></a>
					</div>
				</div>
			</div>

			<div class="details">
				<p id="details">Community</p>

				<div class="mapdetails">
					<div class="leftdetils">
						<p><i class="fa fa-user"></i></p>
						<p><i class="fa fa-user"></i></p>
						<p><i class="fa fa-thumb-tack"></i></p>
						<p><i class="fa fa-map-marker"></i></p>
					</div>
					<div class="rightdetails">
						<p>120 Peoples</p>
						<p>120 Followers</p>
						<p>756121</p>
						<a href=""><p>&nbsp;Bhagada, Bhadrak, Odisha, India</p></a>
					</div>
				</div>
			</div>


			<div class="aboute">
				<p id="intro">About Me</p>

				<pre id="aboutepre" style="height: 80px;">Bhagada is a small Village/hamlet in Bhandaripokhari Tehsil in Bhadrak District of Odisha State, India. It is located 25 KM towards west from District head quarters Bhadrak. 2 KM from Bhandaripokhari. 108 KM from State capital Bhubaneswar

Ranjit ( 4 KM ) , Jagannathprasad ( 7 KM ) , Napanga ( 8 KM ) , Balipokhari ( 8 KM ) , Naami ( 8 KM ) are the nearby Villages to Bhagada. Bhagada is surrounded by Jajapur Tehsil towards South , Korei Tehsil towards west , Jajpur Tehsil towards South , Dhamanagar Tehsil towards East .

Jajapur , Bhadrak , Byasanagar , Anandapur are the near by Cities to Bhagada.

This Place is in the border of the Bhadrak District and Jajapur District. Jajapur District Jajpur is South towards this place .</pre><a href="javascript:void(0);" onclick="readMore()" id="readmore">Read more</a>
			</div>


			<div class="contributter">
				<p id="contributter">Contributor</p>

				<div class="cprofile">
					<a href="">
						<div class="cprofiles">
							<img src="<?php echo $baseurl; ?>/profile/637f6a78ae47c1669294712.jpeg" alt="Snapkar">
							<p>Abinash Nayak</p>
						</div>
					</a>

					<a href="">
						<div class="cprofiles">
							<img src="<?php echo $baseurl; ?>/profile/noimg.jpg" alt="Snapkar">
							<p>Abinash Nayak</p>
						</div>
					</a>

					<a href="">
						<div class="cprofiles">
							<img src="<?php echo $baseurl; ?>/profile/637f7d3630cc71669299510.jpeg" alt="Snapkar">
							<p>Abinash Nayak</p>
						</div>
					</a>

					<a href="">
						<div class="cprofiles">
							<img src="<?php echo $baseurl; ?>/profile/637f7e15c3f2f1669299733.jpeg" alt="Snapkar">
							<p>Abinash Nayak</p>
						</div>
					</a>

					<a href="">
						<div class="cprofiles">
							<img src="<?php echo $baseurl; ?>/profile/637f7e810a5e21669299841.jpeg" alt="Snapkar">
							<p>Abinash Nayak</p>
						</div>
					</a>

					<a href="">
						<div class="cprofiles">
							<img src="<?php echo $baseurl; ?>/profile/637f7f531adc71669300051.jpeg" alt="Snapkar">
							<p>Abinash Nayak</p>
						</div>
					</a>

					<a href="">
						<div class="cprofiles">
							<img src="<?php echo $baseurl; ?>/profile/637f59c65fc5f1669290438.jpeg" alt="Snapkar">
							<p>Abinash Nayak</p>
						</div>
					</a>

					<a href="">
						<div class="cprofiles">
							<img src="<?php echo $baseurl; ?>/profile/637f7f531adc71669300051.jpeg" alt="Snapkar">
							<p>Abinash Nayak</p>
						</div>
					</a>
				</div>
			</div>



		</article>
	</section>
	<?php include('../bottom.php'); ?>
	<script>
		const opennav = () =>{
			history.go(-1);
		}

		function readMore(){
			let x = document.getElementById("aboutepre");
		    if (x.style.height === "80px") {
		      x.style.height = "100%";
		      $('#readmore').html('Read Less');
		    } else {
		      x.style.height = "80px";
		      $('#readmore').html('Read More');
		    }
		}
	</script>
</body>
</html>
<?php } ?>