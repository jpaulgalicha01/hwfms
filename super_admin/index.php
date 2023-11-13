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
                                      <?php
                                        $today_appointment = new fetch();
                                        $today_appointment->todayAppointment($date);
                                      ?>
                                      </div>
                                
                                  </div>
                              </div>
                          </div>
                        </a> 
                    </div>
                </div>
                <div class="col-12"></div>
                <!-- Total Number  Admin -->
                <div class="col-xl-4 col-md-6 col-12 mb-4">
                    <div class="card shadow h-100 py-2">
                        <a href="manage-admin.php" style="text-decoration: none; color:black">
                          <div class="card-body" >
                              <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                          Total Admin:</div>
                                    
                                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                                          <?php
                                            $count_admin = new fetch();
                                            $count_admin->countAdmin();
                                          ?>
                                      </div>
                                
                                  </div>
                              </div>
                          </div>
                        </a> 
                    </div>
                </div>                        
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
                                            $count_admin = new fetch();
                                            $count_admin->countUser();
                                        ?>
                                      </div>
                                
                                  </div>
                              </div>
                          </div>
                        </a> 
                    </div>
                </div>                        
                <!-- Total Number  Organization -->
                <div class="col-xl-4 col-md-6 col-12 mb-4">
                    <div class="card shadow h-100 py-2">
                        <a href="manage-organization.php" style="text-decoration: none; color:black">
                          <div class="card-body" >
                              <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                          Total Organization:</div>
                                    
                                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                                      <?php
                                            $count_admin = new fetch();
                                            $count_admin->countOrg();
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
                
                <!-- Pending Organization -->
                <div class="col-xl-4 col-md-6 col-12 mb-4">
                  <div class="card shadow h-100 py-2">
                      <a href="manage-organization.php" style="text-decoration: none; color:black">
                        <div class="card-body" >
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Organization:</div>
                                  
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                      <?php
                                        $pending_org = new fetch();
                                        $pending_org->pendingOrg();
                                      ?>
                                    </div>
                              
                                </div>
                            </div>
                        </div>
                      </a> 
                  </div>
                </div>

                <!-- Pending Appointment-->
                <div class="col-xl-4 col-md-6 col-12 mb-4">
                    <div class="card shadow h-100 py-2">
                        <a href="manage-appointment.php" style="text-decoration: none; color:black">
                          <div class="card-body" >
                              <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                      Appointment:</div>
                                    
                                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                                      <?php
                                        $pending_app = new fetch();
                                        $pending_app->pendingApp();
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

          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Active Users</h3>
            </div>
              <div class="row">
                <div class="col-xl-6 col-md-6 col-12">
                  <div class="card mb-4">
                    <div class="card-header">
                    <i class="fas fa-chart-pie me-1"></i>
                    User & Admin
                  </div>
                  <div class="shadow">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <canvas id="myPieChart" style="height:20px !important"></canvas>
                      </div>
                    </div>
                  </div>

                  </div>
                </div>
                <div class="col-xl-6 col-md-6 col-12">
                  <div class="row">
                      <div class="col-12 py-3">
                        <div class="card shadow h-100 py-2">
                            <a href="manage-user.php" style="text-decoration: none; color:black">
                              <div class="card-body" >
                                  <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                          Total Account:</div>
                                        
                                          <div class="h5 mb-0 font-weight-bold text-gray-800">
                                          <?=$count_total_acc?>
                                          </div>
                                    
                                      </div>
                                  </div>
                              </div>
                            </a> 
                        </div>
                      </div>
                      <div class="col-12 py-3">
                        <div class="card shadow h-100 py-2">
                            <a href="manage-admin.php" style="text-decoration: none; color:black">
                              <div class="card-body" >
                                  <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                          Admin:</div>
                                        
                                          <div class="h5 mb-0 font-weight-bold text-gray-800">
                                          <?=$count_active_admin?>
                                          </div>
                                    
                                      </div>
                                  </div>
                              </div>
                            </a> 
                        </div>
                      </div>
                      <div class="col-12 py-3">
                        <div class="card shadow h-100 py-2">
                            <a href="manage-user.php" style="text-decoration: none; color:black">
                              <div class="card-body" >
                                  <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                          User:</div>
                                        
                                          <div class="h5 mb-0 font-weight-bold text-gray-800">
                                          <?=$count_active_user?>
                                          </div>
                                    
                                      </div>
                                  </div>
                              </div>
                            </a> 
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="card-header">
                  </div>
                  <div class="shadow">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <canvas id="myBargraph" width="100%" height="25%"></canvas>
                      </div>
                    </div>
                  </div>

                  </div>
                </div>
              </div>
          </div>

            <!-- Modal -->
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
      // Chart
        var ctx_pie = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx_pie, {
          type: 'pie',
          data: {
            labels: ["Total Accounts", "Active User", "Active Admin"],
            datasets: [{
              data: [<?=$count_total_acc?>,<?=$count_active_user?>,<?=$count_active_admin?>],
              backgroundColor: ['#007bff', '#dc3545','#1CC88A'],
            }],
          },
        });

      // Bar 
      $(document).ready(function(){
        $.ajax({
          type:"GET",
          url:"inputConfig.php",
          data:{function:"fetch brgy"},
          dataType: "JSON",
          success:function(data){
              var count_active = [];
              var brgy = [];
              var color = [];

              $.each(data,function (){
                count_active.push(this['count_active']);
                brgy.push(this['brgy_name']);
                color.push(this['color']);
              });            

            console.log(count_active);

            var chartdata = {
              labels: brgy,
              datasets : [
                {
                  label: 'Active User',
                  backgroundColor: color,
                  color: "#fff",
                  data: count_active,
                }
              ]
            };

            var ctx_bar = $("#myBargraph");

            var barGraph = new Chart(ctx_bar, {
              type: 'bar',
              data: chartdata
            });

          }
        })
      })

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
        })
      </script>
  </body>
</html>