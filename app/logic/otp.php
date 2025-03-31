<?php
session_start();
include "connection.php";

if(isset($_POST['email'])){
$email  = $_POST['email'];    
$otp  = $_POST['otp'];

$result1 = mysqli_query($con, "SELECT * FROM users WHERE user_email='$email' AND resetpin = '$otp'");

if ($result1->num_rows == 0) { 
    echo '<br><div class="alert alert-danger text-center">Incorrect OTP!</div><br>';
    exit();
  }else{
	
		$_SESSION['newemail'] = $email;
		
      echo '<script>window.setTimeout(function() {window.location.href = "resetpass.php";}, 1000);</script>';
	
    }
    
}  
else{ echo '<div class="alert alert-danger text-center">We noticed unusual activity on your account, you may try again!</div>';
}


