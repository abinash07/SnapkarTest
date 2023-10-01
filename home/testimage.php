<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://foliotek.github.io/Croppie/croppie.css">
	<script src="https://foliotek.github.io/Croppie/croppie.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



	<style>


		.addp{
			width: 100%;
			border-radius: 5px;
		}
		.addp form{
			width: 95%;
			text-align: center;
		}
		#formhead{
			padding-top: 15px;
			text-align: center;
			font-family: 'Open Sans', sans-serif;
		}
		#upload-demo{
			width: 100%;
			height: 400px;
		  	padding-bottom: 40px;
		}
		.crop-option{
			width: 95%;
			margin: 10px 2.5% 25px 2.5%;
		}
		.crop-icon{
			float: left;
			width: 10%;
		}
		#option{
			font-size: 20px;
    		margin: 10px 10px 0 5px;
		}
		.crop-button{
			float: left;
			width: 90%;
		}

		.addp button{
			background-color: #1877F2;
			color: white;
			padding: 12px 20px;
			border: none;
			cursor: pointer;
			text-align: center;
			width: 100%;
			border-radius: 5px;
			position: relative;
		}
		.addp button:hover {
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
		.sk-close{
			float: right;
			font-size: 20px;
			margin-right: 10px;
		}
		/* @media (min-width: 600px){
			.modal-body{
				width: 40%;
				position: relative;
				top: 10%;
				left: 40%;
				padding: 0;
				border-radius: 4px;
				text-align: center;
				margin-bottom: 10px;
			}
		} */
		.demoimage{
			display: flex;
			align-items: center;
			justify-content: center;  
		}
		.upload-demo-original img{
			height: 400px;
			width: auto;

		}
	</style>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<label class="cabinet center-block">
			<figure>
				<img src="" class="gambar img-responsive img-thumbnail" id="item-img-output" />
			<figcaption>
				<i class="fa fa-camera"></i></figcaption>
			    </figure>
					<input type="file" class="item-img file center-block" name="file_photo" accept="image/png, image/gif, image/jpeg"/>
				</label>
			</div>
		</div>
	</div>





<div class="sk-modal">
	<div class="modal-body" id="modal-more">
		<div class="modal-close" onclick='closeit();'><i class="fa fa-times"></i></div>
		<div class="addp">
			<p id="formhead">Crop</p>
			<div id="upload-demo" class="center-block" style="display: block;"></div>

			<div class="demoimage" style="display: none;">
				<div class="upload-demo-original">
					<img id="fdgdggd" src="">
				</div>
			</div>
			

			<p id="errormsg"></p>

			<div class="crop-option">
				<div class="crop-icon">
					<p id="option"><i class="fa fa-arrows"></i></p>
				</div>
				<div class="crop-button">
					<button type="button" id="cropImageBtn" class="btn btn-primary">Upload</button>
				</div>
			</div>

		</div>
	</div>
</div>


<script>


	// Start upload preview image
	$(".gambar").attr("src", "https://user.gadjian.com/static/images/personnel_boy.png");


	//$('.sk-modal').css('display','block');

	$('#option').on('click',function(e){
		e.preventDefault();
		$('#upload-demo').toggle();
    	$('.demoimage').toggle();
		var currentText = $('#formhead').text();
        $('#formhead').text(currentText === 'Original' ? 'Crop' : 'Original');
	});


	var $uploadCrop,
	tempFilename,
	rawImg,
	imageId;


var nw = '';
var nh = '';
function readFile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
  
            $('.sk-modal').css('display','block');
            
            // Create an image element to load the uploaded image
            var img = new Image();
            img.src = e.target.result;
            
            // Wait for the image to load and get its width
            img.onload = function () {
			    var size = img.size;

				if(size <= 10000000){
					quality=0.8;
				}
				if(size >= 20000000){
					quality=0.7;
				}
				if(size >= 40000000){
					quality=0.6;
				}

                $uploadCrop.croppie('bind', {
                    url: e.target.result
                }).then(function () {
                    console.log('jQuery bind complete');
                });
				$('#fdgdggd').attr('src',e.target.result);
            };
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        swal("Sorry - your browser doesn't support the FileReader API");
    }
}
	
	var quality = 0.7;


	$uploadCrop = $('#upload-demo').croppie({
		viewport: {
			width: 300,
			height: 350,
		},
		enforceBoundary: true,
		enableExif: true,
		mouseWheelZoom: false,
	});


	$('.item-img').on('change', function () { 
      	imageId = $(this).data('id'); 
      	tempFilename = $(this).val();
		$('#cancelCropBtn').data('id', imageId); 
		readFile(this); 
    });


	$('#cropImageBtn').on('click', function (ev) {

		$uploadCrop.croppie('result', {
			type: 'base64',
			format: 'jpeg',
			size: 'original',
			quality: quality,
			

		}).then(function (resp) {
			console.log(nw, nh);
			$('#item-img-output').attr('src', resp);
			$('.sk-modal').css('display','none');
		});
	});

	// End upload preview image


</script>
</body>
</html>