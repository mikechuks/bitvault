<?php
session_start();
include("connection.php");
//error_reporting(0);

if(isset($_SESSION['admin'])){
?>
  
<?php include('header.php') ?>


        <!-- Page Content Start -->
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">

                    <!-- Page title box -->
                    <div class="page-title-box">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Investment</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Board</a></li>
                            <li class="breadcrumb-item active">Investment Tables</li>
                        </ol>
                        <h4 class="page-title">Investment Plan</h4>
                    </div>
                    <!-- End page title box -->




                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <a class='btn btn-primary btn-sm' href='new_investment.php'>New Investment Type</a>
                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Min-Amount(USD)</th>
                                        <th>Max-Amount(USD)</th>
                                        <th>Duration</th>
                                        <th>Description</th>
                                        <th>Percentage(%)</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php  $query_history = "SELECT * FROM investment_type";
                                    $result = mysqli_query($myConn,$query_history);
                                    while ($row =  mysqli_fetch_array($result, MYSQLI_BOTH)){
                                        $id = $row["id"];
                                        $name = $row["name"];
                                        $minamount = $row["min_amount"];
                                        $maxamount = $row["max_amount"];
                                        $duration = $row["duration"];
                                        $description  = $row["description"];
                                        $percentage = $row["percentage"];
                                    ?>
                                        <tr>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $minamount; ?></td>
                                            <td><?php echo $maxamount; ?></td>
                                            <td><?php echo $duration; ?></td>
                                            <td><?php echo $description; ?></td>
                                            <td><?php echo $percentage; ?></td>
                                            <td> <a class='btn btn-primary btn-sm' href='edit_investment.php?id=<?=$id?>'>Edit</a></td>
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