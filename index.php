<?php session_start(); ?>
<?php require_once('connect.php'); ?>
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
			margin-top: 1px;
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




		#maplocal{
			font-size: 14px;
			padding: 15px 0 15px 2.5%;
			font-family: 'Open Sans', sans-serif;
		}

		#mapicon{
			font-size: 25px;
			padding-left: 15px;
			padding-top: 11px;
		}
		#mapicon2{
			font-size: 15px;
			padding-left: 10px;
			padding-top: 17px;
		}
		.story-header {
			display: flex;
			align-items: center;
			overflow-x: scroll;
			width: 97%;
			margin: 0 2.5% 0 0.5%;
		}
		.story-header a{
			text-decoration: none;
			color: #000000;
		}
		.story-items {
			display: flex;
		}
		.story-item {
			display: flex;
			flex-direction: column;
			align-items: center;
			cursor: pointer;
			width: 75px;
		}
		.story-avatar{
			border-radius: 100%;
			background-color: #F0F0F0;
			height: 50px;
			width: 50px;
		}
		.story-avatar img{
			height: 50px;
			width: 50px;
			border-radius: 100%;
			object-fit: cover;
    		border: 4px solid #E4E7FA;
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


canvas{
  border: 1px solid red;
  display: none;
}
.addflash{
  border-radius: 5px;
  box-shadow: 0 1px 3px #c7c7c7;
  display: inline-block;
  box-sizing: border-box;
}
.dialogdiv{
	  position: relative;
}
.flashpreview{
  overflow: hidden;
  position: relative;


}
.flashpreview img{
  width: 100%;
  height: auto;
  border-radius: 5px 5px 0 0;
  margin-bottom: -4px;
}
.snapdialog{
  position: absolute;
  width: 100%;
  bottom: 0px;
  border-radius: 0 0 5px 5px;
  background-image: linear-gradient(rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.8));
}
.snapdialog pre{
  white-space: pre-wrap;
  overflow: auto;
  text-align: left;
  line-height: 1.5;
  overflow: hidden;
  font-family: 'Roboto', sans-serif;
  font-size: 24px;
  padding: 10px 2.5% 30px 2.5%;
  color: #FFFFFF;
  margin-bottom: 10px;
  margin-right: 10px;
  border-radius: 3px;
}
.snapbtn{
  width: 95%;
  margin: 15px 2.5% 5px 2.5%;
}
.npbleft{
  float: left;
  margin-right: 5px;
}
.npbright{
  float: left;
}
#npicon{
  color: #0B7DDA;
  font-size: 18px;
}
.snapbtn button{
  border: none;
  border: 1px solid #F0F0F0;
  border-radius: 5px;
  padding: 5px 10px;
  margin-bottom: 10px;
}
.addflash:after {
  content: "";
  display: table;
  clear:both;
}
#addnewsnap {
    background-color: #1877F2;
    color: white;
    padding: 12px 20px;
    margin: 8px 0 15px 0;
    border: none;
    cursor: pointer;
    text-align: center;
    width: 95%;
    margin: 10px 2.5%;
    border-radius: 5px;
}





		#more{
			background: rgba(0,0,0,0.7);
			position: fixed;
			left: 0;
			top:0;
			width: 100%;
			height: 100vh;
			z-index: 1;
			display: none;
			overflow-y: scroll;
		}
		#more::-webkit-scrollbar{
			display: none;
		}

		#modal-more{
			width: 100%;
			position: relative;
			background-color: #FFFFFF;
			top: 45px;
			left: 0;
			padding: 15px;
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
		@media (min-width: 600px){
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
		}

	</style>
