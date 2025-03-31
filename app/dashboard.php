<?php 
include "include/header.php";

$url = "https://api.coinconvert.net/convert/usd/btc?amount=1";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);

print_r($data);

/*$req_url = "https://api.coinconvert.net/convert/usd/btc?amount=1";
$response_json = file_get_contents($req_url);
$response = json_decode($response_json, true);
if($response) {
$btc_convert = $response['BTC'];
}


$req_url = "https://api.coinconvert.net/convert/usd/eth?amount=1";
$response_json = file_get_contents($req_url);
$response = json_decode($response_json, true);
if($response) {
$eth_convert = $response['ETH'];
}


$req_url = "https://api.coinconvert.net/convert/usd/ltc?amount=1";
$response_json = file_get_contents($req_url);
$response = json_decode($response_json, true);
if($response) {
$ltc_convert = $response['LTC'];
}


$req_url = "https://api.coinconvert.net/convert/usd/trx?amount=1";
$response_json = file_get_contents($req_url);
$response = json_decode($response_json, true);
if($response) {
$trx_convert = $response['TRX'];
}


$req_url = "https://api.coinconvert.net/convert/usd/doge?amount=1";
$response_json = file_get_contents($req_url);
$response = json_decode($response_json, true);
if($response) {
$doge_convert = $response['DOGE'];
}


$req_url = "https://api.coinconvert.net/convert/usd/usdt?amount=1";
$response_json = file_get_contents($req_url);
$response = json_decode($response_json, true);
if($response) {
$usdt_convert = $response['USDT'];
}


$req_url = "https://api.coinconvert.net/convert/usd/bnb?amount=1";
$response_json = file_get_contents($req_url);
$response = json_decode($response_json, true);
if($response) {
$bnb_convert = $response['BNB'];
}
*/
$btc_convert = 42739.30;
$eth_convert = 2383.62;
$ltc_convert = 75.39;
$trx_convert = 0.10;
$doge_convert = 0.092;
$usdt_convert = 1;
$bnb_convert = 327.76;
?>

<div class="splide single-slider slider-no-dots slider-no-arrows slider-visible" id="single-slider-1">
<div class="splide__track">
<div class="splide__list">
    
    
<div class="splide__slide">
<div class="card card-style m-0 bg-7 shadow-card shadow-card-m" style="height:150px">
<div class="card-center">
<div class="bg-theme px-3 py-2 rounded-end d-inline-block">
<h1 class="font-13 my-n1">
<a class="color-theme" data-bs-toggle="collapse" href="#balance3" aria-controls="balance2">Click for Balance</a>
</h1>
<div class="collapse" id="balance3"><h2 class="color-theme font-26">$<?php echo $row['total_balance']; ?></h2></div>
</div>
</div>
<strong class="card-top no-click font-12 p-3 color-white font-monospace">Total Balance</strong>
<div class="card-overlay bg-black opacity-50"></div>
</div>
</div>
<?php
$result11 = mysqli_query($con,"SELECT SUM(amount) FROM investment_history where status='0' AND username='".$_SESSION['user_name']."'");
$row21 = mysqli_fetch_row($result11);
$numr1 = $row21[0];
?>

<div class="splide__slide">
<div class="card card-style m-0 bg-11 shadow-card shadow-card-m" style="height:150px">
<div class="card-center">
<div class="bg-theme px-3 py-2 rounded-end d-inline-block"> 
<h1 class="font-13 my-n1">
<a class="color-theme" data-bs-toggle="collapse" href="#balance2" aria-controls="balance2">Click for Balance</a>
</h1>
<div class="collapse" id="balance2"><h2 class="color-theme font-26">$<?php echo $numr1; ?></h2></div>
</div>
</div>
<strong class="card-top no-click font-12 p-3 color-white font-monospace">Running Investment</strong>
<div class="card-overlay bg-black opacity-50"></div>
</div>
</div>
</div>
</div>
</div>

<div class="content py-2">
<div class="d-flex text-center">
    
<div class="me-auto">
<a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-transfer" class="icon icon-xxl rounded-m bg-theme shadow-m"><i class="font-28 color-green-dark bi bi-arrow-up-circle"></i></a>
<h6 class="font-13 opacity-80 font-500 mb-0 pt-2">Send</h6>
</div>

