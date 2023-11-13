<?php
include 'includes/autoload.inc.php';
unset($_SESSION['title']);


$notice_id="";
$notice_org="";
$title="";
$date="";
$sponsor = "";
$message="";

if(isset($_REQUEST['editid'])){
  $value = secured($_REQUEST['editid']);
  $fetch_notice = new fetch();
  $res = $fetch_notice->fetch_updateService($value);

  if($res){
    while($row = $res->fetch()){
      $notice_id= $row['sched_events_id'];
      $notice_org=$row['sched_events_org'];
      $title = $row['sched_events_title'];
      $date = $row['sched_events_date'];
      $sponsor = $row['sched_events_sponsor'];
      $message = $row['sched_events_message'];
    }
  }
}

if(isset($_REQUEST['editid'])){
  $_SESSION['title'] = "View Services";}
  else{
    $_SESSION['title'] = "Add Services";
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>HWFC  Management System|| <?php if(isset($_REQUEST['editid'])){echo"Edit Services";}else{echo"Add Services";}?></title>
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
              <h3 class="page-title"><?php if(isset($_REQUEST['editid'])){echo"Edit Services";}else{echo"Add Services";}?> </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> <?php if(isset($_REQUEST['editid'])){echo"Edit Services";}else{echo"Add Services";}?></li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;"><?php if(isset($_REQUEST['editid'])){echo"Edit Services";}else{echo"Add Services";}?></h4>
                   
                    <form class="forms-sample" action="inputConfig.php" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputName1">Organization</label>
                        <select name="notice_org" id="" class="custom-select" required>
                          
                              <?php
                              if($notice_org==""){
                                ?>
                                      <option selected disabled value="">--- Please Select ---</option>
                                      <option>All</option>
                                <?php
                              }elseif($notice_org =="All"){
                                ?>
                                  <option selected>All</option>
                                <?php
                              }else{
                                ?>
                                  <option>All</option>
                                <?php
                              }
                              $fetch_org = new fetch();
                              $res = $fetch_org->fetchOrgList();
                              if($res->rowCount()>0){
                                while($row = $res->fetch()){
                                  switch ($notice_org) {
                                    case $row['org_name']:
                                      ?>
                                        <option selected><?=$row['org_name']?></option>
                                      <?php
                                      break;
                                    
                                    default:
                                      ?>
                                        <option><?=$row['org_name']?></option>
                                      <?php
                                      break;
                                  }
                                }
                              }else{
                                ?>
                                  <option selected disabled value="">---No Data Found---</option>
                                <?php
                              }
                            ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Service Title</label>
                        <input type="text" name="notice_title" value="<?=$title?>" class="form-control" required='true'>
                      </div>
                     
                      <div class="form-group">
                        <label for="exampleInputEmail3">Date:</label>
                        <input type="date" name="notice_date" value="<?=$date?>" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Sponsor: </label>
                         <input type="text" name="notice_sponsor" value="<?=$sponsor?>" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Service Message</label>
                        <textarea name="notice_message" class="form-control" required='true'><?=$message?></textarea>
                      </div>
                      <?php if(isset($_REQUEST['editid']))
                        {
                          ?>
                            <input type="hidden" name="function" value="update_service">
                            <input type="hidden" name="notice_id" value="<?=$notice_id?>">
                            <button type="submit" class="btn btn-success mr-2" name="update_service">Update</button>
                          <?php
                        }
                        else
                        {
                          ?>
                            <input type="hidden" name="function" value="add_service">
                            <button type="submit" class="btn btn-primary mr-2" name="add_service">Add</button>
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