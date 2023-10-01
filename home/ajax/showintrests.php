<?php
	session_start();
	require_once('../../connect.php');
	$userid = $_SESSION["sbuserid"];
	$query2 = "SELECT * FROM intrests WHERE userid = '$userid'";
	$run2 = mysqli_query($con, $query2);
	if(mysqli_num_rows($run2) > 0){
?>
<div class="likes">
	<p id="intro">Like/Intrests</p>
	<?php while($row2 = mysqli_fetch_array($run2)){ ?>
	<p id="likes"><?php echo $row2['intrest']; ?> &nbsp; <span onclick="removeIntrest('<?php echo $row2['id']; ?>')"><i class="fa fa-times"></i></span></p>
	<?php } ?>
	<hr>
</div>
<?php } ?>