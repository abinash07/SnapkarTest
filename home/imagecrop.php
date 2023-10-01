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
	<link rel="stylesheet" href="https://foliotek.github.io/Croppie/croppie.css">
	<script src="https://foliotek.github.io/Croppie/croppie.js"></script>
	<style>
		.profileimage{
			text-align: center;
			padding: 50px 0 20px 0;
			position: relative;
		}
		.profileimage img{
			width: 150px;
			height: 150px;
			border-radius: 100%;
			object-fit: cover;
			border: 4px solid #E4E7FA;
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
			font-size: 14px;
			color: #0B7DDA;
			padding-top: -100px;
		}
		.snapprofiledetails{
			text-align: center;
			margin-top: 20px;
		}
		.snapprofiledetails h2{
			font-family: 'Open Sans', sans-serif;
		}
		.snapprofiledetails p{
			color: #595959;
			font-size: 15px;
			padding: 5px 0 5px 0;
		}
		.snapprofiledetails h4{
			color: #595959;
			font-size: 15px;
			font-family: 'Open Sans', sans-serif;
		}
		#shareLink{
			color: #0B7DDA;
		}
		.snapprofilebuttons{
			width: 100%;
			text-align: center;
			margin: 20px auto 40px auto;
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
			cursor: pointer;
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
			cursor: pointer;
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
			cursor: pointer;
			font-family: 'Roboto', sans-serif;
		}
		.snapprofile::after {
			content: "";
			clear: both;
			display: table;
		}

		.follow{
			width: 95%;
			margin: 5px 2.5% 20px 2.5%;
			text-align: center;
			box-sizing: border-box;
		}
		.follow a{
			color: #000000;
		}
		.ftake{
			float: left;
			width: 33.3%;
			border: solid #F0F0F0;
			border-width: 1px 1px 1px 0;
		}
		.follower{
			float: left;
			width: 33.3%;
			border: solid #F0F0F0;
			border-width: 1px 1px 1px 0;
		}
		.following{
			float: left;
			width: 33.3%;
			border: solid #F0F0F0;
			border-width: 1px 0 1px 0;
		}
		#ftakes{
			font-size: 14px;
			padding: 5px 0 2px 0;
			font-family: 'Open Sans', sans-serif;
		}
		#fnumber{
			padding: 0 0 5px 0;
			font-size: 14px;
		}
		.follow::after {
			content: "";
			clear: both;
			display: table;
		}






		.intro{
			width: 95%;
			margin: 30px 2.5% 0 2.5%;
		}
		#intro{
			font-size: 15px;
			padding: 0 0 15px 0;
			font-family: 'Open Sans', sans-serif;
		}
		.intro pre{
			white-space: pre-wrap;
			overflow: auto;
			padding: 1px 0 5px 0;
			text-align: left;
			line-height: 1.5;
			overflow: hidden;
			font-family: 'Roboto', sans-serif;
			color: #262626;
			font-size: 14px;
			margin-top: -10px;
		}
		#addintro{
			text-decoration: none;
			color: #0B7DDA;
		}
		.intro pre a{
			color: #0B7DDA;
			text-decoration: none;
		}
		.introp{
			font-size: 14px;
			padding-bottom: 5px;
		}
		.introhead{
			font-size: 14px;
			color: #24282A;
			font-family: 'Open Sans', sans-serif;
		}
		.city{
			color: #262626;
		}
		.introlink{
			color: #0B7DDA;
			text-decoration: none;
		}
		.fa-globe{
			color: #0B7DDA;
		}
		.fa-map-marker{
			color: red;
		}
		#location{
			color: #1877F2;
		}

		#firtshome{
			background-color: #fafafa;
		}

		#modal-form h3{
			text-align: center;
			margin: 15px 0 0 0;
			padding-bottom: 10px;
			font-size: 14px;
			font-family: 'Open Sans', sans-serif;
		}
		.sharebox1 a{
			display: inline;
		}
		#sharenew1{
			border: 1px solid #f0f0f0;
			padding: 5px 10px;
		}









		.likes{
			width: 95%;
			margin: 5px 2.5% 30px 2.5%;
		}
		.likes a{
			color: #262626;
			text-decoration: none;
		}
		#likes{
			font-size: 12px;
			padding: 7px 14px;
			border-radius: 5px;
			display: inline-block;
			margin: 5px 5px 5px 0;
			background-color: #f1f3f8;
		}
		.edit{
			float: right;
			color: #0B7DDA!important;
			font-size: 16px;
		}
		#edit{
			color: #FFFFFF;
			font-size: 12px;
			padding: 6px 10px;
			border-radius: 5px;
			display: inline-block;
			margin: 5px 5px 5px 0;
			text-decoration: none;
			background-color: #0B7DDA;
		}
		#heading{
			font-size: 15px;
			padding: 0 0 5px 2.5%;
			font-family: 'Open Sans', sans-serif;
		}
		.likes::after {
			content: "";
			clear: both;
			display: table;
		}




		.work{
			width: 95%;
			margin: 5px 2.5% 30px 2.5%;
		}
		.work p{
			font-size: 14px;
			line-height: 1.5;
		}
		.la {
		    width: 30px;
		    height: 30px;
		    border-radius: 100%;
		    background: #f1f3f8;
		    display: inline-flex;
		    justify-content: center;
		    align-items: center;
		    font-size: 12px;
		    margin-right: 5px;
		    flex: none;
		    margin: 5px 0;
		}




		.social{
			width: 95%;
			margin: 5px 2.5% 30px 2.5%;
		}
		.social p{
			display: inline-block;
		}
		.social p a {
		    display: flex;
		    width: 2.33333rem;
		    height: 2.33333rem;
		    justify-content: center;
		    align-items: center;
		    background: #f1f3f8;
		    border-radius: 3px;
		    color: #9299b8;
		    margin-right: 5px;
		    text-decoration: none;
		    border-radius: 100%;
		}



















