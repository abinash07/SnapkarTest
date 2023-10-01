<?php
	require_once("../../connect.php");
	if(isset($_POST['location'])){

	  	$location = mysqli_real_escape_string($con,$_POST['location']);
	  	$location = htmlentities($location);

	  	$query = "SELECT subcity.id as scid, subcity.name as subcityn, city.id as cid, city.name as cityn, state.id as sid, state.name as staten FROM subcity INNER JOIN city ON subcity.city_id=city.id INNER JOIN state ON city.state_id=state.id WHERE subcity.name LIKE '%{$location}%'";
	  	$run = mysqli_query($con,$query);
	  	if(mysqli_num_rows($run) > 0){
	    while($row = mysqli_fetch_assoc($run)){
?>
	    <p onclick="myArea(<?php echo $row['scid']; ?>)"><i id="cityicon" class="fa fa-map-marker"></i> <?php echo $row['subcityn'].', ', $row['cityn'].', ', $row['staten']; ?></p>

<?php } ?>




<?php }else{
	  $query = "SELECT city.name as cityn, state.name as staten FROM city INNER JOIN state ON city.state_id=state.id WHERE city.name LIKE '%{$location}%'";
	  $run = mysqli_query($con,$query);
	    if(mysqli_num_rows($run) > 0){
	      while($row = mysqli_fetch_array($run)){
?>

	  <p><i id="cityicon" class="fa fa-map-marker"></i> Anywhere In <?php echo $row['cityn']; ?></p>
	  <p><i id="cityicon" class="fa fa-map-marker"></i> <?php echo $row['cityn'].', ', $row['staten']; ?></p>

<?php } }else{ ?>
			<p>No location found</p>
			<div class="mylocation">
				<a href="addlocation"><p id="addmylocation"><i id="cityicon" class="fa fa-plus"></i> Add new location</p></a>
				<p id="lnote">My location not available</p>
				<p id="lnote">Help snicker to discover your location</p>
				<p id="lnote">Earn 10 points</p>
				<hr>
			</div>
<?php } } } ?>

<script>

function myArea(scid){
	$.ajax({
		url : "ajax/addlivingcity",
		type : "POST",
		data : {scid: scid},
		cache: false,
		beforeSend: function(){
		},
		success: function(data){
			if(data == 1){
				const userdata = JSON.parse(localStorage.getItem("sbtokenp"));
				var updateJsonData = {
					bio : userdata.bio,
					bluetick : userdata.bluetick,
					home: userdata.home,
					image: userdata.image,
					living: scid,
					name: userdata.name,
					userid: userdata.userid,
					username: userdata.username,
					verify: userdata.verify
				};
				localStorage.setItem('sbtoken',JSON.stringify(updateJsonData));
          		localStorage.setItem('sbtokenp',JSON.stringify(updateJsonData));

				location.href="editinfo";
			}
			if(data == 0){
				$("#errormsg").html("*Something Error Please Try After Some Time Later.");
			}
		},
		complete: function(){
		}
	});
}

</script>

