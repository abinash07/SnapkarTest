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

		
		.spaces{
			width: 97.5%;
			border-radius: 5px;
			margin: 25px 0 15px 2.5%;
		}
		.spaces a{
			color: #262626;
		}
		#spacehaed{
			padding-bottom: 15px;
			font-family: 'Open Sans', sans-serif;
		}
		.lastspace{
			float: left;
			width: 47.5%;
			margin-right: 2.5%;
			margin-bottom: 2.5%;
			box-shadow: 0 1px 3px #c7c7c7;
    		border-radius: 5px;
    		text-align: center;
		}
		#lastspaceicon{
			font-size: 50px;
			padding-top: 15px;
		}
		#lastspacetext{
			font-size: 14px;
			padding-bottom: 5px;
			font-family: 'Open Sans', sans-serif;
		}
		#peoples{
			font-size: 12px;
			padding-bottom: 15px;
		}
		.fa-gradient {
			background: -webkit-gradient(linear, left top, left bottom, from(#D50F0F), to(#f00));
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
		}
		#verified{
			font-size: 11px;
			color: #0B7DDA;
			margin-left: 5px;
		}
		.peoples{
			color: #0b7dda;
		}
		.spaces::after {
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
			.slamprofile{
				width: 14.1%;
				height: 200px;
				margin: 0 2.5% 2.5% 0;
			}
			.slamprofile img{
				width: 100%;
				height: 200px;
				/*object-fit: cover;*/
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

			<div class="member">
				<p id="searchhead1" style="display: none;">Peoples in this area</p>
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

		$('#searchForm').on('submit',function(e){
  			e.preventDefault();
  			var query = $('#query').val();
			$.ajax({
				url: "<?php echo $baseurl; ?>/home/ajax/search",
				type: "POST",
				data: {query: query},
				cache: false,
				success: function(data){
					$('#slams').hide();
					$('#allpages').html(data);
					$('#searchhead1').show();
				}
			});
  		});
	</script>
</body>
</html>
<?php } ?>