.photo{
  width: 95%;
  background-color: #1b1d20;
  position: relative;
  margin: 10px 2.5% 10px 2.5%;
}
.pimage{
  text-align: center;
}
.pimage img{
  width: 100%;
  height: auto;
/*  max-height: 80vh;
  max-width: 100%;*/
  margin-bottom: -4px;
}
.melove{
  position: absolute;
  left: 45%;
  top: 45%;
  font-size: 60px;
  text-align: center;
}
#loveicon1{
  color: red;
}
.features{
  position: absolute;
  width: 100%;
  bottom: 0;
  background-image: linear-gradient(rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.8));
}
#stext{
  font-size: 14px;
  padding: 10px 2.5% 10px 2.5%;
  color: #FFFFFF;
}
.fa-heart{
  color: red;
}
.fa-heart-o{
  color: #FFFFFF;
}
#sicon{
  font-size: 15px;
}
#sicon2{
  padding-left: 2.5%;
}
.fa-share-alt{
  color: #FFFFFF;
  padding-right: 5px;
}
#number{
  color: #FFFFFF;
  font-size: 15px;
}
#sbutton{
  float: right;
  margin-right: 2.5%;
}
.features button{
  border: 1px solid #FFFFFF;
  color: #FFFFFF;
  border-radius: 3px;
  padding: 2px 8px;
  margin-bottom: 15px;
  background-color: transparent;
}
.love{
  position: absolute;
  left: 100px;
  bottom: 10px;
}
#fb{
  color: #FFFFFF;
  padding: 5px 10px;
  background-color: #1877F2;
  border-radius: 3px;
}
#wa{
  color: #FFFFFF;
  padding: 5px 10px;
  background-color: #72d042;
  border-radius: 3px;
}
.profile{
  width: 100%;
  position: absolute;
  background-image: linear-gradient(rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0));
  top: 0;
}
.image1{
  float: left;
  margin-left: 2%;
}
.image1 img{
  width: 35px;
  height: 35px;
  border-radius: 100%;
  margin: 8px 0 5px 0;
  border: 4px solid #E4E7FA;
}
.dot{
  float: right;
  padding: 15px 2.5% 0 10px;
  color: #FFFFFF;
}
.more{
  background-color: #FFFFFF;
  box-shadow: 0 1px 3px #c7c7c7;
  position: absolute;
  width: 20%;
  right: 2.5%;
  top: 40px;
  text-align: center;
  border-radius: 5px;
}
.more a{
  text-decoration: none;
  color: #0B7DDA;
  line-height: 1.5;
  display: block;
}
.name{
  float: left;
  margin: 10px 15px;
  color: #FFFFFF;
}
#take{
  font-size: 12px;
}
.profile:after {
  content: "";
  display: table;
  clear:both;
}






















		@media only screen and (min-width: 750px) {
			article{
				width: 95%;
				float: left;
				margin-left: 2.5%;
			}
			.account-section{
				width: 100%;
				display: inline-block;
			}
			.profile-section{
				width: 25%;
				float: left;
    			position: fixed;
    			margin-top: 15px;
    			border-radius: 5px;
    			padding-bottom: 40px;
    			background-color: #f1f3f8;
			}
			.ftake{
				border: solid #FFFFFF;
				border-width: 1px 1px 1px 0;
			}
			.follower{
				border: solid #FFFFFF;
				border-width: 1px 1px 1px 0;
			}
			.following{
				border: solid #FFFFFF;
				border-width: 1px 0 1px 0;
			}
			.snapprofilebuttons{
				margin-bottom: 20px;
			}
			.info-section{
				width: 70%;
				float: left;
    			margin-left: 27.5%;
			}
			.intro{
				margin: 15px 2.5% 0 2.5%;
			}
			#intro{
				font-size: 18px;
				padding: 0 0 20px 0;
			}
			#heading{
				padding: 0 0 5px 2.5%;
			}
			.flash_section{
				width: 65%;
				margin-left: 1%;
			}
			.account-section::after {
				content: "";
				clear: both;
				display: table;
			}
		}









		.skimagecrop{
			width: 100%;
			border-radius: 5px;
		}

		#formhead{
			padding-top: 15px;
			text-align: center;
			font-family: 'Open Sans', sans-serif;
		}
		#upload-demo{
			width: 100%;
			height: 400px;
		  	padding-bottom: 40px;
		}
		.crop-option{
			width: 95%;
			margin: 10px 2.5% 25px 2.5%;
		}
		.crop-icon{
			float: left;
			width: 10%;
		}
		#option{
			font-size: 20px;
    		margin: 10px 10px 0 5px;
		}
		.crop-button{
			float: left;
			width: 90%;
		}

		.skimagecrop button{
			background-color: #1877F2;
			color: white;
			padding: 12px 20px;
			border: none;
			cursor: pointer;
			text-align: center;
			width: 100%;
			border-radius: 5px;
			position: relative;
		}
		.skimagecrop button:hover {
			opacity: 0.8;
		}
		.crop-option:after{
			content: "";
			display: table;
			clear:both;
		}


		.sk-modal{			
			display: none;
			position: fixed;
			z-index: 1;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background-color: rgba(0, 0, 0, 0.7);
			backdrop-filter: blur(5px);
		}
		.sk-modal::-webkit-scrollbar{
			display: none;
		}

		.modal-body{
			background-color: #fefefe;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			padding: 0;
			border: 1px solid #888;
			width: 95%;
			max-width: 400px;
			border-radius: 5px;
		}
		.modal-close{
			font-size: 20px;
			color: #262626;
			position: absolute;
			top: 6px;
			right: 2.5%;
			cursor: pointer;
		}
		.sk-close{
			float: right;
			font-size: 20px;
			margin-right: 10px;
		}

		.demoimage{
			display: flex;
			align-items: center;
			justify-content: center;
			background-color: rgba(0, 0, 0, 0.5);
		}
		.upload-demo-original img{
			height: 400px;
			width: auto;
		}


	</style>
