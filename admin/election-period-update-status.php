<?php
include 'includes/autoload.inc.php';
unset($_SESSION['title']);
$_SESSION['title'] = "Update Election Period";

$election_id = secured($_REQUEST['update_id']);
$year="";
$status="";

$checking_election_period = new fetch();
$res = $checking_election_period->checkingElectionPeriod($election_id);

if($res){
    $row = $res->fetch();
    $year = $row['pre_election_year'];
    $status = $row['pre_election_period'];

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>HWFC  Management System|| Update Election Period</title>
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
              <h3 class="page-title">Update Election Period </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Update Election Period</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Update Election Period</h4>
                   
                    <form class="forms-sample" action="inputConfig.php" method="post">
                      <div class="form-group">
                        <label for="exampleInputName1">Year Election</label>
                        <input type="text" value="<?=$year?>" class="form-control" required='true' disabled>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Election Status</label>
                        <select name="election_status" class="custom-select">
                            <?php
                            switch($status){
                                case "Pending";
                                ?>
                                    <option selected>Pending</option>
                                    <option>Open</option>
                                    <option>Close</option>
                                <?php
                                break;
                                case "Open";
                                ?>
                                    <option>Pending</option>
                                    <option selected>Open</option>
                                    <option>Close</option>
                                <?php
                                break;
                                default:
                                ?>
                                    <option>Pending</option>
                                    <option>Open</option>
                                    <option selected>Close</option>
                                <?php
                                break;

                            }
                            ?>
                        </select>
                      </div>
                        <input type="hidden" name="function" value="update_election_status">
                        <input type="hidden" name="election_id" value="<?=$_REQUEST['update_id']?>">
                        <button type="submit" class="btn btn-success mr-2" name="update_election_status">Update</button>
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