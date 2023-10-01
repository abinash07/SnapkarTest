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
		.addp{
			width: 95%;
			margin:10px 2.5%;
			border-radius: 5px;
			box-shadow: 0 1px 3px #c7c7c7;
			/*border-bottom: 1px solid #e3e6ef;*/
		}
		.addp form{
			width: 95%;
			margin: 10px 2.5%;
			text-align: center;
		}
		#formhead{
			padding-top: 15px;
			text-align: center;
			font-family: 'Open Sans', sans-serif;
		}
		.addp img{
			width: 150px;
			height: 150px;
			margin: 0 0 20px 0;
			border-radius: 100%;
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
			color: #495057;
			margin-top: 10px;
			margin-bottom: 10px;
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
		.radio{
			padding: 10px 0;
		}
		.flashbutton2{
			width: 100%;
			margin: 10px 0 10px 0;
			border: 1px solid #F0F0F0;
			border-radius: 5px;
		}
		.flashbutton2 p{
			padding: 10px 2.5%;
		}
		.fa-photo{
			color: #1877F2;
		}
		#uploadpreview{
			width: 100px;
			height: 100px;
		}
		canvas{
			border: 1px solid red;
			display: none;
		}
		#errormsg{
			color: red;
			font-size: 14px;
		}
		@media only screen and (min-width: 750px) {
			article{
				width: 40%;
				float: left;
				margin-left: 22%;
			}
			.addp{
				margin-top: 15px;
			}
			.addp img{
				width: 210px;
				height: 210px;
				margin: 0 0 20px 0;
				border-radius: 100%;
			}
		}
	</style>
</head>
<body>
	<?php
		require_once('../connect.php');
		$slamuserid = $_SESSION["sbuserid"]; 
	?>
	<div class="top">
		<p id="bar" onclick="opennav()" ><i class="fa fa-long-arrow-left"></i></p>
		<a id="snap" href="<?php echo $baseurl; ?>/index">Profile picture</a>
		<a id="img" href="<?php echo $baseurl; ?>/home/myaccount"><img class="uimage" src="<?php echo $baseurl; ?>/assets/image/noimg.jpg"></a>
		<a id="card" href="menu"><i class="fa fa-th"></i></a>
		<a id="top29" href="index">Search</a>
		<a id="top29" href="home/addpost">New Post</a>
		<a id="top29" href="home/explore">Explore</a>
		<a id="top29" href="index">Home</a>
	</div>
	<div class="space"></div>

	<div id="cover"></div>
	<div id="modal">
	  <div id="modal-form">
	    <h2>Message !!</h2>
	    <p id="pm"></p>
	    <div id="close-btn">Ok</div>
	    <div id="right-btn"><i class="fa fa-check"></i></div>
	  </div>
	</div>
	<canvas id="canvas"></canvas>

	<section>
		<div class="leftbar">
			<?php include('../leftbar.php'); ?>
		</div>
		<article>
			<div class="addp">
				<p id="formhead">Upload your profile image</p>
				<form id="profileForm">

					<img class="uimage" src="<?php echo $baseurl; ?>/assets/image/noimg.jpg" id="preview">
					<input type="file" name="img-input" id="img-input" required>

					<textarea rows="2" style="display: none;" name="text" id="text"></textarea>
					<input type="hidden" name="imgsize" id="imgsize">

					<p id="errormsg"></p>
					<button type="submit" name="submit"><div id="loader"><div class="spnier"></div></div>UPDATE</button>
				</form>
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


		var quality = 0.8;
		var input = document.getElementById("img-input");
		input.onchange = function(ev){

			var userImage = document.getElementById('img-input');
			var filename = userImage.value;

			$("#cover").show();
			$("#loader").show();
			
			if(filename==''){
			    $("#cover").hide();
			    $("#loader").hide();
			}
			if(filename!=''){
				var extdot = filename.lastIndexOf(".")+1;
				var image_ext = filename.substr(extdot,filename.lenght).toLowerCase();
				if (image_ext == "jpg" || image_ext == "jpeg" || image_ext == "png" || image_ext == "gif") {

					const file = ev.target.files[0];
					const blobURL = URL.createObjectURL(file);
					const img = new Image();
					img.src = blobURL;
					$("#preview").attr('src',blobURL);

					var size = file.size;

					if(size <= 50000000){

						if(size <= 10000000){
							quality=0.8;
						}
						if(size >= 20000000){
							quality=0.7;
						}
						if(size >= 40000000){
							quality=0.6;
						}

						img.onload = function () {
						    $("#cover").hide();
						    $("#loader").hide();

							var myimg = document.getElementById('preview');
							var type = file.type;
							var ow = this.width;
							var oh = this.height;

							if(ow >= 500){
								var factor = 900;
								var sum = Math.floor(ow+oh);
								var nwa = ow/sum;
								var nw = Math.floor(nwa*factor);
								var nha = oh/sum;
								var nh = Math.floor(nha*factor);
							}else if(ow >= 12000){
								var factor = 500;
								var sum = Math.floor(ow+oh);
								var nwa = ow/sum;
								var nw = Math.floor(nwa*factor);
								var nha = oh/sum;
								var nh = Math.floor(nha*factor);
							}else{
								var nw = ow;
								var nh = oh;
							}

										    console.log("New Width:", nw);
			    				console.log("New Height:", nh);


							var canvas = document.getElementById("canvas");
							canvas.width = nw;
							canvas.height = nh;
							var ctx = canvas.getContext("2d");
							ctx.filter = 'none';
							ctx.drawImage(myimg, 0, 0, nw, nh);

							$("#imgsize").val(quality);
						};
					}
				}else{
					$("#cover").hide();
			        $("#loader").hide();
					$("#modal").show();
					$("#pm").html("Only jpg, jpeg, png, gif file allow to upload.");
				}

			}
		};


		$("#close-btn").on("click",function(){
		  $("#modal").hide();
		});



		$("#profileForm").submit(function(e){
		e.preventDefault();
			var imgsize = $("#imgsize").val();
			var canvas = document.getElementById("canvas");
			var image = canvas.toDataURL("image/jpeg",imgsize);
			var image1 = $("#img-input").val();

			var delimg = uimgdata;
			var extshals = delimg.lastIndexOf("/")+1;
			var del = delimg.substr(extshals,delimg.lenght);


			

			if(image1 !== ''){
				$.ajax({
					url : "ajax/editprofile",
					type : "POST",
					data : {image: image, del: del},
					dataType: 'JSON',
					cache: false,
					beforeSend: function(){
						$("#cover").show();
			            $("#loader").show();
					},
					success: function(data){
						if(data.status == true){
							console.log(data);
							const userdata = JSON.parse(localStorage.getItem("sbtokenp"));
							var updateJsonData = {
								bio : userdata.bio,
								bluetick : userdata.bluetick,
								home: userdata.home,
								image: data.result,
								living: userdata.living,
								name: userdata.name,
								userid: userdata.userid,
								username: userdata.username,
								verify: userdata.verify
							};
							localStorage.setItem('sbtoken',JSON.stringify(updateJsonData));
			          		localStorage.setItem('sbtokenp',JSON.stringify(updateJsonData));

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
			}else{
				alert("Please Fill The Form Correctly");
			}
		});
	</script>
</body>
</html>
<?php } ?>