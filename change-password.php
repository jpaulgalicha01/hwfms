<?php
include 'includes/autoload.inc.php';

$email="";
$acc_id = secured($_REQUEST['acc_id']);
$otp_code = secured($_REQUEST['otp_code']);
$check_acc_id = new fetch();
$res = $check_acc_id->checkAccId($acc_id,$otp_code);
if($res){
  $row = $res->fetch();
  $email = $row['acc_email'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  
    <title>HWFC  Management System|| Change Password</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <script src="js/sweetalert.min.js"></script>

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
      .bg-img{
            background-image: url("images/Banner.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth bg-img">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo text-center">
                  <a href="index.php">
                    <img src="images/hwfms-logo.png" style="width: 70px;">
                  </a>
                </div>
                <h4>CHANGE PASSWORD</h4>
                <h6 class="font-weight-light">Change Password for (<?=$email?>)</h6>
                <form class="pt-3" method="post" action="inputConfig.php">
                  <input type="hidden" name="function" value="change_pass">
                  <input type="hidden" name="acc_id" value="<?=$acc_id?>">
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" placeholder="New Password" required="true" name="npass" id="npass">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" placeholder="Confirm Password" required="true" name="cpass" id="cpass">
                  </div>
                  <span id="message"></span>
                  <div class="mt-3">
                    <button class="btn btn-success btn-block loginbtn" name="change_pass" id="change_pass" type="submit">Confirm</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                  <a href="index.php" class="btn btn-block btn-facebook auth-form-btn">
                      <i class="icon-social-home mr-2"></i>Back Home </a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>

    <script>
  
    $(document).keyup(function(){
        const npass =document.getElementById('npass').value;
        const cpass =document.getElementById('cpass').value;
          if(npass === "" && cpass === ""){
            document.getElementById("message").innerHTML="";
          }else if(npass == cpass){
            $("#message").html("Password are Match").css('color','green');
            document.getElementById("change_pass").disabled=false;

          }else{
            $("#message").html("Password are Not Match").css('color','red');
            document.getElementById("change_pass").disabled=true;

          }
    });
      
    </script>

    <!-- endinject -->
  </body>
</html>