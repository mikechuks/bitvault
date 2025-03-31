<?php include "include/header.php";?>

<div class="card card-style">
<div class="content">
<div class="tabs tabs-pill" id="tab-group-2">
    <center><h5 class="pt-1 mb-3 color-red-dark">Transaction History</h5></center>
<div class="tab-controls rounded-m p-1 overflow-visible">
<a class="font-13 rounded-m shadow-bg shadow-bg-s" data-bs-toggle="collapse" href="#tab-4" aria-expanded="true">Sent</a>
<a class="font-13 rounded-m shadow-bg shadow-bg-s" data-bs-toggle="collapse" href="#tab-6" aria-expanded="false">Received</a>
</div>
<div class="mt-3"></div>

<div class="collapse show" id="tab-4" data-bs-parent="#tab-group-2">

<?php
$query_userdetails = "SELECT * FROM transactions WHERE username = '$name' AND type='Send' ORDER BY date DESC"; 
$result = mysqli_query($myConn, $query_userdetails);
while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
    
    $id = $row["id"];
    $transaction_id = $row["transaction_id"];
    $amount = $row["amount"];
    $crypto = $row["currency"];
    $type = $row["type"];
    $wallet_address= $row["wallet_address"];
    $date= $row["date"];
    $status= $row["status"];
    ?>

<a href="#" class="d-flex py-1" data-bs-toggle="offcanvas" data-bs-target="#tranxn<?=$id?>">
<div class="align-self-center">
<span class="icon rounded-s me-2"><img src="images/crypto-icons/<?=$crypto?>.svg" width=30></span>
</div>
<div class="align-self-center ps-1">
<h5 class="pt-1 mb-n1"><?=$crypto?></h5>
<p class="mb-0 font-11 opacity-70"><?=$date?> tranxn<?=$id?></p>
</div>
<div class="align-self-center ms-auto text-end">
<h4 class="pt-1 mb-n1 color-green-dark">$<?=$amount?></h4>
<p class="mb-0 font-11"> Received</p>
</div>
</a>



<div id="tranxn<?=$id?>" class="offcanvas offcanvas-bottom offcanvas-detached rounded-m">

<div class="menu-size" style="height:450px;">
<div class="content">
<a href="#" class="d-flex py-1 pb-4">
<div class="align-self-center">
<span class="icon rounded-s me-2"><img src="images/crypto-icons/<?=$crypto?>.svg" width=30></span>
</div>
<div class="align-self-center ps-1">
<h5 class="pt-1 mb-n1"><?=$crypto?></h5>
<p class="mb-0 font-11 opacity-70"><?=$date?> tranxn<?=$id?></p>
</div>
<div class="align-self-center ms-auto text-end">
<h4 class="pt-1 font-14 mb-n1 color-green-dark"><?=$status?></h4>
<p class="mb-0 font-11"> #<?=$transaction_id?></p>
</div>
</a>
<div class="row">
<strong class="col-5 color-theme">Type</strong>
<strong class="col-7 text-end color-red-dark">Sent</strong>
<div class="col-12 mt-2 mb-2"><div class="divider my-0"></div></div>
<strong class="col-5 color-theme">Date</strong>
<strong class="col-7 text-end"><?=$date?></strong>
<div class="col-12 mt-2 mb-2"><div class="divider my-0"></div></div>
<strong class="col-5 color-theme">Amount</strong>
<strong class="col-7 text-end color-red-dark">$<?=$amount?></strong>
<div class="col-12 mt-2 mb-2"><div class="divider my-0"></div></div>
<strong class="col-5 color-theme">Sent Via</strong>
<strong class="col-7 text-end">Wallet to Wallet</strong>
<div class="col-12 mt-2 mb-2"><div class="divider my-0"></div></div>
<strong class="col-5 color-theme">Sent To</strong>
<strong class="col-7 text-end"><?=$crypto?> wallet</strong>
<div class="col-12 mt-2 mb-2"><div class="divider my-0"></div></div>
<strong class="col-5 color-theme">Wallet Address</strong>
<strong class="col-7 text-end"><?=$wallet_address?></strong>
<div class="col-12 mt-2 mb-2"><div class="divider my-0"></div></div>
</div>
</div>
<a href="#" data-bs-dismiss="offcanvas" class="mx-3 btn btn-full gradient-highlight shadow-bg shadow-bg-s">Back to Transaction</a>
</div>
</div>
<div class="divider my-2 opacity-50"></div>
<?php }?>

