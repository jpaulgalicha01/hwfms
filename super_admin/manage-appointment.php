<?php
include 'includes/autoload.inc.php';  
unset($_SESSION['title']);
$_SESSION['title'] = "List Appointment";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>HWFC  Management System || List of Appointment</title>
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
    <style>
        .custom-hover{
            transition: transform .2s; /* Animation */   
        }
        .custom-hover:hover{
            transform: scale(1.1);
        }
    </style>
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
              <h3 class="page-title">List of Appointment</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> List of Appointment</li>
                </ol>
              </nav>
            </div>
            <div class="form-group">
              <label for="">Status :</label>
              <select class="form-control" id="status">
                <option selected>All</option>
                <option>Accept</option>
                <option>Declined</option>
                <option>Pending</option>
              </select>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">List of Appointment</h4>
                    </div>
                    <div class="table-responsive border rounded p-1" id="result">

                    </div>
  
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="showAppointment" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="background-color:whitesmoke">
      <div class="modal-header">
        <h4 class="modal-title" id="name"></h4>
        ( <p id="email"></p> )
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
            <div class="modal-body">
                <div class="form-group">
                <label for="">Contact :</label>
                    <input type="text" id="contact" disabled class="form-control">
                    <label for="">Address :</label>
                    <input type="text" id="address" disabled class="form-control">
                    <label for="">Title :</label>
                    <input type="text" id="title" disabled class="form-control">
                    <label for="">Date: </label>
                    <input type="text" id="date" disabled class="form-control">
                    <label for="">Time: </label>
                    <input type="text" id="time" disabled class="form-control">
                    <label for="">Message</label>
                    <textarea disabled class="form-control" id="message" cols="20" rows="3"></textarea>
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
    
  </body>
</html>


<script>
  $(document).ready(function(){
    $("#status").change(function(){
      const value = document.getElementById("status").value;
      // alert(value);

      $.ajax({
        type:"POST",
        url: "fetchAppointment.php",
        data:{value:value, function:"fetch_appointment"},
        success:function(response){
          $("#result").html(response);
        }
      })

    });
    $("#status").trigger("change");
  })
</script>