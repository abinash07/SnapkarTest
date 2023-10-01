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




		.search{
	        width: 100%;
	        box-sizing: border-box;
	        padding: 1px 0 1px 0;
	    }
	    #serachead{
			font-size: 14px;
			margin: 15px 0 10px 2.5%;
			font-family: 'Open Sans', sans-serif;
	    }
	    .search form{
	        margin: 10px 2.5% 10px 2.5%;
	        text-align:center;
	        box-sizing: border-box;
	        border: 1px solid #F0F0F0;
	        border-radius: 5px;
	    }
	    .search form.example input[type=text]{
	        padding: 13px 0 10px 2%;
	        font-size: 14px;
	        float: left;
	        width: 85%;
	        border: none;
	        background: #FFFFFF;
	        border-radius: 5px 0 0 5px;
	        outline: none;
	        box-sizing: border-box;
	    }
	    .search form.example button {
	        float: right;
	        width: 15%;
	        color: #FFFFFF;
	        font-size: 15px;
	        border: none;
	        border-left: none;
	        cursor: pointer;
	        border-radius: 0 5px 5px 0;
	        background-color: #0B7DDA;
	        padding: 10.8px 10px 10.8px 10px;
	    }
	    .search form.example button:hover {
	        opacity: 0.8;	    }
	    .search form.example::after {
	        content: "";
	        clear: both;
	        display: table;
	    }
		#errormsg{
			color: red;
			font-size: 14px;
		}
		#searchhead{
			width: 95%;
			font-size: 15px;
			padding: 10px 0 0 2.5%;
			font-family: 'Open Sans', sans-serif;
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

			<div class="search">
				<form class="example" id="searchForm">
					<input type="text" id="query" name="query" placeholder="Friends name..." required/>
					<button id="addintrests" type="submit" name="submit"><i class="fa fa-search"></i></button>
				</form>
				<p id="errormsg"></p>
			</div>

			<p id="searchhead">Popular Area</p>
			<span id="searchResult"></span>

			<span id="popularArea"></span>
<!-- 			<a href="<?php echo $baseurl; ?>/home/location?name='Bhagada'&lcode='6'" class="link">
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
			</a> -->

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

		$('#searchForm').on('submit',function(e){
  			e.preventDefault();
  			var query = $('#query').val();
			$.ajax({
				url: "<?php echo $baseurl; ?>/home/ajax/searcharea",
				type: "POST",
				data: {query: query},
				cache: false,
				success: function(data){
					$('#slams').hide();
					$('#searchResult').html(data);
				}
			});
  		});

		$.ajax({
			url: "<?php echo $baseurl; ?>/home/ajax/explore",
			type: "POST",
			data: {},
			cache: false,
			success: function(data){
				$('#slams').hide();
				$('#popularArea').html(data);
			}
		});


	</script>
</body>
</html>
<?php } ?>