</div>



<div class="collapse" id="tab-6" data-bs-parent="#tab-group-2">
<?php $query_userdetails = "SELECT * FROM transactions WHERE username = '$name' AND type='Receive' order by date desc";


$result = mysqli_query($myConn, $query_userdetails);
while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
    
    $id = $row["id"];
    $transaction_id = $row["transaction_id"];
    $amount = $row["amount"];
    $crypto = $row["currency"];
    $type = $row["type"];
    $wallet_address= $row["wallet_address"];
    $date= $row["date"];
    $status= $row["status"];
    ?> 

<a href="#" class="d-flex py-1" data-bs-toggle="offcanvas" data-bs-target="#tranxn<?=$id?>">
<div class="align-self-center">
<span class="icon rounded-s me-2"><img src="images/crypto-icons/<?=$crypto?>.svg"></span>
</div>
<div class="align-self-center ps-1">
<h5 class="pt-1 mb-n1"><?=$crypto?></h5>
<p class="mb-0 font-11 opacity-70"><?=$date?> tranxn<?=$id?></p>
</div>
<div class="align-self-center ms-auto text-end">
<h4 class="pt-1 mb-n1 color-green-dark">$<?=$amount?></h4>
<p class="mb-0 font-11"> Received</p>
</div>
</a>



<div id="tranxn<?=$id?>" class="offcanvas offcanvas-bottom offcanvas-detached rounded-m">

<div class="menu-size" style="height:450px;">
<div class="content">
<a href="#" class="d-flex py-1 pb-4">
<div class="align-self-center">
<span class="icon rounded-s me-2"><img src="images/crypto-icons/<?=$crypto?>.svg"></span>
</div>
<div class="align-self-center ps-1">
<h5 class="pt-1 mb-n1"><?=$crypto?></h5>
<p class="mb-0 font-11 opacity-70"><?=$date?> tranxn<?=$id?></p>
</div>
<div class="align-self-center ms-auto text-end">
<h4 class="pt-1 font-14 mb-n1 color-green-dark"><?=$status?></h4>
<p class="mb-0 font-11"> #<?=$transaction_id?></p>
</div>
</a>
<div class="row">
<strong class="col-5 color-theme">Type</strong>
<strong class="col-7 text-end color-green-dark">Received</strong>
<div class="col-12 mt-2 mb-2"><div class="divider my-0"></div></div>
<strong class="col-5 color-theme">Date</strong>
<strong class="col-7 text-end"><?=$date?></strong>
<div class="col-12 mt-2 mb-2"><div class="divider my-0"></div></div>
<strong class="col-5 color-theme">Amount</strong>
<strong class="col-7 text-end color-highlight">$<?=$amount?></strong>
<div class="col-12 mt-2 mb-2"><div class="divider my-0"></div></div>
<strong class="col-5 color-theme">Sent Via</strong>
<strong class="col-7 text-end">Vendor to Wallet</strong>
<div class="col-12 mt-2 mb-2"><div class="divider my-0"></div></div>
<strong class="col-5 color-theme">Received To</strong>
<strong class="col-7 text-end"><?=$crypto?> wallet</strong>
<div class="col-12 mt-2 mb-2"><div class="divider my-0"></div></div>
</div>
</div>
<a href="#" data-bs-dismiss="offcanvas" class="mx-3 btn btn-full gradient-highlight shadow-bg shadow-bg-s">Back to Transaction</a>
</div>
</div>
<div class="divider my-2 opacity-50"></div>
<?php }?>
</div>




<script src="scripts/bootstrap.min.js"></script>
<script src="scripts/custom.js"></script>
</body></html>