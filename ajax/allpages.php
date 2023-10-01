<?php
	session_start();
	require_once('../connect.php');
	$sbuserid = $_SESSION["sbuserid"];

	$query = "SELECT am.userid, u.name, u.username, ui.image, ui.imgdate FROM aboutme as am LEFT JOIN userinfo as ui ON am.userid = ui.userid LEFT JOIN user as u ON am.userid = u.userid LEFT JOIN subcity as sc ON am.home = sc.id WHERE am.home = 6 OR sc.city_id ORDER BY ui.imgdate DESC";
	  $run = mysqli_query($con,$query);
  	if(mysqli_num_rows($run) > 0){
    	while($row = mysqli_fetch_array($run)){

?>
	<a href="profile?username=<?php echo $row['username']; ?>">
		<div class="slamprofile">
			<img id="img1" src="userprofile/<?php echo $row['image']; ?>">
	      <div class="features">
			<p id="stext"><?php echo $row['name']; ?></p>
			<p id="sicon2">Take 2</p>
	      </div>
		</div>
	</a>

<?php } } ?>