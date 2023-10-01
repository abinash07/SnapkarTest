<?php
session_start();
if(!isset($_SESSION["sbuserid"])){
header("location:login");
}else { ?>

<script>
	localStorage.removeItem("sbtoken");
</script>

<?php session_destroy(); } ?>

<script>
	location.href="login";
</script>