</head>
<body>
	<?php require_once('../connect.php'); ?>

	<?php
		$slamuserid = $_SESSION["sbuserid"]; 
		$query = "SELECT u.name, u.username, u.userid, ui.image, ui.bluetick, ui.view, COUNT(fw.id) as follower, (SELECT COUNT(*) FROM follow WHERE follower = u.userid) as following FROM user as u LEFT JOIN userinfo as ui ON u.userid = ui.userid LEFT JOIN follow as fw ON u.userid = fw.following WHERE u.userid = '$slamuserid'";
		$run = mysqli_query($con,$query);
		$row = mysqli_fetch_array($run);
		$name = $row['name'];
		$username = $row['username'];
		$userid = $row['userid'];
		$image = $row['image'];
		$verify = $row['bluetick'];
		$view = $row['view'];
		$follower = $row['follower'];
		$following = $row['following'];



		$query1 = "SELECT am.bio, am.occupation, am.dob, sc.city_id as livingid, sc.name as living, c.name as livingcity, sc1.city_id as homeid, sc1.name as home, c1.name as homecity, am.localname, am.relation_status FROM aboutme as am LEFT JOIN subcity as sc ON am.living = sc.id LEFT JOIN city as c ON sc.city_id = c.id LEFT JOIN subcity as sc1 ON am.home = sc1.id LEFT JOIN city as c1 ON sc1.city_id = c1.id WHERE am.userid = '$userid'";
		$run1 = mysqli_query($con, $query1);
		$row1 = mysqli_fetch_array($run1);
		$bio = @$row1['bio'];
		$occupation = @$row1['occupation'];
		$localname = @$row1['localname'];
		$dob = @$row1['dob'];
		$living = @$row1['living'];
		$livingcity = @$row1['livingcity'];
		$home = @$row1['home'];
		$homecity = @$row1['homecity'];
		$relation_status = @$row1['relation_status'];
		if($relation_status == 1){
			$relation_status = 'Married';
		}elseif($relation_status == 2){
			$relation_status = 'Un Married';
		}elseif($relation_status == 3){
			$relation_status = 'Singled';
		}elseif($relation_status == 4){
			$relation_status = 'Complicated';
		}else{
			$relation_status = 'Nothing';
		}
		if($dob == '0000-00-00'){
			$dob = '';
		}


	?>


	<div class="top">
		<p id="bar" onclick="opennav()" ><i class="fa fa-long-arrow-left"></i></p>
		<a id="snap" href="<?php echo $baseurl; ?>/index">My account</a>
		<a id="img" href="<?php echo $baseurl; ?>/home/myaccount"><img src="<?php echo $baseurl; ?>/userprofile/<?php echo $image; ?>"></a>
		<a id="card" href="menu"><i class="fa fa-th"></i></a>
		<a id="top29" href="index">Search</a>
		<a id="top29" href="home/addpost">New Post</a>
		<a id="top29" href="home/explore">Explore</a>
		<a id="top29" href="index">Home</a>
	</div>
	<div class="space"></div>

	<section>
		<article>
			<div class="account-section">
				<div class="profile-section">
					<div class="snapprofile">
						<div class="profileimage">
							<img src="<?php echo $baseurl; ?>/userprofile/<?php echo $image; ?>" alt="Snapkar">
							<a href="javascript:void(0)" onclick="chooseImage()"><div class="bottom-right"><i class="fa fa-camera"></i></div></a>

							<input type="file" id="img-input" style="display: none; visibility: hidden; width: 1px;" accept="image/png, image/gif, image/jpeg"/>

						</div>
						<div class="snapprofiledetails">
							<h2><?php echo $name; ?> <?php if ($verify==1) {  ?><span id="verified"><i class="fa fa-check-circle"></i></span><?php } ?></h2>
							<h4>@<?php echo $username; ?> <i id="shareLink" class="fa fa-share-alt"></i></h4>
							<?php if(!empty($occupation)){ ?><p><?php echo $occupation; ?></p><?php } ?>
							
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
						        <button id="snapprofilebuttonsf" onclick="followme('<?= $slamuserid; ?>');">
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

					<div class="follow">
						<div class="ftake">
							<p id="ftakes">Views</p>
							<p id="fnumber"><?php echo $view; ?></p>
						</div>
						<a href="myfollowers">
							<div class="follower">
								<p id="ftakes">Followers</p>
								<p id="fnumber"><span id="followers"><?php echo $follower; ?></span></p>
							</div>
						</a>
						<a href="myfollowing">
							<div class="following">
								<p id="ftakes">Following</p>
								<p id="fnumber"><?php echo $following; ?></p>
							</div>
						</a>
					</div>
				</div>
				<div class="info-section">
					<?php
						$query10 = "SELECT * FROM work WHERE userid = '$userid' order by 1 desc limit 1";
						$run10 = mysqli_query($con, $query10);

						$query11 = "SELECT * FROM education WHERE userid = '$userid' order by 1 desc limit 1";
						$run11 = mysqli_query($con, $query11);
					?>
					<div class="intro">
						<p id="intro">Intro</p>
						<?php if(!empty($bio)){ ?><pre><span id="lintro"><?php echo $bio; ?></span></pre><?php } ?>
						<!-- <?php if(!empty($occupation)){ ?><p class="introp"><span class="introhead">Occupation:</span> <span class="city"><?php echo $occupation; ?></span></p><?php } ?> -->

						<?php if(mysqli_num_rows($run10) > 0){ $row10 = mysqli_fetch_array($run10); ?>
							<p class="introp"><span class="introhead">Work:</span> <span class="city"><?php echo $row10['work']; ?></span></p>
						<?php } ?>

