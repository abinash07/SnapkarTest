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
	<link rel="stylesheet" href="assets/css/style.css">
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
/*			background-color: #FFFFFF;
			box-shadow: 0 1px 3px #c7c7c7;*/
			padding: 5px 10px;
			border-radius: 3px;
		}
		.online{
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
		.snapprofiledetails h4{
			color: #595959;
			font-size: 15px;
			font-family: 'Open Sans', sans-serif;
		}
		.snapprofiledetails p {
		    color: #595959;
		    font-size: 15px;
		    padding: 5px 0 5px 0;
		}
		.snapprofilebuttons{
			width: 100%;
			text-align: center;
			margin: 10px auto 40px auto;
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
			width: 33%;
			border: solid #F0F0F0;
			border-width: 1px 1px 1px 0;
		}
		.follower{
			float: left;
			width: 33%;
			border: solid #F0F0F0;
			border-width: 1px 1px 1px 0;
		}
		.following{
			float: left;
			width: 33%;
			border: solid #F0F0F0;
			border-width: 1px 0 1px 0;
		}
		#ftakes{
			font-size: 14px;
			padding: 5px 0 5px 0;
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
			margin: 5px 2.5% 10px 2.5%;
		}
		#intro{
			font-size: 15px;
			padding: 0 0 20px 0;
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





		.topmenu{
			width: 95%;
			margin: 10px 2.5% 10px 2.5%;
			overflow: auto;
			white-space: nowrap;
		}
		.topmenu a{
			display: inline-block;
			color: #3F3A64;
			text-align: center;
			padding: 5px 10px;
			text-decoration: none;
			border: 1px solid #F0F0F0;
			border-radius: 5px;
			margin: 10px 15px 10px 0;
		}
		.topmenu a:hover{
			color: #3F3A64;
			background-color: #F0F0F0;
		}
		.active{
			background-color: #F0F0F0;
		}
		#now{
			color: #0B7DDA;
		}
		.topmenu:after {
			content: "";
			display: table;
			clear:both;
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
			margin: 0px 5px 5px 0;
			background-color: #0B7DDA;
		}
		.likes{
			width: 95%;
			margin: 5px 2.5% 15px 2.5%;
		}
		#likesheading{
			font-size: 15px;
			padding: 0 0 10px 0;
			font-family: 'Open Sans', sans-serif;
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
		.likes::after {
			content: "";
			clear: both;
			display: table;
		}


		#nolikes{
			font-size: 14px;
    		color: #898484;
		}

		#heading{
			font-size: 15px;
			padding: 0 0 10px 2.5%;
			font-family: 'Open Sans', sans-serif;
		}
		.hobbies{
			width: 95%;
			margin: 5px 2.5% 20px 2.5%;
		}
		.hobyicon img{
			width: 50px;
			height: 50px;
		}




		#more{
			background: rgba(0,0,0,0.7);
			position: fixed;
			left: 0;
			top:0;
			width: 100%;
			height: 100%;
			z-index: 1;
			display: none;
			overflow-y: scroll;
		}
		#more::-webkit-scrollbar{
			display: none;
		}

		#modal-more{
			width: 80%;
			position: relative;
			background-color: #FFFFFF;
			top: 10%;
			left: 10%;
			padding: 15px;
			border-radius: 4px;
			text-align: center;
			margin-bottom: 10px;
		}
		#modal-more a{
			text-decoration: none;
			color: #0B7DDA;
			line-height: 1.5;
			display: inline-block;
		}
		#modal-more p{
			text-align: center;
			margin: 15px 0 0 0;
			padding-bottom: 10px;
			font-size: 14px;
			font-family: 'Open Sans', sans-serif;
		}
		#modal-more hr{
			width: 100%;
			border: solid #F0F0F0;
			border-width: 1px 0 0;
		/*	margin: 15px 0;*/
		}
		#cross{
			font-size: 20px;
			color: #262626;
			position: absolute;
			top: 6px;
			right: 2.5%;
			cursor: pointer;
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
		}

		@media only screen and (min-width: 750px) {
			article{
				width: 95%;
				float: left;
				margin-left: 2.5%;
			}
			#modal-more{
				width: 35%;
				position: relative;
				background-color: #FFFFFF;
				top: 10%;
				left: 32.5%;
				padding: 15px;
				border-radius: 4px;
				text-align: center;
				margin-bottom: 10px;
			}
			.account-section{
				width: 100%;
				display: inline-block;
			}
			.profile-section{
				left: 2.5%;
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
			.info-section{
				width: 70.5%;
				float: left;
    			margin-left: 29.5%;
			}
			.intro{
				margin: 15px 2.5% 25px 2.5%;
			}
			#intro{
				font-size: 18px;
				padding: 0 0 20px 0;
			}
			#heading{
				padding: 0 0 5px 2.5%;
			}
			.account-section::after {
				content: "";
				clear: both;
				display: table;
			}
		}
	</style>
