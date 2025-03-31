<?php
include "connection.php";

$sql = "SELECT * FROM wallets WHERE id = 1 ";
$result = mysqli_query($myConn, $sql);
$row = mysqli_fetch_assoc($result);
    $bitcoinaddress = $row['btc'];
    $ethinaddress = $row['eth'];
    $ltcaddress = $row['ltc'];
    $addresstron = $row['trx'];
    $addressbnb = $row['bnb'];
    $addressdoge = $row['doge'];
    $addressusdterc20 = $row['usdterc20'];
    $addressusdttrc20 = $row['usdttrc20'];

    $min_sending = $row['min_sending'];
    $min_receiving  = $row['min_receiving'];




?>