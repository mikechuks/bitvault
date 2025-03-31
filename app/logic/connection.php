<?php 

$dbUsername="root";
$psswd = "";
$dbName = "bitvaultwallet";
$hostName = "localhost";

// $dbUsername="geomeohn_dn";
// $psswd = "Emmanuel261..";
// $dbName = "geomeohn_bitvault";
// $hostName = "localhost";
$myConn= $conn= $con = mysqli_connect($hostName,$dbUsername,$psswd,$dbName);
if(!$myConn){
    die("Could not connect at the moment because ". mysqli_connect_error());
}

$adminemail="support@bitvaultwallet.com";
$sitename="BitVault Wallet";
$siteurl="https://bitvaultwallet.com/";

?>