<div class="m-auto">
<a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-receive" class="icon icon-xxl rounded-m bg-theme shadow-m"><i class="font-28 color-red-dark bi bi-arrow-down-circle"></i></a>
<h6 class="font-13 opacity-80 font-500 mb-0 pt-2">Receive</h6>
</div>
<div class="m-auto">
<a href="buycrypto.php" class="icon icon-xxl rounded-m bg-theme shadow-m"><i class="font-28 color-blue-dark bi bi-currency-bitcoin"></i></a>
<h6 class="font-13 opacity-80 font-500 mb-0 pt-2">Buy</h6>
</div>
<div class="ms-auto">
<a href="invest.php" class="icon icon-xxl rounded-m bg-theme shadow-m"><i class="font-28 color-brown-dark bi bi-filter-circle"></i></a>
<h6 class="font-13 opacity-80 font-500 mb-0 pt-2">Invest</h6>
</div>
</div>
</div>


<!--Coins-->

<div class="content my-0 mt-n2 px-1">
<div class="d-flex">
<div class="align-self-center">
<h3 class="font-16 mb-2">Crypto</h3>
</div>
</div>
</div>

<div class="card card-style">
<div class="content">
    
<a href="" class="d-flex py-1">
<div class="align-self-center">
<span class="icon rounded-s me-2"><img src="images/crypto-icons/btc.svg"></span>
</div>
<div class="align-self-center ps-1">
<h5 class="pt-1 mb-n1">Bitcoin</h5>
<p class="mb-0 font-11 opacity-50">$<?=number_format((float)1/$btc_convert, 2, '.', '');?></span></p>
</div>
<div class="align-self-center ms-auto text-end">
<h4 class="pt-1 mb-n1">$<?php echo $row['btc'];?></h4>
<p class="mb-0 font-11"><?php echo $row['btc']*$btc_convert ?>BTC</p>
</div>
</a>

<div class="divider my-2 opacity-50"></div>

<a href="" class="d-flex py-1">
<div class="align-self-center">
<span class="icon rounded-s me-2"><img src="images/crypto-icons/eth.svg"></span>
</div>
<div class="align-self-center ps-1">
<h5 class="pt-1 mb-n1">Ethereum</h5>
<p class="mb-0 font-11 opacity-50">$<?=number_format((float)1/$eth_convert, 2, '.', '');?></span></p>
</div>
<div class="align-self-center ms-auto text-end">
<h4 class="pt-1 mb-n1">$<?php echo $row['eth'];?></h4>
<p class="mb-0 font-11"><?php echo $row['eth']*$eth_convert ?>ETH</p>
</div>
</a>

<div class="divider my-2 opacity-50"></div>

<a href="" class="d-flex py-1">
<div class="align-self-center">
<span class="icon rounded-s me-2"><img src="images/crypto-icons/ltc.svg"></span>
</div>
<div class="align-self-center ps-1">
<h5 class="pt-1 mb-n1">Litecoin</h5>
<p class="mb-0 font-11 opacity-50">$<?=number_format((float)1/$ltc_convert, 2, '.', '');?></span></p>
</div>
<div class="align-self-center ms-auto text-end">
<h4 class="pt-1 mb-n1">$<?php echo $row['ltc'];?></h4>
<p class="mb-0 font-11"><?php echo $row['ltc']*$ltc_convert ?>LTC</p>
</div>
</a>


<div class="divider my-2 opacity-50"></div>

<a href="" class="d-flex py-1">
<div class="align-self-center">
<span class="icon rounded-s me-2"><img src="images/crypto-icons/trx.svg"></span>
</div>
<div class="align-self-center ps-1">
<h5 class="pt-1 mb-n1">Tron</h5>
<p class="mb-0 font-11 opacity-50">$<?=number_format((float)1/$trx_convert, 2, '.', '');?></span></p>
</div>
<div class="align-self-center ms-auto text-end">
<h4 class="pt-1 mb-n1">$<?php echo $row['trx'];?></h4>
<p class="mb-0 font-11"><?php echo $row['trx']*$trx_convert ?>TRX</p>
</div>
</a>



