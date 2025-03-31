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

<form onsubmit="registerajax()" class="page-content my-0 py-0">
<div class="card bg-5 card-fixed">
<div class="card-center mx-3 px-4 py-4 bg-white rounded-m">
<center><img src="images/logo.png" width=200>
<p>Create your Account.</p></center>
<span id="show_message"></span>
<div class="form-custom form-label form-border form-icon mb-3 bg-transparent">
<i class="bi bi-person-circle font-13"></i>
<input type="text" class="form-control rounded-xs" name="username" placeholder="Username">
<label for="c1a" class="color-theme">Username</label>
<span>(required)</span>
</div>
<div class="form-custom form-label form-border form-icon mb-3 bg-transparent">
<i class="bi bi-at font-16"></i>
<input type="email" class="form-control rounded-xs" name="email" placeholder="Email Address">
<label for="c1" class="color-theme">Email Address</label>
<span>(required)</span>
</div>
<div class="form-custom form-label form-border form-icon mb-3 bg-transparent">
<i class="bi bi-telephone font-16"></i>
<input type="tel" class="form-control rounded-xs" name="phone" placeholder="Phone">
<label for="c1" class="color-theme">Phone</label>
<span>(required)</span>
</div>

<?php 

if($_GET['referral']==""){
	$referral="Referred by System";
}else{
	$referral=$_GET['referral'];
}

?>


<div class="form-custom form-label form-border form-icon mb-3 bg-transparent">
	<i class="bi bi-people font-16"></i>
	<input type="tel" class="form-control rounded-xs" name="referral" readonly value="<?=$referral?>">
	<label for="c1" class="color-theme">Referral</label>
	<span>(required)</span>
</div>

<div class="form-custom form-label form-border form-icon mb-3 bg-transparent auth-pass-inputgroup">
<i class="bi bi-asterisk font-13"></i>
<input type="password" class="form-control rounded-xs" name="password" onpaste="return false" placeholder="Enter password" id="password-input" aria-describedby="passwordInput" required>
<label for="c2" class="color-theme">Choose Password</label>
<span>(required)</span>
</div>
<div class="form-custom form-label form-border form-icon mb-4 bg-transparent auth-pass-inputgroup">
<i class="bi bi-asterisk font-13"></i>
<input type="password" class="form-control rounded-xs" name="con_password" onpaste="return false" placeholder="Confirm password" id="password-input" aria-describedby="passwordInput" required>
<label for="c3" class="color-theme">Choose Password</label>
<span>(required)</span>
</div>                                 
                                        
<div class="form-check form-check-custom">
<input class="form-check-input" type="checkbox" name="type" value="" id="c2a">
<label class="form-check-label font-12" for="c2a">I agree with the <a href="#">Terms and Conditions</a>.</label>
<i class="is-checked color-highlight font-13 bi bi-check-circle-fill"></i>
<i class="is-unchecked color-highlight font-13 bi bi-circle"></i>
</div>
<button class="btn btn-full w-100 gradient-highlight shadow-bg shadow-bg-s mt-4" type="submit" name="register" id='registerbtn'>Create Account</button>
<div class="row">
<div class="col-12 text-end">
<a href="index.php" class="font-11 color-theme opacity-40 pt-4 d-block">Sign In Account</a>
</div>
</div>
</div>
<div class="card-overlay rounded-0 m-0 bg-black opacity-70"></div>
</div>
</form>



</div>
    <script>
	function registerajax() {
 //process register
	event.preventDefault();

	  $('#registerbtn').html('<span class="spinner-grow spinner-grow-sm"></span> Please Wait...');
		$('#registerbtn').prop('disabled',true);

			  $.ajax({
				type: 'POST',
				url: 'logic/register.php',   
				data: $('form').serialize(),
				success: function (data) {

	  $('#registerbtn').prop('disabled',false);
	  $('#registerbtn').html('REGISTER');

	  $("#show_message").html(data);
				  
				}
			  });

	}
	</script>
<script src="scripts/bootstrap.min.js"></script>
</body></html>