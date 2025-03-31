<?php
session_start();
include("connection.php");
    
if(isset($_GET['user_action'])){
    $ac = $_GET['user_action'];
    if($ac == "open"){
        $st = "Open";
    }else{
        $st = 'Closed';
    }
    $em = $_GET['id'];
    
    $query = "UPDATE ticket SET status = '$st' WHERE ticket_id = '$em' ;";
    $res = mysqli_query($myConn,$query);
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
    $em = $_GET['id'];
    $ac = $_GET['user_delete'];
    if($ac == "delete"){
        $query = "DELETE FROM ticket WHERE ticket_id = '$em'";
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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Support Ticket</a></li>
                            <li class="breadcrumb-item active">Ticket Tables</li>
                        </ol>
                        <h4 class="page-title">Support Ticket</h4>
                    </div>
                    <!-- End page title box -->

                    <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title">Tickets</h4>
                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th>Ticket ID</th>
                                        <th>Username</th>
                                        <th>Title</th>
                                        <th>Message</th>
                                        <th>Priority</th>
                                        <th>Date</th>
                                        <th>Expiry</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                <tbody>

                                      <?php $query_user = "SELECT * FROM ticket ORDER BY id DESC";
                                            $res = mysqli_query($myConn, $query_user);
                                            while($row = mysqli_fetch_array($res, MYSQLI_BOTH)){
                                            
                                                $t_id = $row['ticket_id'];
                                            	$username = $row['username'];
                                                $title = $row['title'];
                                                $message = $row['message'];
                                                $priority = $row['priority'];
                                                $date = $row['date'];
                                                $expiry = $row['expiry'];
                                                $status = $row['status'];

                                        ?>
                                        <tr>
                                            <td>#<?php echo $t_id; ?></td>
                                            <td><?php echo $username; ?></td>
                                            <td><?php echo $title; ?></td>
                                            <td><?php echo $message; ?></td> 
                                            <td><?php echo $priority; ?></td> 
                                            <td><?php echo $date; ?></td>
                                            <td><?php echo $expiry; ?></td>
                                            <td><?php echo $status; ?></td>
                                            <td> 
                                                <?php if($row['status'] == "Open"){
                                                echo '<a href="ticket.php?user_action=close&id='.$t_id.'" class="btn btn-primary btn-sm"><i class=""></i>Close</a>';
                                                    
                                                }elseif($row['status'] == "Inprogress"){
                                                echo' <a href="ticket.php?user_action=open&id='.$t_id.'" class="btn btn-primary btn-sm"><i class=""></i>Open</a>';
                                                    
                                                }else{}?>
                                                <a href="ticket.php?user_delete=delete&id=<?php echo $t_id; ?>" class="btn btn-danger btn-sm"><i class=""></i> Delete</a>
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