<div class="divider my-2 opacity-50"></div>

<a href="" class="d-flex py-1">
<div class="align-self-center">
<span class="icon rounded-s me-2"><img src="images/crypto-icons/doge.svg"></span>
</div>
<div class="align-self-center ps-1">
<h5 class="pt-1 mb-n1">DOGE</h5>
<p class="mb-0 font-11 opacity-50">$<?=number_format((float)1/$doge_convert, 2, '.', '');?></span></p>
</div>
<div class="align-self-center ms-auto text-end">
<h4 class="pt-1 mb-n1">$<?php echo $row['doge'];?></h4>
<p class="mb-0 font-11"><?php echo $row['doge']*$doge_convert ?>DOGE</p>
</div>
</a>


<div class="divider my-2 opacity-50"></div>

<a href="" class="d-flex py-1">
<div class="align-self-center">
<span class="icon rounded-s me-2"><img src="images/crypto-icons/usdt.svg"></span>
</div>
<div class="align-self-center ps-1">
<h5 class="pt-1 mb-n1">USDT</h5>
<p class="mb-0 font-11 opacity-50">$<?=number_format((float)1/$usdt_convert, 2, '.', '');?></span></p>
</div>
<div class="align-self-center ms-auto text-end">
<h4 class="pt-1 mb-n1">$<?php echo $row['usdt'];?></h4>
<p class="mb-0 font-11"><?php echo $row['usdt']*$usdt_convert ?>USDT</p>
</div>
</a>




<div class="divider my-2 opacity-50"></div>

<a href="" class="d-flex py-1">
<div class="align-self-center">
<span class="icon rounded-s me-2"><img src="images/crypto-icons/bnb.svg"></span>
</div>
<div class="align-self-center ps-1">
<h5 class="pt-1 mb-n1">BNB</h5>
<p class="mb-0 font-11 opacity-50">$<?=number_format((float)1/$bnb_convert, 2, '.', '');?></span></p>
</div>
<div class="align-self-center ms-auto text-end">
<h4 class="pt-1 mb-n1">$<?php echo $row['bnb'];?></h4>
<p class="mb-0 font-11"><?php echo $row['bnb']*$bnb_convert ?>BNB</p>
</div>
</a>

</div>
</div>



   <div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>     


<!--Send Modal-->

<div id="menu-transfer" class="offcanvas offcanvas-bottom offcanvas-detached rounded-m">
<div class="menu-size" style="height:500px;">
    <div class="d-flex mx-3 mt-3 py-1">
        <div class="align-self-center">
            <h1 class="mb-0">Send Funds</h1>
        </div>
        <div class="align-self-center ms-auto">
            <a href="#" class="ps-4" shadow-0="" me-n2="" data-bs-dismiss="offcanvas">
                <i class="bi bi-x color-red-dark font-26 line-height-xl"></i>
            </a>
        </div>
    </div>
    <div class="divider divider-margins mt-3"></div>
    
    <form onsubmit="sendajax()">
    <span id="send_message"></span>
    <div class="content mt-0">
        <div class="form-custom form-label form-icon">
            <i class="bi bi-wallet2 font-14"></i>
            <select class="form-select rounded-xs" name="crypto">
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
            <i class="bi bi-currency-bitcoin font-14"></i>
            <input type="text" class="form-control rounded-xs" id="c4" name="wallet" placeholder="bc1***********">
            <label for="c4" class="form-label-always-active color-highlight font-11">Wallet</label>
            <span class="font-10">( Crypto wallet )</span>
        </div>
        <div class="pb-3"></div>
        <div class="form-custom form-label form-icon">
            <i class="bi bi-code-square font-14"></i>
            <input type="text" class="form-control rounded-xs" name="amount" placeholder="150.00">
            <label for="c4" class="form-label-always-active color-highlight font-11">Amount</label>
            <span class="font-10">( Currency: USD )</span>
        </div>
        <div class="pb-2"></div>
        <div class="form-check form-check-custom">
            <input class="form-check-input" type="checkbox" name="agree" value="1" id="c2">
            <label class="form-check-label" for="c2">I accept the Transfer</label>
            <i class="is-checked color-green-dark font-14 bi bi-check-circle-fill"></i>
            <i class="is-unchecked color-green-dark font-14 bi bi-circle"></i>
        </div>
    
    </div>
    <button class="mx-3 mb-3 btn btn-full gradient-green shadow-bg shadow-bg-s" type="submit" name="send" id='sendbtn'>Send Funds</button>
    </form>
