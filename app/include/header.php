<?php 
include ('logic/connection.php');
session_start();

if(isset($_SESSION['user_email'], $_SESSION['user_name'])) {

$email = $_SESSION['user_email'];
$name = $_SESSION['user_name'];

}else{
    header("location:index.php");
}

$query_history = "SELECT * FROM investment_history WHERE username ='$name' and status ='0'";

$result = mysqli_query($myConn, $query_history);
while ($row =  mysqli_fetch_assoc($result)){
    $id = $row["id"];
    $amount = $row["amount"];
    $status = $row["status"];
    $crypto = $row["currency"];
    $investment_id = $row['investment_id'];
    $start_date = $row["start_date"];
    $end_date = $row["end_date"];
    
    $nw = date("Y-m-d H:i:s");
    
if($nw > $end_date){
    
$query_his = "SELECT * FROM investment_type WHERE  id ='$investment_id'";

$result = mysqli_query($myConn,$query_his);
$rowa =  mysqli_fetch_array($result, MYSQLI_BOTH);

$roi = $rowa['percentage'];
$investment_name = $rowa['name'];

$profit = ($roi/100)*$amount;

$new_amount = $amount + $profit;

$sql =  "UPDATE investment_history SET status = '1' WHERE investment_history.id = '$id'";
$result = mysqli_query($myConn, $sql);


$query_userdetails = "SELECT * FROM users WHERE user_email = '$email'";
$result = mysqli_query($myConn, $query_userdetails);
$row = mysqli_fetch_array($result, MYSQLI_BOTH);

$cryptobalance =$row["$crypto"];
$totalbalance =$row["total_balance"];

$newcryptobalance=$cryptobalance + $new_amount;
$newtotalbalance=$totalbalance + $new_amount;

$sql =  "UPDATE users SET total_balance = '$newtotalbalance',$crypto='$newcryptobalance'  WHERE users.user_email = '$email'";
$result = mysqli_query($myConn, $sql);
    
    
$to      = $email; // Send email to our user
$subject = 'Investment Complete'; // Give the email a subject 
$message ='<html><body><div style="padding:5px;background:#eae8e8;line-height:1.6;font-size:13px"><table width=100% border=0 style="background:#fff;padding:0 10px;max-width:500px;margin:0 auto;"><tr><td>';
$message .= '<a href="https://gt-marketing.pro"><img style="width:240px;max-width:50%;margin:10px" src="edgecoin.pro/logo.png"/></a>';
$message .= '</td></tr>';
$message .='<tr><td colspan="2" style="border-top:1px solid #ccc;padding:10px 0"><h3 style="color:#333;font-weight:100;font-size:20px;margin:0;padding:0;font-family:Verdana,Arial,\'Segoe UI\',sans-serif;text-transform:capitalize">'.$subject.'</h3></td></tr>
<tr><td colspan="2">Dear '.$email.'!<br>
Your investment of '.$amount.' has completed successfully.<br><br>
You can check your investment profit on your dashboard.
Start date:  '.$start_date.' <br>
End date:  '.$end_date.' 
</td></tr>

<tr><td colspan="2" style="color: red">Note: <em>Please note that no staff of GT-Marketing will request for your login details</em></td></tr>';
$message .= '</table></div></body></html>';

$header = array();
$header[] = "MIME-Version: 1.0";
$header[] = "From:  {$subject}<{$adminemail}>";
/* Set message content type HTML*/
$header[] = "Content-type:text/html; charset=iso-8859-1";
$header[] = "Content-Transfer-Encoding: 7bit";
mail($to, $subject, $message, implode("\r\n", $header)); 
  
    }
}

$query_userdetails = "SELECT * FROM users WHERE user_email = '$email'";
$result = mysqli_query($myConn, $query_userdetails);
$row = mysqli_fetch_array($result, MYSQLI_BOTH);

$query_whatsapp = "SELECT * FROM wallets WHERE id = '1'";
$whatsapp = mysqli_query($myConn, $query_whatsapp);
$r = mysqli_fetch_array($whatsapp, MYSQLI_BOTH);

$whatsappno = $r["whatsappno"];
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
<title><?=$sitename?> - Finance, Banking, Wallet, Crypto Mobile</title>
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/bootstrap-icons.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@500;600;700&amp;family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet">
<link rel="manifest" href="manifest.webmanifest">
<meta id="theme-check" name="theme-color" content="#efeef3">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png"></head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">


<body class="theme-light">
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">

<div id="footer-bar" class="footer-bar-1 footer-bar-detached">
<a href="investments.php"><i class="bi bi-wallet2"></i><span>Investments</span></a>
<a href="market.php"><i class="bi bi-graph-up"></i><span>Market</span></a>
<a href="dashboard.php" class="circle-nav-2"><i class="bi bi-house-fill"></i><span>Home</span></a>
<a href="transactions.php"><i class="bi bi-receipt"></i><span>Transactions</span></a>
<a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-swap"><i class="bi bi-arrow-repeat"></i><span>Swap</span></a>
</div>

<div class="page-content footer-clear">

<div class="pt-3">
<div class="page-title d-flex">
<div class="align-self-center me-auto">
<p class="color-highlight header-date"></p>
<h1>Welcome!</h1>
</div>
<div class="align-self-center ms-auto">
<a href="#" data-bs-toggle="dropdown" class="icon gradient-blue shadow-bg shadow-bg-s rounded-m">
<img src="images/pictures/25s.png" width="45" class="rounded-m" alt="img">
</a>

<div class="dropdown-menu">
<div class="card card-style shadow-m mt-1 me-1">
<div class="list-group list-custom list-group-s list-group-flush rounded-xs px-3 py-1">

<a href="transactions.php" class="list-group-item">
<i class="has-bg gradient-green shadow-bg shadow-bg-xs color-white rounded-xs bi bi-graph-up"></i>
<strong class="font-13">Activity</strong>
</a>
<a href="profile.php" class="list-group-item">
<i class="has-bg gradient-yellow shadow-bg shadow-bg-xs color-white rounded-xs bi bi-person-circle"></i>
<strong class="font-13">Account</strong>
</a>
<a href="logout.php" class="list-group-item">
<i class="has-bg gradient-red shadow-bg shadow-bg-xs color-white rounded-xs bi bi-power"></i>
<strong class="font-13">Log Out</strong>
</a>

<a href="#" class="list-group-item" data-toggle-theme="" data-trigger-switch="switch-1">
<i class="has-bg gradient-blue shadow-bg shadow-bg-xs color-white rounded-xs bi bi-lightbulb-fill"></i>
<div class="form-switch ios-switch switch-green switch-s me-2"> 
    <input type="checkbox" data-toggle-theme="" class="ios-input" id="switch-1">
    <label class="custom-control-label" for="switch-1"></label>
</div> 
</a>

<div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</div>
</div>
</div>
</div>
</div>
</div>

<script src="//code.tidio.co/oh0lgeilivfjfxin5dcgbhgt7nymukgw.js" async></script>
