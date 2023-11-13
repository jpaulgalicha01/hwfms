<?php
include 'includes/autoload.inc.php';
unset($_SESSION['title']);
$_SESSION['title'] = "Dashboard";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Women Federation   Management System|||Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css">
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
              <h3 class="page-title">Dashboard</h3>
            </div>
           <div class="row">
              <!-- Today Appointment-->
              <div class="col-xl-4 col-md-6 col-12 mb-4">
                    <div class="card shadow h-100 py-2" id="today_app">
                        <a href="#" style="text-decoration: none; color:black">
                          <div class="card-body" >
                              <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                      Today Appointment:</div>
                                    
                                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                                      0
                                      </div>
                                
                                  </div>
                              </div>
                          </div>
                        </a> 
                    </div>
                </div>
              <div class="col-12"></div>

                <!-- Total Number  User -->
                <div class="col-xl-4 col-md-6 col-12 mb-4">
                    <div class="card shadow h-100 py-2">
                        <a href="manage-user.php" style="text-decoration: none; color:black">
                          <div class="card-body" >
                              <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                          Total User:</div>
                                    
                                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                            $status = "Accept";
                                            $count_admin = new fetch();
                                            $count_admin->countUser($status);
                                        ?>
                                      </div>
                                
                                  </div>
                              </div>
                          </div>
                        </a> 
                    </div>
                </div>
                <!-- Total Number  Organizaton -->
                <div class="col-xl-4 col-md-6 col-12 mb-4">
                    <div class="card shadow h-100 py-2">
                        <a href="manage-organization.php" style="text-decoration: none; color:black">
                          <div class="card-body" >
                              <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                          Total Organizaton:</div>
                                    
                                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                            $status_org = "Accept";
                                            $count_admin = new fetch();
                                            $count_admin->countOrg($status_org);
                                        ?>
                                      </div>
                                
                                  </div>
                              </div>
                          </div>
                        </a> 
                    </div>
                </div>
                <div class="col-12 py-3">
                  <h3 class="page-title">Pendings</h3>
                </div>
                <!-- Total Pending User -->
                <div class="col-xl-4 col-md-6 col-12 mb-4">
                    <div class="card shadow h-100 py-2">
                        <a href="manage-user.php" style="text-decoration: none; color:black">
                          <div class="card-body" >
                              <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                          Pending User:</div>
                                    
                                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                            $status = "Pending";
                                            $count_admin = new fetch();
                                            $count_admin->countUser($status);
                                        ?>
                                      </div>
                                
                                  </div>
                              </div>
                          </div>
                        </a> 
                    </div>
                </div>
                <!-- Total Pending Organization -->
                <div class="col-xl-4 col-md-6 col-12 mb-4">
                    <div class="card shadow h-100 py-2">
                        <a href="manage-organization.php" style="text-decoration: none; color:black">
                          <div class="card-body" >
                              <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                          Pending Organization:</div>
                                    
                                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                            $status_org = "Pending";
                                            $count_admin = new fetch();
                                            $count_admin->countOrg($status_org);
                                        ?>
                                      </div>
                                
                                  </div>
                              </div>
                          </div>
                        </a> 
                    </div>
                </div>  
           </div>
            
          </div>
          
          <div class="modal fade" id="modal_show" role="dialog">
            <div class="modal-dialog" id="modal_body">
              
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
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/moment/moment.min.js"></script>
    <script src="vendors/daterangepicker/daterangepicker.js"></script>
    <script src="vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/dashboard.js"></script>
    <!-- End custom js for this page -->

    <script type="text/javascript">
        // Modal For Today Appointment
        $(document).on('click','#today_app',function(){
            var date = "<?=$date?>";
            // alert(date);

            $.ajax({
              type:"POST",
              url:"fetchModalApp.php",
              data: {date:date, function:"today_app"},
              success:function(response){
                  $("#modal_show").modal("show");
                  $("#modal_body").html(response);
              }
            })
        });
    </script>
  </body>
</html>