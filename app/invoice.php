<?php 
include "include/header.php";
include 'logic/config.php';

?>

<div class="card card-style"> 
<div class="content">
<div class="mt-1">
<h3 class="mb-0">Payment Invoice</h3>
<p class="color-highlight font-600 mb-n1">Please, pay the equivalent <?= $_SESSION['currency']?> amount into the wallet provided below</p>
</div>
<div class="divider"></div>
<div class="row mb-3 mt-4">
<h5 class="col-4 text-start font-15">Transaction ID:</h5>
<h5 class="col-8 text-end font-14 opacity-60 font-400">#<?= $_SESSION['payment_id']?></h5>
<h5 class="col-4 text-start font-15">Status</h5>
<h5 class="col-8 text-end font-14 font-400"><span class="bg-red-dark px-2 rounded-s">Waiting</span></h5>
<h5 class="col-4 text-start font-15">Amount(USD)</h5>
<h5 class="col-8 text-end font-14 opacity-60 font-400">$ <?= $_SESSION['amount']?></h5>
<!--<h5 class="col-4 text-start font-15">Amount(<?= $_SESSION['currency']?>)</h5>
<h5 class="col-8 text-end font-14 opacity-60 font-400"><?=$_SESSION['pay_amount']?></h5>-->
<br>
<center><h5 class="col-12 font-15">Wallet:</h5>
<h5 class="col-12 font-14 opacity-60 font-400 ">
<?php

// $sql = "SELECT * FROM wallets WHERE id = 1 ";
// $result = mysqli_query($myConn, $sql);
// $row = mysqli_fetch_assoc($result);
//     $bitcoinaddress = $row['btc'];
//     $ethinaddress = $row['eth'];
//     $ltcaddress = $row['ltc'];
//     $addresstron = $row['trx'];
//     $addressbnb = $row['bnb'];
//     $addressdoge = $row['doge'];
//     $addressusdterc20 = $row['usdterc20'];
//     $addressusdttrc20 = $row['usdttrc20'];
  

if($_SESSION['currency']=="btc"){
    echo $bitcoinaddress;
}elseif($_SESSION['currency']=="eth"){
    echo $ethinaddress;
}elseif($_SESSION['currency']=="ltc"){
    echo $ltcaddress;
}elseif($_SESSION['currency']=="trx"){
    echo $addresstron;
}elseif($_SESSION['currency']=="bnb"){
    echo $addressbnb;
}elseif($_SESSION['currency']=="doge"){
    echo $addressdoge;
}elseif($_SESSION['currency']=="usdterc20"){
    echo $addressusdterc20;
}elseif($_SESSION['currency']=="usdttrc20"){
    echo $addressusdttrc20;
}

?></h5></center>
</div>

<div class="divider"></div>
<a href="#" class="btn btn-full btn-l rounded-s font-800 text-uppercase gradient-highlight shadow-bg shadow-bg-m">Copy wallet address</a>
</div>
</div>
</div>


<div id="menu-sidebar" data-menu-active="nav-pages" data-menu-load="menu-sidebar.html" class="offcanvas offcanvas-start offcanvas-detached rounded-m">
</div>

<div id="menu-highlights" data-menu-load="menu-highlights.html" class="offcanvas offcanvas-bottom offcanvas-detached rounded-m">
</div>

<div id="menu-add-card" data-menu-load="menu-add-card.html" class="offcanvas offcanvas-bottom offcanvas-detached rounded-m">
</div>

<div id="menu-card-more" data-menu-load="menu-card-settings.html" class="offcanvas offcanvas-bottom offcanvas-detached rounded-m">
</div>

<div id="menu-notifications" data-menu-load="menu-notifications.html" class="offcanvas offcanvas-top offcanvas-detached rounded-m">
</div>
</div>

<script src="scripts/bootstrap.min.js"></script>
<script src="scripts/custom.js"></script>
</body>