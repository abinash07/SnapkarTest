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
		.addp{
			width: 90%;
			margin:10px 5%;

		}

		#formhead{
			padding-top: 15px;
			text-align: center;
			font-family: 'Open Sans', sans-serif;
		}
		form lable{
			color: #262626;
			font-size: 14px;
			font-family: 'Open Sans', sans-serif;
		}
		.addp input[type=text], input[type=date]{
			width: 100%;
			color: #495057;
			padding: 12px 10px;
			margin: 10px 0 20px 0;
			display: inline-block;
			border: 1px solid #F0F0F0;
			box-sizing: border-box;
			outline: none;
			border-radius: 5px;
			-webkit-transition: 0.5s;
			transition: 0.5s;
		}
		.addp input:focus { 
			border-color: #0b7dda;
			box-shadow: 0 0 10px #0b7dda;
		}
		.addp textarea{
			width: 100%;
			color: #495057;
			margin-top: 10px;
			margin-bottom: 20px;
			border: 1px solid #F0F0F0;
			outline: none;
			border-radius: 5px;
			-webkit-transition: 0.5s;
			transition: 0.5s;
			padding: 12px 10px;
			box-sizing: border-box;
			font-size: 14px;
			line-height: 1.5;
			font-family: 'Roboto', sans-serif;
		}
		.addp textarea:focus { 
			border-color: #0b7dda;
			box-shadow: 0 0 10px #0b7dda;
		}
		select{
			width: 100%;
			padding: 12px 10px;
			border: 1px solid #ccc;
			margin-bottom: 15px;
			margin-top: 5px;
			cursor : pointer;
			outline: none;
			border-radius: 5px;
			-webkit-transition: 0.5s;
			transition: 0.5s;
			background-color: #FFFFFF;
			font-family: 'Roboto', sans-serif;
		}
		select:focus { 
			border-color: #0b7dda;
			box-shadow: 0 0 10px #0b7dda;
		}
		.addp button{
			background-color: #1877F2;
			color: white;
			padding: 12px 20px;
			border: none;
			cursor: pointer;
			text-align: center;
			width: 100%;
			margin: 10px 0 15px 0;
			border-radius: 5px;
			position: relative;
		}
		.addp button:hover {
			opacity: 0.8;
		}
		#errormsg{
			color: red;
			font-size: 14px;
		}
		#information {
		    color: #8E8E8E;
		    font-size: 12px;
		    margin: -10px 0 20px 0;
		}




		#heading{
			font-size: 15px;
			padding: 0 0 15px 0;
			font-family: 'Open Sans', sans-serif;
		}
		#introl {
		    float: right;
		}

		.addflash{

		}
		.adddialogue{
			width: 90%;
			margin: 10px 5%;
		}

		.search {
		    width: 100%;
		    box-sizing: border-box;
		}
		.search form {
		    text-align: center;
		    box-sizing: border-box;
		    border: 1px solid #F0F0F0;
		    border-radius: 5px;
		}
		.search form.example input[type=text] {
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
		    padding: 7.3px 10px 7.3px 10px;
		    background: #f1f3f8;
		    color: #c5c5c5;
		    font-size: 21px;
		    border: none;
		    border-left: none;
		    cursor: pointer;
		    border-radius: 0 5px 5px 0;
		}
	    .search form.example button:hover {
	        background: #F0F0F0;
	    }
		.search form.example::after {
		    content: "";
		    clear: both;
		    display: table;
		}
		.dialoguebox{
			width: 90%;
			margin: 20px 5% 0 5%;
			height: 200px;
			overflow-y: scroll;
		}
		.dialoguebox pre{
			white-space: pre-wrap;
			overflow: auto;
			padding: 10px 10px 10px 10px;
			text-align: left;
			line-height: 1.5;
			overflow: hidden;
			font-family: 'Roboto', sans-serif;
			color: #262626;
			font-size: 14px;
			background-color: #F0F0F0;
			margin-bottom: 10px;
			margin-right: 10px;
			border-radius: 3px;
		}








