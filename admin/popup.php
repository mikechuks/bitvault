<?php
include('connection.php');
include ('header.php');

$username=$_GET["username"];
$sql = "SELECT * FROM users WHERE user_name = '$username'";
$result = mysqli_query($myConn, $sql);
$row = mysqli_fetch_assoc($result);
$message = $row['message'];
$message_title = $row['message_title'];
$messenger = $row['messenger'];
?>   
<!-- Page Content Start -->
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <!-- Page title box -->
                <div class="page-title-box">
                    <ol class="breadcrumb float-right">

                        <li class="breadcrumb-item"><a href="deposit.php">Bill Popup</a></li>
                        <li class="breadcrumb-item active">Message</li>
                    </ol>
                    <h4 class="page-title">Bill Popup</h4>
                </div>
                <!-- End page title box -->

               
                <!-- end row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <form action="" method="post">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label mb-10 text-left">Messenger: </label>
                                        <select type="text" class="form-control" name="messenger" >
                                            <option>Select Status</option>
                                            <option value="on">On</option>
                                            <option value="off">Off</option>
                                        </select>
                                    </div>
                               
                                    <div class="form-group col-md-6">
                                        <label class="control-label mb-10 text-left">Subject: </label>
                                        <input type="text" class="form-control" name="subject">
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="control-label mb-10 text-left">Message:</label>
                                        <textarea class="form-control" id="summernote-editor" name="message"> </textarea>
                                    </div>
                                </div> 
                                
                                <div class="form-row"> 
                                   <div class="form-group col-md-12">
                                        <button type="submit" name="submit"  class="btn btn-primary btn-block">Submit</button>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">

                                        <?php
                                        if(isset($_POST['submit'])){
                                            $name = $_GET['username'];
                                            $messenger = $_POST['messenger'];
                                            $message = $_POST['message'];
                                            $subject = $_POST['subject'];
                                            
                                            $sql = "UPDATE users SET messenger = '$messenger',message = '$message',message_title='$subject' WHERE user_name = '$username'";
                                            if(mysqli_query($myConn, $sql)){ ?>

                                                    <script>
                                                        alert('Message updated for <?=$username?> successfully');
                                                        window.location = "user_popup.php";
                                                    </script>
                                                <?php   }
                                                else{

                                                    echo "error";
                                                }
                                            
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- end card-box -->
                        </div> <!-- end col -->
                    </div>
                <!-- end row -->
            </div> <!-- end container-fluid-->
        </div> <!-- end contant-->
    </div>
    <!-- End Page Content-->
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
        
         <!--Summernote js-->
        <script src="assets/libs/summernote/summernote-bs4.min.js"></script>

        <!-- Init js -->
        <script src="assets/js/pages/form-summernote.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>
