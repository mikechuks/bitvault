<?php
include "connection.php";

if(isset($_POST['username'])){
    $username = $_POST['username']; 
    $email = $_POST['email']; 
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone']; 
    $website = $_POST['website'];
    $designation = $_POST['designation'];
    $description = $_POST['description'];
    $city = $_POST['city']; 
    $country = $_POST['country'];
    $zipcode = $_POST['zipcode'];

    $date = date("Y-m-d");

    $result1 = mysqli_query($con, "SELECT * FROM kyc WHERE username = '$username'");
if ($result1->num_rows > 0) { 
    echo '<br><div class="alert-border-left alert alert-danger text-center">Personal details already sumbited!</div><br>';
    exit();
  }

if($username!=""&&$email!=""&&$fname!=""&&$lname!=""&&$phone!=""&&$designation!=""&&$city!=""&&$description!=""&&$country!=""&&$zipcode!=""){

    mysqli_query($conn, ("INSERT INTO `kyc`(`username`, `email`, `fname`, `lname`, `phone`, `description`, `website`, `designation`, `city`, `country`, `zipcode`, `date`) 
    VALUES ('$username','$email','$fname','$lname','$phone','$description','$website','$designation','$city','$country','$zipcode','$date')"));
    echo '<div class="alert-border-left alert alert-success text-center"><i class="ri-notification-off-line me-3 align-middle fs-16"></i>KYC Successfully submitted!</div>';
    echo '<script>window.setTimeout(function() {window.location.href = "profile.php";}, 1000);</script>';
    
}else{
    echo '<div class="alert-border-left alert alert-danger text-center"><i class="ri-error-warning-line me-3 align-middle fs-16"></i>All fields are required!</div>';
}
}