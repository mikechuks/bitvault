<?php
session_start();
include("connection.php");


if(isset($_SESSION['admin'])){
    
$email = $_GET['email'];
$sql = "SELECT * FROM users WHERE user_email = '$email'";
$result = mysqli_query($myConn, $sql);
$row = mysqli_fetch_assoc($result);
$balance = $row['total_balance'];
$bnb_ = $row["bnb"];
$btc_ = $row["btc"];
$eth_ = $row["eth"];
$ltc_ = $row["ltc"];
$doge_ = $row["doge"];
$usdt_ = $row["usdt"];
$bnb_ = $row["bnb"];
$trx_ = $row["trx"];

?>
<?php include('header.php') ?>


        <!-- Page Content Start -->
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <!-- Page title box -->
                <div class="page-title-box">
                    <ol class="breadcrumb float-right">

                        <li class="breadcrumb-item"><a href="deposit.php">Fund</a></li>
                        <li class="breadcrumb-item active">Fund Account</li>
                    </ol>
                    <h4 class="page-title">Edit user balance for <?php echo $email; ?></h4>
                </div>
                    <!-- End page title box -->




                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <input type="text" name='email' hidden class="form-control" value='<?php echo $email; ?>' >
                                        </div>
                                    
                                    <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label class="control-label mb-10 text-left">USD Balance </label>
                                        <input type="text" readonly class="form-control"  value='<?php echo $balance; ?>' >
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label class="control-label mb-10 text-left">BTC Balance </label>
                                        <input type="text" name='btc' class="form-control" value='<?php echo $btc_; ?>' >
                                    </div> 
                                    
                                    <div class="form-group col-md-4">
                                        <label class="control-label mb-10 text-left">ETH Balance </label>
                                        <input type="text" name='eth' class="form-control" value='<?php echo $eth_; ?>' >
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label class="control-label mb-10 text-left">LTC Balance </label>
                                        <input type="text" name='ltc' class="form-control" value='<?php echo $ltc_; ?>' >
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label class="control-label mb-10 text-left">DOGE Balance </label>
                                        <input type="text" name='doge' class="form-control" value='<?php echo $doge_; ?>' >
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label class="control-label mb-10 text-left">USDT Balance </label>
                                        <input type="text" name='usdt' class="form-control" value='<?php echo $usdt_; ?>' >
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label class="control-label mb-10 text-left">BNB Balance </label>
                                        <input type="text" name='bnb' class="form-control" value='<?php echo $bnb_; ?>' >
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label class="control-label mb-10 text-left">TRX Balance </label>
                                        <input type="text" name='trx' class="form-control" value='<?php echo $trx_; ?>' >
                                    </div>
                                    
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <button type="submit" name="edit-balance"  class="btn btn-primary btn-block" >Change balance</button>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- end card-box -->
                    </div> 
                </div>
                    <!-- end row -->


            </div> <!-- end container-fluid-->
        </div> <!-- end contant-->
    </div>
    <!-- End Page Content-->


    
    <?php
        if(isset($_POST['edit-balance'])){
            $btc = $_POST['btc'];
            $eth = $_POST['eth'];
            $ltc = $_POST['ltc'];
            $doge = $_POST['doge'];
            $usdt = $_POST['usdt'];
            $trx = $_POST['trx'];
            $bnb = $_POST['bnb'];
            
            $sum_=$btc+$eth+$ltc+$doge+$usdt+$trx+$bnb;
            
            $sql = "UPDATE users SET total_balance='$sum_',btc = '$btc',eth='$eth',ltc='$ltc',doge='$doge',usdt='$usdt',trx='$trx',bnb='$bnb'  WHERE user_email = '$email'";
            if(mysqli_query($myConn, $sql)){
                echo "<script>
                    alert('Successfully Edited user balance');
                    window.location = 'users.php';
                </script>";
            }
            else{
                echo "<script>
                alert('Successfully Edited user balance');
                    window.location = 'users.php';
                </script>";
            }
        }
    ?>


   <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                  <script>document.write(new Date().getFullYear())</script> ©  <?=$sitename?>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

       

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- datatable js -->
        <script src="assets/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="assets/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables/responsive.bootstrap4.min.js"></script>
        
        <script src="assets/libs/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables/buttons.bootstrap4.min.js"></script>
        <script src="assets/libs/datatables/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables/buttons.flash.min.js"></script>
        <script src="assets/libs/datatables/buttons.print.min.js"></script>

        <script src="assets/libs/datatables/dataTables.keyTable.min.js"></script>
        <script src="assets/libs/datatables/dataTables.select.min.js"></script>

        <!-- Datatables init -->
        <script src="assets/js/pages/datatables.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>


<?php } else {
    header("location:login.php");
    exit;
}?>