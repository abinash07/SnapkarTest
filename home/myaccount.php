<?php
session_start();
if(!isset($_SESSION["sbuserid"])){
header("location:login");
}else{
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="https://foliotek.github.io/Croppie/croppie.css">
	<script src="https://foliotek.github.io/Croppie/croppie.js"></script>
	<style>
		.profileimage{
			text-align: center;
			padding: 50px 0 20px 0;
			position: relative;
		}
		.profileimage img{
			width: 150px;
			height: 150px;
			border-radius: 100%;
			object-fit: cover;
			border: 4px solid #E4E7FA;
		}
		.bottom-right {
			position: absolute;
			bottom: 12px;
			right: 37%;
			background-color: #FFFFFF;
			box-shadow: 0 1px 3px #c7c7c7;
			padding: 5px 10px;
			border-radius: 3px;
		}
		.fa-camera{
			color: #0B7DDA;
		}
		#verified{
			font-size: 14px;
			color: #0B7DDA;
			padding-top: -100px;
		}
		.snapprofiledetails{
			text-align: center;
			margin-top: 20px;
		}
		.snapprofiledetails h2{
			font-family: 'Open Sans', sans-serif;
		}
		.snapprofiledetails p{
			color: #595959;
			font-size: 15px;
			padding: 5px 0 5px 0;
		}
		.snapprofiledetails h4{
			color: #595959;
			font-size: 15px;
			font-family: 'Open Sans', sans-serif;
		}
		#shareLink{
			color: #0B7DDA;
		}
		.snapprofilebuttons{
			width: 100%;
			text-align: center;
			margin: 20px auto 40px auto;
			display: inline-block;
		}
		.snapprofilebutton{
			display: inline-block;
			text-align: center;
		}
		#snapprofilebuttons{
			border: none;
			color: #FFFFFF;
			padding: 7px 15px;
			border-radius: 3px;
			margin: 5px;
			background-color: #0B7DDA;
			text-align: center;
			cursor: pointer;
			font-family: 'Roboto', sans-serif;
		}
		#snapprofilebuttonsf{
			border: none;
			color: #FFFFFF;
			padding: 7px 15px;
			border-radius: 3px;
			margin: 5px;
			background-color: #0B7DDA;
			text-align: center;
			cursor: pointer;
			font-family: 'Roboto', sans-serif;
		}
		#snapprofileicon{
			border: none;
			color: #FFFFFF;
			padding: 7px 10px;
			border-radius: 3px;
			margin: 5px;
			background-color: #0B7DDA;
			text-align: center;
			cursor: pointer;
			font-family: 'Roboto', sans-serif;
		}
		.snapprofile::after {
			content: "";
			clear: both;
			display: table;
		}

		.follow{
			width: 95%;
			margin: 5px 2.5% 20px 2.5%;
			text-align: center;
			box-sizing: border-box;
		}
		.follow a{
			color: #000000;
		}
		.ftake{
			float: left;
			width: 33.3%;
			border: solid #F0F0F0;
			border-width: 1px 1px 1px 0;
		}
		.follower{
			float: left;
			width: 33.3%;
			border: solid #F0F0F0;
			border-width: 1px 1px 1px 0;
		}
		.following{
			float: left;
			width: 33.3%;
			border: solid #F0F0F0;
			border-width: 1px 0 1px 0;
		}
		#ftakes{
			font-size: 14px;
			padding: 5px 0 2px 0;
			font-family: 'Open Sans', sans-serif;
		}
		#fnumber{
			padding: 0 0 5px 0;
			font-size: 14px;
		}
		.follow::after {
			content: "";
			clear: both;
			display: table;
		}






		.intro{
			width: 95%;
			margin: 30px 2.5% 0 2.5%;
		}
		#intro{
			font-size: 15px;
			padding: 0 0 15px 0;
			font-family: 'Open Sans', sans-serif;
		}
		.intro pre{
			white-space: pre-wrap;
			overflow: auto;
			padding: 1px 0 5px 0;
			text-align: left;
			line-height: 1.5;
			overflow: hidden;
			font-family: 'Roboto', sans-serif;
			color: #262626;
			font-size: 14px;
			margin-top: -10px;
		}
		#addintro{
			text-decoration: none;
			color: #0B7DDA;
		}
		.intro pre a{
			color: #0B7DDA;
			text-decoration: none;
		}
		.introp{
			font-size: 14px;
			padding-bottom: 5px;
		}
		.introhead{
			font-size: 14px;
			color: #24282A;
			font-family: 'Open Sans', sans-serif;
		}
		.city{
			color: #262626;
		}
		.introlink{
			color: #0B7DDA;
			text-decoration: none;
		}
		.fa-globe{
			color: #0B7DDA;
		}
		.fa-map-marker{
			color: red;
		}
		#location{
			color: #1877F2;
		}

		#firtshome{
			background-color: #fafafa;
		}










		.likes{
			width: 95%;
			margin: 5px 2.5% 30px 2.5%;
		}
		.likes a{
			color: #262626;
			text-decoration: none;
		}
		#likes{
			font-size: 12px;
			padding: 7px 14px;
			border-radius: 5px;
			display: inline-block;
			margin: 5px 5px 5px 0;
			background-color: #f1f3f8;
		}
		.edit{
			float: right;
			color: #0B7DDA!important;
			font-size: 16px;
		}
		#edit{
			color: #FFFFFF;
			font-size: 12px;
			padding: 6px 10px;
			border-radius: 5px;
			display: inline-block;
			margin: 5px 5px 5px 0;
			text-decoration: none;
			background-color: #0B7DDA;
		}
		#heading{
			font-size: 15px;
			padding: 0 0 5px 2.5%;
			font-family: 'Open Sans', sans-serif;
		}
		.likes::after {
			content: "";
			clear: both;
			display: table;
		}




		.work{
			width: 95%;
			margin: 5px 2.5% 30px 2.5%;
		}
		.work p{
			font-size: 14px;
			line-height: 1.5;
		}
		.la {
		    width: 30px;
		    height: 30px;
		    border-radius: 100%;
		    background: #f1f3f8;
		    display: inline-flex;
		    justify-content: center;
		    align-items: center;
		    font-size: 12px;
		    margin-right: 5px;
		    flex: none;
		    margin: 5px 0;
		}




		.social{
			width: 95%;
			margin: 5px 2.5% 30px 2.5%;
		}
		.social p{
			display: inline-block;
		}
		.social p a {
		    display: flex;
		    width: 2.33333rem;
		    height: 2.33333rem;
		    justify-content: center;
		    align-items: center;
		    background: #f1f3f8;
		    border-radius: 3px;
		    color: #9299b8;
		    margin-right: 5px;
		    text-decoration: none;
		    border-radius: 100%;
		}



















.photo{
  width: 95%;
  background-color: #1b1d20;
  position: relative;
  margin: 10px 2.5% 30px 2.5%;
}
.pimage{
  text-align: center;
}
.pimage img{
  width: 100%;
  height: auto;
/*  max-height: 80vh;
  max-width: 100%;*/
  margin-bottom: -4px;
}
.melove{
  position: absolute;
  left: 45%;
  top: 45%;
  font-size: 60px;
  text-align: center;
}
#loveicon1{
  color: red;
}
.features{
  position: absolute;
  width: 100%;
  bottom: 0;
  background-image: linear-gradient(rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.8));
}
#stext{
  font-size: 14px;
  padding: 10px 2.5% 10px 2.5%;
  color: #FFFFFF;
}
.fa-heart{
  color: red;
}
.fa-heart-o{
  color: #FFFFFF;
}
#sicon{
  font-size: 15px;
}
#sicon2{
  padding-left: 2.5%;
}
/*.fa-share-alt{
  color: #FFFFFF;
  padding-right: 5px;
}*/
.flashshareicon{
	  color: #FFFFFF;
  padding-right: 5px;
}
#number{
  color: #FFFFFF;
  font-size: 15px;
}
#sbutton{
  float: right;
  margin-right: 2.5%;
}
.features button{
  border: 1px solid #FFFFFF;
  color: #FFFFFF;
  border-radius: 3px;
  padding: 2px 8px;
  margin-bottom: 15px;
  background-color: transparent;
}
.love{
  position: absolute;
  left: 100px;
  bottom: 10px;
}
#fb{
  color: #FFFFFF;
  padding: 5px 10px;
  background-color: #1877F2;
  border-radius: 3px;
}
#wa{
  color: #FFFFFF;
  padding: 5px 10px;
  background-color: #72d042;
  border-radius: 3px;
}
#copy{
  color: #FFFFFF;
  padding: 5px 10px;
  background-color: #0B7DDA;
  border-radius: 3px;
}

