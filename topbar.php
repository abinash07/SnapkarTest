
<?php if(empty($_SESSION['sbuserid'])){ ?>
<script>
  if(localStorage.getItem("sbtoken") === null){
    location.href="login";
  }else{
    const userid = JSON.parse(localStorage.getItem("sbtokenp")).userid;
    $.ajax({
      url : "ajax/keeplogin",
      type : "POST",
      data : {userid: userid},
      cache: false,
      dataType: "json",
      success: function(data){
        if(data == 0){
          location.href="login";
        }
      }
    });
  }
</script>
<?php } ?>



<div class="top">
  <span id="leftmenuicon">
	 <p id="bar" onclick="opennav()"><i class="fa fa-bars"></i></p>
  </span>
	<a id="snap" href="index">Snickar</a>
	<a id="img" href="home/myaccount"><img id="uimage" src="<?php echo $baseurl; ?>/assets/image/noimg.jpg"></a>
	<a id="card" href="home/menu"><i class="fa fa-th"></i></a>
	<a id="top29" href="index">Search</a>
	<a id="top29" href="home/addpost">New Post</a>
	<a id="top29" href="home/explore">Explore</a>
	<a id="top29" href="index">Home</a>
</div>

<div class="sidebar" id="mynav">
	<a href="javascript:void(0)" class="close" onclick="closenav()"> &times; </a>
	<a href="index.php"> <i id="ioconf" class="fa fa-home"></i> Home</a>
	<a href="home/myaccount"><i id="ioconf" class="fa fa-user-plus"></i> My Account</a>
	<a href="home/myaccount"><i id="ioconf" class="fa fa-user-circle-o"></i> My Posts</a>
	<a href="home/addpost"><i id="ioconf" class="fa fa-plus"></i> Create New Post</a>
	<hr>
	<a href="home/search"><i id="ioconf" class="fa fa-search"></i> Search</a>
	<a href="home/saved"><i id="ioconf" class="fa fa-bookmark-o"></i> My Saved </a>
	<a href="home/explore"><i id="ioconf" class="fa fa-compass"></i> Explore</a>
	<a href="home/addpost"><i id="ioconf" class="fa fa-plus"></i> New Post</a>
	<hr>
	<a href="aboutus"><i id="ioconf" class="fa fa-info-circle"></i> About us</a>
	<a href="mailto:thesnapkar@gmail.com"><i id="ioconf" class="fa fa-envelope"></i> Contact us</a>
	<a href="term"><i id="ioconf" class="fa fa-legal"></i> Term & Condition</a>
	<a href="privacy"><i id="ioconf" class="fa fa-lock"></i> Privacy policy</a>
</div>
<script type="text/javascript">
  const opennav = () =>{
    document.getElementById('mynav').style.width="250px";
  }
  const closenav = () =>{
    document.getElementById('mynav').style.width="0";
  }

  $(document).ready(function(){
    if(localStorage.getItem("sbtoken") === null){
      location.href="login";
    }else{
      const userdata = JSON.parse(localStorage.getItem("sbtokenp"));
      var uimgdata="<?php echo $baseurl; ?>/userprofile/"+userdata.image;
      $("#uimage").prop("src",uimgdata);
      // if(userdata.living == ''){
      //   location.href="home/findlocation";
      // }
    }
  });
</script>

<div class="space"></div>