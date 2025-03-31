<?php
include('connection.php');
include ('header.php');
?>

    <!-- Page Content Start -->
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <!-- Page title box -->
                <div class="page-title-box">
                    <ol class="breadcrumb float-right">

                        <li class="breadcrumb-item"><a href="deposit.php">Email</a></li>
                        <li class="breadcrumb-item active">New Email</li>
                    </ol>
                    <h4 class="page-title">New Email</h4>
                </div>
                <!-- End page title box -->

               
                <!-- end row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <form action="" method="post">
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="control-label mb-10 text-left">Email: </label>
                                    <select type="text" class="form-control" name="email" >
                                        <option>Select Email</option>
                                        <?php $query_userkyc = "SELECT * FROM users";
                                        $res = mysqli_query($myConn, $query_userkyc);
                                        while($row = mysqli_fetch_array($res, MYSQLI_BOTH)){
                                        $email = $row['user_email']; 
                                        ?>
                                        <option value="<?=$email?>"><?=$email?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            
                                <div class="form-group col-md-6">
                                    <label class="control-label mb-10 text-left">name: </label>
                                    <input type="text" class="form-control" name="name" >
                                </div>
                                </div>
                           
                                <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="control-label mb-10 text-left">Subject: </label>
                                    <input type="text" class="form-control" name="subject">
                                </div>
                                </div>
                            
                                <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="control-label mb-10 text-left">Body: </label>
                                    <textarea class="form-control" id="summernote-editor" name="body"> </textarea>
                                </div>
                                </div>
                            
                               <div class="form-group col-md-12">
                                    <button type="submit" name="submit"  class="btn btn-primary btn-block">Submit</button>
                                </div>
                            </div>

                                        <?php
                                        if(isset($_POST['submit'])){

                                            $name = $_POST['name'];
                                            $email = $_POST['email'];
                                            $subject = $_POST['subject'];
                                            $body = $_POST['body'];
                                            
                                            $date = date('Y-m-d');
                                            
                                            // send mail
                                            $message = "
                                            <div style='background: #E4E9F0'>
                                            <center><img src='$siteurl/mail.png' width='100px;'></center>
                                            <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
                                            <center><img src='$siteurl/logo.png' width='100px'></center>
                                            <p>Dear <b>$name</b></p>
                                            <h4>$subject</h4>
                                            <p>$body</p>
                                            <p><a href='$siteurl/app/login.php' style='color: dodgerblue; text-decoration: none'>Login...</a></p>
                                            <p>Thanks</p>
                                            <p>Support Team, - $sitename</p>
                                            <p style='font-size: 13px'>Please consider all mails from us as confidential.</p><br>
                                            </div><br>
                                            </div>";

                                            $send = sendMail($email, $subject, $body);
                                                if($send){ ?>
                                                    <script>
                                                        alert('Email Sent');
                                                        window.location = "send_email.php";
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