.profile{
  width: 100%;
  position: absolute;
  background-image: linear-gradient(rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0));
  top: 0;
}
.image1{
  float: left;
  margin-left: 2%;
}
.image1 img{
  width: 35px;
  height: 35px;
  border-radius: 100%;
  margin: 8px 0 5px 0;
  border: 4px solid #E4E7FA;
}
.dot{
  float: right;
  padding: 15px 2.5% 0 10px;
  color: #FFFFFF;
}
.more{
  background-color: #FFFFFF;
  box-shadow: 0 1px 3px #c7c7c7;
  position: absolute;
  width: 20%;
  right: 2.5%;
  top: 40px;
  text-align: center;
  border-radius: 5px;
}
.more a{
  text-decoration: none;
  color: #0B7DDA;
  line-height: 1.5;
  display: block;
}
.name{
  float: left;
  margin: 10px 15px;
  color: #FFFFFF;
}
#take{
  font-size: 12px;
}
.profile:after {
  content: "";
  display: table;
  clear:both;
}


		@media only screen and (min-width: 750px) {
			article{
				width: 95%;
				float: left;
				margin-left: 2.5%;
			}
			.account-section{
				width: 100%;
				display: inline-block;
			}
			.profile-section{
				width: 25%;
				float: left;
    			position: fixed;
    			margin-top: 15px;
    			border-radius: 5px;
    			padding-bottom: 40px;
    			background-color: #f1f3f8;
			}
			.ftake{
				border: solid #FFFFFF;
				border-width: 1px 1px 1px 0;
			}
			.follower{
				border: solid #FFFFFF;
				border-width: 1px 1px 1px 0;
			}
			.following{
				border: solid #FFFFFF;
				border-width: 1px 0 1px 0;
			}
			.snapprofilebuttons{
				margin-bottom: 20px;
			}
			.info-section{
				width: 70%;
				float: left;
    			margin-left: 27.5%;
			}
			.intro{
				margin: 15px 2.5% 0 2.5%;
			}
			#intro{
				font-size: 18px;
				padding: 0 0 20px 0;
			}
			#heading{
				padding: 0 0 5px 2.5%;
			}
			.flash_section{
				width: 65%;
				margin-left: 1%;
			}
			.account-section::after {
				content: "";
				clear: both;
				display: table;
			}
			.facelog-section{
				width: 50%;
				margin-left: 1%;
			}

		}









		.sk-dialog-modal{			
			display: none;
			position: fixed;
			z-index: 1;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background-color: rgba(0, 0, 0, 0.7);
			backdrop-filter: blur(5px);
		}
		.sk-dialog-modal::-webkit-scrollbar{
			display: none;
		}

		.dialog-modal-body{
			background-color: #fefefe;
			position: absolute;
			top: 0;
			left: 0;
			padding: 0;
			width: 100%;
			max-width: 600px;
			height: 100%;
			overflow: hidden;
		}
		#dialoghead{
			padding-top: 15px;
			padding-bottom: 15px;
			text-align: center;
			font-family: 'Open Sans', sans-serif;
		}
		.dialog-modal-close{
			font-size: 20px;
			color: #262626;
			position: absolute;
			top: 6px;
			right: 2.5%;
			cursor: pointer;
		}
		#dialogheading{
			font-family: 'Open Sans', sans-serif;
			padding-bottom: 10px;
		}
		.addpdialogue{
			width: 90%;
			margin: 0 5%;
		}
		.addpdialogue form lable{
			color: #262626;
			font-size: 14px;
			font-family: 'Open Sans', sans-serif;
		}
		#introl {
		  float: right;
		}
		.addpdialogue textarea{
			width: 100%;
			color: #495057;
			margin-top: 10px;
			margin-bottom: 10px;
			border: 1px solid #F0F0F0;
			outline: none;
			border-radius: 5px;
			-webkit-transition: 0.5s;
			transition: 0.5s;
			padding: 12px 10px;
			box-sizing: border-box;
			font-size: 14px;
			line-height: 1.5;
			font-family: 'Roboto', sans-serif;
		}
		.addpdialogue textarea:focus { 
			border-color: #0b7dda;
			box-shadow: 0 0 10px #0b7dda;
		}
		
		.addpdialogue button{
			background-color: #1877F2;
			color: white;
			padding: 12px 20px;
			border: none;
			cursor: pointer;
			text-align: center;
			width: 100%;
			margin: 10px 0 15px 0;
			border-radius: 5px;
			position: relative;
		}
		.addpdialogue button:hover {
			opacity: 0.8;
		}

		.adddialogue{
			width: 90%;
			margin: 10px 5% 10px 5%;
		}
		.dialoguesearch {
	    width: 100%;
	    margin-bottom: 20px;
	    box-sizing: border-box;
		}
		.dialoguesearch form {
	    text-align: center;
	    box-sizing: border-box;
	    border: 1px solid #F0F0F0;
	    border-radius: 5px;
		}
		.dialoguesearch form.example input[type=text] {
	    padding: 13px 0 10px 2%;
	    font-size: 14px;
	    float: left;
	    width: 85%;
	    border: none;
	    background: #FFFFFF;
	    border-radius: 5px 0 0 5px;
	    outline: none;
	    box-sizing: border-box;
		}
		.dialoguesearch form.example button {
	    float: right;
	    width: 15%;
	    padding: 7.3px 10px 7.3px 10px;
	    background: #f1f3f8;
	    color: #c5c5c5;
	    font-size: 21px;
	    border: none;
	    border-left: none;
	    cursor: pointer;
	    border-radius: 0 5px 5px 0;
		}
    .dialoguesearch form.example button:hover {
      background: #F0F0F0;
    }
		.dialoguesearch form.example::after {
		  content: "";
		  clear: both;
		  display: table;
		}
		.dialoguebox{
			width: 90%;
			margin: 10px 5% 0 5%;
			height: 90%;
			overflow-y: scroll;
		}
		.dialoguebox pre{
			color: #262626;
			font-size: 14px;
			line-height: 1.5;
			text-align: left;
			border-radius: 3px;
			margin: 5px 10px 10px 0;
			white-space: pre-wrap;
			padding: 10px 2.5% 10px 2.5%;
			background-color: #F0F0F0;
			font-family: 'Roboto', sans-serif;
		}

