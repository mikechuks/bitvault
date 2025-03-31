<?php
session_start();
include("connection.php");
//error_reporting(0);
if(isset($_SESSION['admin'])){
include('header.php') ?>


            <!-- Page Content Start -->
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">

                    <!-- Page title box -->
                    <div class="page-title-box">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Transaction History</a></li>
                            <li class="breadcrumb-item active">Transaction Tables</li>
                        </ol>
                        <h4 class="page-title">Transactions</h4>
                    </div>
                    <!-- End page title box -->

                    <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title">Transaction History</h4>
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>Transaction ID</th>
                                                <th>Username</th>
                                                <th>Amount</th>
                                                <th>Type</th>
                                                <th>Wallet address</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>

                                        <tbody>

                                        <?php  $query_history = "SELECT * FROM transactions order by date desc";
                                        $result = mysqli_query($myConn,$query_history);
                                        while ($row =  mysqli_fetch_array($result, MYSQLI_BOTH)){
                                            $transaction_id = $row["transaction_id"];
                                            $amount = $row["amount"];
                                            $status = $row ["status"];
                                            $date = $row["date"];
                                            $wallet = $row["wallet_address"];
                                            $username = $row["username"];
                                            $type = $row["type"];

                                            ?>
                                            <tr>
                                                <td><?php echo $transaction_id; ?></td>
                                                <td><?php echo $username; ?></td>
                                                <td><?php echo $amount; ?></td>
                                                <td><?php echo $type; ?></td>
                                                <td><?php echo $wallet; ?></td>
                                                <td><?php echo $date; ?></td>
                                                <td><?php echo $status; ?></td>
                                                <td> <a href="transaction_action.php?transaction_id=<?php echo $transaction_id; ?>&username=<?php echo $username; ?>" class="btn btn-success"><i class="dripicons-preview"></i></a> </td>

                                            </tr>
                                        <?php } ?>

                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->


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

<?php } else {
    header("location:login.php");
    exit;
}?>