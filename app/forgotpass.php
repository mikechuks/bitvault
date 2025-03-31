<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
<title>BitVault</title>
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/bootstrap-icons.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="manifest" href="manifest.webmanifest">
<meta id="theme-check" name="theme-color" content="#000">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">
</head>

<form onsubmit="fpajax()" class="page-content my-0 py-0">
<div class="card bg-5 card-fixed">
<div class="card-center mx-3 px-4 py-4 bg-white rounded-m">
<center><img src="images/logo.png" width=200>
<p>Enter your registered email to request OTP.</p></center>
<span id="show_message"></span>

<div class="form-custom form-label form-border form-icon mb-3 bg-transparent">
<i class="bi bi-person-circle font-13"></i>
<input type="email" class="form-control rounded-xs" name="email" placeholder="Email">
<label for="c1" class="color-theme">Email</label>
<span>(required)</span>
</div> 

<button class="btn btn-full w-100 gradient-highlight shadow-bg shadow-bg-s mt-4" type="submit" name="fp" id="fpbtn">Request OTP</button>
<div class="row">
</div>
</div>
<div class="card-overlay rounded-0 m-0 bg-black opacity-70"></div>
</div>
</form>

</div>
 <script>
	function fpajax() {
	event.preventDefault();

	  $('#fpbtn').html('<span class="spinner-grow spinner-grow-sm"></span>Initializing...');
		$('#fpbtn').prop('disabled',true);

			  $.ajax({
				type: 'POST',
				url: 'logic/forgotpassword.php',   
				data: $('form').serialize(),
				success: function (data) {

	  $('#fpbtn').prop('disabled',false);
	  $('#fpbtn').html('Request <i class="icon-circle-right2 ml-2"></i>');

	  $("#show_message").html(data);
				  
				}
			  });

	}
	</script>
<script src="scripts/bootstrap.min.js"></script>
</body></html>