.addnewflash{
  width: 95%;
  margin: 10px 2.5% 40px 2.5%;
  border-radius: 5px;
  box-shadow: 0 1px 3px #c7c7c7;
  display: inline-block;
}
.flashpreview{
  width: 95%;
  margin: 15px 2.5% 10px 2.5%;
  overflow: hidden;
  position: relative;
}
.flashpreview img{
  width: 100%;
  height: auto;
  border-radius: 5px;
  margin-top: 15px;
}
.snapdialog{
  position: absolute;
  width: 100%;
  bottom: 5px;
  border-radius: 0 0 5px 5px;
  background-image: linear-gradient(rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.8));
}
.snapdialog pre{
  white-space: pre-wrap;
  overflow: auto;
  text-align: left;
  line-height: 1.5;
  overflow: hidden;
  font-family: 'Roboto', sans-serif;
  font-size: 24px;
  padding: 10px 2.5% 30px 2.5%;
  color: #FFFFFF;
  margin-bottom: 10px;
  margin-right: 10px;
  border-radius: 3px;
}
.snapbtn{
  width: 95%;
  margin: 15px 2.5% 5px 2.5%;
}
.npbleft{
  float: left;
  margin-right: 5px;
}
.npbright{
  float: left;
}
#npicon{
  color: #0B7DDA;
  font-size: 18px;
}
.snapbtn button{
  border: none;
  border: 1px solid #F0F0F0;
  border-radius: 5px;
  padding: 5px 10px;
  margin-bottom: 10px;
}
.manageflashBtn {
  color: white;
  padding: 12px 20px;
  margin: 8px 0 15px 0;
  border: none;
  cursor: pointer;
  text-align: center;
  width: 95%;
  margin: 10px 2.5%;
  border-radius: 5px;
  position: relative;
  background-color: #1877F2;
}
.addnewflash:after {
  content: "";
  display: table;
  clear:both;
}
		.skimagecropdialog{
			width: 100%;
			border-radius: 5px;
		}

		#formhead{
			padding-top: 15px;
			padding-bottom: 15px;
			text-align: center;
			font-family: 'Open Sans', sans-serif;
		}
		#dialogpreview{
			width: 100%;
			height: 400px;
		  padding-bottom: 40px;
		}
		.skimagecropdialog button{
			background-color: #1877F2;
			color: white;
			padding: 12px 20px;
			border: none;
			cursor: pointer;
			text-align: center;
			width: 95%;
			margin: 10px 2.5%;
			border-radius: 5px;
			position: relative;
		}
		.skimagecropdialog button:hover {
			opacity: 0.8;
		}


		.sk-modal-dialog{			
			display: none;
			position: fixed;
			z-index: 1;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background-color: rgba(0, 0, 0, 0.7);
			backdrop-filter: blur(5px);
		}
		.sk-modal-dialog::-webkit-scrollbar{
			display: none;
		}

		.modal-body-dialog{
			background-color: #fefefe;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			padding: 0;
			border: 1px solid #888;
			width: 95%;
			max-width: 400px;
			border-radius: 5px;
		}
		.modal-close-dialog{
			font-size: 20px;
			color: #262626;
			position: absolute;
			top: 6px;
			right: 2.5%;
			cursor: pointer;
		}




































		.skimagecrop{
			width: 100%;
			border-radius: 5px;
		}

		#formhead{
			padding-top: 15px;
			padding-bottom: 15px;
			text-align: center;
			font-family: 'Open Sans', sans-serif;
		}
		#upload-demo{
			width: 100%;
			height: 400px;
		  padding-bottom: 40px;
		}


		.skimagecrop button{
			background-color: #1877F2;
			color: white;
			padding: 12px 20px;
			border: none;
			cursor: pointer;
			text-align: center;
			width: 95%;
			margin: 10px 2.5%;
			border-radius: 5px;
			position: relative;
		}
		.skimagecrop button:hover {
			opacity: 0.8;
		}
		.crop-option:after{
			content: "";
			display: table;
			clear:both;
		}


		.sk-modal{			
			display: none;
			position: fixed;
			z-index: 1;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background-color: rgba(0, 0, 0, 0.7);
			backdrop-filter: blur(5px);
		}
		.sk-modal::-webkit-scrollbar{
			display: none;
		}

		.modal-body{
			background-color: #fefefe;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			padding: 0;
			border: 1px solid #888;
			width: 95%;
			max-width: 400px;
			border-radius: 5px;
		}
		.modal-close{
			font-size: 20px;
			color: #262626;
			position: absolute;
			top: 6px;
			right: 2.5%;
			cursor: pointer;
		}







		.share-modal{			
			display: none;
			position: fixed;
			z-index: 1;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background-color: rgba(0, 0, 0, 0.7);
			backdrop-filter: blur(5px);
		}
		.share-modal::-webkit-scrollbar{
			display: none;
		}

		.share-body{
			background-color: #fefefe;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			padding: 0;
			border: 1px solid #888;
			width: 95%;
			max-width: 400px;
			border-radius: 5px;
		}
		.share-close{
			font-size: 20px;
			color: #262626;
			position: absolute;
			top: 6px;
			right: 2.5%;
			cursor: pointer;
		}
		.sharebox1{
			width: 95%;
			margin: 10px 2.5%;
		}
		.sharebox1 a{
			color: #0B7dda;
      display: inline;
    }
    #sharenew1{
      padding: 5px 10px;
    }
    .shareLink{
    	cursor: pointer;
    }
    #share-modal-head{
			padding-top: 15px;
			padding-bottom: 15px;
			text-align: center;
			font-family: 'Open Sans', sans-serif;
		}
		#sharehelptext{
			font-size: 12px;
			padding: 15px 0;
		}







/**********************************************For modal****************************************/
#modal{
	display: none;
	position: fixed;
	z-index: 1;
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	overflow: auto;
	background-color: rgba(0, 0, 0, 0.7);
	backdrop-filter: blur(5px);
}
#modal-form{
	background-color: #fefefe;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	padding: 0;
	border: 1px solid #888;
	width: 95%;
	max-width: 400px;
	border-radius: 5px;
}
#modal-form h2{
    text-align: center;
    margin: 35px 0 0 0;
    padding-bottom: 10px;
    font-size: 14px;
    font-family: 'Open Sans', sans-serif;
}
#modal-form p{
    font-size: 14px;
    line-height: 1.5;
}
#close-btn{
    color: #1877F2;
    cursor: pointer;
    padding: 15px 0 20px 80%;
}
#right-btn{
    background: #1877F2;
    color: white;
    width: 50px;
    height: 50px;
    line-height: 50px;
    text-align: center;
    border-radius: 50%;
    position: absolute;
    cursor: pointer;
}

/*******************************************For modal ****************************************/










/*******************************************For loader***************************************/
#cover{
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 100;
    display: none;
}
#loader{
    position: absolute;
    top: calc(50% - 13px);
    left: calc(50% - 80px);
    border-radius: 4px;
    display: none;
}
.spnier {
    border: 5px solid #f3f3f3;
    border-radius: 50%;
    border-top: 5px solid #3498db;
    width: 25px;
    height: 25px;
    -webkit-animation: spin 1s linear infinite;
    animation: spin 1s linear infinite;
}
@-webkit-keyframes spin {
    0% { -webkit-transform: rotate(0deg); }
    100% { -webkit-transform: rotate(360deg); }
}
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
/*******************************************Loader End***************************************/


.addflash{
  width: 95%;
  margin: 10px 2.5% 40px 2.5%;
  border-radius: 5px;
  box-shadow: 0 1px 3px #c7c7c7;
  position: relative;
}
.flasha{
	color: #000000;
	text-decoration: none;
}
.newflash{
  display: block;
}
.nfimg{
  text-align: center;
}
.nimg2{
  width: 50%;
  margin: 30px 25%;
  background-color: #F0E8E0;
  padding: 35px 0;
  border-radius: 5px;
}
.nimg2 p{
  padding: 15px;
}
.flashnew{
  display: none;
}
.addflash button{
  width: 100%;
  margin: 0 0;
  text-align: left;
  padding: 12px 2.5%;
  cursor: pointer;
  border: none;
  border-radius: 5px;
  background-color: #FFFFFF;
  font-family: 'Roboto', sans-serif;
}
#flahicon{
  color: #0B7DDA;
  font-size: 20px;
}
#flashtext{
  padding-left: 10px;
  font-size: 15px;
  font-family: 'Open Sans', sans-serif;
}
.inputFlash {
  background-color: red;
  width: 100%;  
  overflow: hidden;
  opacity: 0; 
  cursor:pointer;
  position: absolute;
  padding: 14px 0;
  cursor: pointer;
  height: 90%;
}
.addflash:after {
  content: "";
  display: table;
  clear:both;
}
.flashpreview{
  width: 95%;
  margin: 15px 2.5% 5px 2.5%;
}
.flashpreview img{
  width: 100%;
  height: auto;
  margin: 15px 0 0 0;
  border-radius: 5px;
}
.flashcaption{
  width: 95%;
  margin: 10px 2.5% 10px 2.5%;
  border: 1px solid #F0F0F0;
  border-radius: 5px;
}
.flashbutton2 p{
  text-align: left;
  padding: 12px 2.5%;
  cursor: pointer;
  border: none;
  border-radius: 5px;
  background-color: #FFFFFF;
  font-family: 'Roboto', sans-serif;
}
.flashcaption textarea{
  width: 100%;
  color: #495057;
  border: none;
  outline: none;
  border-radius: 5px;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  padding: 10px 10px;
  box-sizing: border-box;
  font-size: 14px;
  line-height: 1.5;
  font-family: 'Roboto', sans-serif;
}

