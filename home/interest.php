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
		#intro{
			font-size: 14px;
			padding: 0 0 5px 0;
			font-family: 'Open Sans', sans-serif;
		}
		.likes{
			width: 95%;
			margin: 5px 2.5% 10px 2.5%;
		}
		.likes a{
			color: #262626;
			text-decoration: none;
		}
		#likes{
			font-size: 14px;
			padding: 5px 10px;
			border-radius: 5px;
			display: inline-block;
			margin: 5px 5px 5px 0;
			background-color: #f0f0f0;
		}
		.likes hr{
			width: 100%;
			border: solid #F0F0F0;
			border-width: 1px 0 0;
			margin: 15px 0 0 0;
		}
		.likes::after {
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
		<p id="bar" onclick="opennav()"><i class="fa fa-long-arrow-left"></i></p>
		<a id="snap" href="<?php echo $baseurl; ?>/index">Interest</a>
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
			<div id="shaowIntrests"></div>


			<div class="search">
				<p id="serachead">Add Like/Intrests</p>
				<form class="example" id="likeForm">
					<input type="text" id="intrests" name="intrests" placeholder="Add your intrests..." required/>
					<button id="addintrests" type="submit" name="submit">Save</button>
				</form>
				<p id="errormsg"></p>
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
		function showIntrests(){
			$.ajax({
				url : "ajax/showintrests",
				type : "POST",
				cache: false,
				success: function(data){
					
					$('#shaowIntrests').html(data);
				}
			});
		}
		showIntrests();
		function removeIntrest(id){
			$.ajax({
				url : "ajax/removeintrests",
				type : "POST",
				data: {id: id},
				cache: false,
				success: function(data){
					if(data == 1){
						showIntrests();
					}else{
						$("#errormsg").html("*Something Error Please Try After Some Time Later.");
					}
				}
			});
		}

		
		
		$('#likeForm').submit(function(e){
	    e.preventDefault();
        	var intrests = $('#intrests').val();
			$.ajax({
				url : "ajax/addintrests",
				type : "POST",
				data: {intrests: intrests},
				cache: false,
				beforeSend: function(){
					$('#addintrests').attr('disabled', true);
				},
				success: function(data){
					if(data == 1){
						$('#likeForm').trigger('reset');
						showIntrests();
					}else{
						$("#errormsg").html("*Something Error Please Try After Some Time Later.");
					}
				},
				complete: function(){
					$('#addintrests').attr('disabled', false);
				}
			});
	    });
	</script>
</body>
</html>
<?php } ?>