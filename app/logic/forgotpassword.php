<?php
include "connection.php";
include 'functions.php';

if(isset($_POST['email'])){
    
$email  = $_POST['email'];

$reset_id = rand(1111,9999); //generating random code, this will act as reset key

$result1 = mysqli_query($con, "SELECT * FROM users WHERE user_email = '$email'");

if ($result1->num_rows == 0) { 
    echo '<br><div class="alert alert-danger text-center">Email Address is not registered on our database!</div><br>';
    exit();
  }else{

  $query = mysqli_query($con,"UPDATE `users` SET resetpin='$reset_id' WHERE user_email='$email'"); 

    //echo mysqli_error($myConn);exit();
    if ($query == TRUE) {
      
		 $subject = "Reset OTP - {$date}";
		 $body = "
		 <div style='background: #E4E9F0'>
		 <center><img src='$siteurl/logo.png' width='100px;'></center>
		 <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
		 <center><img src='$siteurl/mail.png' width='100px'></center>
		 <p>Welcome to $sitename</p>
		 <p>Hello, customer</p>
		 <p>We received a request to reset your password.</p>
		 <p>reset OTP:</p>
		 <center><h1 style='color:red;'>$reset_id</h1></center>
		 <p>If this request did not originate from you, please let us know by sending an email to $adminemail.</p>
		 <p><a href='$siteurl/app/login.php' style='color: dodgerblue; text-decoration: none'>Login...</a></p>
		 <p>Thanks</p>
		 <p>Support Team, - $sitename</p>
		 <p style='font-size: 13px'>Please consider all mails from us as confidential.</p><br>
		 </div><br>
		 </div>";

		 $send = sendMail($email, $subject, $body);
 

		 
      echo '<div class="alert alert-success text-center">OTP sent Successful!</div>';
      echo '<script>window.setTimeout(function() {window.location.href = "otp.php?email='.$email.'";}, 1000);</script>';
	
    }
    
    
    
    
else{ echo '<div class="alert alert-danger text-center">Registration Error!</div>';
}
}
}

