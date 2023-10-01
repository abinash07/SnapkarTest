<?php
require_once("../../connect.php");
//if(isset($_POST['query'])){


  $query = "SELECT subcity.name as subcityn, city.name as cityn, state.name as staten FROM subcity INNER JOIN city ON subcity.city_id=city.id INNER JOIN state ON city.state_id=state.id WHERE city.id = 963";
  $run = mysqli_query($con,$query);
  if(mysqli_num_rows($run) > 0){
    while($row = mysqli_fetch_array($run)){
 ?>

    <a href="<?php echo $baseurl; ?>/home/location?name='Bhagada'&lcode='6'" class="link">
      <div class="slams">
        <div class="leftslams">
          <p><i class="fa fa-map-marker fa-gradient"></i></p>
        </div>
        <div class="rightslams">
          <p id="slamsslam"><?php echo $row['subcityn']; ?> <span id="verified"><i class="fa fa-check-circle"></i></span></p>
          <p class="cityname"><?php echo $row['cityn'].', ', $row['staten']; ?></p>
          <p id="peoples"><i class="fa fa-user"></i> 150 Peoples</p>
        </div>
        <div class="slamfollow">
          <button>Follow</button>
        </div>
      </div>
    </a>
  <?php } ?>


<?php }  ?>