#addtake, #addflash{
  background-color: #0B7DDA;
  color: white;
  width: 95%;
  padding: 12px 20px;
  margin: 8px 2.5% 15px 2.5%;
  border: none;
  cursor: pointer;
  text-align: center;
  border-radius: 5px;
}
#addtake, #addflash:hover {
  opacity: 0.8;
}























		.facelog{
			width: 97.5%;
			margin: 10px 0 10px 2.5%;
		}
		.facelogimg{
			width: 47.5%;
			margin: 0 2.5% 2.5% 0;
			float: left;
			position: relative;
		}
		.facelogimg img{
			width: 100%;
			height: 250px;
			object-fit: cover;
			border-radius: 5px;
			margin-bottom: -4px;
		}
		.facelogdetails{
		  position: absolute;
		  width: 100%;
		  bottom: 0;
		  border-radius: 0 0 4px 4px;
		  background-image: linear-gradient(rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.9));
		}
		#facetext{
		  font-size: 12px;
		  padding: 10px 2.5% 5px 2.5%;
		  color: #FFFFFF;
		}
		.faceheart{
		  color: #FFFFFF;
		  margin-left: 5px;
		  margin-bottom: 5px;
		  font-size: 15px;
		}
		.redheart{
		  color: red;
		  margin-left: 5px;
		  margin-bottom: 5px;
		  font-size: 10px;
		}
		#facelogicon{
		  font-size: 15px;
		  color: #FFFFFF;
		}
		#faceicon{
		  padding-bottom: 10px;
		  padding-left: 2%;
		}

		#facenumber{
		  color: #FFFFFF;
		  font-size: 12px;
		}
		.facelog::after {
			content: "";
			clear: both;
			display: table;
		}

		.slambook{
			width: 47.5%;
			float: left;
			position: relative;
			border-radius: 5px;
			margin: 0 2.5% 2.5% 0;
		}
		.slamimage{
			height: 250px;
			overflow: hidden;
			border-radius: 5px;
			background-color: #000000;
		}
		.slamimage img{
			width: 100%;
			height: auto;
		}
		
		.slamdetails{
			position: absolute;
			width: 100%;
			bottom: 0;
			border-radius: 0 0 4px 4px;
			background-image: linear-gradient(rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.8));
			padding-left: 2.5%; 
		}
		#sltext{
			font-size: 12px;
			padding: 10px 2.5% 10px 2.5%;
			color: #FFFFFF;
		}
		#slicon{
			color: #FFFFFF;
			font-size: 10px;
			padding: 3px 0 0 2.5%;
		}
		#slicon2{
			color: #FFFFFF;
			font-size: 10px;
			padding: 2px 0 15px 2.5%;	
		}
		.newslam{
			width: 100%;
			position: absolute;
			top: 40%;
			text-align: center;
		}
		.newslam button{
			border: 1px solid #FFFFFF;
			color: #FFFFFF;
			border-radius: 3px;
			padding: 10px 15px;
			background-color: transparent;
		}
		#viewallbtn{
			width: 100%;
			border: none;
			padding: 10px 0;
			border-radius: 5px;
			background-color: #F0F0F0;
		}
		.slambooks:after {
			content: "";
			display: table;
			clear:both;
		}


		#nexticon {
	    color: #0B7DDA;
	    font-size: 18px;
	    float: right;
	    margin: 10px 2.5% 5px 5px;
	    text-decoration: none;
	    font-family: 'Open Sans', sans-serif;
		}












		/* all page loader   */

.divspin {
  width: 100%;
  box-sizing: border-box;
  position: absolute;
  z-index: 1;
  background-color: #004b9799;


}



.ball-scale-multiple {
  position: relative;
  -webkit-transform: translateY(-30px);
  transform: translateY(-30px);
}

.ball-scale-multiple>div {
  background-color: #0b7dda;
  width: 15px;
  height: 15px;
  border-radius: 100%;
  margin: 2px;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
  position: absolute;
  right: 2%;
  top: -19px;
  opacity: 0;
  margin: 0;
  width: 50px;
  height: 50px;
  -webkit-animation: ball-scale-multiple 1s 0s linear infinite;
  animation: ball-scale-multiple 1s 0s linear infinite;
}

.ball-scale-multiple>div:nth-child(2) {
  -webkit-animation-delay: -0.4s;
  animation-delay: -0.4s;
}

.ball-scale-multiple>div:nth-child(3) {
  -webkit-animation-delay: -0.2s;
  animation-delay: -0.2s;
}

@-webkit-keyframes ball-scale-multiple {
  0% {
    -webkit-transform: scale(0);
    transform: scale(0);
    opacity: 0;
  }

  5% {
    opacity: 1;
  }

  100% {
    -webkit-transform: scale(1);
    transform: scale(1);
    opacity: 0;
  }
}

@keyframes ball-scale-multiple {
  0% {
    -webkit-transform: scale(0);
    transform: scale(0);
    opacity: 0;
  }

  5% {
    opacity: 1;
  }

  100% {
    -webkit-transform: scale(1);
    transform: scale(1);
    opacity: 0;
  }
}

/*.ball-scale-multiple {
  position: relative;
  -webkit-transform: translateY(-30px);
  transform: translateY(-30px);
}

.ball-scale-multiple>div:nth-child(2) {
  -webkit-animation-delay: -0.4s;
  animation-delay: -0.4s;
}

.ball-scale-multiple>div:nth-child(3) {
  -webkit-animation-delay: -0.2s;
  animation-delay: -0.2s;
}*/

/*.ball-scale-multiple>div {
  background-color: #0b7dda;
  width: 15px;
  height: 15px;
  border-radius: 100%;
  margin: 2px;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
  position: absolute;
  left: -30px;
  top: 0px;
  opacity: 0;
  margin: 0;
  width: 60px;
  height: 60px;
  -webkit-animation: ball-scale-multiple 1s 0s linear infinite;
  animation: ball-scale-multiple 1s 0s linear infinite;
}
*/
	</style>
