<?php
session_start();
include "connection.php";
include 'functions.php';
include 'config.php';

if(isset($_POST['method'])){
    $crypto = $_POST['method']; 
    $amount = $_POST['amt'];
    $username=$_SESSION["user_name"];
    
    $query_user = "SELECT * FROM users WHERE user_name='$username'";
    $user_result = mysqli_query($conn,$query_user);
    $row =  mysqli_fetch_array($user_result, MYSQLI_BOTH);
    
    $email =$row['user_email'];

    $date=date('Y-m-d');
    $key=rand(0000,9999);
    $payment_id=md5($key);

    if ($amount < $min_receiving){ 
      
        echo "<script>
        toastr.error('Minimum receivable amount is " . $min_receiving . " USD!', 'Error');
      </script>";

        exit();
    }
    
    $_SESSION['payment_id']=$payment_id;
    $_SESSION['currency']=$crypto;
    $_SESSION['amount']=$amount;
    $status='OK';
    

if($status=='OK'){
mysqli_query($conn, ("INSERT INTO `transactions`(`transaction_id`,`username`,`currency`,`amount`,`type`,`date`) VALUES ('$payment_id', '$username', '$crypto', '$amount','Receive','$date')"));

        echo "<script>
        toastr.success('Receivig fund processing', 'Success')
        </script>";
      
		 $subject = "Crypto Receiviving Process - {$date}";
		 $body = "
		 <div style='background: #E4E9F0'>
		 <center><img src='$siteurl/logo.png' width='100px;'></center>
		 <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
		 <center><img src='$siteurl/mail.png' width='100px'></center>
		 <p>Hi <b>$username</b></p>
		 <p>Welcome to $sitename</p>
		 <p>Your fund request has been received and being process, you will receive the funds into the wallet provided within 5min.</p>
		 <p>Amount: <b>$amount USD</b></p>
		 <p>Equivalent Amount in $crypto:
		 <p>Please, ensure that the equivalent $crypto amount is paid into the wallet provided.</p>
		 <p><a href='$siteurl/app/login.php' style='color: dodgerblue; text-decoration: none'>Login...</a></p>
		 <p>Thanks</p>
		 <p>Support Team, - $sitename</p>
		 <p style='font-size: 13px'>Please consider all mails from us as confidential.</p><br>
		 </div><br>
		 </div>";
 
		 $send = sendMail($email, $subject, $body);
		 echo '<script>window.setTimeout(function() {window.location.href = "invoice.php";}, 1000);</script>';
    
    }
}
else{ echo "<script>
toastr.error('Please, check the agreement box!', 'Error')
</script>";
}