</div>
</div>




<!--Receive Modal-->

<div id="menu-receive" class="offcanvas offcanvas-bottom offcanvas-detached rounded-m">
    <div class="menu-size" style="height:400px;">
      <div class="d-flex mx-3 mt-3 py-1">
        <div class="align-self-center">
            <h1 class="mb-0">Receive Funds</h1>
        </div>
        <div class="align-self-center ms-auto">
            <a href="#" class="ps-4 shadow-0 me-n2" data-bs-dismiss="offcanvas">
                <i class="bi bi-x color-red-dark font-26 line-height-xl"></i>
            </a>
        </div>
    </div>
    <div class="divider divider-margins mt-3"></div>
    
    <form onsubmit="receiveajax()">
    <span id="show_message"></span>
    <div class="content mt-0">
        <div class="form-custom form-label form-icon">
            <i class="bi bi-wallet2 font-14"></i>
            <select class="form-select rounded-xs" name="method">
                <option value="btc">Bitcoin</option>
                <option value="eth">Ethereum</option>
                <!--<option value="ltc">Litecoin</option>-->
                <option value="trx">Tron</option>
                <option value="doge">Doge</option>
                <option value="usdttrc20">USDT (TRC20)</option>
                <option value="usdterc20">USDT (ERC20)</option>
                <option value="bnb">BNB</option>
            </select>
            <label for="c6" class="form-label-always-active color-highlight font-11">Choose Crypto</label>
        </div>
        
        <div class="pb-3"></div>
        <div class="form-custom form-label form-icon">
            <i class="bi bi-code-square font-14"></i>
            <input type="number" class="form-control rounded-xs" id="c4" name="amt" placeholder="150.00">
            <label for="c4" class="form-label-always-active color-highlight font-11">Amount</label>
            <span class="font-10">( Currency: USD )</span>
        </div>
    
    </div>
    <button class="mx-3 btn btn-full gradient-red shadow-bg shadow-bg-s" type="submit" id='receivebtn'>Receive Funds</button>
    </form>
</div></div>





<!--SWAP-->



<div id="menu-swap" class="offcanvas offcanvas-bottom offcanvas-detached rounded-m">
    <div class="menu-size" style="height:400px;">
    <div class="d-flex mx-3 mt-3 py-1">
        <div class="align-self-center">
            <h1 class="mb-0">Swap Coins</h1>
        </div>
        <div class="align-self-center ms-auto">
            <a href="#" class="ps-4 shadow-0 me-n2" data-bs-dismiss="offcanvas">
                <i class="bi bi-x color-red-dark font-26 line-height-xl"></i>
            </a>
        </div>
    </div>
    <div class="divider divider-margins mt-3"></div>
    <form onsubmit="swapajax()">
    <span id="swap_message"></span>
    <div class="content mt-0">
        <div class="row mt-n3">
            <div class="col-5">
                <div class="form-custom form-label form-border">
                    <select class="form-select color-red-dark exchange-select rounded-xs" name="swapfrom">
                         <option  disabled="" selected="">Swap from</option>
                         <option value="btc">Bitcoin</option>
                        <option value="eth">Ethereum</option>
                        <option value="ltc">Litecoin</option>
                        <option value="trx">Tron</option>
                        <option value="doge">Doge</option>
                        <option value="usdt">USDT</option>
                        <option value="bnb">BNB</option>
                    </select>
                </div>
            </div>
            <div class="col-2">
                <h5 class="exchange-arrow"><i class="bi bi-arrow-left-right"></i></h5>
            </div>
            <div class="col-5">
                <div class="form-custom form-label form-border">
                    <select class="form-select color-blue-dark exchange-select rounded-xs" name="swapto">
                         <option  disabled="" selected="">Swap to</option>
                         <option value="btc">Bitcoin</option>
                        <option value="eth">Ethereum</option>
                        <option value="ltc">Litecoin</option>
                        <option value="trx">Tron</option>
                        <option value="doge">Doge</option>
                        <option value="usdt">USDT</option>
                        <option value="bnb">BNB</option>
                    </select>
                </div>
            </div>
            
                <div class="pb-3"></div>
                <div class="form-custom form-label form-icon">
                    <i class="bi bi-code-square font-14"></i>
                    <input type="number" class="form-control rounded-xs" id="c4" name="swapamount" placeholder="150.00">
                    <label for="c4" class="form-label-always-active color-highlight font-11">Amount</label>
                    <span class="font-10">( Currency: USD )</span>
                </div>
        </div>
    </div>
    <button class="mx-3 btn btn-full gradient-red shadow-bg shadow-bg-s" type="submit" id='swapbtn'>Swap Coin</button>
