<?php
session_start();
include("connection.php");
//error_reporting(0);
if(isset($_SESSION['admin'])){
header("location:index.php");
exit; }

else {
if(isset($_POST['sign_in'])) {
include('connection.php');
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";

$result = mysqli_query($myConn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_BOTH);
$admin_username = $row['username'];
$rows = mysqli_num_rows($result);

if ($rows == 1) {
$_SESSION['admin'] = $username;
$username = $_SESSION['admin'];
echo'
<script>
  alert("Successfully logged in");
</script>';
	echo '<script>window.setTimeout(function() {window.location.href = "index.php";}, 1000);</script>';
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title><?=$sitename?> || Crypto Wallets</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully functional crytocurrency website" name="description" />
        <meta content="DNCoder" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg authentication-bg-pattern d-flex align-items-center">

        <div class="home-btn d-none d-sm-block">
            <a href="index-2.html"><i class="fas fa-home h2 text-white"></i></a>
        </div>
        
        <div class="account-pages w-100 mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center mb-4">
                                    <a href="index-2.html">
                                        <span><img src="/logo.png" alt="" height="38"></span>
                                    </a>
                                </div>
                                        <form action="" method="post" class="pt-2">
                                            <div class="form-group mb-3">
                                                <label for="emailaddress" class="font-weight-medium">Username</label>
                                                <input class="form-control" name="username" type="text" required placeholder="Enter your username">
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="password" class="font-weight-medium">Password</label>
                                                <input class="form-control" type="password" required name="password" placeholder="Enter your password">
                                            </div>
                                            
                                            <div class="form-group mb-0 text-center">
                                                <button class="btn btn-primary btn-block" type="submit" name="sign_in"> Log In </button>
                                            </div>


                                        </form> <!-- end form -->

                                        <div class="row mt-3">
                                    <div class="col-12 text-center">
                                        <p class="text-muted mb-0">Don't have an account? <a href="auth-register.html" class="text-dark ml-1"><b>Sign Up</b></a></p>
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>
<?php }?>