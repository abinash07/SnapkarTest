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

	<script src="../assets/js/custom.js"></script>
	<style>
		.about{
			width: 95%;
			margin: 10px 2.5%;
		}
		#ahead{
			font-size: 14px;
			padding: 0 0 5px 0;
			font-family: 'Open Sans', sans-serif;
		}
		.about pre{
			white-space: pre-wrap;
			overflow: auto;
			padding: 1px 0 5px 0;
			text-align: left;
			line-height: 1.5;
			overflow: hidden;
			font-family: 'Roboto', sans-serif;
			color: #262626;
			font-size: 14px;
		}
		.about p{
			font-size: 14px;
			padding-bottom: 10px;
		}
		.about button{
			width: 100%;
			border: none;
			padding: 10px 0;
			border-radius: 5px;
			background-color: #F0F0F0;
		}
		.edit{
			float: right;
			color: #0B7DDA;
			font-size: 20px;
		}
		.add{
			color: #0B7DDA;
			padding: 0 4px;
			font-size: 12px;
			margin-left: 5px;
			border-radius: 100%;
			background-color: #F0F0F0;
		}
		.intro hr{
			width: 95%;
			margin-left: 2.5%;
			border: solid #F0F0F0;
			border-width: 1px 0 0;
		}





		.search{
	        width: 100%;
	        box-sizing: border-box;
	        padding: 1px 0 1px 0;
	    }
	    .search form{
	        margin: 10px 0 10px 0;
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
		.errormsg{
			color: red;
			font-size: 14px;
		}





		.addp{
			width: 100%;
			margin: 30px 0;
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

		@media only screen and (min-width: 750px) {
			article{
				width: 50%;
				float: left;
				margin-left: 22%;
			}
			.about{
				margin-top: 15px;
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
		<span id="leftmenuicon"><p id="bar" onclick="opennav()" ><i class="fa fa-long-arrow-left"></i></p></span>
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

			<div class="intro">
				<?php
					$query = "SELECT am.bio, am.occupation, am.dob, am.localname, sc.city_id as livingid, sc.name as living, c.name as livingcity, sc1.city_id as homeid, sc1.name as home, c1.name as homecity, am.relation_status FROM aboutme as am LEFT JOIN subcity as sc ON am.living = sc.id LEFT JOIN city as c ON sc.city_id = c.id LEFT JOIN subcity as sc1 ON am.home = sc1.id LEFT JOIN city as c1 ON sc1.city_id = c1.id WHERE userid = '$slamuserid'";
					$run = mysqli_query($con, $query);
					if(mysqli_num_rows($run) > 0){
						$row = mysqli_fetch_array($run);
						$bio = $row['bio'];
						$occupation = $row['occupation'];
						$dob = $row['dob'];
						$localname = $row['localname'];
						$living = $row['living'];
						$livingcity = @$row['livingcity'];
						$home = $row['home'];
						$homecity = @$row['homecity'];
						$button = '<i class="fa fa-pencil"></i> Edit';
						$relation_status = @$row['relation_status'];
						if($relation_status == 1){
							$relation_status = 'Married';
						}elseif($relation_status == 2){
							$relation_status = 'Un Married';
						}elseif($relation_status == 3){
							$relation_status = 'Singled';
						}elseif($relation_status == 4){
							$relation_status = 'Complicated';
						}else{
							$relation_status = 'Nothing';
						}
						if($dob != '0000-00-00'){
							$dob = date('d M, Y',strtotime($row['dob']));
						}else{
							$dob = 'You not added';
						}
					}else{
						$bio = 'No record';
						$occupation = 'No record';
						$dob = 'No record';
						$localname = 'No record';
						$living = 'No record';
						$home = 'No record';
						$button = '<i class="fa fa-plus"></i> Add';
						$relation_status = 'No record';
					}
				?>
				<div class="about">
					<p id="ahead">Bio</p>
					<pre><?php echo $bio; ?> </pre>
				</div>
				<div class="about">
					<p id="ahead">Occupation</p>
					<p><span id="occupation"><?php echo $occupation; ?></span> </p>
				</div>
				<div class="about">
					<p id="ahead">DOB</p>
					<p><?php echo $dob; ?> </p>
				</div>
				<div class="about">
					<p id="ahead">Local Name</p>
					<p><?php echo $localname; ?> </p>
				</div>
				<div class="about">
					<p id="ahead">Relationship Status</p>
					<p><?php echo $relation_status; ?> </p>
				</div>
				<div class="about">
					<a href="editbio"><button><?php echo $button; ?></button></a>
				</div>
				<!-- <hr> -->
				<br>

				<div class="about">
					<p id="ahead">Living Town</p>
					<p><?php echo $living.', '.$livingcity; ?> <a class="edit" href="<?php echo $baseurl; ?>/home/addliving"><i class="fa fa-pencil"></i></a></p>
				</div>
				<div class="about">
					<p id="ahead">Home Town</p>
					<p><?php echo $home.', '.$homecity; ?> <a class="edit" href="<?php echo $baseurl; ?>/home/addhome"><i class="fa fa-pencil"></i></a></p>
				</div>
				<br>


				<div class="about">
					<p id="ahead" style="margin-bottom: 10px;">Work <a class="add" onclick="showForm('work');" href="javascript:void(0);"><i class="fa fa-plus"></i></a></p>
					<div id="showwork"></div>
					<div class="search" id="work" style="display: none;">
						<form class="example" id="workForm">
							<input type="text" id="workname" name="workname" value="" placeholder="Add your work..." required/>
							<button id="addwork" type="submit" name="submit">ADD</button>
						</form>
						<p class="errormsg" id="adderrormsg"></p>
					</div>

					<div class="search" id="editwork" style="display: none;">
						<form class="example" id="editWorkForm">
							<input type="text" id="wditWorkname" name="wditWorkname" value="" placeholder="Add your work..." required/>
							<button id="editworkBtn" onclick="editwbtn();" type="submit" name="submit">SAVE</button>
							<p id="workid" style="display: none;"></p>
						</form>
						<p class="errormsg" id="editworkerrormsg"></p>
					</div>
				</div>
				<hr>
				<div class="about">
					<p id="ahead" style="margin-bottom: 10px;">School / College / Univercity <a class="add" onclick="showForm('college');" href="javascript:void(0);"><i class="fa fa-plus"></i></a></p>
					<div id="showcollege"></div>
					<div class="search" id="college" style="display: none;">
						<form class="example" id="collegeForm">
							<input type="text" id="collegename" name="collegename" value="" placeholder="Add your college..." required/>
							<button id="addcollege" type="submit" name="submit">ADD</button>
						</form>
						<p class="errormsg" id="addcollegemsg"></p>
					</div>

					<div class="search" id="editcollege" style="display: none;">
						<form class="example" id="editcollegeForm">
							<input type="text" id="wditcollegename" name="wditcollegename" value="" placeholder="Edit your college..." required/>
							<button id="editcollegeBtn" onclick="editcbtn();" type="submit" name="submit">SAVE</button>
							<p id="collegeid" style="display: none;"></p>
						</form>
						<p class="errormsg" id="editcollegemsg"></p>
					</div>
				</div>
				<hr>
				<div class="about">
					<p id="ahead" style="margin-bottom: 10px;">Education <a class="add" onclick="showForm('education');" href="javascript:void(0);"><i class="fa fa-plus"></i></a></p>
					<div id="showeducation"></div>
					<div class="search" id="education" style="display: none;">
						<form class="example" id="educationForm">
							<input type="text" id="educationname" name="educationname" value="" placeholder="Add your education..." required/>
							<button id="addeducation" type="submit" name="submit">ADD</button>
						</form>
						<p class="errormsg" id="addeducationmsg"></p>
					</div>

					<div class="search" id="editeducation" style="display: none;">
						<form class="example" id="editeducationForm">
							<input type="text" id="wditeducationname" name="wditeducationname" value="" placeholder="Edit your education..." required/>
							<button id="editeducationBtn" onclick="editebtn();" type="submit" name="submit">SAVE</button>
							<p id="educationid" style="display: none;"></p>
						</form>
						<p class="errormsg" id="editeducationmsg"></p>
					</div>
				</div>
				<hr>
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

		function showForm(formid){
			var x = document.getElementById(formid);
			if(x.style.display === "none") {
				x.style.display = "block";
			}else{
				x.style.display = "none";
			}
		}

		function showWork(){
			$.ajax({
				url : "ajax/showwork",
				type : "POST",
				cache: false,
				success: function(data){
					$('#showwork').html(data);
				}
			});
		}
		showWork();

		$('#workForm').submit(function(e){
	    e.preventDefault();
        	var workname = $('#workname').val();
			$.ajax({
				url : "ajax/addwork",
				type : "POST",
				data: {work: workname},
				cache: false,
				beforeSend: function(){
					$('#addwork').attr('disabled', true);
				},
				success: function(data){
					if(data == 1){
						$('#workForm').trigger('reset');
						showWork();
					}else{
						$("#adderrormsg").html("*Something Error Please Try After Some Time Later.");
					}
				},
				complete: function(){
					$('#addwork').attr('disabled', false);
				}
			});
	    });

	    function editwork(id,work){
	    	showForm('editwork');
			$('#wditWorkname').val(work);
			$('#workid').html(id);
	    }

	    function editwbtn(){
	    	var wditWorkname = $('#wditWorkname').val();
	    	var editid = $('#workid').html();
	    	$.ajax({
				url : "ajax/editwork",
				type : "POST",
				data: {editid: editid, work: wditWorkname},
				cache: false,
				beforeSend: function(){
					$('#editworkBtn').attr('disabled', true);
				},
				success: function(data){
					if(data == 1){
						showWork();
						showForm('editwork');
					}else{
						$("#editworkerrormsg").html("*Something Error Please Try After Some Time Later.");
					}
				},
				complete: function(){
					$('#editworkBtn').attr('disabled', false);
				}
			});
	    }




	    function showcollege(){
			$.ajax({
				url : "ajax/showcollege",
				type : "POST",
				cache: false,
				success: function(data){
					$('#showcollege').html(data);
				}
			});
		}
		showcollege();

		$('#collegeForm').submit(function(e){
	    e.preventDefault();
        	var collegename = $('#collegename').val();
			$.ajax({
				url : "ajax/addcollege",
				type : "POST",
				data: {college: collegename},
				cache: false,
				beforeSend: function(){
					$('#addcollege').attr('disabled', true);
				},
				success: function(data){
					if(data == 1){
						$('#collegeForm').trigger('reset');
						showcollege();
					}else{
						$("#addcollegemsg").html("*Something Error Please Try After Some Time Later.");
					}
				},
				complete: function(){
					$('#addcollege').attr('disabled', false);
				}
			});
	    });

	    function editcollege(id,college){
	    	showForm('editcollege');
			$('#wditcollegename').val(college);
			$('#collegeid').html(id);
	    }

	    function editcbtn(){
	    	var wditcollegename = $('#wditcollegename').val();
	    	var editid = $('#collegeid').html();
	    	$.ajax({
				url : "ajax/editcollege",
				type : "POST",
				data: {editid: editid, college: wditcollegename},
				cache: false,
				beforeSend: function(){
					$('#editcollegeBtn').attr('disabled', true);
				},
				success: function(data){
					if(data == 1){
						showcollege();
						showForm('editcollege');
					}else{
						$("#editcollegemsg").html("*Something Error Please Try After Some Time Later.");
					}
				},
				complete: function(){
					$('#editcollegeBtn').attr('disabled', false);
				}
			});
	    }



	    function showeducation(){
			$.ajax({
				url : "ajax/showeducation",
				type : "POST",
				cache: false,
				success: function(data){
					$('#showeducation').html(data);
				}
			});
		}
		showeducation();

		$('#educationForm').submit(function(e){
	    e.preventDefault();
        	var educationname = $('#educationname').val();
			$.ajax({
				url : "ajax/addeducation",
				type : "POST",
				data: {education: educationname},
				cache: false,
				beforeSend: function(){
					$('#addeducation').attr('disabled', true);
				},
				success: function(data){
					if(data == 1){
						$('#educationForm').trigger('reset');
						showeducation();
					}else{
						$("#addeducationmsg").html("*Something Error Please Try After Some Time Later.");
					}
				},
				complete: function(){
					$('#addeducation').attr('disabled', false);
				}
			});
	    });

	    function editeducation(id,education){
	    	showForm('editeducation');
			$('#wditeducationname').val(education);
			$('#educationid').html(id);
	    }
	    
	    function editebtn(){
	    	var wditeducationname = $('#wditeducationname').val();
	    	var editid = $('#educationid').html();
	    	$.ajax({
				url : "ajax/editeducation",
				type : "POST",
				data: {editid: editid, education: wditeducationname},
				cache: false,
				beforeSend: function(){
					$('#editeducationBtn').attr('disabled', true);
				},
				success: function(data){
					if(data == 1){
						showeducation();
						showForm('editeducation');
					}else{
						$("#editeducationmsg").html("*Something Error Please Try After Some Time Later.");
					}
				},
				complete: function(){
					$('#editeducationBtn').attr('disabled', false);
				}
			});
	    }
	</script>
</body>
</html>
<?php } ?>