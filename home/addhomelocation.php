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
		}
		.addp form{
			width: 95%;
			margin: 10px 2.5%;
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

    .mylocation{
    	width: 95%;
    	margin: 10px 2.5% 10px 2.5%;
    }
    #addmylocation{
    	color: #0B7DDA;
    	padding-top: 10px;
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
		$query = "select * from user where userid='$slamuserid'";
		$run = mysqli_query($con,$query);
		$row = mysqli_fetch_array($run);
		$name = $row['name'];
		$username = $row['username'];
		$userid = $row['userid'];
		$image = $row['image'];
		$verify = $row['verify'];

	?>
	<div class="top">
		<p id="bar" onclick="opennav()" ><i class="fa fa-long-arrow-left"></i></p>
		<a id="snap" href="<?php echo $baseurl; ?>/index">My account</a>
		<a id="img" href="<?php echo $baseurl; ?>/home/myaccount"><img src="<?php echo $baseurl; ?>/userprofile/<?php echo $image; ?>"></a>
		<a id="card" href="menu"><i class="fa fa-th"></i></a>
		<a id="top29" href="index">Search</a>
		<a id="top29" href="home/addpost">New Post</a>
		<a id="top29" href="home/explore">Explore</a>
		<a id="top29" href="index">Home</a>
	</div>
	<div class="space"></div>

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

			<div class="addp">
				<p id="formhead">Create New Slam</p>
				<form id="slam_form">
					<lable>Choose state</lable>
					<select id="state" name="state">
						<option disabled="disabled" selected>-----Select-----</option>
						<?php
							$query2 = "SELECT * FROM state";
							$run2 = mysqli_query($con, $query2);
							while ($row2 = mysqli_fetch_array($run2)){
						?>
							<option value="<?php echo $row2['id'] ?>"><?php echo $row2['name'] ?></option>
						<?php } ?>
					</select>

					<lable>Select city</lable>
					<select id="city" name="city" disabled="disabled">
						<option disabled="disabled" selected>-----Select-----</option>
					</select>

					<lable>Location Name</lable>
					<input type="text" id="sub_city" name="sub_city" placeholder="Enter location name" required disabled="disabled">


					<p id="errormsg"></p>
					<button type="submit" name="submit"><div id="loader"><div class="spnier"></div></div> CREATE</button>
				</form>
			</div>

			<div class="mylocation">
				<p id="lnote">My location not available</p>
				<p id="lnote">Help snicker to discover your location</p>
				<p id="lnote">Earn 10 points</p>
			</div>

		</article>
	</section>
	<?php include('../bottom.php'); ?>
	<script>
		const opennav = () =>{
			history.go(-1);
		}
		$('#state').change(function(){
			$('#city').attr('disabled',false);
			var state_id = $('#state').val();

			$.ajax({
				url : "ajax/findcity",
				type : "POST",
				data: {state_id: state_id},
				cache: false,
				success: function(data){
					$('#city').html(data);
				}
			});
		});

		$('#city').change(function(){
			$('#sub_city').attr('disabled',false);
		});


	    $('#slam_form').submit(function(e){
	    e.preventDefault();

        	var state = $('#state').val();
        	var city = $('#city').val();
        	var sub_city = $("#sub_city").val();

        	if(state !== '' && city !== '' && sub_city !== ''){
				$.ajax({
					url : "ajax/addhomelocation",
					type : "POST",
					data : {state: state, city: city, sub_city: sub_city},
					cache: false,
					beforeSend: function(){
			            $("#cover").show();
			            $("#loader").show();
					},
					success: function(data){
						if(data == 1){
							location.href="editinfo";
						}
						if(data == 2){
							$("#errormsg").html("*This location already added.");
						}
						if(data == 0){
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