<?php
include 'includes/autoload.inc.php';
unset($_SESSION['title']);
$_SESSION['title'] = "Profile";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Hinigaran Women's Federation Community Management System|| Profile</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css" />
    
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
      <?php include_once('includes/sidebar.php');?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Super Admin Profile </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Super Admin Profile</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Super Admin Profile</h4>
                   
                    <form class="forms-sample" method="POST" action="inputConfig.php" enctype="multipart/form-data">
                      <input type="hidden" name="function" value="update_admin_info">
                      <input type="hidden" name="user_id" value="<?=$user_id?>">
                      <div class="form-group">
                          <label for="">Change Profile Image</label>
                          <input type="file" name="profile_img" accept=".jpg, .png, .jpeg" class="form-control">
                      </div>

                      <div class="row py-3">
                        <div class="col-xl-4 col-lg-4 col-12 py-xl-0 py-lg-0 py-2">
                          <label for="exampleInputName1">First Name</label>
                          <input type="text" name="fname" value="<?=$fname?>" class="form-control" required='true'>
                        </div>                      
                        <div class="col-xl-4 col-lg-4 col-12 py-xl-0 py-lg-0 py-2">
                          <label for="exampleInputName1">Middle Name</label>
                          <input type="text" name="mname" value="<?=$mname?>" class="form-control" required='true'>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-12 py-xl-0 py-lg-0 py-2">
                          <label for="exampleInputName1">Last Name</label>
                          <input type="text" name="lname" value="<?=$lname?>" class="form-control" required='true'>
                        </div>
                      </div>

                      <div class="form-group">
                      <label for="exampleInputName1">Email</label>
                          <input type="text" name="email" value="<?=$email?>" class="form-control" required='true'>
                      </div>
                      <h3>Login details</h3>
                      <div class="form-group">
                        <label for="">User Name</label>
                        <input type="text" name="uname"value="<?=$uname?>" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="">Current Password</label>
                        <input type="text" name="cpass"value="" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="">New Password</label>
                        <input type="text" name="npass" value="" class="form-control">
                      </div>
                      <button type="submit" class="btn btn-success mr-2" name="update_admin_info">Update</button>
                     
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <?php include_once('includes/footer.php');?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/select2/select2.min.js"></script>
    <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>