<?php
session_start();
include("connection.php");
    
if(isset($_GET['user_action'])){
    $ac = $_GET['user_action'];
    if($ac == "block"){
        //change status to 0
        $st = "inactive";
    }else{
        $st = 'active';
    }
    $em = $_GET['email'];
    
    $query = "UPDATE users SET status = '$st' WHERE user_email = '$em' ;";
    $res = mysqli_query($myConn,$query);
   // echo mysqli_error($myConn);
    if($res){
        echo "
        <script>
        
        alert('$ac Successfull')
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
        $query = "DELETE FROM users WHERE user_email = '$em'";
    $res = mysqli_query($myConn,$query);
   // echo mysqli_error($myConn);
    if($res){
        echo "
        <script>
        
        alert('$ac Successfull')
        </script>
        
        ";
    }
    }else{
        $st = 0;
    }
    
}

    //#####################################################
    //     UPDATE USER LEVEL
    //#####################################################
    
if(isset($_POST['update_level'])){
    
    $level = $_POST['level'];
    $email = $_POST['email'];
    
     $query = "UPDATE users SET type = '$level' WHERE user_email = '$email' ;";
    $res = mysqli_query($myConn,$query);
   // echo mysqli_error($myConn);
    if($res){
        echo "
        <script>
        
        alert('$ac Successfull')
        </script>
        
        ";
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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Users</a></li>
                            <li class="breadcrumb-item active">User Tables</li>
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
                                        <th>User Email</th>
                                        <th>Password</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Total Balance</th>
                                        <th>User Status</th>
                                        <th>Date</th>
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
                                        $phone = $row['phone'];
                                        $total_balance = $row["total_balance"];
                                        // $bnb_ = $row["trx_"];
                                        $bnb_ = $row["trx"];

                                        $btc_ = $row["btc"];
                                        $eth_ = $row["eth"];
                                        $ltc_ = $row["ltc"];
                                        $doge_ = $row["doge"];
                                        $usdt_ = $row["usdt"];
                                        $bnb_ = $row["bnb"];
                                        $trx_ = $row["trx"];
                                        $password = $row["user_password"];
                                        $date = $row["date"];

                                        ?>
                                        <tr>
                                            <td><?php echo $email; ?></td> 
                                            <td><?php echo $password; ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $phone; ?></td>
                                            <td><?php echo number_format($total_balance); ?></td>
                                            <td><?php
                                            if($row['status'] == "active"){
                                                echo "Active";
                                            }elseif($row['status'] == "inactive"){
                                                echo "Blocked";
                                            }else{ echo "Deleted by user";}
                                            
                                            ?></td>
                                            <td><?php echo $date;?></td>
                                            <td> 
                                                <?php if($row['status'] == "active"){
                                                echo '<a href="users.php?user_action=block&email='.$email.'" class="btn btn-primary btn-sm"><i class=""></i>Block</a>
                                                      <a class="btn btn-success btn-sm" href="change_balance.php?email='.$email.'">Fund</a>';
                                                    
                                                }elseif($row['status'] == "inactive"){
                                                echo' <a href="users.php?user_action=unblock&email='.$email.'" class="btn btn-primary btn-sm"><i class=""></i>Unblock</a>';
                                                    
                                                }else{}?>
                                                <a href="users.php?user_delete=delete&email=<?php echo $email; ?>" class="btn btn-danger btn-sm"><i class=""></i> Delete</a>
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