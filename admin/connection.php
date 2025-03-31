<?php 

$dbUsername="root";
$psswd = "";
$dbName = "cutomer_crypto1"/*"bitvaultwallet"*/;
$hostName = "localhost";

// $dbUsername="geomeohn_dn";
// $psswd = "Emmanuel261..";
// $dbName = "geomeohn_bitvault";
// $hostName = "localhost";
$myConn= $conn= $con = mysqli_connect($hostName,$dbUsername,$psswd,$dbName);
if(!$myConn){
    die("Could not connect at the moment because ". mysqli_connect_error());
}

$adminemail="services@bitvaultwallet.com";
$sitename="BitVault";
$siteurl="https://bitvaultwallet.com/";

?>
