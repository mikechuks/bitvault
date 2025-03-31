<?php
session_start();
include "connection.php";
include 'functions.php';

// Login Login Function

if(isset($_POST['email'])) {
	$email = $_POST['email'];
    $password = $_POST['password'];
	$logindirectly = newlogin($email, $password);

$query_user = "SELECT * FROM users WHERE user_email='$email'";
$user_result = mysqli_query($conn,$query_user);
$row =  mysqli_fetch_array($user_result, MYSQLI_BOTH);
$username =$row['user_name'];
$status =$row['status'];
$date = date('Y-m-d');
$time = date('h:i:s');
$longdate = date('M d, Y');
$user_agent = $_SERVER['HTTP_USER_AGENT'];

if (!empty($_SERVER['HTTP_CLIENT_IP'])){
	$ip=$_SERVER['HTTP_CLIENT_IP'];
  //Is it a proxy address
  }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
	$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
  }else{
	$ip=$_SERVER['REMOTE_ADDR'];
  }

	if($logindirectly){
		if($status=='active'){

		 // send mail

		 $subject = "Login - {$date}";
		 $body = "
		 <div style='background: #E4E9F0'><br>
		 <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
		 <center><img src='$siteurl/mail.png' width='100px'></center>
		 <center><img src='$siteurl/logo.png' width='100px;'></center>
		 <p>Hi <b>$username</b></p>
		 <p>Welcome to $sitename</p>
		 <p>Your login information:</p>
		 <p>Login Username: $email</p>
		 <p>Login Password: Your Password</p>
		 <p>You logged into your trading account from a device $user_agent at $time on $longdate.</p>
		 <center><img src='$siteurl/emailimg.jpg'></center>
		 <p>If this login did not originate from you, please let us know by sending an email to $adminemail. Alternatively, you can call +4456232022.</p>
		 <p><a href='$siteurl/app/login.php' style='color: dodgerblue; text-decoration: none'>Login...</a></p>
		 <p>Thanks</p>
		 <p>Support Team, - $sitename</p>
		 <p style='font-size: 13px'>Please consider all mails from us as confidential.</p><br>
		 </div><br>
		 </div>";
 
		 $send = sendMail($email, $subject, $body);

				mysqli_query($conn, ("INSERT INTO `logs`(`username`,`device`,`location`) VALUES ('$username', '$user_agent','$ip')"));
				echo '<div class="alert alert-success text-center">Login Successful!</div>';
				echo '<script>window.setTimeout(function() {window.location.href = "dashboard.php";}, 1000);</script>';

			}elseif($status=="inactive"){echo '<div class="alert alert-danger text-center">Account is inactive!</div>';}
		else{echo'<div class="alert-border-left alert alert-danger"><i class="ri-error-warning-line me-3 align-middle fs-16"></i>Your account is deleted, please contact support to reinstate your account!</div>';}
	} else {
						echo '<div class="alert alert-danger text-center">Incorrect Email or Password!</div>';
					}
		}
		
function newlogin($email, $password){ 
	global $conn;
	$securepass = ($password);
	$sql = "SELECT * FROM users WHERE user_email = '$email' AND user_password = '$password'";
	$result = mysqli_query($conn, $sql);
	if($result->num_rows == 1) {
		$row = mysqli_fetch_array($result, MYSQLI_BOTH);
		$_SESSION['user_name'] = $row['user_name'];
		$_SESSION['user_email'] = $row['user_email'];
		return TRUE;
	}else {
		return false;	
	}
}

