<?php
session_start();
include "connection.php";
include 'functions.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $crypto = $_POST["crypto$id"]; 
    $amount = $_POST["amount$id"];
    $username=$_SESSION["user_name"];


    $query_investment = "SELECT * FROM investment_type WHERE id='$id'";
    $investment_result = mysqli_query($conn,$query_investment);
    $row =  mysqli_fetch_array($investment_result, MYSQLI_BOTH);
    $duration = "+".$row['duration']." days";
    
    $start_date = date("Y-m-d H:i:s");
    $end_date = date("Y-m-d H:i:s", strtotime($duration));
    
    $min_amount = $row['min_amount'];
    $max_amount = $row['max_amount'];
    $inv_name = $row['name'];
    
     if ($min_amount > $amount || $amount > $max_amount){ 
        echo "<script>
                 toastr.error('Please enter amount between $min_amount USD and $max_amount USD!', 'Error')
        </script>";
        exit();
    }
    
    $query_user = "SELECT * FROM users WHERE user_name='$username'";
    $user_result = mysqli_query($conn,$query_user);
    $rowa =  mysqli_fetch_array($user_result, MYSQLI_BOTH);
    
    $email =$rowa['user_email'];
    
    $cryptobalance =$rowa["$crypto"];
    $totalbalance =$rowa["total_balance"];
    
    $newcryptobalance=$cryptobalance-$amount;
    $newtotalbalance=$totalbalance-$amount;
    
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
mysqli_query($conn, ("INSERT INTO `investment_history`(`investment_id`, `username`, `amount`, `currency`, `start_date`, `end_date`) VALUES ('$id', '$username', '$amount', '$crypto','$start_date','$end_date')"));

        echo "<script>
        toastr.success('Your investment for $inv_name Plan has started successful', 'Success')
        </script>";
      

		 $subject = "Investment started - {$start_date}";
		 $body = "
		 <div style='background: #E4E9F0'>
		 <center><img src='$siteurl/logo.png' width='100px;'></center>
		 <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
		 <center><img src='$siteurl/mail.png' width='100px'></center>
		 <p>Hi <b>$username</b></p>
		 <p>Welcome to $sitename</p>
		 <p>Your investment has started successfully, you can find the details of your investment below.</p>
		 <p>Investment Amount: <b>$amount USD</b></p>
		 <p>Start date: <b>$start_date</b></p>
		 <p>End date: <b>$end_date</b></p>
		 <p><a href='$siteurl/app/login.php' style='color: dodgerblue; text-decoration: none'>Login...</a></p>
		 <p>Thanks</p>
		 <p>Support Team, - $sitename</p>
		 <p style='font-size: 13px'>Please consider all mails from us as confidential.</p><br>
		 </div><br>
		 </div>";

         $send = sendMail($email, $subject, $body);
 
 
		 echo '<script>window.setTimeout(function() {window.location.href = "investments.php";}, 1000);</script>';
    
    }
}
else{ echo "<script>
toastr.error('Please, check the agreement box!', 'Error')
</script>";
}


