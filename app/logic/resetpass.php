<?php
session_start();
include "connection.php";
include 'functions.php';

if(isset($_POST['email'])){
$email = $_POST['email'];  
$pass1  = $_POST['pass1'];  
$pass2  = $_POST['pass2'];  

if($pass1!=$pass2){
    echo '<br><div class="alert alert-danger text-center">Confirm password not match!</div><br>';
    exit();
}else{
		$query = mysqli_query($con,"UPDATE `users` SET user_password='$pass1' WHERE user_email='$email'"); 

    //echo mysqli_error($myConn);exit();
    if ($query == TRUE) {
      
		 $subject = "Password Reset";
		 $body = "
		 <div style='background: #E4E9F0'>
		 <center><img src='$siteurl/logo.png' width='100px;'></center>
		 <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
		 <center><img src='$siteurl/mail.png' width='100px'></center>
		 <p>Welcome to $sitename</p>
		 <p>Hello, customer</p>
		 <p>Your password is reset successfully</p>
		 <p>If this request did not originate from you, please let us know by sending an email to $adminemail.</p>
		 <p><a href='$siteurl/app/login.php' style='color: dodgerblue; text-decoration: none'>Login...</a></p>
		 <p>Thanks</p>
		 <p>Support Team, - $sitename</p>
		 <p style='font-size: 13px'>Please consider all mails from us as confidential.</p><br>
		 </div><br>
		 </div>";


		 $send = sendMail($email, $subject, $body);
 
	
		 
      echo '<div class="alert alert-success text-center">Password reset Successfully!</div>';
      echo '<script>window.setTimeout(function() {window.location.href = "index.php";}, 1000);</script>';
	
    }
    
} 
    
}    
else{ echo '<div class="alert alert-danger text-center">Error!</div>';
}