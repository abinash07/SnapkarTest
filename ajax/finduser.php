<?php 
require_once("../connect.php");
if(isset($_POST['userid'])){

    $userid = mysqli_real_escape_string($con,$_POST['userid']);
    $userid = htmlentities($userid);

    $query = "SELECT u.name, ui.image FROM user as u LEFT JOIN userinfo as ui ON u.userid = ui.userid WHERE u.userid = '$userid'";
    $run = mysqli_query($con,$query);
    if(mysqli_num_rows($run)> 0){
    $row = mysqli_fetch_array($run);
    $name = $row['name'];
    $image = $row['image'];

?>
<p id="shead">Recent Logins</p>
<div class="slambook">
    <div class="simg">
        <img src="<?php echo $baseurl; ?>/userprofile/<?php echo $image; ?>">
    </div>
    <div class="stext">
        <p id="stext2"><?php echo $name;?></p>
        <p id="stext3">Click Here to direct login</p>
    </div>
</div>
<?php } } ?>