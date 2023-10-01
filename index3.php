<?php session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require_once('toplinks.php'); ?>
	<style>

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
			font-size: 14px;
			color: #0B7DDA;
			padding-top: -100px;
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



		#maplocal{
			font-size: 14px;
			padding: 15px 0 15px 2.5%;
			font-family: 'Open Sans', sans-serif;
		}
		.story-header {
			display: flex;
			align-items: center;
			overflow-x: scroll;
			width: 97.5%;
			margin-right: 2.5%;
		}
		.story-header a{
			text-decoration: none;
			color: #000000;
		}
		.story-items {
			display: flex;
		}
		#mapicon{
			font-size: 30px;
			padding-left: 15px;
			padding-top: 5px;
		}
		.story-item {
			display: flex;
			flex-direction: column;
			align-items: center;
			cursor: pointer;
			width: 100px;
		}
		.story-avatar{
			border: 1px solid #F0F0F0;
			border-radius: 100%;
			background-color: #F0F0F0;
			height: 50px;
			width: 50px;
		}
		.story-user {
			margin-top: 5px;
			text-align: center;
		}
		.story-user p {
			margin: 0;
			font-size: 12px;

		}
		.story-user .story-time {
			font-size: 14px;
			color: #999;
		}
		.story-header::-webkit-scrollbar{
			display: none;
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
			.lastspace{
				width: 22.5%;
			}
			.story-header{
				width: 95%;
				margin-left: 2.5%;
			}
		}
	</style>
</head>
<body>

<?php require_once('topbar.php'); ?>
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




		<p id="maplocal">Nearest space</p>
		<div class="story-header">
		 	<div class="story-items">
		 		<a href="home/slam">
			    <div class="story-item">
			     	<div class="story-avatar">
			    		<p id="mapicon"><i class="fa fa-map-marker fa-gradient"></i></p>
			    	</div>
			    	<div class="story-user">
			        	<p>Bhagada<span id="verified"><i class="fa fa-check-circle"></i></span></p>
			    	</div>
			    </div>
			</a>

			    <div class="story-item">
			     	<div class="story-avatar">
			    		<p id="mapicon"><i class="fa fa-map-marker fa-gradient"></i></p>
			    	</div>
			    	<div class="story-user">
			        	<p>Bhagada</p>
			    	</div>
			    </div>

			    <div class="story-item">
			     	<div class="story-avatar">
			    		<p id="mapicon"><i class="fa fa-map-marker fa-gradient"></i></p>
			    	</div>
			    	<div class="story-user">
			        	<p>Bhagada</p>
			    	</div>
			    </div>

			    <div class="story-item">
			     	<div class="story-avatar">
			    		<p id="mapicon"><i class="fa fa-map-marker fa-gradient"></i></p>
			    	</div>
			    	<div class="story-user">
			        	<p>Bhagada</p>
			    	</div>
			    </div>

			    <div class="story-item">
			     	<div class="story-avatar">
			    		<p id="mapicon"><i class="fa fa-map-marker fa-gradient"></i></p>
			    	</div>
			    	<div class="story-user">
			        	<p>Bhagada</p>
			    	</div>
			    </div>


			    <div class="story-item">
			     	<div class="story-avatar">
			    		<p id="mapicon"><i class="fa fa-map-marker fa-gradient"></i></p>
			    	</div>
			    	<div class="story-user">
			        	<p>Bhagada</p>
			    	</div>
			    </div>


			    <div class="story-item">
			     	<div class="story-avatar">
			    		<p id="mapicon"><i class="fa fa-map-marker fa-gradient"></i></p>
			    	</div>
			    	<div class="story-user">
			        	<p>Bhagada</p>
			    	</div>
			    </div>


			    <div class="story-item">
			     	<div class="story-avatar">
			    		<p id="mapicon"><i class="fa fa-map-marker fa-gradient"></i></p>
			    	</div>
			    	<div class="story-user">
			        	<p>Bhagada</p>
			    	</div>
			    </div>



			    <div class="story-item">
			     	<div class="story-avatar">
			    		<p id="mapicon"><i class="fa fa-map-marker fa-gradient"></i></p>
			    	</div>
			    	<div class="story-user">
			        	<p>Bhagada</p>
			    	</div>
			    </div>


			    <div class="story-item">
			     	<div class="story-avatar">
			    		<p id="mapicon"><i class="fa fa-map-marker fa-gradient"></i></p>
			    	</div>
			    	<div class="story-user">
			        	<p>Bhagada</p>
			    	</div>
			    </div>

			    <div class="story-item">
			     	<div class="story-avatar">
			    		<p id="mapicon"><i class="fa fa-map-marker fa-gradient"></i></p>
			    	</div>
			    	<div class="story-user">
			        	<p>Bhagada</p>
			    	</div>
			    </div>


			    <div class="story-item">
			     	<div class="story-avatar">
			    		<p id="mapicon"><i class="fa fa-map-marker fa-gradient"></i></p>
			    	</div>
			    	<div class="story-user">
			        	<p>Bhagada</p>
			    	</div>
			    </div>


			    <div class="story-item">
			     	<div class="story-avatar">
			    		<p id="mapicon"><i class="fa fa-map-marker fa-gradient"></i></p>
			    	</div>
			    	<div class="story-user">
			        	<p>Bhagada</p>
			    	</div>
			    </div>


			    <div class="story-item">
			     	<div class="story-avatar">
			    		<p id="mapicon"><i class="fa fa-map-marker fa-gradient"></i></p>
			    	</div>
			    	<div class="story-user">
			        	<p>Bhagada</p>
			    	</div>
			    </div>


			    <div class="story-item">
			     	<div class="story-avatar">
			    		<p id="mapicon"><i class="fa fa-map-marker fa-gradient"></i></p>
			    	</div>
			    	<div class="story-user">
			        	<p>Bhagada</p>
			    	</div>
			    </div>

			</div>
		</div>






			<div class="member">
				<p>Peoples in this area</p>
				<div class="pages" id="allpages">

			</div>


		</article>
	</section>
	<?php include('bottom.php'); ?>

	<script>
		function allpages(offset){
			$.ajax({
				url : "ajax/allpages",
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