</div></div>


<div class="offcanvas offcanvas-bottom rounded-m offcanvas-detached" id="menu-install-pwa-ios">
<div class="content">
<img src="/icon-192x192.png" alt="img" width="80" class="rounded-m mx-auto my-4">
<h1 class="text-center">Install Bitvault</h1>
<p class="boxed-text-xl">
Install Bitvault on your home screen, and access it just like a regular app. Open your Safari menu and tap "Add to Home Screen".
</p>
<a href="#" class="pwa-dismiss close-menu color-theme text-uppercase font-900 opacity-50 font-11 text-center d-block mt-n2" data-bs-dismiss="offcanvas">Maybe Later</a>
</div>
</div>

<div class="offcanvas offcanvas-bottom rounded-m offcanvas-detached" id="menu-install-pwa-android">
<div class="content">
<img src="/icon-192x192.png" alt="img" width="80" class="rounded-m mx-auto my-4">
<h1 class="text-center">Install Bitvault</h1>
<p class="boxed-text-l">
Install Bitvault to your Home Screen to enjoy a unique and native experience.
</p>
<a href="#" class="pwa-install btn btn-m rounded-s text-uppercase font-900 gradient-highlight shadow-bg shadow-bg-s btn-full">Add to Home Screen</a><br>
<a href="#" data-bs-dismiss="offcanvas" class="pwa-dismiss close-menu color-theme text-uppercase font-900 opacity-60 font-11 text-center d-block mt-n1">Maybe later</a>
</div>
</div>

</div>
 
<script>
    function sendajax() {
        
    	event.preventDefault();
    
    	  $('#sendbtn').html('<span class="spinner-grow spinner-grow-sm"></span> Initializing...');
    		$('#sendbtn').prop('disabled',true);
    
			  $.ajax({
				type: 'POST',
				url: 'logic/sending.php',   
				data: $('form').serialize(),
				success: function (data) {
    
        	  $('#sendbtn').prop('disabled',false);
        	  $('#sendbtn').html('SEND FUNDS');
        
        	  $("#send_message").html(data);
				  
				}
			});
    
    	}
</script>
	
<script>
	function receiveajax() {
        
	event.preventDefault();

	  $('#receivebtn').html('<span class="spinner-grow spinner-grow-sm"></span> Initializing...');
		$('#receivebtn').prop('disabled',true);

			  $.ajax({
				type: 'POST',
				url: 'logic/receive.php',   
				data: $('form').serialize(),
				success: function (data) {

	  $('#receivebtn').prop('disabled',false);
	  $('#receivebtn').html('RECEIVE FUNDS');

	  $("#show_message").html(data);
				  
				}
			  });

	}
	</script>
	
<script>
	function swapajax() {
        
	event.preventDefault();

	  $('#swapbtn').html('<span class="spinner-grow spinner-grow-sm"></span> Initializing...');
		$('#swapbtn').prop('disabled',true);

			  $.ajax({
				type: 'POST',
				url: 'logic/swapcoin.php',   
				data: $('form').serialize(),
				success: function (data) {

	  $('#swapbtn').prop('disabled',false);
	  $('#swapbtn').html('SWAP FUNDS');

	  $("#swap_message").html(data);
				  
				}
			  });

	}
	</script>
<script src="scripts/bootstrap.min.js"></script>
<script src="scripts/custom.js"></script>
</body></html>