</head>
<body>

	<?php require_once('topbar.php'); ?>
	<section>
		<div class="leftbar">
			<?php include('leftbar.php'); ?>
		</div>
		<article>

		<div class="template" id="template"></div>



		<p id="maplocal">Flash</p>


		<div class="story-header">
		 	<div class="story-items">

		 		<a href="javascript:void(0);" onclick="chooseImage()">
				    <div class="story-item">
				     	<div class="story-avatar">
				    		<p id="mapicon"><i class="fa fa-plus fa-gradient"></i></p>
				    	</div>
				    	<div class="story-user">
				        	<p>Create New</p>
				    	</div>
				    </div>
				</a>

		 		<a href="home/slam">
				    <div class="story-item">
				     	<div class="story-avatar">
				    		<img src="userprofile/644cb68d611961682749069.jpeg">
				    	</div>
				    	<div class="story-user">
				        	<p>Bhagada<span id="verified"><i class="fa fa-check-circle"></i></span></p>
				    	</div>
				    </div>
				</a>

				<a href="home/slam">
				    <div class="story-item">
				     	<div class="story-avatar">
				    		<img src="userprofile/644e516892d451682854248.jpeg">
				    	</div>
				    	<div class="story-user">
				        	<p>Bhagada<span id="verified"><i class="fa fa-check-circle"></i></span></p>
				    	</div>
				    </div>
				</a>


				<a href="home/slam">
				    <div class="story-item">
				     	<div class="story-avatar">
				    		<img src="userprofile/644cb68d611961682749069.jpeg">
				    	</div>
				    	<div class="story-user">
				        	<p>Bhagada<span id="verified"><i class="fa fa-check-circle"></i></span></p>
				    	</div>
				    </div>
				</a>

				<a href="home/slam">
				    <div class="story-item">
				     	<div class="story-avatar">
				    		<img src="userprofile/644e516892d451682854248.jpeg">
				    	</div>
				    	<div class="story-user">
				        	<p>Bhagada<span id="verified"><i class="fa fa-check-circle"></i></span></p>
				    	</div>
				    </div>
				</a>

				<a href="home/slam">
				    <div class="story-item">
				     	<div class="story-avatar">
				    		<img src="userprofile/644e516892d451682854248.jpeg">
				    	</div>
				    	<div class="story-user">
				        	<p>Bhagada<span id="verified"><i class="fa fa-check-circle"></i></span></p>
				    	</div>
				    </div>
				</a>


			    <div class="story-item">
			     	<div class="story-avatar">
			    		<p id="mapicon2"><i class="fa fa-plus fa-gradient"></i> 24</p>
			    	</div>
			    	<div class="story-user">
			        	<p>View all</p>
			    	</div>
			    </div>

			</div>
		</div>


		<div class="member">
			<p>Peoples in this area</p>
			<div class="pages" id="allpages">
		</div>

		<canvas id="canvas"></canvas>

		<div id="more">
			<div id="modal-more">

					

					<div class="addflash" id="addnsnap" style="display: block;">
					  <div class="loader3" style="display: none;">
					    <div class="loader2">
					      <div class="loader"></div>
					    </div>
					  </div>
					  <div class="loader1" style="display: none;">
					    <div class="loader2">
					      <div class="loader"></div>
					    </div>
					  </div>


					  	<div class="dialogdiv">
						  	<div class="flashpreview" id="flashimgpreview">
						    	<img src="http://localhost/snickar/userprofile/637f586fbdbd01669290095.jpeg" id="uploadpreview">
						  	</div>
						  	<div class="snapdialog">
						      	<pre id="snapdialog">Powerfull people comes from powerfull place</pre>
						    </div>
					  	</div>


					  <div class="snapbtn">
					    <div class="npbleft">
					        <button id="btChooseImage" onclick="chooseImage();">
					            <span id="npicon"><i class="fa fa-photo"></i></span> 
					            <span id="flashtext">Change photo</span>
					        </button>
					    </div>
					    <div class="npbright">
					        <button onclick="changeDialog();">
					            <span id="npicon"><i class="fa fa-video-camera"></i></span> 
					            <span id="flashtext">Change dialog</span>
					        </button>
					    </div>
					  </div>
					  <input type="file" id="img-input" style="display: none; visibility: hidden; width: 1px;">
					  
<!-- 					  <p id="imgsize" style="display: none">0.8</p>
					  <p id="imgwidth" style="display: none">201</p>
					  <p id="imgheight" style="display: none">251</p>
					  <p id="showsuccess" style="display: none">OK</p> -->
					  <button id="addnewsnap" style="opacity: 1;">POST</button>
					</div>



				<p onclick='closeit();'>Cancel</p>
			</div>
		</div>

		<input type="file" id="img-input" style="display: none; visibility: hidden; width: 1px;" />
		</article>
	</section>
	<?php include('bottom.php'); ?>

	<script>
		// let chooseImage = () => {
		//   	document.getElementById('img-input').click();
		//   	$('#addnsnap').css('display','none');
		// }

		const userdata = JSON.parse(localStorage.getItem("sbtokenp"));
		var uimgdata="<?php echo $baseurl; ?>/userprofile/"+userdata.image;
		$("#uimage").prop("src",uimgdata);
		if(userdata.living == ''){
			location.href="home/findlocation";
		}else{

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


			//chooseImage();

			function chooseImage(){
				document.getElementById('img-input').click();
			}

			  $('#img-input').change(function() {
			    var x = document.getElementById("more");
					x.style.display = "block";
					$('#leftmenuicon').html('<p id="bar" onclick="closeit()"><i class="fa fa-long-arrow-left"></i></p>');	
			  });

			


			function closeit(){
				var x = document.getElementById("more");
				x.style.display = "none";
				$('#leftmenuicon').html('<p id="bar" onclick="opennav()"><i class="fa fa-bars"></i></p>');
			}

		}

	</script>
</body>
</html>
