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

<form onsubmit="loginajax()" class="page-content my-0 py-0">
<div class="card bg-5 card-fixed">
<div class="card-center mx-3 px-4 py-4 bg-white rounded-m">
<center><img src="images/logo.png" width=200>
<p>Login to your Account.</p></center>
<span id="show_message"></span>

<div class="form-custom form-label form-border form-icon mb-3 bg-transparent">
<i class="bi bi-person-circle font-13"></i>
<input type="email" class="form-control rounded-xs" name="email" placeholder="Email">
<label for="c1" class="color-theme">Email</label>
<span>(required)</span>
</div>
<div class="form-custom form-label form-border form-icon mb-4 bg-transparent">
<i class="bi bi-asterisk font-13"></i>
<input type="password" class="form-control rounded-xs" name="password" placeholder="Password">
<label for="c2" class="color-theme">Password</label>
<span>(required)</span>
</div>
<div class="form-check form-check-custom">
<input class="form-check-input" type="checkbox" name="type" value="" id="c2a">
<label class="form-check-label font-12" for="c2a">Remember this account</label>
<i class="is-checked color-highlight font-13 bi bi-check-circle-fill"></i>
<i class="is-unchecked color-highlight font-13 bi bi-circle"></i>
</div>
<button class="btn btn-full w-100 gradient-highlight shadow-bg shadow-bg-s mt-4" type="submit" name="login" id="loginbtn">SIGN IN</button>
<div class="row">
<div class="col-6 text-start">
<a href="forgotpass.php" class="font-11 color-theme opacity-40 pt-4 d-block">Forgot Password?</a>
</div>
<div class="col-6 text-end">
<a href="register.php" class="font-12 color-theme opacity-40 pt-4 d-block">Create Account</a>
</div>
</div>
</div>
<div class="card-overlay rounded-0 m-0 bg-black opacity-70"></div>
</div>
</form>


<div class="offcanvas offcanvas-bottom rounded-m offcanvas-detached" id="menu-install-pwa-ios">
<div class="content">
<img src="/icon-192x192.png" alt="img" width="80" class="rounded-m mx-auto my-4">
<h1 class="text-center">Install Bitvault</h1>
<p class="boxed-text-xl">
Install Bitvault on your home screen, and access it just like a regular app. Open your Safari menu and tap "Add to Home Screen".
</p>
<a href="#" class="pwa-dismiss close-menu color-theme text-uppercase font-900 opacity-50 font-11 text-center d-block mt-n2" data-bs-dismiss="offcanvas">Maybe Later</a>
</div>
</div>

<div class="offcanvas offcanvas-bottom rounded-m offcanvas-detached" id="menu-install-pwa-android">
<div class="content">
<img src="/icon-192x192.png" alt="img" width="80" class="rounded-m mx-auto my-4">
<h1 class="text-center">Install Bitvault</h1>
<p class="boxed-text-l">
Install Bitvault to your Home Screen to enjoy a unique and native experience.
</p>
<a href="#" class="pwa-install btn btn-m rounded-s text-uppercase font-900 gradient-highlight shadow-bg shadow-bg-s btn-full">Add to Home Screen</a><br>
<a href="#" data-bs-dismiss="offcanvas" class="pwa-dismiss close-menu color-theme text-uppercase font-900 opacity-60 font-11 text-center d-block mt-n1">Maybe later</a>
</div>
</div>

</div>
 <script>
	function loginajax() {
	event.preventDefault();

	  $('#loginbtn').html('<span class="spinner-grow spinner-grow-sm"></span>Initializing...');
		$('#loginbtn').prop('disabled',true);

			  $.ajax({
				type: 'POST',
				url: 'logic/login.php',   
				data: $('form').serialize(),
				success: function (data) {

	  $('#loginbtn').prop('disabled',false);
	  $('#loginbtn').html('Sign in <i class="icon-circle-right2 ml-2"></i>');

	  $("#show_message").html(data);
				  
				}
			  });

	}
	</script>
<script src="scripts/bootstrap.min.js"></script>
</body></html>