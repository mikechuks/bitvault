<?php
session_start();
include("connection.php");
include('header.php') 
 ?>

        <!-- Page Content Start -->
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">

                    <!-- Page title box -->
                    <div class="page-title-box">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Users</a></li>
                            <li class="breadcrumb-item active">Pop up</li>
                        </ol>
                        <h4 class="page-title">List of Users</h4>
                    </div>
                    <!-- End page title box -->

                    <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title">User Details</h4>
                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                <tbody>

                                    <?php  $query_history = "SELECT * FROM users order by date desc";

                                    $result = mysqli_query($myConn,$query_history);
                                    while ($row =  mysqli_fetch_array($result, MYSQLI_BOTH)){

                                        $email = $row["user_email"];
                                        $name = $row["user_name"];
                                        $id = $row['user_id'];
                                        $messenger = $row['messenger'];
                                        $message = $row['message'];
                                        $subject = $row['message_title'];

                                        ?>
                                        <tr>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $subject; ?></td>
                                            <td><?php echo $message; ?></td> 
                                            <td><?php
                                            if($row['messenger'] == "on"){
                                                echo "Active";
                                            }elseif($row['messenger'] == "off"){
                                                echo "Off";
                                            }else{ echo "Not set";}
                                            
                                            ?></td>
                                            <td>
                                                <a href="popup.php?username=<?=$name;?>" class="btn btn-primary btn-sm"><i class=""></i>Update</a>
                                            </td>

                                         
                                            
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
