<?php 
include('connection.php');
include ('header.php');
?>

<div id="wrapper">

    <!-- Page Content Start -->
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <!-- Page title box -->
                <div class="page-title-box">
                    <ol class="breadcrumb float-right">

                        <li class="breadcrumb-item"><a href="deposit.php">Deposit</a></li>
                        <li class="breadcrumb-item active">Approve Deposit</li>
                    </ol>
                    <h4 class="page-title">Approve Deposit</h4>
                </div>
                <!-- End page title box -->

                <?php
                
                $username =  $_GET['username'];
                $transaction_id = $_GET['transaction_id'];
                $query_history = "SELECT * FROM transactions WHERE username ='$username' AND transaction_id ='$transaction_id'";
                $result = mysqli_query($myConn,$query_history);
                $row =  mysqli_fetch_array($result, MYSQLI_BOTH);

                $amount = $row["amount"];
                $status = $row ["status"];
                $date = $row["date"];
                $wallet = $row["wallet_address"];
                $username = $row["username"];
                $type = $row["type"];

                ?>

                <!-- end row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <form action="" method="post">
                                <div class="form-row">
                                    <input name="type" value="<?=$type?>" hidden>
                                    <div class="form-group col-md-6">
                                        <label class="control-label mb-10 text-left">Transaction id: </label>
                                        <input type="text" class="form-control" value="<?php echo $transaction_id ?>" readonly>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label class="control-label mb-10 text-left">Username: </label>
                                        <input type="text" class="form-control" value="<?php echo $username ?>" readonly>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label mb-10 text-left">Amount(USD) </label>
                                        <input type="text" name="amount" class="form-control" value="<?php echo $amount; ?>" readonly>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label mb-10 text-left">Transaction date: </label>
                                        <input type="text" class="form-control" value="<?php echo $date; ?>" readonly>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <button type="submit" name="approve" class="btn btn-primary btn-block <?php if ($status == "Approved"){ echo "disabled" ;} ?>" >Approve</button>
                                    </div>
                                     </div>
                                </div>

                            </form>

                        </div> <!-- end card-box -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
                <?php

if(isset($_POST['approve'])){

    $type = $_POST['type'];
    $username = $_GET['username'];
    $amount = $_POST['amount'];

    $sql = "SELECT * FROM users WHERE user_name = '$username'";
    $result = mysqli_query($myConn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);
    $total_balance = $row['total_balance'];

    // Initialize $result_update to a default value (e.g., true, false, or null)
    $result_update = true;  // or use false/null depending on your preference

    if($type == "Deposit"){
        $new_balance = $total_balance + $amount;
        $result_update = mysqli_query($myConn, "UPDATE users SET total_balance = '$new_balance' WHERE user_name = '$username'");
    }

    $result_update_result = mysqli_query($myConn, "UPDATE transactions SET status = 'Approved' WHERE username = '$username' AND transaction_id='$transaction_id'");

    if(($result_update == true) && ($result_update_result == true)){ 
?>

  <script>
      alert('Transaction Approved');
      window.location = "transaction.php";
  </script>

<?php   
    }
}
?>


            </div> <!-- end container-fluid-->
        </div> <!-- end contant-->
    </div>
    <!-- End Page Content-->


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
