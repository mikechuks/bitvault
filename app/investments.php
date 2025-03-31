<?php include "include/header.php";?>

<div class="card card-style">
<div class="content">
<div class="tabs tabs-pill" id="tab-group-2">
    <center><h5 class="pt-1 mb-3 color-red-dark">Investment History</h5></center>
<div class="tab-controls rounded-m p-1 overflow-visible">
<a class="font-13 rounded-m shadow-bg shadow-bg-s" data-bs-toggle="collapse" href="#tab-4" aria-expanded="true">Sent</a>
</div>
<div class="mt-3"></div>

<div class="collapse show" id="tab-4" data-bs-parent="#tab-group-2">

<?php $query_investment = "SELECT * FROM investment_history WHERE username = '$name' ";
$result = mysqli_query($myConn, $query_investment);
while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
    
    $id = $row["id"];
    $investment_id = $row["investment_id"];
    $amount = $row["amount"];
    $crypto = $row["currency"];
    $start_date= $row["start_date"];
    $end_date= $row["end_date"];
    $status= $row["status"];
    if($status==0){$status="<p class='mb-0 font-11 color-red-dark'>Running</p>";}else{$status="<p class='mb-0 font-11 color-green-dark'>Finished</p>";}
    
$query_inv = "SELECT * FROM investment_type WHERE id = '$investment_id'";
$resulta = mysqli_query($myConn, $query_inv);
$rowa = mysqli_fetch_array($resulta, MYSQLI_BOTH);

    $inv_name = $rowa["name"];
    $duration = $rowa["duration"];
    $percentage= $rowa["percentage"];


    ?>

<a href="#" class="d-flex py-1" data-bs-toggle="offcanvas" data-bs-target="#tranxn<?=$id?>">
<div class="align-self-center">
<span class="icon rounded-s me-2"><img src="images/crypto-icons/<?=$crypto?>.svg"></span>
</div>
<div class="align-self-center ps-1">
<h5 class="pt-1 mb-n1"><?=$inv_name?></h5>
<p class="mb-0 font-11 opacity-70"><?=$start_date?> </p>
</div>
<div class="align-self-center ms-auto text-end">
<h4 class="pt-1 mb-n1 color-blue-dark">$<?=$amount?></h4>
<?=$status?>
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
<h5 class="pt-1 mb-n1"><?=$inv_name?></h5>
</div>
<div class="align-self-center ms-auto text-end">
<h4 class="pt-1 font-14 mb-n1"><?=$status?></h4>
</div>
</a>
<div class="row">
<strong class="col-5 color-theme">Start Date</strong>
<strong class="col-7 text-end"><?=$start_date?></strong>
<div class="col-12 mt-2 mb-2"><div class="divider my-0"></div></div>
<strong class="col-5 color-theme">End Date</strong>
<strong class="col-7 text-end"><?=$end_date?></strong>
<div class="col-12 mt-2 mb-2"><div class="divider my-0"></div></div>
<strong class="col-5 color-theme">Amount</strong>
<strong class="col-7 text-end color-blue-dark">$<?=$amount?></strong>
<div class="col-12 mt-2 mb-2"><div class="divider my-0"></div></div>
<strong class="col-5 color-theme">Investment From</strong>
<strong class="col-7 text-end"><?=$crypto?> wallet</strong>
<div class="col-12 mt-2 mb-2"><div class="divider my-0"></div></div>
</div>
</div>
<a href="#" data-bs-dismiss="offcanvas" class="mx-3 btn btn-full gradient-highlight shadow-bg shadow-bg-s">Back to Investment</a>
</div>
</div>
<div class="divider my-2 opacity-50"></div>
<?php }?>

</div>





<script src="scripts/bootstrap.min.js"></script>
<script src="scripts/custom.js"></script>
</body></html>