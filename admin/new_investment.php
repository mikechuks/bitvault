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

                        <li class="breadcrumb-item"><a href="deposit.php">Deposit</a></li>
                        <li class="breadcrumb-item active">New Investment Type</li>
                    </ol>
                    <h4 class="page-title">New Investment Type</h4>
                </div>
                <!-- End page title box -->

               
                <!-- end row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">


                            <form action="" method="post">

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label mb-10 text-left">Name: </label>
                                        <input type="text" class="form-control" name="name" >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label mb-10 text-left">Min-Amount: </label>
                                        <input type="text" class="form-control" name="minamount">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label mb-10 text-left">Max-Amount: </label>
                                        <input type="text" class="form-control" name="maxamount">
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label mb-10 text-left">Duration(hrs): </label>
                                        <input type="text" class="form-control" name="duration">
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label mb-10 text-left">ROI(%): </label>
                                        <input type="text" class="form-control" name="percentage">
                                    </div>
                               </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label mb-10 text-left">Description: </label>
                                        <textarea class="form-control" name="description"> </textarea>
                                    </div>
                                </div>
                         
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <button type="submit" name="submit"  class="btn btn-primary btn-block">Submit</button>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">

                                        <?php
                                        if(isset($_POST['submit'])){

                                            $name = $_POST['name'];
                                            $minamount = $_POST['minamount'];
                                            $maxamount = $_POST['maxamount'];
                                            $duration = $_POST['duration'];
                                            $description = $_POST['description'];
                                            $percentage = $_POST['percentage'];


                                            $sql = "INSERT INTO investment_type (name, min_amount,max_amount, duration, description, percentage) VALUES('$name', '$minamount', '$maxamount', '$duration', '$description', '$percentage')";
                                            $result = mysqli_query($myConn, $sql);
                                            
                                                if($result){ ?>

                                                    <script>
                                                        alert('Investment Type Added');
                                                        window.location = "investment.php";
                                                    </script>
                                                <?php   }
                                                else{

                                                    echo mysqli_error($myConn);
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






</div>






</body>
</html>

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
