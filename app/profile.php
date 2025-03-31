<?php 
include "include/header.php";

if(isset($_POST['submit'])){
$email  = $_POST['email'];
$username  = $_POST['username'];
$fname  = $_POST['fname']; 
$lname  = $_POST['lname']; 
$dob = $_POST['dob'];
$sex = $_POST['sex'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$doc = $_POST['doc'];
$pass = $_POST['pass'];

$uploads_dir = 'uploads';


$result1 = mysqli_query($con, "SELECT * FROM kyc WHERE email = '$email'");
if ($result1->num_rows > 0) { 
    echo"<script>
       alert('Your detail is under review')
    </script>";
    exit();
  }else {
      

$tmp_name = $_FILES["ufile"]["tmp_name"];
$name = basename($_FILES["ufile"]["name"]); 
$random_digit=rand(0000,9999);
$id_front=$random_digit.$name;
move_uploaded_file($tmp_name, "$uploads_dir/$id_front");

$tmp_name2 = $_FILES["ufile2"]["tmp_name"];
$name2 = basename($_FILES["ufile2"]["name"]); 
$random_digit2=rand(0000,9999);
$id_back=$random_digit2.$name2;
move_uploaded_file($tmp_name2, "$uploads_dir/$id_back");

$query = mysqli_query($con,"INSERT INTO `kyc`(`email`, `username`, `fname`, `lname`,`dob`,`gender`,`address`,`city`,`state`,`country`,`doc_type`,`idfront`,`idback`) 
         VALUES ('$email', '$username', '$fname', '$lname','$dob','$sex','$address','$city','$state','$country','$doc','$id_front','$id_back')");


    if ($query == TRUE) {
    echo"<script>window.location.href='profile.php' </script>";
 
    }
  }
   
} 

?>
<svg id="header-deco" viewbox="0 0 1440 600" xmlns="http://www.w3.org/2000/svg">
<path id="header-deco-1" d="M 0,600 C 0,600 0,120 0,120 C 92.36363636363635,133.79904306220095 184.7272727272727,147.59808612440193 287,148 C 389.2727272727273,148.40191387559807 501.4545454545455,135.40669856459328 592,129 C 682.5454545454545,122.5933014354067 751.4545454545455,122.77511961722489 848,115 C 944.5454545454545,107.22488038277511 1068.7272727272727,91.49282296650718 1172,91 C 1275.2727272727273,90.50717703349282 1357.6363636363635,105.25358851674642 1440,120 C 1440,120 1440,600 1440,600 Z"></path>
<path id="header-deco-2" d="M 0,600 C 0,600 0,240 0,240 C 98.97607655502392,258.2105263157895 197.95215311004785,276.4210526315789 278,282 C 358.04784688995215,287.5789473684211 419.16746411483257,280.5263157894737 524,265 C 628.8325358851674,249.4736842105263 777.377990430622,225.47368421052633 888,211 C 998.622009569378,196.52631578947367 1071.3205741626793,191.57894736842107 1157,198 C 1242.6794258373207,204.42105263157893 1341.3397129186603,222.21052631578948 1440,240 C 1440,240 1440,600 1440,600 Z"></path>
<path id="header-deco-3" d="M 0,600 C 0,600 0,360 0,360 C 65.43540669856458,339.55023923444975 130.87081339712915,319.1004784688995 245,321 C 359.12918660287085,322.8995215311005 521.9521531100479,347.1483253588517 616,352 C 710.0478468899521,356.8516746411483 735.3205741626795,342.3062200956938 822,333 C 908.6794258373205,323.6937799043062 1056.7655502392345,319.62679425837325 1170,325 C 1283.2344497607655,330.37320574162675 1361.6172248803828,345.1866028708134 1440,360 C 1440,360 1440,600 1440,600 Z"></path>
<path id="header-deco-4" d="M 0,600 C 0,600 0,480 0,480 C 70.90909090909093,494.91866028708137 141.81818181818187,509.8373205741627 239,499 C 336.18181818181813,488.1626794258373 459.6363636363636,451.5693779904306 567,446 C 674.3636363636364,440.4306220095694 765.6363636363636,465.88516746411483 862,465 C 958.3636363636364,464.11483253588517 1059.8181818181818,436.8899521531101 1157,435 C 1254.1818181818182,433.1100478468899 1347.090909090909,456.555023923445 1440,480 C 1440,480 1440,600 1440,600 Z"></path>
</svg>
<div class="notch-clear"></div>
<div class="pt-5 mt-4"></div>
<div class="card card-style overflow-visible mt-5">
<div class="mt-n5"></div>
<img src="images/pictures/25s.png" alt="img" width="180" class="mx-auto rounded-circle mt-n5 shadow-l">
<h2 class="color-theme text-center font-20 pt-2 mb-0"><?=$name?></h2>
<p class="text-center font-13"><i class="bi bi-envelope-fill color-red-dark pe-2"></i><?=$email?></p>
<h2 class="color-theme text-center font-10">Referral link</h2>
<p class="text-center font-11"><i class="bi bi-people color-green-dark pe-2"></i><?=$siteurl?>app/register.php?referral=<?=$name?></p>

	<div class="content">
	<?php 
        	$result = mysqli_query($con, "SELECT * FROM kyc WHERE email = '$email'");
        	$rowv = mysqli_fetch_array($result, MYSQLI_BOTH);
        	$stat=$rowv['status'];
        	$fname=$rowv['fname'];
        	$lname=$rowv['lname'];
        	$address=$rowv['address'];
        	$city=$rowv['city'];
        	$state=$rowv['state'];
        	$country=$rowv['country'];
        	if ($result->num_rows < 1) { echo'
        	<br>
        <div class="listview image-listview text inset">
            <div class="alert alert-danger" style="border-radius: 6px;">
                <img src="steps.png" class="img-responsive" width="40">
                <span style="font-size: 22px;">Pending Verification</span><br>
                <i class="fa fa-star"></i> Verify your account to unlock full features and increase your daily transaction limit.<br>
			</div>
		</div>';
		
			}elseif($result->num_rows > 0 && $stat=='pending'){echo'
			<br>
		 <div class="listview image-listview text inset">
			<div class="alert alert-warning" style="border-radius: 6px;">
                <img src="steps.png" class="img-responsive" width="40">
                <span style="font-size: 22px;">Pending Verification</span><br>
                <i class="fa fa-star"></i> Your KYC details is under review. <br>
			</div>
		</div>';
		    
		}elseif($result->num_rows > 0 && $stat=='verified'){echo'
		<br>
		 <div class="listview image-listview text inset">
			<div class="alert alert-success" style="border-radius: 6px;">
                <img src="verified.png" class="img-responsive" width="40">
                <span style="font-size: 22px;"> Verified</span><br>
                <i class="fa fa-star"></i>Your account is verified.<br>
			</div>
		</div>';
			
			}else{};?></div>
			
<div class="content mt-0 mb-2">
<div class="list-group list-custom list-group-flush list-group-m rounded-xs">
<a href="#" class="list-group-item" data-bs-toggle="offcanvas" data-bs-target="#menu-information">
<i class="bi bi-person-circle"></i>
<div>Information</div>
<i class="bi bi-chevron-right"></i>
</a>
<a href="#" class="list-group-item">
<i class="bi bi-bell-fill"></i>
<div>Notifications</div>
<span class="badge rounded-xl">0</span>
</a>
<a href="transactions.php" class="list-group-item">
<i class="bi bi-credit-card"></i>
<div>Your Payments</div>
<i class="bi bi-chevron-right"></i>
</a>
<a href="market.php" class="list-group-item">
<i class="bi bi-bar-chart-fill"></i>
<div>Market Statistics</div>
<i class="bi bi-chevron-right"></i>
</a>
</div>
</div>
</div>
<a href="supportticket.php" class="btn btn-full mx-3 gradient-highlight shadow-bg shadow-bg-xs">Contact Support</a>
</div>




<div id="menu-sidebar" data-menu-active="nav-pages" data-menu-load="menu-sidebar.html" class="offcanvas offcanvas-start offcanvas-detached rounded-m">
</div>
<div id="menu-highlights" data-menu-active="nav-pages" data-menu-load="menu-highlights.html" class="offcanvas offcanvas-bottom offcanvas-detached rounded-m">
</div>
<div id="menu-information" class="offcanvas offcanvas-start">
<div style="width:100vw">

<div class="pt-3">
<div class="page-title d-flex">
<div class="align-self-center">
<a href="#" data-bs-dismiss="offcanvas" class="me-3 ms-0 icon icon-xxs bg-theme rounded-s shadow-m">
<i class="bi bi-chevron-left color-theme font-14"></i>
</a>
</div>
<div class="align-self-center me-auto">
<h1 class="color-theme mb-0 font-18">Back to Profile</h1>
</div>

</div>
</div>
<div class="content mt-0">
<h5 class="pb-3 pt-4">Personal Information</h5>

<form method="post" enctype="multipart/form-data">
<div class="form-custom form-label form-border mb-3 bg-transparent">
<input type="text" class="form-control rounded-xs" name="username" value="<?=$name?>" readonly>
<label for="c1a" class="form-label-always-active color-highlight">Username</label>
<span>(required)</span>
</div>
<div class="form-custom form-label form-border mb-3 bg-transparent">
<input type="text" class="form-control rounded-xs" name="fname" value="<?=$fname?>" placeholder="Enter first name">
<label for="c1ab" class="form-label-always-active color-highlight">First Name</label>
<span>(required)</span>
</div>
<div class="form-custom form-label form-border mb-3 bg-transparent">
<input type="text" class="form-control rounded-xs" name="lname" value="<?=$lname?>" placeholder="Enter last name">
<label for="c1abc" class="form-label-always-active color-highlight">Last Name</label>
<span>(required)</span>
</div>
<div class="form-custom form-label form-border mb-3 bg-transparent">
<input type="email" class="form-control rounded-xs" name="email" value="<?=$email?>" readonly>
<label for="c1" class="color-highlight form-label-always-active">Email Address</label>
<span>(required)</span>
</div>
<div class="form-custom form-label form-border mb-3 bg-transparent">
<input autocomplete="off" type="date" class="form-control rounded-xs" name="dob" value="<?=$dob?>" placeholder="Enter DOB">
<label for="c1abcd" class="form-label-always-active color-highlight">DOB</label>
<span>(required)</span>
</div>
<div class="form-custom form-label form-border mb-3 bg-transparent">
<select type="text" class="form-control rounded-xs" name="sex">
    <option value=Male>Male</option> <option value=Female>Female</option> <option value=Other>Other</option>
    </select>
<label for="c1abcd" class="form-label-always-active color-highlight">Gender</label>
<span>(required)</span>
</div>
<div class="form-custom form-label form-border mb-3 bg-transparent">
<input type="text" class="form-control rounded-xs" name="address" value="<?=$address?>" placeholder="Enter address">
<label for="c1abcd" class="form-label-always-active color-highlight">Address</label>
<span>(required)</span>
</div>
<div class="form-custom form-label form-border mb-3 bg-transparent">
<input type="text" class="form-control rounded-xs" name="city" value="<?=$city?>" placeholder="Enter city">
<label for="c1abcd" class="form-label-always-active color-highlight">City</label>
<span>(required)</span>
</div>
<div class="form-custom form-label form-border mb-3 bg-transparent">
<input type="text" class="form-control rounded-xs" name="state" value="<?=$state?>" placeholder="Enter state">
<label for="c1abcd" class="form-label-always-active color-highlight">State</label>
<span>(required)</span>
</div>
<div class="form-custom form-label form-border mb-3 bg-transparent">
<input type="text" class="form-control rounded-xs" name="country" value="<?=$country?>" placeholder="Enter country">
<label for="c1abcd" class="form-label-always-active color-highlight">Country</label>
<span>(required)</span>
</div>

<div class="form-custom form-label form-border mb-3 bg-transparent">
<select type="text" class="form-control rounded-xs" name="doc">
    <option value="">Seclect document type</option> <option value="Internation Passport">International Passport</option> <option value="Drive's Licence">Drive's Licence</option> <option value="National ID">National ID</option>
    </select>
<label for="c1abcd" class="form-label-always-active color-highlight">Document Type</label>
<span>(required)</span>
</div>
<div class="form-custom form-label form-border mb-3 bg-transparent">
<input type="file" class="form-control rounded-xs" name="ufile" placeholder="Enter country">
<label for="c1abcd" class="form-label-always-active color-highlight">Document (Front)</label>
<span>(required)</span>
</div>
<div class="form-custom form-label form-border mb-3 bg-transparent">
<input type="file" class="form-control rounded-xs" name="ufile2" placeholder="Enter country">
<label for="c1abcd" class="form-label-always-active color-highlight">Document (Back)</label>
<span>(required)</span>
</div>
<h5 class="pb-3 pt-4">Account Security</h5>
<div class="form-custom form-label form-border mb-3 bg-transparent">
<input type="number" class="form-control rounded-xs" name="phone" value="<?=$row['phone']?>" readonly>
<label for="c21" class="color-highlight form-label-always-active">Phone Number</label>
<span>(required)</span>
</div>
<div class="form-custom form-label form-border mb-3 bg-transparent">
<input type="password" class="form-control rounded-xs" name="pass" placeholder="Old Password">
<label for="c2" class="color-highlight form-label-always-active">Password</label>
<span>(required)</span>
</div>
<button type="submit" name="submit" class="btn btn-full gradient-highlight shadow-bg shadow-bg-s mt-4">Apply Settings</button>
</form>
</div>
</div>
</div>
</div>

<script src="scripts/bootstrap.min.js"></script>
<script src="scripts/custom.js"></script>
</body></html>