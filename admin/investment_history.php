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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Investment History</a></li>
                            <li class="breadcrumb-item active">Investment Tables</li>
                        </ol>
                        <h4 class="page-title">Investments</h4>
                    </div>
                    <!-- End page title box -->

                    <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title">Investment History</h4>
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>Start date</th>
                                                <th>Finish date</th>
                                                <th>Investment Plan</th>
                                                <th>Username</th>
                                                <th>Amount</th>
                                                <th>Wallet</th>
                                                <th>Status</th>

                                            </tr>
                                        </thead>

                                        <tbody>

                                        <?php  $query_history = "SELECT * FROM investment_history order by start_date desc";
                                        $result = mysqli_query($myConn,$query_history);
                                        while ($row =  mysqli_fetch_array($result, MYSQLI_BOTH)){
                                            $amount = $row["amount"];
                                            $status = $row ["status"];
                                            $startdate = $row["start_date"];
                                            $enddate = $row["end_date"];
                                            $currency = $row["currency"];
                                            $username = $row["username"];
                                            $investment_id = $row["investment_id"];
                                            
                                            if($status==0){$status="<div class='badge badge-danger'>Running</div>";}else{$status="<div class='badge badge-success'>Finished</div>";}
                                            
                                            $query_inv = "SELECT * FROM investment_type WHERE id='$investment_id'";
                                            $resultx = mysqli_query($myConn,$query_inv);
                                            $rowx =  mysqli_fetch_array($resultx, MYSQLI_BOTH);
                                            $inv_name = $rowx["name"];

                                            ?>
                                            <tr>
                                                
                                                <td><?php echo $startdate; ?></td>
                                                <td><?php echo $enddate; ?></td>
                                                <td><?php echo $inv_name; ?></td>
                                                <td><?php echo $username; ?></td>
                                                <td>$<?php echo $amount; ?></td>
                                                <td><?php echo $currency; ?></td>
                                                <td><?php echo $status; ?></td>
                                                

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