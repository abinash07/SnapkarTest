<?php
	session_start();
	require_once('../../connect.php');
	$userid = $_SESSION["sbuserid"];
	$query3 = "SELECT * FROM work WHERE userid='$userid' order by 1 desc";
	$run3 = mysqli_query($con, $query3);
	if(mysqli_num_rows($run3) > 0){
	while($row3 = mysqli_fetch_array($run3)){
?>
	<p><?php echo $row3['work']; ?> <a class="edit" href="javascript:void(0);" onclick="editwork('<?php echo $row3['id']; ?>','<?php echo $row3['work']; ?>');"><i class="fa fa-pencil"></i></a></p>
<?php } } ?>