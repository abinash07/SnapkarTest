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
			margin: 35px 5% 10px 5%;

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
		.addp input[type=text], input[type=file]{
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
			color: #FFFFFF;
			outline: none;
			border-radius: 0 0 5px 5px;
			-webkit-transition: 0.5s;
			transition: 0.5s;
			padding: 1px 5px;
			box-sizing: border-box;
			font-size: 20px;
			line-height: 1.5;
			font-family: 'Roboto', sans-serif;
			border-color: Transparent; 
			background-color: rgba(0, 0, 0, 0.2);
			resize: none;
		}

		select{
			width: 100%;
			padding: 10px 10px;
			border: 1px solid #F0F0F0;
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
		.facelogimg{
			width: 100%;
			position: relative;
		}
		.facelogimg img{
			width: 100%;
			border-radius: 5px;
		}
		.flashbutton2  {
			position: absolute;
			bottom: 4px;
			width: 100%;
		    font-family: 'Roboto', sans-serif;
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
		<div id="cover"></div>
		<article>
			<?php
				$selectedYear = $_GET['year'];
				$totalYear = array();
				$query = "SELECT YEAR(dob) as year FROM aboutme WHERE userid='$slamuserid'";
				$run = mysqli_query($con, $query);
				$row = mysqli_fetch_array($run);

				$initialYear = $row['year'];
				$yearsAfter = 5;
				$currentYear = date("Y");
				$sl = $currentYear - $initialYear;
				for ($year = $currentYear; $year >= $initialYear + $yearsAfter; $year--) {
					$totalYear[$sl] = $year;
				$sl--; }

				$query = "select year,image from facelog where userid='$slamuserid' and year = '$selectedYear'";
				$run = mysqli_query($con,$query);
				$row = mysqli_fetch_array($run);
				$oldimage = $row['image'];
				
			?>
			<div class="addp">
				<!-- <p id="formhead">Create New Slam</p> -->
				
				<div class="flashimg" style="display: block;">
					<lable>Select Year</lable>
					<select name="year" id="year" disabled>
						<option value="">---Select---</option>
						<?php foreach($totalYear as $k => $v){ ?>
							<option value="<?= $k; ?>" <?php if($k == $selectedYear){ ?>selected<?php } ?>><?= $k; ?> Year, <?= $v; ?></option>
						<?php } ?>
					</select>

					<lable>Relationship Status</lable>
					<input type="file" name="img-input" id="img-input" required>
				</div>

				<div class="logpreview" style="display: none;">
					<div class="facelogimg">
						<img id="facelogpreviews" src="<?php echo $baseurl; ?>/userprofile/img.jpeg">
						<div class="flashbutton2">
			          		<textarea style="display: block;" rows="3" name="imgtext" id="imgtext" placeholder="Say Someting"></textarea>
			        	</div>
					</div>
					<p id="errormsg"></p>
					<button id="facelogBtn"><div id="loader"><div class="spnier"></div></div> UPDATE</button>
				</div>
				
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


		var $uploadCrop,
		rawImg;

		var quality = 0.8;

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
				//uploadProfilePicture(resp);
				destroyCroppie();
				$('.flashimg').css('display','none');
				$('.logpreview').css('display','block');
				$('#facelogpreviews').attr('src',resp);
			});
		});


		function destroyCroppie() {
		  	if($uploadCrop){
		    	$uploadCrop.croppie('destroy');
		    	$uploadCrop = null;
		    	$('#img-input').val(null);
		    	$('#cropModal').css('display','none');
		  	}
		}

		function closeit(modalId){
			destroyCroppie();
		}


		$('#facelogBtn').on('click',function(e){
			e.preventDefault();

			var year = $('#year').val();
			var image = $('#facelogpreviews').attr('src');
			var imgtext = $('#imgtext').val();
			var del = "<?php echo $oldimage; ?>";

			$.ajax({
				url : "ajax/editlog",
				type : "POST",
				data : {year: year, image: image, imgtext: imgtext, del: del},
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