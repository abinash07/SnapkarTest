<?php
    require_once("../../connect.php");
    $query3 = "select * from dialog";
    $run3 = mysqli_query($con,$query3);
    while($row3 = mysqli_fetch_array($run3)){
    $id = $row3['id'];
    $movie = $row3['movie'];
    $dialogue = $row3['dialogue'];
?>
<pre onclick="selectdialog('<?php echo $dialogue; ?>');"><?php echo $dialogue; ?> -- <?php echo $movie; ?></pre>
<?php } ?>