</head>
<body>
	<?php require_once('../connect.php'); ?>

	<?php
		$slamuserid = $_SESSION["sbuserid"]; 
		$query = "SELECT u.name, u.username, u.userid, ui.image, ui.bluetick, ui.view, COUNT(fw.id) as follower, (SELECT COUNT(*) FROM follow WHERE follower = u.userid) as following FROM user as u LEFT JOIN userinfo as ui ON u.userid = ui.userid LEFT JOIN follow as fw ON u.userid = fw.following WHERE u.userid = '$slamuserid'";
		$run = mysqli_query($con,$query);
		$row = mysqli_fetch_array($run);
		$name = $row['name'];
		$username = $row['username'];
		$userid = $row['userid'];
		$image = $row['image'];
		$verify = $row['bluetick'];
		$view = $row['view'];
		$follower = $row['follower'];
		$following = $row['following'];



		$query1 = "SELECT am.bio, am.occupation, am.dob, YEAR(am.dob) as year, sc.city_id as livingid, sc.name as living, c.name as livingcity, sc1.city_id as homeid, sc1.name as home, c1.name as homecity, am.localname, am.relation_status FROM aboutme as am LEFT JOIN subcity as sc ON am.living = sc.id LEFT JOIN city as c ON sc.city_id = c.id LEFT JOIN subcity as sc1 ON am.home = sc1.id LEFT JOIN city as c1 ON sc1.city_id = c1.id WHERE am.userid = '$userid'";
		$run1 = mysqli_query($con, $query1);
		$row1 = mysqli_fetch_array($run1);
		$bio = @$row1['bio'];
		$occupation = @$row1['occupation'];
		$localname = @$row1['localname'];
		$dob = @$row1['dob'];
		$year = @$row1['year'];
		$living = @$row1['living'];
		$livingcity = @$row1['livingcity'];
		$home = @$row1['home'];
		$homecity = @$row1['homecity'];
		$relation_status = @$row1['relation_status'];
		if($relation_status == 1){
			$relation_status = 'Married';
		}elseif($relation_status == 2){
			$relation_status = 'Un Married';
		}elseif($relation_status == 3){
			$relation_status = 'Singled';
		}elseif($relation_status == 4){
			$relation_status = 'Complicated';
		}else{
			$relation_status = 'Nothing';
		}
		if($dob == '0000-00-00'){
			$dob = '';
		}


	?>


	<div class="top">
		<span id="oldmenu">
			<p id="bar" onclick="opennav()" ><i class="fa fa-long-arrow-left"></i></p>		
			<a id="snap" href="<?php echo $baseurl; ?>/index">My account</a>		
			<a id="img" href="<?php echo $baseurl; ?>/home/myaccount"><img src="<?php echo $baseurl; ?>/userprofile/<?php echo $image; ?>"></a>
			<a id="card" href="menu"><i class="fa fa-th"></i></a>
			<a id="top29" href="index">Search</a>
			<a id="top29" href="home/addpost">New Post</a>
			<a id="top29" href="home/explore">Explore</a>
			<a id="top29" href="index">Home</a>
		</span>
		<span id="newmenu" style="display: none;">
			<p id="bar" onclick="dialogModalClose()"><i class="fa fa-times"></i></p>
			<a id="snap" href="<?php echo $baseurl; ?>/index">New Flash</a>
			<span id="savedialog"></span>
		</span>
		
	</div>
	<div class="space"></div>

	<section>
		<article>
			<div class="account-section">
				<div class="profile-section">
					<div class="snapprofile">
						<div class="profileimage" onclick="chooseImage()">
							<img src="<?php echo $baseurl; ?>/userprofile/<?php echo $image; ?>" alt="Snapkar">
							<a href="javascript:void(0)"><div class="bottom-right"><i class="fa fa-camera"></i></div></a>

							<input type="file" id="img-input" style="display: none; visibility: hidden; width: 1px;" accept="image/png, image/gif, image/jpeg"/>

						</div>
						<div class="snapprofiledetails">
							<h2><?php echo $name; ?> <?php if ($verify==1) {  ?><span id="verified"><i class="fa fa-check-circle"></i></span><?php } ?></h2>
							<h4>@<?php echo $username; ?> <span class="shareLink"><i id="shareLink" class="fa fa-share-alt"></i></span></h4>
							<?php if(!empty($occupation)){ ?><p><?php echo $occupation; ?></p><?php } ?>
							
						</div>
						<div class="snapprofilebuttons">
							<div class="snapprofilebutton">
						        <?php
						        $query11 = "select * from follow where follower='$userid' and following='$userid'";
						        $run11 = mysqli_query($con,$query11);
						        if(mysqli_num_rows($run11) > 0){
						        ?>
						        <button id="snapprofilebuttons"><i class="fa fa-user"></i> Following</button>
						      <?php }else{ ?>
						        <button id="snapprofilebuttonsf" onclick="followme('<?= $slamuserid; ?>');">
						          <span id='changeme'><i class="fa fa-user-plus"></i> Follow </span>
						        </button>
						      <?php } ?>
							</div>
							<div class="snapprofilebutton">
								<a href="editinfo"><button id="snapprofilebuttons"><i class="fa fa-pencil"></i> Edit profile</button></a>
							</div>
							<div class="snapprofilebutton notifi">
								<a href="setting"><button id="snapprofileicon"><i class="fa fa-cog"></i></button></a>
							</div>
						</div>
					</div>

					<div class="follow">
						<div class="ftake">
							<p id="ftakes">Views</p>
							<p id="fnumber"><?php echo $view; ?></p>
						</div>
						<a href="myfollowers">
							<div class="follower">
								<p id="ftakes">Followers</p>
								<p id="fnumber"><span id="followers"><?php echo $follower; ?></span></p>
							</div>
						</a>
						<a href="myfollowing">
							<div class="following">
								<p id="ftakes">Following</p>
								<p id="fnumber"><?php echo $following; ?></p>
							</div>
						</a>
					</div>
				</div>
				<div class="info-section">
					<?php
						$query10 = "SELECT * FROM work WHERE userid = '$userid' order by 1 desc limit 1";
						$run10 = mysqli_query($con, $query10);

						$query11 = "SELECT * FROM education WHERE userid = '$userid' order by 1 desc limit 1";
						$run11 = mysqli_query($con, $query11);
					?>
					<div class="intro">
						<p id="intro">Intro</p>
						<?php if(!empty($bio)){ ?><pre><span id="lintro"><?php echo $bio; ?></span></pre><?php } ?>
						<!-- <?php if(!empty($occupation)){ ?><p class="introp"><span class="introhead">Occupation:</span> <span class="city"><?php echo $occupation; ?></span></p><?php } ?> -->

						<?php if(mysqli_num_rows($run10) > 0){ $row10 = mysqli_fetch_array($run10); ?>
							<p class="introp"><span class="introhead">Work:</span> <span class="city"><?php echo $row10['work']; ?></span></p>
						<?php } ?>

											<!-- 						<?php if(mysqli_num_rows($run11) > 0){ $row11 = mysqli_fetch_array($run11); ?>
							<p class="introp"><span class="introhead">Education:</span> <span class="city"><?php echo $row11['education']; ?></span></p>
						<?php } ?> 
 										-->
						<?php if(!empty($localname)){ ?><p class="introp"><span class="introhead">Local Name:</span> <span class="city"><?php echo $localname; ?></span></p><?php } ?>

						<?php if(!empty($living)){ ?><p class="introp"><span class="introhead">Living city:</span> <span class="city"><?php echo $living.', '.$livingcity; ?></span></p><?php } ?>

						<?php if(!empty($home)){ ?><p class="introp"><span class="introhead">Home town:</span> <span class="city"><?php echo $home.', '.$homecity; ?></span></p><?php } ?>

						<?php if(!empty($dob)){ ?><p class="introp"><span class="introhead">Since:</span> <span class="city"><?php echo date('d M, Y', strtotime($dob)); ?></span></p><?php } ?>

						<?php if(!empty($relation_status)){ ?><p class="introp"><span class="introhead">Relationship Status:</span> <span class="city"><?= $relation_status; ?></span></p><?php } ?>

						<!-- <p class="introp"><a class="introlink" href="editinfo"><span class="introhead">See more details...</span></a></p> -->
					</div>
					<?php
						$query15 = "SELECT * FROM socialmedia WHERE userid = '$userid' order by 1 desc limit 10";
						$run15 = mysqli_query($con, $query15);
						if(mysqli_num_rows($run15) > 0){
							$row15 = mysqli_fetch_array($run15);
					?>
						<div class="social">
							<p><a href="<?= $row15['facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></p>
							<p><a href="<?= $row15['instragram']; ?>" target="_blank"><i class="fa fa-instagram"></i></a></p>
							<p><a href="<?= $row15['youtube']; ?>" target="_blank"><i class="fa fa-youtube"></i></a></p>
							<p><a href="<?= $row15['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a></p>
							<p><a href="<?= $row15['linkdin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></p>
							<p><a href="social" style="background-color: #0B7DDA; color: #FFFFFF;"><i class="fa fa-pencil"></i></a></p>
						</div>
					<?php }else{ ?>
						<div class="social">
							<a id="edit" href="social"><i class="fa fa-plus"></i> Add Social Links</a>
						</div>
					<?php } ?>





					<p id="heading">Likes / Intrests</p>
					<div class="likes">
						<?php
							$query2 = "SELECT * FROM intrests WHERE userid = '$userid'";
							$run2 = mysqli_query($con, $query2);
							if(mysqli_num_rows($run2) > 0){
							while($row2 = mysqli_fetch_array($run2)){
						?>
							<p id="likes"><?php echo $row2['intrest']; ?></p>
						<?php } ?>
							<a id="edit" href="interest"><i class="fa fa-pencil"></i> Edit</a>
						<?php }else{ ?>
							<a id="edit" href="interest"><i class="fa fa-plus"></i> Add New</a>
						<?php } ?>
					</div>


					<p id="heading">Flash</p>
					<?php
						$query17 = "SELECT dialog,image FROM flash WHERE userid = '$userid' and status = 1";
						$run17 = mysqli_query($con, $query17);
						$count17 = mysqli_num_rows($run17);
					?>
					<?php if($count17 > 0){ $row17 = mysqli_fetch_array($run17) ?>

					<a href="javascript:void(0)" class="flasha" onclick="dialogModalOpen('add');">
					  <div class="addflash">
					    <div class="newflash">
					      <button id="alter"><span id="flahicon"><i class="fa fa-photo"></i></span> <span id="flashtext">Add New Snap</span></button>
					      
					    </div>
					    			<div class="divspin" style="/* display:none; */">
								     	<div class="spinerdiv">
									     	<div class="spinerdiv-inner ball-scale-multiple">
									        <div></div>
									        <div></div>
									        <div></div>
									     	</div>
								     	</div>
										</div>
					  </div>
					</a>


					<div class="photo">
						<div class="profile">
							<div class="image1">
								<img src="http://localhost/snickar/userprofile/download (6).jpeg" alt="snapkar">
							</div>
							<div class="name">
								<p>Abinash Nayak</p>
								<p id="take">Snap 6 </p>
							</div>
							<div class="dot" onclick="moreit(1);">
								<p><i class="fa fa-ellipsis-v"></i></p>
							</div>
							<div class="more" id="more1" style="display: none;">
								<br>
								<a href="">Report</a>
								<br>
							</div>
						</div>

						<div class="pimage" ondblclick="loveme(1)">
							<img src="<?php echo $baseurl; ?>/flashimg/<?= $row17['image']; ?>" alt="snapkar">
							<div class="melove" style="display: none;" id="loveme_icon1">
								<span><i id="loveicon1" class="fa fa-heart"></i></span>
							</div>
						</div>

						
						<div class="features">
							<p id="stext">Don't wait for an oppertunity, To create an oppertunity</p>
							<p id="sicon2"><span onclick="love(1);"><span id="sicon"><span id="love_icon1"><i class="fa fa-heart-o"></i></span> <span id="number"><span id="love_id1">0</span></span></span></span> &nbsp; &nbsp; <span id="sicon" onclick="shareit(1);"><i class="fa fa-share-alt flashshareicon"></i></span> <span id="number"></span> 

							<span id="sbutton"><button onclick="resnap(1);"><i class="fa fa-retweet"></i> Resnap</button></span> 

							<span id="sbutton" onclick="dialogModalOpen('edit');"><button> Edit</button></span>
							</p>
						</div>
						<div class="love" style="display: none;" id="share21">
							<a href="http://www.facebook.com/sharer.php?u=https://snapkar.com/home/snaps?snap=1"><i id="fb" class="fa fa-facebook"></i></a>
							<a href="whatsapp://send?text=https://snapkar.com/home/snaps?snapid=1"><i id="wa" class="fa fa-whatsapp"></i></a>
						</div>
					</div>


				<?php }else{ ?>

					<a href="javascript:void(0)" class="flasha" onclick="dialogModalOpen('add');">
					  <div class="addflash">
					    <div class="newflash">
					      <button id="alter"><span id="flahicon"><i class="fa fa-photo"></i></span> <span id="flashtext">Add New Snap</span></button>
					      <div class="nfimg" id="nfimg">
					        <div class="nimg2">
					          <img src="<?php echo $baseurl; ?>/assets/image/photo.png">
					          <p>Upload New Photo</p>
					        </div>
					      </div>
					    </div>
					  </div>
					</a>
				<?php } ?>
					




					<p id="heading">Facelog</p>
					<div class="facelog">

						<?php
							$query16 = "SELECT year,image FROM facelog WHERE userid = '$userid' order by year desc";
							$run16 = mysqli_query($con, $query16);
							$count16 = mysqli_num_rows($run16);

							$initialYear = $year+5;
							$currentYear = date("Y");
							$yearsl = $currentYear - $initialYear;
						?>
						<?php if($count16 < $yearsl){ ?>
							<a href="addlog">
								<div class="slambook">
									<div class="slamimage">
										<img src="http://localhost/slambook/other/bg.webp">
									</div>
									<div class="newslam">
										<p><button> + Create New</button></p>
									</div>
									<div class="slamdetails">
										<p id="sltext">Make your constructive friends</p>
										<p id="slicon"></p>
									</div>
								</div>
							</a>
						<?php } ?>

						<?php 

							if($count16 > 0){
							while($row16 = mysqli_fetch_array($run16)){
						?>
							<div class="facelogimg">
								<img src="<?php echo $baseurl; ?>/facelogimg/<?= $row16['image']; ?>" alt="Snapkar">
								<div class="facelogdetails">
					        <p id="facetext"><?= $row16['year']; ?> Year</p>
					        <p id="faceicon"><span id="facelogicon"><i class="fa fa-heart-o faceheart"></i></span> <span id="facenumber">1</span> &nbsp; &nbsp; <span id="facelogicon"><i class="fa fa-share-alt"></i></span></p>
					      </div>
							</div>
						<?php } } ?>
					</div>

				</div>
			</div>


			<div class="sk-dialog-modal" id="dialogModal">
				<div class="dialog-modal-body">
					<div class="dialog-modal-close" onclick='dialogModalClose();'><i class="fa fa-times"></i></div>
						<p id="dialoghead">Crop</p>
						<?php
							$query17 = "SELECT dialog,image FROM flash WHERE userid = '$userid' and status = 1";
							$run17 = mysqli_query($con, $query17);
							$row17 = mysqli_fetch_array($run17);
							$countf = mysqli_num_rows($run17);
							$oldimage = @$row17['image'];
						?>
						<span id="insertflash" style="display: none;">
							<div class="addpdialogue">
								<textarea rows="2" name="dialogue" id="dialogue" placeholder="Write your own dialog or select from movies"><?= @$row17['dialog']; ?></textarea>
								<input type="file" id="img-input-dialog" style="display: none; visibility: hidden; width: 1px;" accept="image/png, image/gif, image/jpeg"/>
							</div>
							<div class="adddialogue">
								<p id="dialogheading">Select dialogue</p>
							    <div class="dialoguesearch">
									<form class="example" id="search_form">
										<input type="text" id="query" name="query" placeholder="Search something...">
										<button id="searchpost" type="submit" name="submit"><i class="fa fa-search"></i></button>
									</form>
								</div>
							</div>
							<div class="dialoguebox" id="dialoguebox"></div>
						</span>

						<span id="editflash" style="display: none;">
							  <div class="flashpreview" id="flashimgpreview">
							    <img id="uploadpreviewdialog" src="<?php echo $baseurl; ?>/flashimg/<?= @$row17['image']; ?>">
							    <div class="snapdialog">
							      <pre id="snapdialog"><?= $row17['dialog']; ?></pre>
							    </div>
							  </div>

							  <div class="snapbtn">
							    <div class="npbleft">
							        <button id="btChooseImage" onclick="chooseImageDialog();">
							            <span id="npicon"><i class="fa fa-photo"></i></span> 
							            <span id="flashtext">Change photo</span>
							        </button>
							    </div>
							    <div class="npbright">
							        <button onclick="changeDialog();">
							            <span id="npicon"><i class="fa fa-video-camera"></i></span> 
							            <span id="flashtext">Change dialog</span>
							        </button>
							    </div>
							  </div>
								  <?php 
									  if($countf){ 
									  	$operation = 'edit';
									  }else{ 
									  	$operation = 'add';
									  } 
								  ?>
							  	<button class="manageflashBtn" onclick="manageflashBtn('<?= $operation; ?>')"><div id="loader"><div class="spnier"></div></div> SAVE</button>
						</span>
				</div>
			</div>


			<div class="sk-modal-dialog" id="cropModalDialog">
				<div id="cover"> </div>
				<div class="modal-body-dialog">
						<div class="modal-close-dialog" onclick='closeDialog();'><i class="fa fa-times"></i></div>
						<div class="skimagecropdialog">
							<p id="formhead">Crop</p>
							<div id="dialogpreview" class="center-block" style="display: block;"></div>
							<p id="errormsg"></p>
							<button type="button" id="cropImageBtnDialog" class="btn btn-primary">
								<div id="loader"><div class="spnier"></div></div> Upload
							</button>
						</div>
				</div>
			</div>



			<div class="sk-modal" id="cropModal">
				<div id="cover"> </div>
				<div class="modal-body" id="modal-more">
						<div class="modal-close" onclick='closeit();'><i class="fa fa-times"></i></div>
						<div class="skimagecrop">
							<p id="formhead">Crop</p>
							<div id="upload-demo" class="center-block" style="display: block;"></div>
							<p id="errormsg"></p>
							<button type="button" id="cropImageBtn" class="btn btn-primary">
								<div id="loader"><div class="spnier"></div></div> Upload
							</button>
						</div>
				</div>
			</div>

			<div class="share-modal">
				<div class="share-body">
					<div class="share-close" id='closeShare'><i class="fa fa-times"></i></div>
					<p id="share-modal-head">Share</p>
			    <div class="sharebox1">
			      <p style="height: 10px;"></p>
			      <a href=''><i id='sharenew1' class='fa fa-share-alt'></i></a>
			      <a href="javascript:void(0)" onclick="copyElementText('profilelink')"><i id='copy' class="fa fa-clone"></i></a>
			      <a href=''><i id='fb' class='fa fa-facebook'></i></a>
			      <a href=''><i id='wa' class='fa fa-whatsapp'></i></a>
			      <p style="height: 10px;"></p>
			      <p id="sharehelptext">Let's people think about you, Share your profile to rich more people.</p>
			    </div>
			    <p id="profilelink" style="display: none;">https://snapkar.com/workinghours.php?username=<?php echo $username; ?></p>
				</div>
			</div>


			<div id="modal">
			  <div id="modal-form">
			    <h2>Message !!</h2>
			    <p id="pm"></p>
			    <div id="close-btn">Ok</div>
			    <div id="right-btn"><i class="fa fa-check"></i></div>
			  </div>
			</div>







		</article>
	</section>
	<?php include('../bottom.php'); ?>
	<script>

  <?php 
	  if($countf){ 
	  	$operation = 'edit';
	  }else{ 
	  	$operation = 'add';
	  } 
  ?>
	function dialogModalOpen(operation){
		$("#dialogModal").show();
		$('.sk-dialog-modal').show();
		$('#oldmenu').hide();
		$('#newmenu').show();
		if(operation === 'add'){
			$('#insertflash').show();
			$('#savedialog').html('<a id="nexticon" href="javascript:void(0)" onclick="chooseImageDialog()">next</a>');
		}else{
			$('#editflash').show();
			$('#oldflashBtn').show();
			$('#savedialog').html('<a id="nexticon" href="javascript:void(0)" onclick="manageflashBtn(&#39;'+operation+'&#39;)">save</a>');
		}
	}


	function dialogModalClose(){
		$("#dialogModal").hide();
		$('.sk-dialog-modal').hide();
		$('#oldmenu').show();
		$('#newmenu').hide();
	}

	function changeDialog(){
		$('#editflash').hide();
		$('#insertflash').show();
		$('#savedialog').html('<a id="nexticon" href="javascript:void(0)" onclick="afterChangeDialog()">next</a>');
	}

	function afterChangeDialog(){
		$('#insertflash').hide();
		$('#editflash').show();
		$('#savedialog').html('<a id="nexticon" href="javascript:void(0)" onclick="manageflashBtn(&#39;'+operation+'&#39;)">save</a>');
	}

	function selectdialog(text){
    $("#dialogue").val(text);
    $('#snapdialog').html(text);
	}



	var operation = "<?php echo $operation; ?>";	  
	var $uploadCropDialog;
	var newimageforupdate = '';

	var qualitydialog = 0.8;

	function chooseImageDialog(){
		var dialogue = $('#dialogue').val();
		if(dialogue !=""){
			document.getElementById('img-input-dialog').click();
		}else{
			alert("Please enter dialog");
		}
	}


	$('#img-input-dialog').on('change', function (ev) {
		$('#savedialog').html('');
		var userImage = document.getElementById('img-input-dialog');
		var filename = userImage.value;
		if(filename!=''){
			var extdot = filename.lastIndexOf(".")+1;
			var image_ext = filename.substr(extdot,filename.lenght).toLowerCase();
			if (image_ext == "jpg" || image_ext == "jpeg" || image_ext == "png" || image_ext == "gif"|| image_ext == "jgfif") {

				$uploadCropDialog = $('#dialogpreview').croppie({
					viewport: {
						width: 300,
						height: 300,
						//type: 'circle'
					},
					enforceBoundary: true,
					enableExif: true,
					mouseWheelZoom: false,
				});


				const file = ev.target.files[0];
				const blobURL = URL.createObjectURL(file);
				const skimg = new Image();
				skimg.src = blobURL;

				skimg.onload = function () {
					$('#cropModalDialog').css('display','block');
		      $uploadCropDialog.croppie('bind', {
		          url: blobURL
		      }).then(function () {
		          console.log('jQuery bind complete');
		      });
		    };

			}else{
				$("#modal").show();
				$("#pm").html("Only jpg, jpeg, png, gif file allow to upload.");
			}
		}
	});


	$('#cropImageBtnDialog').on('click', function () {

		$uploadCropDialog.croppie('result', {
			type: 'base64',
			format: 'jpeg',
			size: 'original',
			quality: qualitydialog
		}).then(function (resp) {
			$('#insertflash').hide();
			$('#editflash').show();
			$('#uploadpreviewdialog').attr('src',resp);
			$('#savedialog').html('<a id="nexticon" href="javascript:void(0)" onclick="manageflashBtn(&#39;'+operation+'&#39;)">save</a>');
			$('#submitdialog').show();
			newimageforupdate = 'update';
			destroyCroppieDialog();
		});
	});


	function destroyCroppieDialog() {
	  if ($uploadCropDialog) {
	    $uploadCropDialog.croppie('destroy');
	    $uploadCropDialog = null;
	    $('#img-input-dialog').val(null);
	    $('#cropModalDialog').css('display','none');
	  }
	}

	function closeDialog(){
		destroyCroppieDialog();
		$('#savedialog').html('<a id="nexticon" href="javascript:void(0)" onclick="chooseImageDialog()">next</a>');
	}




	function manageflashBtn(operation){
		var operation = $.trim(operation);
		if(operation === 'add'){
			addflashBtn();
		}else{
			editflashBtn();
		}
	}


	function addflashBtn(){
		var dialogue = $('#dialogue').val();
		var image = $('#uploadpreviewdialog').attr('src');

		$.ajax({
			url : "ajax/addflash",
			type : "POST",
			data : {image: image, dialogue: dialogue},
			dataType: 'JSON',
			cache: false,
			beforeSend: function(){
				$("#cover").show();
	      $("#loader").show();
			},
			success: function(data){
				if(data.status == true){
	        dialogModalClose();
				}else{
					$("#errormsg").html("*Something Error Please Try After Some Time Later.");
				}
			},
			complete: function(){
				$("#cover").hide();
	      $("#loader").hide();
			}
		});
	};




	function editflashBtn(){
		var dialogue = $('#dialogue').val();
		var image = $('#uploadpreviewdialog').attr('src');
		var del = "<?php echo $oldimage; ?>";


		$.ajax({
			url : "ajax/editflash",
			type : "POST",
			data : {image: image, dialogue: dialogue, del: del, newimageforupdate: newimageforupdate},
			dataType: 'JSON',
			cache: false,
			beforeSend: function(){
				$("#cover").show();
	      $("#loader").show();
			},
			success: function(data){
				if(data.status == true){
	        dialogModalClose();
				}else{
					$("#errormsg").html("*Something Error Please Try After Some Time Later.");
				}
			},
			complete: function(){
				$("#cover").hide();
	      $("#loader").hide();
			}
		});
	};

















  function copyElementText(id){
    var text = document.getElementById(id).innerText;
    var elem = document.createElement("textarea");
    document.body.appendChild(elem);
    elem.value = text;
    elem.select();
    document.execCommand("copy");
    document.body.removeChild(elem);
    $('#share-modal-head').html('**Link Copied!!');
  }

		$('#shareLink').on('click',function(e){
			e.preventDefault();
			$('.share-modal').css('display','block');
		})


		$(window).click(function (event) {
		    if ($(event.target).is("#modal")) {
		        $("#modal").css("display", "none");
		    }
		    if ($(event.target).is(".share-modal")) {
		        $(".share-modal").css("display", "none");
		    }
		});

	  $("#close-btn").on("click",function(){
	    $("#modal").hide();
	  });

	  $("#closeShare").on("click",function(){
	    $(".share-modal").hide();
	  });


