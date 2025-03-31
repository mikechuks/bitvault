<?php
session_start();
include("connection.php");


if(isset($_GET['user_action'])){
    $ac = $_GET['user_action'];
    if($ac == "disapprove"){
        $st = "Disapproved";
    }else{
        $st = 'Approved';
    }
    $em = $_GET['email'];
    
    $query = "UPDATE kyc SET status = '$st' WHERE email = '$em' ;";
    $res = mysqli_query($myConn,$query);
   // echo mysqli_error($myConn);
    if($res){
        echo "
        <script>
        
        alert('$ac Successfully')
        </script>
        
        ";
    }
}

    //#####################################################
    //      DELETE USER
    //#####################################################
    
 if(isset($_GET['user_delete'])){
    $em = $_GET['email'];
    $ac = $_GET['user_delete'];
    if($ac == "delete"){
        $query = "DELETE FROM kyc WHERE email = '$em'";
    $res = mysqli_query($myConn,$query);
   // echo mysqli_error($myConn);
    if($res){
        echo "
        <script>
        
        alert('Deleted Successfull')
        </script>
        
        ";
    }
    }else{
        $st = 0;
    }
    
}




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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">KYC</a></li>
                            <li class="breadcrumb-item active">KYC Tables</li>
                        </ol>
                        <h4 class="page-title">List of Users</h4>
                    </div>
                    <!-- End page title box -->

                    <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title">User Details</h4>
                                <table id="datatable-buttons" style="overflow-x: auto" class="table table-striped table-bordered dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>Full name</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Country</th>
                                        <th>Doc Type</th>
                                        <th>ID Front</th>
                                        <th>ID Back</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                <tbody>

                                      <?php $query_userkyc = "SELECT * FROM kyc ORDER BY id DESC";
                                            $res = mysqli_query($myConn, $query_userkyc);
                                            while($row = mysqli_fetch_array($res, MYSQLI_BOTH)){
                                            
                                            $email = $row['email']; 
                                            $fname = $row['fname']; 
                                            $username = $row['username'];
                                            $lname = $row['lname'];
                                            $gender = $row['gender'];
                                            $address = $row['address'];
                                            // $description = $row['description'];
                                            $city = $row['city']; 
                                            $country = $row['country']; 
                                            $doc_ = $row['doc_type'];
                                            $idfront = $row['idfront'];
                                            $idback = $row['idback'];
                                            $status = $row['status'];
                                            $date = $row['date'];
                                            
                                            $fullname = "$fname $lname";

                                        ?>
                                        <tr>
                                            <td><?php echo $fullname; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $username; ?></td>
                                            <td><?php echo $gender; ?></td>
                                            <td><?php echo $address; ?></td> 
                                            <td><?php echo $city; ?></td> 
                                            <td><?php echo $country; ?></td>
                                            <td><?php echo $doc_; ?></td>
                                            <td><a href="<?=$siteurl?>/app/uploads/<?=$idfront; ?>" class="btn btn-primary btn-sm"><i class=""></i>View Front</a></td>
                                            <td><a href="<?=$siteurl?>/app/uploads/<?=$idback; ?>" class="btn btn-primary btn-sm"><i class=""></i>View Back</a></td>
                                            <td><?php echo $date; ?></td>
                                            <td><?php echo $status; ?></td>
                                            <td> 
                                                <?php if($row['status'] == "Approved"){
                                                echo '<a href="kyc.php?user_action=disapprove&email='.$email.'" class="btn btn-primary btn-sm"><i class=""></i>Disapprove</a>';
                                                    
                                                }elseif($row['status'] == "Pending"){
                                                echo' <a href="kyc.php?user_action=approve&email='.$email.'" class="btn btn-primary btn-sm"><i class=""></i>Approve</a>';
                                                    
                                                }else{}?>
                                                <a href="kyc.php?user_delete=delete&email=<?php echo $email; ?>" class="btn btn-danger btn-sm"><i class=""></i> Delete</a>
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