<!-- 						<?php if(mysqli_num_rows($run11) > 0){ $row11 = mysqli_fetch_array($run11); ?>
							<p class="introp"><span class="introhead">Education:</span> <span class="city"><?php echo $row11['education']; ?></span></p>
						<?php } ?> 
 -->
						<?php if(!empty($localname)){ ?><p class="introp"><span class="introhead">Local Name:</span> <span class="city"><?php echo $localname; ?></span></p><?php } ?>

						<?php if(!empty($living)){ ?><p class="introp"><span class="introhead">Living city:</span> <span class="city"><?php echo $living.', '.$livingcity; ?></span></p><?php } ?>

						<?php if(!empty($home)){ ?><p class="introp"><span class="introhead">Home town:</span> <span class="city"><?php echo $home.', '.$homecity; ?></span></p><?php } ?>

						<?php if(!empty($dob)){ ?><p class="introp"><span class="introhead">Since:</span> <span class="city"><?php echo date('d M, Y', strtotime($dob)); ?></span></p><?php } ?>

						<?php if(!empty($relation_status)){ ?><p class="introp"><span class="introhead">Relationship Status:</span> <span class="city"><?= $relation_status; ?></span></p><?php } ?>

						<!-- <p class="introp"><a class="introlink" href="editinfo"><span class="introhead">See more details...</span></a></p> -->
					</div>
					<?php
						$query15 = "SELECT * FROM socialmedia WHERE userid = '$userid' order by 1 desc limit 10";
						$run15 = mysqli_query($con, $query15);
						if(mysqli_num_rows($run15) > 0){
							$row15 = mysqli_fetch_array($run15)
					?>
						<div class="social">
							<p><a href="<?= $row15['facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></p>
							<p><a href="<?= $row15['instragram']; ?>" target="_blank"><i class="fa fa-instagram"></i></a></p>
							<p><a href="<?= $row15['youtube']; ?>" target="_blank"><i class="fa fa-youtube"></i></a></p>
							<p><a href="<?= $row15['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a></p>
							<p><a href="<?= $row15['linkdin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></p>
							<p><a href="social" style="background-color: #0B7DDA; color: #FFFFFF;"><i class="fa fa-pencil"></i></a></p>
						</div>
					<?php }else{ ?>
						<div class="social">
							<a id="edit" href="social"><i class="fa fa-plus"></i> Add New</a>
						</div>
					<?php } ?>





					<p id="heading">Likes / Intrests</p>
					<div class="likes">
						<?php
							$query2 = "SELECT * FROM intrests WHERE userid = '$userid'";
							$run2 = mysqli_query($con, $query2);
							if(mysqli_num_rows($run2) > 0){
							while($row2 = mysqli_fetch_array($run2)){
						?>
							<p id="likes"><?php echo $row2['intrest']; ?></p>
						<?php } ?>
							<a id="edit" href="interest"><i class="fa fa-pencil"></i> Edit</a>
						<?php }else{ ?>
							<a id="edit" href="interest"><i class="fa fa-plus"></i> Add New</a>
						<?php } ?>
					</div>


					<div class="flash_section">
					<div class="photo">
					<div class="pimage" ondblclick="loveme(1)">
					<img src="http://localhost/snickar/userprofile/download (6).jpeg" alt="snapkar">
					<div class="melove" style="display: none;" id="loveme_icon1">
					<span><i id="loveicon1" class="fa fa-heart"></i></span>
					</div>
					</div>

					<div class="profile">
					<div class="image1">
					<img src="http://localhost/snickar/userprofile/download (6).jpeg" alt="snapkar">
					</div>
					<div class="name">
					<p>Abinash Nayak</p>
					<p id="take">Snap 6 </p>
					</div>
					<div class="dot" onclick="moreit(1);">
					<p><i class="fa fa-ellipsis-v"></i></p>
					</div>
					<div class="more" id="more1" style="display: none;">
					<br>
					<a href="">Report</a>
					<br>
					</div>
					</div>
					<div class="features">
					<p id="stext">Don't wait for an oppertunity, To create an oppertunity</p>
					<p id="sicon2"><span onclick="love(1);"><span id="sicon"><span id="love_icon1"><i class="fa fa-heart-o"></i></span> <span id="number"><span id="love_id1">0</span></span></span></span> &nbsp; &nbsp; <span id="sicon" onclick="shareit(1);"><i class="fa fa-share-alt"></i></span> <span id="number"></span> 

					<span id="sbutton"><button onclick="resnap(1);"><i class="fa fa-retweet"></i> Resnap</button></span> 

					<span id="sbutton"><a href="edittext"><button>Text Edit</button></a></span>
					</p>
					</div>
					<div class="love" style="display: none;" id="share21">
					<a href="http://www.facebook.com/sharer.php?u=https://snapkar.com/home/snaps?snap=1"><i id="fb" class="fa fa-facebook"></i></a>
					<a href="whatsapp://send?text=https://snapkar.com/home/snaps?snapid=1"><i id="wa" class="fa fa-whatsapp"></i></a>
					</div>
					</div>
					</div>



				</div>
			</div>