var $uploadCrop,
rawImg;

var quality = 0.8;

function chooseImage(){
	document.getElementById('img-input').click();
}


$('#img-input').on('change', function (ev) {

	var userImage = document.getElementById('img-input');
	var filename = userImage.value;
	if(filename!=''){
		var extdot = filename.lastIndexOf(".")+1;
		var image_ext = filename.substr(extdot,filename.lenght).toLowerCase();
		if (image_ext == "jpg" || image_ext == "jpeg" || image_ext == "png" || image_ext == "gif"|| image_ext == "jgfif") {

			$uploadCrop = $('#upload-demo').croppie({
				viewport: {
					width: 300,
					height: 300,
					//type: 'circle'
				},
				enforceBoundary: true,
				enableExif: true,
				mouseWheelZoom: false,
			});


			const file = ev.target.files[0];
			const blobURL = URL.createObjectURL(file);
			const skimg = new Image();
			skimg.src = blobURL;

			skimg.onload = function () {
				$('#cropModal').css('display','block');
	      $uploadCrop.croppie('bind', {
	          url: blobURL
	      }).then(function () {
	          console.log('jQuery bind complete');
	      });
	    };

		}else{
			$("#modal").show();
			$("#pm").html("Only jpg, jpeg, png, gif file allow to upload.");
		}
	}
});


	$('#cropImageBtn').on('click', function (ev) {

		$uploadCrop.croppie('result', {
			type: 'base64',
			format: 'jpeg',
			//size: {width: 150, height: 180},
			size: 'original',
			quality: quality
		}).then(function (resp) {
			// $('.profileimage img').attr('src', resp);
			// $('.sk-modal').css('display','none');

			uploadProfilePicture(resp);


		});
	});


