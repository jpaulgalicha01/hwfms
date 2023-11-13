<?php
include 'includes/autoload.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  
    <title>HWFMS || Login Page</title>
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
        <div class="content-wrapper d-flex align-items-center auth justify-content-center bg-img">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo text-center">
                  <a href="index.php">
                    <img src="images/hwfms-logo.png" style="width: 70px;">
                  </a>
                </div>
                <h4 class="text-center py-2">Hinigiran Womens Federation Management System</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="pt-3" method="post" action="inputConfig.php">
                  <input type="hidden" name="function" value="user_login">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" placeholder="Enter your username" required="true" name="uname" >
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" placeholder="Enter your password" name="pass" id="pass">
                  </div>
                  <div class="mt-3">
                    <input name="user_login" type="submit" value="Login" class="btn btn-success btn-block loginbtn">
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" id="showpass" class="form-check-input"/>Show Password </label>
                    </div>
                    <a href="forgot-password.php" class="auth-link text-black">Forgot password?</a>
                  </div>
                  <div class="mb-2">
                    <a href="register.php" class="btn btn-block btn-facebook auth-form-btn">
                      <i class="icon-social-home mr-2"></i>Create Account</a>
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
    <?php
      if (isset($_SESSION['decline'])) { ?>
          <script>
              swal({
                  title: "<?php echo $_SESSION['title']?>",
                  text: "<?php echo $_SESSION['decline']?>",
                  icon: "<?php echo $_SESSION['icon']?>",
                  button: "OK",
              });
              
          </script>
      <?php unset($_SESSION['decline']); }
      ?>
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
       function showpass(){
        if(this.checked){
            // alert("check");
            document.getElementById('pass').setAttribute('type','text')
        }
        else{
            // alert("ubcheck");
            document.getElementById('pass').setAttribute('type','password')
        }
    }
    document.getElementById('showpass').addEventListener('click' , showpass);
    </script>
  </body>
</html>