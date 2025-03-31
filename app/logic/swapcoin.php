<?php
session_start();
include "connection.php";
include 'functions.php';

if(isset($_POST['swapfrom'])){
    $swapfrom = $_POST['swapfrom']; 
    $swapto = $_POST['swapto']; 
    $swapamount = $_POST['swapamount'];
    $username=$_SESSION["user_name"];


    $date=date('Y-m-d');

    $query_user = "SELECT * FROM users WHERE user_name='$username'";
    $user_result = mysqli_query($conn,$query_user);
    $row =  mysqli_fetch_array($user_result, MYSQLI_BOTH);
    
    $email =$row['user_email'];
    
    $swapfrombalance =$row["$swapfrom"];
    $swaptobalance =$row["$swapto"];
    
    $newswapfrombalance=$swapfrombalance - $swapamount;
    $newswaptobalance=$swaptobalance + $swapamount;
    

    if ($swapamount > $swapfrombalance){ 
        echo "<script>
        toastr.error('Insufficient Fund to initiate your swap process!', 'Error')
        </script>";
        exit();
      }else{
	mysqli_query($conn, ("UPDATE users set $swapfrom='$newswapfrombalance',$swapto='$newswaptobalance' WHERE user_name = '$username'"));
    $status='OK';
}

if($status=='OK'){
mysqli_query($conn, ("INSERT INTO `swaps`( `username`, `amount`, `swapfrom`, `swapto`) VALUES ('$username', '$swapamount','$swapfrom','$swapto')"));

        echo "<script>
        toastr.success('Crypto Swapped successful', 'Success')
        </script>";
      
		 $subject = "Swap Crypto - {$date}";
		 $body = "
		 <div style='background: #E4E9F0'>
		 <center><img src='$siteurl/logo.png' width='100px;'></center>
		 <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
		 <center><img src='$siteurl/mail.png' width='100px'></center>
		 <p>Hi <b>$username</b></p>
		 <p>Welcome to $sitename</p>
		 <p>Your coin swap has been initiated succeefully.</p>
		 <p>Amount: <b>$swapamount</b></p>
		 <p>Swap From: <b>$swapfrom</b></p>
		 <p>Swap To: <b>$swapto</b></p>
		 <p>Swap Date: <b>$date</b></p>
		 <p>If this transaction did not originate from you, please let us know by sending an email to $adminemail.</p>
		 <p><a href='$siteurl/app/login.php' style='color: dodgerblue; text-decoration: none'>Login...</a></p>
		 <p>Thanks</p>
		 <p>Support Team, - $sitename</p>
		 <p style='font-size: 13px'>Please consider all mails from us as confidential.</p><br>
		 </div><br>
		 </div>";

		 $send = sendMail($email, $subject, $body);
 
	
    
    }
}
else{ echo "<script>
toastr.error('Please, check the agreement box!', 'Error')
</script>";
}


