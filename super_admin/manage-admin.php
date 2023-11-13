<?php
include 'includes/autoload.inc.php';

unset($_SESSION['title']);
$_SESSION['title'] = "Manage Admin";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>HWFC  Management System|||Manage Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- End layout styles -->
   
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
              <h3 class="page-title"> Manage Admin </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Manage Admin</li>
                </ol>
              </nav>
            </div>
            <div class="form-group">
              <label for="">Barangay:</label>
              <select  name="address" class="form-control" id="brgy">
                          <option selected>All</option>
                          <option>Barangay 1</option>
                          <option>Barangay 2</option>
                          <option>Barangay 3</option>
                          <option>Barangay 4</option>
                          <option>Anahaw</option>
                          <option>Aranda</option>
                          <option>Baga-as</option>
                          <option>Bato</option>
                          <option>Calapi</option>
                          <option>Camalobalo</option>
                          <option>Camba-og</option>
                          <option>Cambugsa</option>
                          <option>Candumarao</option>
                          <option>Gargato</option>
                          <option>Himaya</option>
                          <option>Miranda</option>
                          <option>Nanunga</option>
                          <option>Narauis</option>
                          <option>Paticui</option>
                          <option>Pilar</option>
                          <option>Quiwi</option>
                          <option>Tagda</option>
                          <option>Tuguis</option>
                          <option>Palayog</option>
                        </select>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Manage Admin</h4>
                      
                    </div>
                    <div class="table-responsive border rounded p-1" id="result">

                    </div>
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
    <script src="./vendors/chart.js/Chart.min.js"></script>
    <script src="./vendors/moment/moment.min.js"></script>
    <script src="./vendors/daterangepicker/daterangepicker.js"></script>
    <script src="./vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./js/dashboard.js"></script>
    <!-- End custom js for this page -->

<script>
  $(document).ready(function(){
    $("#brgy").change(function(){
      var value = document.getElementById("brgy").value;
      // alert(value);
      $.ajax({
        method:"POST",
        url:"fetchAdmin.php",
        data:{value:value, function:"Fetch Admin"},
        success:function(response){
          $("#result").html(response);
        }
      });
    });
    $("#brgy").trigger("change");
  });
</script>

  </body>
</html>