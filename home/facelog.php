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
		
		.facelog{
			width: 95%;
			
			margin: 10px 2.5% 100px 2.5%;
/*			background-color: #000;*/
		}
		.facerow{
			border-radius: 5px;
			box-shadow: 0 1px 3px #c7c7c7;
			margin-bottom: 15px;
		}
		.faceprofile{
			position: relative;
		}
		#facetitle{
			padding: 10px 2.5%;
		}
		.editlog{
			float: right;
			color: #0B77DA;
		}
		.faceprofile img{
			width: 100%;
			height: auto;
			border-radius: 0 0 5px 5px;
			margin-bottom: -4px;
		}
		.facedetails{
			position: absolute;
	    	bottom: 10px;
	    	right: 5px;
	    	background-color: #000000;
	    	color: #FFFF;
	    	padding: 5px 10px;
    		border-radius: 3px;
		}

		@media only screen and (min-width: 750px) {
			article{
				width: 40%;
				float: left;
				margin-left: 23%;
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
	?>
	<div class="top">
		<p id="bar" onclick="opennav()" ><i class="fa fa-long-arrow-left"></i></p>
		<a id="snap" href="<?php echo $baseurl; ?>/index">About me</a>
		<a id="img" href="<?php echo $baseurl; ?>/home/myaccount"><img class="uimage" src="<?php echo $baseurl; ?>/assets/image/noimg.jpg"></a>
		<a id="card"href="home/addpost"><i class="fa fa-th"></i></a>
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
		
			<div class="facelog">
				<?php
					$sl = 1;
					$query = "select year,image from facelog where userid='$slamuserid' order by year desc";
					$run = mysqli_query($con,$query);
					if(mysqli_num_rows($run) > 0){
					while($row = mysqli_fetch_array($run)){
				?>
				<div class="facerow">
					<p id="facetitle"><?= $row['year']; ?> Year <a href="editlog?year=<?= $row['year']; ?>"><span class="editlog"><i class="fa fa-camera"></i> Edit</span></a></p>
					<div class="faceprofile">
						<img id="img1" src="<?php echo $baseurl; ?>/facelogimg/<?= $row['image']; ?>">
				      	<div class="facedetails">
							<p><i class="fa fa-photo"></i> <?= $sl; ?></p>
				      	</div>
					</div>
				</div>
				<?php $sl++; } } ?>
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
	</script>
</body>
</html>
<?php } ?>