<div class="sk-modal">
	<div class="modal-body" id="modal-more">
			<div class="modal-close" onclick='closeit();'><i class="fa fa-times"></i></div>

			<div class="skimagecrop">
				<p id="formhead">Crop</p>
				<div id="upload-demo" class="center-block" style="display: block;"></div>

				<div class="demoimage" style="display: none;">
					<div class="upload-demo-original">
						<img id="fdgdggd" src="">
					</div>
				</div>
				<p id="errormsg"></p>
				<div class="crop-option">
					<div class="crop-icon"><p id="option"><i class="fa fa-arrows"></i></p></div>
					<div class="crop-button">
						<button type="button" id="cropImageBtn" class="btn btn-primary">Upload</button>
					</div>
				</div>
			</div>

	</div>
</div>




		</article>
	</section>
	<?php include('../bottom.php'); ?>
	<script>






	$('#option').on('click',function(e){
		e.preventDefault();
		$('#upload-demo').toggle();
    $('.demoimage').toggle();
		var currentText = $('#formhead').text();
    $('#formhead').text(currentText === 'Original' ? 'Crop' : 'Original');
	});


	var $uploadCrop,
	tempFilename,
	rawImg,
	imageId;


var nw = '';
var nh = '';
function readFile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
  
            $('.sk-modal').css('display','block');
            
            // Create an image element to load the uploaded image
            var img = new Image();
            img.src = e.target.result;
            
            // Wait for the image to load and get its width
            img.onload = function () {
			    var size = img.size;

				if(size <= 10000000){
					quality=0.8;
				}
				if(size >= 20000000){
					quality=0.7;
				}
				if(size >= 40000000){
					quality=0.6;
				}

                $uploadCrop.croppie('bind', {
                    url: e.target.result
                }).then(function () {
                    console.log('jQuery bind complete');
                });
				$('#fdgdggd').attr('src',e.target.result);
            };
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        swal("Sorry - your browser doesn't support the FileReader API");
    }
}
	
	var quality = 0.7;


	$uploadCrop = $('#upload-demo').croppie({
		viewport: {
			width: 300,
			height: 350,
			type: 'circle'
		},
		enforceBoundary: true,
		enableExif: true,
		mouseWheelZoom: false,
	});

			function chooseImage(){
				document.getElementById('img-input').click();
			}

	$('#img-input').on('change', function () { 
      	imageId = $(this).data('id'); 
      	tempFilename = $(this).val();
		$('#cancelCropBtn').data('id', imageId); 
		readFile(this); 
    });


	$('#cropImageBtn').on('click', function (ev) {

		$uploadCrop.croppie('result', {
			type: 'base64',
			format: 'jpeg',
			size: 'original',
			quality: quality,
			

		}).then(function (resp) {
			console.log(nw, nh);
			$('.profileimage img').attr('src', resp);
			$('.sk-modal').css('display','none');
		});
	});

	// End upload preview image









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


		function followme(following){
			$("#snapprofilebuttonsf").prop("onclick", null).off("click");
			$("#changeme").html('<i class="fa fa-user"></i> Following');
			var count_follow = $("#followers").html();
			count_follow++;
			$("#followers").html(count_follow);
			var follower = "<?php echo $userid; ?>";
			$.ajax({
				url : "ajax/followme",
				type : "POST",
				data :{following: following},
				cache: false,
				success: function(data){
				}
			});
		}









		$('#img-input').change(function() {

			var basic = $('#upload-demo').croppie({
				viewport: {
					width: 150,
					height: 200,
				},
				enforceBoundary: false,
				enableExif: true
			});



			basic.croppie('bind', {
	    		url: 'http://localhost/snickar/userprofile/64cf90755294f1691324533.jpeg'
	    	}).then(function(){
	    		console.log('jQuery bind complete');
	    	});
		});














		function resnap(userid){
  var snapid = "1";
  $.ajax({
    url : "ajax/resnap",
    type : "POST",
    data : {userid: userid, snapid: snapid},
    cache: false,
    success: function(data){
      MySnap();
    }
  });
}

function moreit(id){
  var x = document.getElementById("more"+id);
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function shareit(pid){
  var x = document.getElementById("share2"+pid);
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function loveme(id){
  love(id);
  var x = document.getElementById("loveme_icon"+id);
  x.style.display = "block";
  if (x.style.display === "block") {
    setTimeout(() => {
      x.style.display = "none";
    }, 1200);
  }
}

function love(id) {
  var userid = "1";
  var curr_love = $("#love_id"+id).html();
  curr_love++;
  $("#love_id"+id).html(curr_love);

  var curr_icon = $("#love_icon"+id).html();
  $("#love_icon"+id).html('<i class="fa fa-heart"></i>');

    $.ajax({
      url : "ajax/insertlove",
      type : "POST",
      data : {id: id, userid: userid},
      cache: false,
      success: function(data){
     }
   });
}


	</script>
</body>
</html>
<?php } ?>