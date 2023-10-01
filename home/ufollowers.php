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
		#link{
		color: #000000;
		}
		.snapkar{
		width: 95%;
		margin: 15px 2.5% 5px 2.5%;
		box-shadow: 0 1px 3px #c7c7c7;
		border-radius: 5px;
		}
		.profile{
		width: 95%;
		margin: 10px 2.5% 5px 2.5%;
		padding-top: 10px;
		position: relative;
		}
		.image{
		float: left;
		}
		.image img{
		width: 40px;
		height: 40px;
		border-radius: 100%;
		border: 4px solid #E4E7FA;
		}
		.dot{
		float: right;
		padding: 10px 0 0 10px;
		}
		.name{
		float: left;
		margin: 5px 15px;
		}
		#take{
		font-size: 12px;
		}
		.profile::after {
		content: "";
		clear: both;
		display: table;
		}
		.snapkar::after {
		content: "";
		clear: both;
		display: table;
		}
		.norecord{
			width: 95%;
			margin: 15px 2.5%;
			box-shadow: 0 1px 3px #c7c7c7;
			border-radius: 5px;
		}
		.norecord p{
			padding: 40px 0 10px 0;
			text-align: center;
		}
		#bell2{
			color: #0B7DDA;
			font-size: 50px;
			padding-bottom: 25px;
		}
		.norecord button{
			width: 95%;
			color: #FFFFFF;
			margin-left: 2.5%;
			padding: 12px 0;
			border-radius: 5px;
			border: 1px solid #ddd;
			cursor: pointer;
			margin-bottom: 15px;
			background-color: #0B7DDA;
		}
		.norecord button:hover{
			background: #ddd;
		}
		.norecord:after {
			content: "";
			display: table;
			clear:both;
		}
	</style>
</head>
<body>
	<?php require_once('../connect.php'); ?>

	<?php
		$slamuserid = $_SESSION["sbuserid"]; 
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
			
			<?php
				$query4 = "SELECT u.name, u.username, ui.image, ui.bluetick FROM follow as f LEFT JOIN user as u ON f.following = u.userid LEFT JOIN userinfo as ui ON f.following = ui.userid WHERE f.following = '$slamuserid'";
				$run4 = mysqli_query($con,$query4);
				if(mysqli_num_rows($run4)){
				while($row4 = mysqli_fetch_array($run4)){
			?>
				<a id="link" href="<?php echo $baseurl; ?>/profile?username=<?php echo $row4['username']; ?>">
					<div class="snapkar">
						<div class="profile">
							<div class="image">
								<img src="<?php echo $baseurl; ?>/userprofile/<?php echo $row4['image']; ?>" alt="snapkar">
							</div>
							<div class="name">
								<p><?php echo $row4['name']; ?></p>
								<p id="take">View profile</p>
							</div>
							<div class="dot" >
								<p><i class="fa fa-ellipsis-v"></i></p>
							</div>
						</div>
					</div>
				</a>
			<?php } }else{ ?>
				<div class="norecord">
					<p>No questions added</p>
					<p><i id="bell2" class="fa fa-question"></i></p>
					<a href="addquestion?slam=<?php echo $slamid; ?>"><button><i class="fa fa-plus"></i> Add question</button></a>
				</div>
			<?php } ?>
			
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

	</script>
</body>
</html>
<?php } ?>