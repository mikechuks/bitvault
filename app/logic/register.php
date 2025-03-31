<?php
include "connection.php";
include 'functions.php';

if(isset($_POST['email'])){
$email  = $_POST['email'];
$username  = $_POST['username'];
$phone  = $_POST['phone']; 
$password = $_POST['password'];
$cpassword = $_POST['con_password'];
$referral = $_POST['referral'];
$date = date('Y-m-d');
$reset_id = rand(1111111111,9999999999); //generating random code, this will act as reset key
if(strlen($password) < 6){
	echo '<div class="alert alert-danger text-center">Password should not be less than 6 strings!</div>';
	exit(); 
} 

if($password != $cpassword){
	echo '<div class="alert alert-danger text-center">Confirm Password mismatched!</div>';
	exit(); 
} 


$result2 = mysqli_query($con, "SELECT * FROM users WHERE user_name = '$username'");
if ($result2->num_rows > 0) { 
    echo '<br><div class="alert alert-danger text-center">Username is already registered!</div><br>';
    exit();
  }
  
$result1 = mysqli_query($con, "SELECT * FROM users WHERE user_email = '$email'");
if ($result1->num_rows > 0) { 
    echo '<br><div class="alert alert-danger text-center">Email Address is already registered!</div><br>';
    exit();
  } else {
//

$query = mysqli_query($con,"INSERT INTO `users`(`user_email`,`user_name`,`user_password`,`phone`,`referral`,`date`) VALUES ('$email', '$username', '$password', '$phone','$referral','$date')");


    //echo mysqli_error($myConn);exit();
    if ($query == TRUE) {
      echo '<div class="alert alert-success text-center">Account created Successfully!</div>';
      echo '<script>window.setTimeout(function() {window.location.href = "index.php";}, 1000);</script>';
      
      
   
		 $subject = "Registration - {$date}";
		 $body = "
		 <div style='background: #E4E9F0'><br>
		 <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
		 <center><img src='$siteurl/mail.png' width='100px'></center>
		 <center><img src='$siteurl/logo.png' width='100px;'></center>
		 <p>Hi, <b>$username</b></p>
		 <p>Welcome to $sitename</p>
		 <p>Thank you for becoming a part of the trading community at $sitename, where trading makes sense. $sitename Ltd is one the world\'s leading regulated online trading brokers.</p>
		 <p>To ensure the safest and securest trading experience possible, it is fully regulated by various regulators. Exclusively on $sitename  ! Introducing $sitename  Rewards, loyalty programme awarding you Cashback for every trade you make. As a $sitename  trader, you will benefit from:</p>
		 <center><img src='$siteurl/emailimg.jpg'></center>
		 <p>• $sitename   Rewards – The loyalty programme that awards you Cashback for every trade you make. </p>
		 <p>• Mass Insights  Technology- Live Stream of Market Events & Aggregated Trader Behaviour  </p>
		 <p>• Fully Regulated and Secure Trading Environment.  </p>
		 <p>• 24/7 support and a Personal Trading Consultant.  </p>
		 <p>find your login details below:</p>
    		<p>Email: $email</p>
    		<p>Password: $password</p>
		 <p><a href='$siteurl/app/login.php' style='color: dodgerblue; text-decoration: none'>Login...</a></p>
		 <p>Thanks</p>
		 <p>Support Team, - $sitename</p>
		 <p style='font-size: 13px'>Please consider all mails from us as confidential.</p><br>
		 </div><br>
		 </div>";
 
		 $send = sendMail($email, $subject, $body);
		
    
    }
    
    
    
    
else{ echo '<div class="alert alert-danger text-center">Registration Error!</div>';
}
}
}

