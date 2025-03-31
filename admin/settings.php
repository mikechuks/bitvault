<?php
session_start();
include("connection.php");
    
    $sql = "SELECT * FROM wallets WHERE id = '1'";
    $result = mysqli_query($myConn, $sql);
    $row = mysqli_fetch_assoc($result);
        $GLOBALS['btc'] = $row['btc'];
        $GLOBALS['eth'] = $row['eth'];
        $GLOBALS['ltc'] = $row['ltc'];
        $GLOBALS['trx'] = $row['trx'];
        $GLOBALS['bnb'] = $row['bnb'];
        $GLOBALS['doge'] = $row['doge'];
        $GLOBALS['usdterc20'] = $row['usdterc20'];
        $GLOBALS['usdttrc20'] = $row['usdttrc20'];
        $GLOBALS['min_sending'] = $row['min_sending'];
        $GLOBALS['min_receiving'] = $row['min_receiving'];
        $GLOBALS['paypal'] = $row['paypal'];
        $GLOBALS['bank_name'] = $row['bank_name'];
        $GLOBALS['acct_name'] = $row['acct_name'];
        $GLOBALS['acct_number'] = $row['acct_number'];
        $GLOBALS['swift_code'] = $row['swift_code'];
        $GLOBALS['whatsappno'] = $row['whatsappno'];

    ?>
 <?php include('header.php') ?>


        <!-- Page Content Start -->
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <!-- Page title box -->
                    <div class="page-title-box">
                        <h4 class="page-title">Edit Site settings</h4>
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
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label class="control-label mb-10 text-left">BTC Address </label>
                                        <input type="text" name='btc' class="form-control" value='<?php echo $btc; ?>' >
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label class="control-label mb-10 text-left">ETH Address </label>
                                        <input type="text" name='eth' class="form-control" value='<?php echo $eth; ?>' >
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label class="control-label mb-10 text-left">LTC Address</label>
                                        <input type="text" name='ltc' class="form-control" value='<?php echo $ltc; ?>' >
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label class="control-label mb-10 text-left">TRON Address</label>
                                        <input type="text" name='trx' class="form-control" value='<?php echo $trx; ?>' >
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label class="control-label mb-10 text-left">BNB Address</label>
                                        <input type="text" name='bnb' class="form-control" value='<?php echo $bnb; ?>' >
                                    </div>
                                    
                                    
                                    <div class="form-group col-md-4">
                                        <label class="control-label mb-10 text-left">DOGE Address</label>
                                        <input type="text" name='doge' class="form-control" value='<?php echo $doge; ?>' >
                                    </div>
                                    

                                    
                                    <div class="form-group col-md-4">
                                        <label class="control-label mb-10 text-left">USDTERC20 Address</label>
                                        <input type="text" name='usdterc20' class="form-control" value='<?php echo $usdterc20; ?>' >
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label mb-10 text-left">USDTTRC20 Address</label>
                                        <input type="text" name='usdttrc20' class="form-control" value='<?php echo $usdttrc20; ?>' >
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label mb-10 text-left">Min Receiving Amount</label>
                                        <input type="text" name='min_receiving' class="form-control" value='<?php echo $min_receiving; ?>' >
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label mb-10 text-left">Min Sending Amount</label>
                                        <input type="text" name='min_sending' class="form-control" value='<?php echo $min_sending; ?>' >
                                    </div>

                                    
                                    
                                    <div class="form-group col-md-4">
                                        <label class="control-label mb-10 text-left">PAYPAL Address</label>
                                        <input type="text" name='paypal' class="form-control" value='<?php echo $paypal; ?>' >
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label mb-10 text-left">Bank Name</label>
                                        <input type="text" name='bn' class="form-control" value='<?php echo $bank_name; ?>' >
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label mb-10 text-left">Account Name</label>
                                        <input type="text" name='an' class="form-control" value='<?php echo $acct_name; ?>' >
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label mb-10 text-left">Account Number</label>
                                        <input type="text" name='ano' class="form-control" value='<?php echo $acct_number; ?>' >
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label mb-10 text-left">Swift Code</label>
                                        <input type="text" name='sc' class="form-control" value='<?php echo $swift_code; ?>' >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="control-label mb-10 text-left">WhatsApp Number</label>
                                        <input type="text" name='whatsapp' class="form-control" value='<?php echo $whatsappno; ?>' >
                                    </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <button type="submit" name="edit-balance" class="btn btn-primary btn-block" >Submit</button>
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
            $trx = $_POST['trx'];
            $bnb = $_POST['bnb'];
            $doge = $_POST['doge'];
            $usdterc20 = $_POST['usdterc20'];
            $usdttrc20 = $_POST['usdttrc20'];
            $min_receiving = $_POST['min_receiving'];
            $min_sending = $_POST['min_sending'];
            $paypal = $_POST['paypal'];
            $bn = $_POST['bn'];
            $an = $_POST['an'];
            $ano = $_POST['ano'];
            $sc = $_POST['sc'];
            $whatsapp = $_POST['whatsapp'];
            
            $sql = "UPDATE wallets SET btc = '$btc', eth = '$eth', ltc='$ltc', trx='$trx', bnb='$bnb', doge='$doge', 
            usdterc20='$usdterc20', usdttrc20='$usdterc20',  paypal = '$paypal',bank_name='$bn',acct_name='$an',acct_number='$ano',swift_code='$sc', whatsappno='$whatsapp'  WHERE id = 1";
            if(mysqli_query($myConn, $sql)){
                echo "<script>
                    alert('Successfully Updated');
                    window.location = 'settings.php';
                </script>";
            }
            else{}
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