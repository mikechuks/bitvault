<?php
session_start();
include("connection.php");

$sql = "SELECT * FROM admin WHERE id = '1'";
$result = mysqli_query($myConn, $sql);
$row = mysqli_fetch_assoc($result);
$GLOBALS['username'] = $row['username'];
$GLOBALS['password'] = $row['password'];

include('header.php') ?>


        <!-- Page Content Start -->
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <!-- Page title box -->
                    <div class="page-title-box">
                        <h4 class="page-title">Change Password</h4>
                    </div>
                     <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label mb-10 text-left">Username</label>
                                        <input type="text" name='username' class="form-control" value='<?php echo $username; ?>' >
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label mb-10 text-left">Password</label>
                                        <input type="text" name='password' class="form-control" value='<?php echo $password; ?>' >
                                    </div>
                                    </div>
                                </div>
                             
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <button type="submit" name="edit-balance"  class="btn btn-primary btn-block" >Submit</button>
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
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $sql = "UPDATE admin SET username = '$username', password = '$password' WHERE id = 1";
            if(mysqli_query($myConn, $sql)){
                echo "<script>
                    alert('Successfully update Admin details');
                    window.location = 'changepassword.php';
                </script>";
            }
            else{}
        }
    ?>
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