function destroyCroppie() {
  if ($uploadCrop) {
    $uploadCrop.croppie('destroy');
    $uploadCrop = null;
    $('#img-input').val(null);
    $('#cropModal').css('display','none');
  }
}

function closeit(modalId){
	
	destroyCroppie();
}


function uploadProfilePicture(image){

	var delimg = $('.profileimage img').attr('src');
	console.log(delimg);
	var extshals = delimg.lastIndexOf("/")+1;
	var del = delimg.substr(extshals,delimg.lenght);

	$.ajax({
		url : "ajax/editprofile",
		type : "POST",
		data : {image: image, del: del},
		dataType: 'JSON',
		cache: false,
		beforeSend: function(){
			$("#cover").show();
      $("#loader").show();
		},
		success: function(data){
			if(data.status == true){
				console.log(data);
				const userdata = JSON.parse(localStorage.getItem("sbtokenp"));
				var updateJsonData = {
					bio : userdata.bio,
					bluetick : userdata.bluetick,
					home: userdata.home,
					image: data.result,
					living: userdata.living,
					name: userdata.name,
					userid: userdata.userid,
					username: userdata.username,
					verify: userdata.verify
				};
				localStorage.setItem('sbtoken',JSON.stringify(updateJsonData));
        localStorage.setItem('sbtokenp',JSON.stringify(updateJsonData));
        destroyCroppie();
        var newimage = "<?php echo $baseurl; ?>/userprofile/"+data.result;
        $('.profileimage img').attr('src', newimage);
			}else{
				$("#errormsg").html("*Something Error Please Try After Some Time Later.");
			}
		},
		complete: function(){
			$("#cover").hide();
      $("#loader").hide();
		}
	});
}


















		const opennav = () =>{
			history.go(-1);
		}

		if(localStorage.getItem("sbtoken") === null){
    		location.href="../login";
  		}else{
		    const userdata = JSON.parse(localStorage.getItem("sbtokenp"));
		    var uimgdata="<?php echo $baseurl; ?>/userprofile/"+userdata.image;
		    $(".uimage").prop("src",uimgdata);
  		}


		function followme(following){
			$("#snapprofilebuttonsf").prop("onclick", null).off("click");
			$("#changeme").html('<i class="fa fa-user"></i> Following');
			var count_follow = $("#followers").html();
			count_follow++;
			$("#followers").html(count_follow);
			var follower = "<?php echo $userid; ?>";
			$.ajax({
				url : "ajax/followme",
				type : "POST",
				data :{following: following},
				cache: false,
				success: function(data){
				}
			});
		}





















		function resnap(userid){
		  var snapid = "1";
		  $.ajax({
		    url : "ajax/resnap",
		    type : "POST",
		    data : {userid: userid, snapid: snapid},
		    cache: false,
		    success: function(data){
		      MySnap();
		    }
		  });
		}

		function moreit(id){
		  var x = document.getElementById("more"+id);
		  if (x.style.display === "none") {
		    x.style.display = "block";
		  } else {
		    x.style.display = "none";
		  }
		}

		function shareit(pid){
		  var x = document.getElementById("share2"+pid);
		  if (x.style.display === "none") {
		    x.style.display = "block";
		  } else {
		    x.style.display = "none";
		  }
		}

		function loveme(id){
		  love(id);
		  var x = document.getElementById("loveme_icon"+id);
		  x.style.display = "block";
		  if (x.style.display === "block") {
		    setTimeout(() => {
		      x.style.display = "none";
		    }, 1200);
		  }
		}

		function love(id) {
		  var userid = "1";
		  var curr_love = $("#love_id"+id).html();
		  curr_love++;
		  $("#love_id"+id).html(curr_love);

		  var curr_icon = $("#love_icon"+id).html();
		  $("#love_icon"+id).html('<i class="fa fa-heart"></i>');

		    $.ajax({
		      url : "ajax/insertlove",
		      type : "POST",
		      data : {id: id, userid: userid},
		      cache: false,
		      success: function(data){
		     }
		   });
		}



  	$.ajax({
		    url : "ajax/dialogues",
		    type : "POST",
		    cache: false,
		    beforeSend: function () {
		      //$(".loader3").show();
		    },
		    success: function(data){
		      $("#dialoguebox").append(data);
		      // $("#myslambook").html("Search Results")
		    },
		    complete: function () {
		      //$(".loader3").hide();
		    }
		});
	</script>
</body>
</html>
<?php } ?>