</head>
<body>
	<?php require_once('connect.php'); ?>

	<?php
		$slamuserid = $_SESSION["sbuserid"]; 

		$username = mysqli_real_escape_string($con,@$_GET['username']);
		$username = htmlentities($username);

		$query2 = "SELECT u.name, u.username, u.userid, ui.image, ui.bluetick, COUNT(fw.id) as follower, (SELECT COUNT(*) FROM follow WHERE follower = u.userid) as following FROM user as u LEFT JOIN userinfo as ui ON u.userid = ui.userid LEFT JOIN follow as fw ON u.userid = fw.following  WHERE u.username = '$username'";
		$run2 = mysqli_query($con,$query2);
		$row2 = mysqli_fetch_array($run2);
		$name = $row2['name'];
		$snickuserid = $row2['userid'];
		$snickimage = $row2['image'];
		$verify = $row2['bluetick'];
		$follower = $row2['follower'];
		$following = $row2['following'];


		$views = 0;
		$query = "SELECT ui.nocount as views FROM userview as ui WHERE ui.profileid = '$snickuserid' and ui.userid = '$slamuserid'";
		$run = mysqli_query($con,$query);
		if(mysqli_num_rows($run) > 0){
			$row = mysqli_fetch_array($run);
			$views = $row['views'];
			if($snickuserid != $slamuserid ){
				$query3 = "UPDATE userview SET nocount = nocount+1 where profileid = '$snickuserid' AND userid = '$slamuserid'";
			}
		}else{
			if($snickuserid != $slamuserid ){
				$query3 = "INSERT INTO userview (profileid, userid, nocount) VALUES ('$snickuserid','$slamuserid',1)";
			}
		}

		if($snickuserid != $slamuserid ){
			$run3 = mysqli_query($con,$query3);
			$views+1;
		}


		$query1 = "SELECT am.bio, am.occupation, am.dob, sc.city_id as livingid, sc.name as living, c.name as livingcity, sc1.city_id as homeid, sc1.name as home, c1.name as homecity, am.localname, am.relation_status FROM aboutme as am LEFT JOIN user as u ON am.userid = u.userid LEFT JOIN subcity as sc ON am.living = sc.id LEFT JOIN city as c ON sc.city_id = c.id LEFT JOIN subcity as sc1 ON am.home = sc1.id LEFT JOIN city as c1 ON sc1.city_id = c1.id WHERE u.userid = '$snickuserid'";
		$run1 = mysqli_query($con, $query1);
		$row1 = mysqli_fetch_array($run1);
		$bio = @$row1['bio'];
		$occupation = @$row1['occupation'];
		$dob = @$row1['dob'];
		$localname = @$row1['localname'];
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
		<a id="snap" href="<?php echo $baseurl; ?>/index">Profile</a>
		<a id="img" href="<?php echo $baseurl; ?>/home/myaccount"><img class="uimage" src="<?php echo $baseurl; ?>/assets/image/noimg.jpg"></a>
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
							<img src="<?php echo $baseurl; ?>/userprofile/<?php echo $snickimage; ?>" alt="Snapkar">
							<a href="editprofile"><div class="bottom-right"><i class="fa fa-circle online"></i></div></a>
						</div>
						<div class="snapprofiledetails">
							<h2><?php echo $name; ?> <?php if ($verify==1) {  ?><span id="verified"><i class="fa fa-check-circle"></i></span><?php } ?></h2>
							<h3>@<?php echo $username; ?></h3>
							<?php if(!empty($occupation)){ ?><p><?php echo $occupation; ?></p><?php } ?>
						</div>
						<div class="snapprofilebuttons">
							<div class="snapprofilebutton">
						        <?php
						        $query11 = "select * from follow where follower='$slamuserid' and following='$snickuserid'";
						        $run11 = mysqli_query($con,$query11);
						        if(mysqli_num_rows($run11) > 0){
						        ?>
						        <button id="snapprofilebuttons"><i class="fa fa-user"></i> Following</button>
						      <?php }else{ ?>
						        <button id="snapprofilebuttonsf" onclick="followme('<?php echo $snickuserid; ?>');">
						          <span id='changeme'><i class="fa fa-user-plus"></i> Follow </span>
						        </button>
						      <?php } ?>
							</div>
							<div class="snapprofilebutton">
								<a href="editinfo"><button id="snapprofilebuttons"><i class="fa fa-envelope"></i> Knock</button></a>
							</div>
							<div class="snapprofilebutton notifi">
								<button id="snapprofileicon" onclick="moreit();"><i class="fa fa-ellipsis-v"></i></button>
							</div>
						</div>
					</div>

					<div id="more">
						<div id="modal-more">
							<p><a href="">Report</a></p>
							<hr>
							<p><a href="">View profile</a></p>
							<hr>
							<p><a href="">Send Knock</a></p>
							<hr>
							<p><a href="">Report</a></p>
							<hr>
							<div id="cross" onclick='closeit();'><i class="fa fa-times"></i></div>
							<p onclick='closeit();'>Cancel</p>
						</div>
					</div>

					<div class="follow">
						<div class="ftake">
							<p id="ftakes">Views</p>
							<p id="fnumber"><?php echo $views; ?></p>
						</div>
						<a href="home/ufollowers">
							<div class="follower">
								<p id="ftakes">Followers</p>
								<p id="fnumber"><span id="followers"><?php echo $follower; ?></span></p>
							</div>
						</a>
						<a href="home/ufollowing">
							<div class="following">
								<p id="ftakes">Following</p>
								<p id="fnumber"><?php echo $following; ?></p>
							</div>
						</a>
					</div>
				</div>
				<div class="info-section">
					<?php
						$query10 = "SELECT * FROM work WHERE userid = '$snickuserid' order by 1 desc";
						$run10 = mysqli_query($con, $query10);

						$query11 = "SELECT * FROM education WHERE userid = '$snickuserid' order by 1 desc limit 1";
						$run11 = mysqli_query($con, $query11);
					?>
					<div class="intro">
						<p id="intro">Intro</p>
						<?php if(!empty($bio)){ ?><pre><span id="lintro"><?php echo $bio; ?></span></pre><?php } ?>

