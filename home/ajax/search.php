<?php
	session_start();
	require_once('../../connect.php');
	$sbuserid = $_SESSION["sbuserid"];

if(isset($_POST['query'])){

  $searchquery = mysqli_real_escape_string($con,$_POST['query']);
  $searchquery = htmlentities($searchquery);

	$query = "SELECT u.userid, u.name, u.username, ui.image, ui.imgdate FROM user as u LEFT JOIN userinfo as ui ON u.userid = ui.userid WHERE u.name LIKE '%{$searchquery}%'";
	  $run = mysqli_query($con,$query);
  	if(mysqli_num_rows($run) > 0){
    	while($row = mysqli_fetch_array($run)){

?>
	<a href="profile?username=<?php echo $row['username']; ?>">
		<div class="slamprofile">
			<img id="img1" src="<?php echo $baseurl; ?>/userprofile/<?php echo $row['image']; ?>">
	      <div class="features">
			<p id="stext"><?php echo $row['name']; ?></p>
			<p id="sicon2">Take 2</p>
	      </div>
		</div>
	</a>

<?php } }else{ ?>

<p>No record found</p>


<?php } } ?>