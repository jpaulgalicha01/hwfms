<?php
include 'includes/autoload.inc.php';
unset($_SESSION['title']);


$notice_id="";
$title="";
$date="";
$message="";

if(isset($_REQUEST['editid'])){
  $value = secured($_REQUEST['editid']);
  $fetch_notice = new fetch();
  $res = $fetch_notice->fetch_updateNotice($value);

  if($res){
    while($row = $res->fetch()){
      $notice_id= $row['sched_events_id'];
      $title = $row['sched_events_title'];
      $date = $row['sched_events_date'];
      $message = $row['sched_events_message'];
    }
  }
}

if(isset($_REQUEST['editid'])){
  $_SESSION['title'] = "View Announcement";}
  else{
    $_SESSION['title'] = "Add Announcement";
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>HWFC  Management System|| <?php if(isset($_REQUEST['editid'])){echo"Edit Announcement";}else{echo"Add Announcement";}?></title>
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
              <h3 class="page-title"><?php if(isset($_REQUEST['editid'])){echo"Edit Announcement";}else{echo"Add Announcement";}?> </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> <?php if(isset($_REQUEST['editid'])){echo"Edit Announcement";}else{echo"Add Announcement";}?></li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;"><?php if(isset($_REQUEST['editid'])){echo"Edit Announcement";}else{echo"Add Announcement";}?></h4>
                   
                    <form class="forms-sample" action="inputConfig.php" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputName1">Announcement Title</label>
                        <input type="text" name="notice_title" value="<?=$title?>" class="form-control" required='true'>
                      </div>
                     
                      <div class="form-group">
                        <label for="exampleInputEmail3">Date: </label>
                        <input type="date" name="notice_date" value="<?=$date?>" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Announcement Message</label>
                        <textarea name="notice_message" class="form-control" required='true'><?=$message?></textarea>
                      </div>
                      <?php if(isset($_REQUEST['editid']))
                        {
                          ?>
                            <input type="hidden" name="function" value="update_notice">
                            <input type="hidden" name="notice_id" value="<?=$notice_id?>">
                            <button type="submit" class="btn btn-success mr-2" name="update_notice">Update</button>
                          <?php
                        }
                        else
                        {
                          ?>
                            <input type="hidden" name="function" value="add_notice">
                            <button type="submit" class="btn btn-primary mr-2" name="add_notice">Add</button>
                          <?php
                        }?>
                     
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