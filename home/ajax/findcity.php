<?php
require_once("../../connect.php");
if(isset($_POST['state_id'])){

    $state_id = mysqli_real_escape_string($con,$_POST['state_id']);
    $state_id = htmlentities($state_id);

	$query2 = "select * from city where state_id ='$state_id'";
	$run2 = mysqli_query($con,$query2);
	if(mysqli_num_rows($run2) > 0){
		while($row2=mysqli_fetch_array($run2)){
?>
		<option value="<?php echo $row2['id'] ?>"><?php echo $row2['name'] ?></option>
<?php } }else{ ?>
		<option disabled>No record found</option>
<?php
	}
}
?>