.addnewflash{
  width: 95%;
  margin: 10px 2.5% 40px 2.5%;
  border-radius: 5px;
  box-shadow: 0 1px 3px #c7c7c7;
  display: inline-block;
}
.flashpreview{
  width: 95%;
  margin: 15px 2.5% 10px 2.5%;
  overflow: hidden;
  position: relative;
}
.flashpreview img{
  width: 100%;
  height: auto;
  border-radius: 5px;
  margin-top: 15px;
}
.snapdialog{
  position: absolute;
  width: 100%;
  bottom: 5px;
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
#addflashBtn {
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
.addnewflash:after {
  content: "";
  display: table;
  clear:both;
}







		.skimagecrop{
			width: 100%;
			border-radius: 5px;
		}

		#formhead{
			padding-top: 15px;
			padding-bottom: 15px;
			text-align: center;
			font-family: 'Open Sans', sans-serif;
		}
		#upload-demo{
			width: 100%;
			height: 400px;
		  padding-bottom: 40px;
		}
		.skimagecrop button{
			background-color: #1877F2;
			color: white;
			padding: 12px 20px;
			border: none;
			cursor: pointer;
			text-align: center;
			width: 95%;
			margin: 10px 2.5%;
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


/*******************************************For loader***************************************/
		#cover{
		    position: absolute;
		    left: 0;
		    top: 0;
		    width: 100%;
		    height: 100%;
		    z-index: 100;
		    display: none;
		}
		#loader{
		    position: absolute;
		    top: calc(50% - 13px);
		    left: calc(50% - 80px);
		    border-radius: 4px;
		    display: none;
		}
		.spnier {
		    border: 5px solid #f3f3f3;
		    border-radius: 50%;
		    border-top: 5px solid #3498db;
		    width: 25px;
		    height: 25px;
		    -webkit-animation: spin 1s linear infinite;
		    animation: spin 1s linear infinite;
		}
		@-webkit-keyframes spin {
		    0% { -webkit-transform: rotate(0deg); }
		    100% { -webkit-transform: rotate(360deg); }
		}
		@keyframes spin {
		    0% { transform: rotate(0deg); }
		    100% { transform: rotate(360deg); }
		}
		/*******************************************Loader End***************************************/
		@media only screen and (min-width: 750px) {
			article{
				width: 50%;
				float: left;
				margin-left: 22%;
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
		<div id="cover"></div>
		<div class="addflash" style="display : block">
			<div class="addp">
				<lable id="b">Write dialog  <span id="CheckUsername"></span> <span id="introl"><i id="flahicon" onclick="chooseImage();" class="fa fa-long-arrow-right"></i></span></lable>
				<textarea rows="2" name="dialogue" id="dialogue" placeholder="Write your own dialog or select from movies"></textarea>

				<input type="file" id="img-input" style="display: none; visibility: hidden; width: 1px;" accept="image/png, image/gif, image/jpeg"/>
			</div>
			<div class="adddialogue">
				<p id="heading">Select dialogue</p>
			    <div class="search">
					<form class="example" id="search_form">
						<input type="text" id="query" name="query" placeholder="Search something...">
						<button id="searchpost" type="submit" name="submit"><i class="fa fa-search"></i></button>
					</form>
				</div>
			</div>
			<div class="dialoguebox" id="dialoguebox">
		    </div>
		</div>

		<div class="addnewflash" id="addnsnap" style="display: none;">

		  <div class="flashpreview" id="flashimgpreview">
		    <img id="uploadpreview" src="">
		    <div class="snapdialog">
		      <pre id="snapdialog"></pre>
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
		  
		  <button id="addflashBtn"><div id="loader"><div class="spnier"></div></div> UPDATE</button>
		</div>




		<div class="sk-modal" id="cropModal">
			<div id="cover"> </div>
			<div class="modal-body" id="modal-more">
					<div class="modal-close" onclick='closeit();'><i class="fa fa-times"></i></div>

					<div class="skimagecrop">
						<p id="formhead">Crop</p>
						<div id="upload-demo" class="center-block" style="display: block;"></div>


						<p id="errormsg"></p>

						<button type="button" id="cropImageBtn" class="btn btn-primary">
							<div id="loader"><div class="spnier"></div></div> Upload
						</button>

					</div>

			</div>
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

  		$.ajax({
		    url : "ajax/dialogues",
		    type : "POST",
		    cache: false,
		    beforeSend: function () {
		      //$(".loader3").show();
		    },
		    success: function(data){
		      $("#dialoguebox").append(data);
		      // $("#myslambook").html("Search Results")
		    },
		    complete: function () {
		      //$(".loader3").hide();
		    }
		});
		function selectdialog(text){
		    $("#dialogue").val(text);
		    $('#snapdialog').html(text);
		}





		var $uploadCrop,
		rawImg;

		var quality = 0.8;

		function chooseImage(){
			document.getElementById('img-input').click();
		}


		$('#img-input').on('change', function (ev) {

			var userImage = document.getElementById('img-input');
			var filename = userImage.value;
			if(filename!=''){
				var extdot = filename.lastIndexOf(".")+1;
				var image_ext = filename.substr(extdot,filename.lenght).toLowerCase();
				if (image_ext == "jpg" || image_ext == "jpeg" || image_ext == "png" || image_ext == "gif"|| image_ext == "jgfif") {

					$uploadCrop = $('#upload-demo').croppie({
						viewport: {
							width: 300,
							height: 300,
							//type: 'circle'
						},
						enforceBoundary: true,
						enableExif: true,
						mouseWheelZoom: false,
					});


					const file = ev.target.files[0];
					const blobURL = URL.createObjectURL(file);
					const skimg = new Image();
					skimg.src = blobURL;

					skimg.onload = function () {
						$('#cropModal').css('display','block');
			      $uploadCrop.croppie('bind', {
			          url: blobURL
			      }).then(function () {
			          console.log('jQuery bind complete');
			      });
			    };

				}else{
					$("#modal").show();
					$("#pm").html("Only jpg, jpeg, png, gif file allow to upload.");
				}
			}
		});


		$('#cropImageBtn').on('click', function (ev) {

			$uploadCrop.croppie('result', {
				type: 'base64',
				format: 'jpeg',
				//size: {width: 150, height: 180},
				size: 'original',
				quality: quality
			}).then(function (resp) {
				$('.addflash').css('display','none');
				$('.addnewflash').css('display','block');
				$('#uploadpreview').attr('src', resp);
				
				$('#cropModal').css('display','none');

				//uploadProfilePicture(resp);
			});
		});


		function destroyCroppie() {
		  if ($uploadCrop) {
		    $uploadCrop.croppie('destroy');
		    $uploadCrop = null;
		    $('#img-input').val(null);
		    $('#cropModal').css('display','none');
		  }
		}

		function closeit(modalId){
			destroyCroppie();
		}



		$('#addflashBtn').on('click',function(e){
			e.preventDefault();

			var dialogue = $('#dialogue').val();
			var image = $('#uploadpreview').attr('src');


			$.ajax({
				url : "ajax/addflash",
				type : "POST",
				data : {image: image, dialogue: dialogue},
				dataType: 'JSON',
				cache: false,
				beforeSend: function(){
					$("#cover").show();
		      		$("#loader").show();
				},
				success: function(data){
					if(data.status == true){
		        		location.href="myaccount";
					}else{
						$("#errormsg").html("*Something Error Please Try After Some Time Later.");
					}
				},
				complete: function(){
					$("#cover").hide();
		      		$("#loader").hide();
				}
			});
		});

	</script>
</body>
</html>
<?php } ?>