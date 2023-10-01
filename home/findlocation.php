<?php
session_start();
if(!isset($_SESSION["sbuserid"])){
header("location:../login");
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
		#hometown{
			margin: 15px 0 0 2.5%;
			font-size: 14px;
			font-family: 'Open Sans', sans-serif;
		}
		.rightlink{
			float: right;
			margin-right: 2.5%;
			text-decoration: none;
			color: #262626;
		}
	#cityicon{
		color: #0B7DDA;
	}
	#link{
		color: #262626;
		text-decoration: none;
	}
	.search{
        width: 100%;
        box-sizing: border-box;
        padding: 1px 0 1px 0;
        margin-top: 10px;
    }
    .search form{
        margin: 0 2.5% 10px 2.5%;
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
        border-radius: 5px;
        outline: none;
        box-sizing: border-box;
    }
    .search form.example button {
        float: right;
        width: 15%;
        padding: 7.3px 10px 7.3px 10px;
        background: #0B7DDA;
        color: #FFFFFF;
        font-size: 21px;
        border: none;
        border-left: none;
        cursor: pointer;
        border-radius: 0 5px 5px 0;
    }
    .search form.example button:hover {
        background: #1778C7;
    }
    .search form.example::after {
        content: "";
        clear: both;
        display: table;
    }
    .mylocation{
    	width: 100%;
    	margin: 10px 0 10px 0;
    }
    #addmylocation{
    	color: #0B7DDA;
    	padding-bottom: 10px;
    }
    .mylocation hr{
		width: 100%;
		border: solid #F0F0F0;
		border-width: 1px 0 0;
		margin-top: 15px;
		margin-bottom: 15px;
	}
	.mylocation a{
		text-decoration: none;
		color: #000000;
	}
	#lnote{
		font-size: 12px;
		color: #ccc;
		line-height: 1.5;
	}
	.searchcity{
		width: 95%;
		margin: 0 2.5%;
		line-height: 1.8;
	}
	.searchcity p{
		font-size: 14px;
	}
	
		@media only screen and (min-width: 750px) {
			article{
				width: 52%;
				float: left;
				margin-left: 18%;
			}
			.both{
				width: 95%;
				margin: 0 2.5% 20px 2.5%;
				display: inline-block;
				height: 60px;
				overflow: hidden;
			}
			.search{
				width: 100%;
				float: left;
				padding: 0;
			}
			.search form{
				margin: 0;
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
		$verify = $row['verify'];

	?>
	<div class="top">
		<p id="bar" onclick="opennav()" ><i class="fa fa-long-arrow-left"></i></p>
		<a id="snap" href="<?php echo $baseurl; ?>/index">Location</a>
		<a id="img" href="<?php echo $baseurl; ?>/home/myaccount"><img id="uimage" src="<?php echo $baseurl; ?>/assets/image/noimg.jpg"></a>
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

			<p id="hometown"><i class="fa fa-home"></i> Home town <!-- <a class="rightlink" href="addnewlocation"><i id="cityicon" class="fa fa-plus"></i> Add my location</a> --></p>
			<div class="both">
				<div class="search">
				  <form class="example" id="search_form">
				   <input type="text" id="location" name="location" placeholder="Search city, state, local area..."/>
				   <button id="locationBtn" type="submit" name="submit"><i class="fa fa-search"></i></button>
				  </form>
				</div>
			</div>


			<div class="searchcity">
				<div class="spnier">
				  <div class="divloader">
				    <div class="spin"></div>
				  </div>
				</div>
				<div id="citylist"></div>
			</div>


		</article>
	</section>
	<?php include('../bottom.php'); ?>
	<script>
		const opennav = () =>{
			history.go(-1);
		}

		$(document).ready(function(){
			$("#locationBtn").on("click",function(e){
			e.preventDefault();
			var location = $("#location").val();
				$.ajax({
					url : "ajax/findlocation",
					type : "POST",
					data : {location: location},
					cache: false,
					beforeSend: function () {
						$(".spnier").show();
					},
					success: function(data){
						$('#citylist').html(data);
					},
					complete: function () {
						$(".spnier").hide();
					}
				});
			});


		});

		$(document).ready(function(){
	  		if(localStorage.getItem("sbtoken") === null){
	    		location.href="login";
	  		}else{
			    const userdata = JSON.parse(localStorage.getItem("sbtokenp"));
			    var uimgdata="<?php echo $baseurl; ?>/userprofile/"+userdata.image;
			    $("#uimage").prop("src",uimgdata);
	  		}
		});
	</script>
</body>
</html>
<?php } ?>