<!-- 						<?php if(mysqli_num_rows($run10) > 0){ $row10 = mysqli_fetch_array($run10); ?>
							<p class="introp"><span class="introhead">Work:</span> <span class="city"><?php echo $row10['work']; ?></span></p>
						<?php } ?>

						<?php if(mysqli_num_rows($run11) > 0){ $row11 = mysqli_fetch_array($run11); ?>
							<p class="introp"><span class="introhead">Education:</span> <span class="city"><?php echo $row11['education']; ?></span></p>
						<?php } ?> -->

						<?php if(!empty($localname)){ ?><p class="introp"><span class="introhead">Local Name:</span> <span class="city"><?php echo $localname; ?></span></p><?php } ?>

						<?php if(!empty($living)){ ?><p class="introp"><span class="introhead">Living city:</span> <span class="city"><?php echo $living.', '.$livingcity; ?></span></p><?php } ?>

						<?php if(!empty($home)){ ?><p class="introp"><span class="introhead">Home town:</span> <span class="city"><?php echo $home.', '.$homecity; ?></span></p><?php } ?>

						<?php if(!empty($dob)){ ?><p class="introp"><span class="introhead">Since:</span> <span class="city"><?php echo date('d M, Y', strtotime($dob)); ?></span></p><?php } ?>

						<?php if(!empty($relation_status)){ ?><p class="introp"><span class="introhead">Relationship Status:</span> <span class="city"><?= $relation_status; ?></span></p><?php } ?>
						<!-- <p class="introp"><a class="introlink" href="editinfo"><span class="introhead">See more details...</span></a></p> -->
					</div>
			
					<?php
						$query15 = "SELECT * FROM socialmedia WHERE userid = '$snickuserid' order by 1 desc limit 10";
						$run15 = mysqli_query($con, $query15);
						if(mysqli_num_rows($run15) > 0){
							$row15 = mysqli_fetch_array($run15)
					?>
						<p id="heading">Social Links</p>
						<div class="social">
							<p><a href="<?= $row15['facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></p>
							<p><a href="<?= $row15['instragram']; ?>" target="_blank"><i class="fa fa-instagram"></i></a></p>
							<p><a href="<?= $row15['youtube']; ?>" target="_blank"><i class="fa fa-youtube"></i></a></p>
							<p><a href="<?= $row15['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a></p>
							<p><a href="<?= $row15['linkdin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></p>
						</div>
					<?php } ?>
						

					<div class="likes">
						<p id="likesheading">Likes / Intrests</p>
						<?php
							$query2 = "SELECT * FROM intrests WHERE userid = '$snickuserid'";
							$run2 = mysqli_query($con, $query2);
							if(mysqli_num_rows($run2) > 0){
							while($row2 = mysqli_fetch_array($run2)){
						?>
							<p id="likes"><?php echo $row2['intrest']; ?></p>
						<?php } }else{ ?>
							<p id="nolikes">No likes added</p>
						<?php } ?>
					</div>


					<?php
						$query12 = "SELECT * FROM work WHERE userid = '$snickuserid' order by 1 desc limit 10";
						$run12 = mysqli_query($con, $query12);
						if(mysqli_num_rows($run12) > 0){
					?>
					<p id="heading">Work</p>
					<div class="work">
						<?php while($row12 = mysqli_fetch_array($run12)){ ?>
							<p><span class="la"><i class="fa fa-briefcase"></i></span> <?php echo $row12['work']; ?></p>
						<?php } ?>
					</div>
					<?php } ?>


					<?php
						$query13 = "SELECT * FROM education WHERE userid = '$snickuserid' order by 1 desc limit 10";
						$run13 = mysqli_query($con, $query13);
						if(mysqli_num_rows($run13) > 0){
					?>
					<p id="heading">Education</p>
					<div class="work">
						<?php while($row13 = mysqli_fetch_array($run13)){ ?>
							<p><span class="la"><i class="fa fa-graduation-cap"></i></span> <?php echo $row13['education']; ?></p>
						<?php } ?>
					</div>
					<?php } ?>

					<?php
						$query14 = "SELECT * FROM college WHERE userid = '$snickuserid' order by 1 desc limit 10";
						$run14 = mysqli_query($con, $query14);
						if(mysqli_num_rows($run14) > 0){
					?>
					<p id="heading">School / College / Univercity</p>
					<div class="work">
						<?php while($row14 = mysqli_fetch_array($run14)){ ?>
							<p><span class="la"><i class="fa fa-building"></i></span> <?php echo $row14['college']; ?></p>
						<?php } ?>
					</div>
					<?php } ?>


					<p id="heading">Hobbies</p>
					<div class="hobbies">
						<div class="hobyicon">
							<img src="hobyimg/hobby.png">
							<img src="hobyimg/photo-camera.png">
							<img src="hobyimg/hobby.png">
							<img src="hobyimg/photo-camera.png">
							<img src="hobyimg/hobby.png">
							<img src="hobyimg/photo-camera.png">
							<img src="hobyimg/hobby.png">
							<img src="hobyimg/photo-camera.png">
						</div>
					</div>

				</div>
			</div>
		</article>
	</section>
	<?php include('bottom.php'); ?>
	<script>
		const opennav = () =>{
			history.go(-1);
		}

  		if(localStorage.getItem("sbtoken") === null){
    		location.href="login";
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

			$.ajax({
				url : "ajax/followme",
				type : "POST",
				data : {following: following},
				cache: false,
				success: function(data){
				}
			});
		}

		function moreit(){
			var x = document.getElementById("more");
			x.style.display = "block";
		}
		function closeit(){
			var x = document.getElementById("more");
			x.style.display = "none";
		}

	</script>
</body>
</html>
<?php } ?>