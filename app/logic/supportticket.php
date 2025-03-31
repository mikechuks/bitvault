<?php
session_start();
include "connection.php";
include 'functions.php';

if(isset($_POST['title'])) {
    $username=$_SESSION["user_name"];
    $title = $_POST['title'];
    $message = $_POST['message'];
    $priority = $_POST['priority'];
    
    $id=rand(1000,9999);
    $ticketid = "BV-".$id;
    
    $date = date("Y-m-d");
    $expiry = date("Y-m-d", strtotime('+4 days'));
    
    mysqli_query($conn, ("INSERT INTO `ticket`(`ticket_id`,`username`, `title`, `message`, `priority`, `date`, `expiry`) VALUES ('$ticketid','$username','$message','$title','$priority','$date','$expiry')"));
    
		 $subject = "Ticket Id - {$date}";
		 $body = "
		 <div style='background: #E4E9F0'>
		 <center><img src='$siteurl/logo.png' width='100px;'></center>
		 <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
		 <center><img src='$siteurl/mail.png' width='100px'></center>
		 <p>Hi <b>$username</b></p>
		 <p>Welcome to $sitename</p>
		 <p>Your login information:</p>
		 <p>Login Username: $email</p>
		 <p>Login Password: Your Password</p>
		 <p>You logged into your Accounting Software from a device $user_agent at $time on $longdate.</p>
		 <p>If this login did not originate from you, please let us know by sending an email to $adminemail. Alternatively, you can call +4456232022.</p>
		 <p><a href='$siteurl/app/login.php' style='color: dodgerblue; text-decoration: none'>Login...</a></p>
		 <p>Thanks</p>
		 <p>Support Team, - $sitename</p>
		 <p style='font-size: 13px'>Please consider all mails from us as confidential.</p><br>
		 </div><br>
		 </div>";

		 $send = sendMail($email, $adminemail, $body);
 

     	 
     	 echo "<script> 
                 toastr.success('Ticket submitted successfully!!', 'Success')
        </script>";
		  echo '<script>window.setTimeout(function() {window.location.href = "profile.php";}, 1000);</script>';
}