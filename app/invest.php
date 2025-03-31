<?php include "include/header.php";

$query_investment_type = "SELECT * FROM investment_type";
$investment_type = mysqli_query($myConn, $query_investment_type);
while($r = mysqli_fetch_array($investment_type, MYSQLI_BOTH)){

$id = $r["id"];
$investment_name = $r["name"];
$min_amount = $r["min_amount"];
$max_amount = $r["max_amount"];
$investment_duration = $r["duration"];
$investment_percentage = $r["percentage"];
$investment_description = $r["description"];
?>

<div class="notch-clear"></div>
<div class="card card-style overflow-visible mt-5">
<br>
<h1 class="color-theme text-center font-30 pt-3 mb-0"><?=$investment_name?></h1>
<p class="text-center font-14"><i class="bi bi-check-circle-fill color-green-dark pe-2"></i>$<?=$min_amount?> - $<?=$max_amount?></p>
<div class="divider my-2 opacity-50"></div>
<div class="content mt-0 mb-2">
<div class="list-group list-custom list-group-flush list-group-m rounded-xs">

<div class="text-center">
<b class="color-theme"><?=$investment_description?></b>
</div>
<div class="divider my-2 opacity-50"></div>

<div class="text-center">
    <b class="color-theme">Duration:</b> <?=$investment_duration?> days
</div>

<div class="divider my-2 opacity-50"></div>

<div class="text-center">
    <b class="color-theme">ROI:</b> <?=$investment_percentage?>%
</div>

<div class="divider my-2 opacity-50"></div>

<a href="#" data-bs-toggle="offcanvas" data-bs-target="#investment<?=$id?>" class="btn btn-full mx-3 gradient-highlight shadow-bg shadow-bg-xs">Start Investment</a>


</div>
</div>
</div>


<div id="investment<?=$id?>" class="offcanvas offcanvas-bottom offcanvas-detached rounded-m">
    <div class="menu-size" style="height:450px;">
    <div class="d-flex mx-3 mt-3 py-1">
        <div class="align-self-center">
            <h1 class="mb-0">Invest in <?=$investment_name?></h1>
        </div>
        <div class="align-self-center ms-auto">
            <a href="#" class="ps-4 shadow-0 me-n2" data-bs-dismiss="offcanvas">
                <i class="bi bi-x color-red-dark font-26 line-height-xl"></i>
            </a>
        </div>
    </div>
     <p class="mx-3">Enter amount between <b class="color-highlight">$<?=$min_amount?> - $<?=$max_amount?></b> to start your investment.</p>
    <div class="divider divider-margins mt-3"></div>
   
    <form onsubmit="investmentajax<?=$id?>()">
    <span id="show_message"></span>
    <div class="content mt-0">
          <div class="form-custom form-label form-icon">
            <i class="bi bi-wallet2 font-14"></i>
            <select class="form-select rounded-xs" name="crypto<?=$id?>">
                <option value="btc">Bitcoin</option>
                <option value="eth">Ethereum</option>
                <option value="ltc">Litecoin</option>
                <option value="trx">Tron</option>
                <option value="doge">Doge</option>
                <option value="usdt">USDT</option>
                <option value="bnb">BNB</option>
            </select>
            <label for="c6" class="form-label-always-active color-highlight font-11">Choose Crypto</label>
        </div>
        <div class="pb-3"></div>
        <div class="form-custom form-label form-icon">
            <i class="bi bi-code-square font-14"></i>
            <input type="number" class="form-control rounded-xs" name="amount<?=$id?>" placeholder="150.00">
            <label for="c4" class="form-label-always-active color-highlight font-11">Amount</label>
            <span class="font-10">( Currency: USD )</span>
        </div>
    </div>
    <button class="mx-3 btn btn-full gradient-red shadow-bg shadow-bg-xs" type="submit" id='investmentbtn<?=$id?>'>Start Investment Plan</button>
    </form>
</div></div>



<script>
	function investmentajax<?=$id?>() {
 //process transfer
	event.preventDefault();

	  $('#investmentbtn<?=$id?>').html('<span class="spinner-grow spinner-grow-sm"></span> Initializing...');
		$('#investmentbtn<?=$id?>').prop('disabled',true);

			  $.ajax({
				type: 'POST',
				url: 'logic/invest.php?id=<?=$id?>',   
				data: $('form').serialize(),
				success: function (data) {

	  $('#investmentbtn<?=$id?>').prop('disabled',false);
	  $('#investmentbtn<?=$id?>').html('Start Investment Plan');

	  $("#show_message").html(data);
				  
				}
			  });

	}
</script>
<?php }?>	
<script src="scripts/bootstrap.min.js"></script>
<script src="scripts/custom.js"></script>
</body></html>