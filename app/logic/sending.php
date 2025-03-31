<?php
session_start();
include "connection.php";
include 'functions.php';
include 'config.php';

if(isset($_POST['agree'])){
    $agree = $_POST['agree']; 
    $crypto = $_POST['crypto']; 
    $amount = $_POST['amount'];
    $wallet = $_POST['wallet'];
    $username=$_SESSION["user_name"];

    $str = rand();
    $transaction_id = md5($str);

    $date=date('Y-m-d');

    $query_user = "SELECT * FROM users WHERE user_name='$username'";
    $user_result = mysqli_query($conn,$query_user);
    $row =  mysqli_fetch_array($user_result, MYSQLI_BOTH);
    
    $email =$row['user_email'];
    
    $cryptobalance =$row["$crypto"];
    $totalbalance =$row["total_balance"];
    
    $newcryptobalance=$cryptobalance-$amount;
    $newtotalbalance=$totalbalance-$amount;
    

    if ($amount < $min_sending){ 
        echo "<script>
                 toastr.error('Minimum amount you can send is  " . $min_sending . " USD!', 'Error')
        </script>";
        exit();
    }
    if ($amount > $cryptobalance){ 
        echo "<script>
        toastr.error('Insufficient Fund, proceed to funding your $crypto wallet!', 'Error')
        </script>";
        exit();
      }else{
	mysqli_query($conn, ("UPDATE users set total_balance='$newtotalbalance',$crypto='$newcryptobalance' WHERE user_name = '$username'"));
    $status='OK';
}

if($status=='OK'){
mysqli_query($conn, ("INSERT INTO `transactions`(`transaction_id`,`username`,`currency`,`amount`,`type`,`date`,`wallet_address`) VALUES ('$transaction_id', '$username', '$crypto', '$amount','Send','$date','$wallet')"));

        echo "<script>
        toastr.success('Crypto Sent successful', 'Success')
        </script>";
      

		 $subject = "Crypto Sending - {$date}";
		 $body = "
		 <div style='background: #E4E9F0'>
		 <center><img src='$siteurl/logo.png' width='100px;'></center>
		 <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
		 <center><img src='$siteurl/mail.png' width='100px'></center>
		 <p>Hi <b>$username</b></p>
		 <p>Welcome to $sitename</p>
		 <p>Your transfer request has been received and being process, you will receive the funds into the wallet provided within 5min.</p>
		 <p>Amount: <b>$amount</b></p>
		 <p>Recieving Wallet: <b>$wallet</b></p>
		 <p>If this transaction did not originate from you, please let us know by sending an email to $adminemail.</p>
		 <p><a href='$siteurl/app/login.php' style='color: dodgerblue; text-decoration: none'>Login...</a></p>
		 <p>Thanks</p>
		 <p>Support Team, - $sitename</p>
		 <p style='font-size: 13px'>Please consider all mails from us as confidential.</p><br>
		 </div><br>
		 </div>";
         
         $send = sendMail($email, $subject, $body);
 
	
		 echo '<script>window.setTimeout(function() {window.location.href = "transactions.php";}, 1000);</script>';
    
    }
}
else{ echo "<script>
toastr.error('Please, check the agreement box!', 'Error')
</script>";
}


