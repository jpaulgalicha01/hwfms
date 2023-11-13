<?php
include 'includes/autoload.inc.php';
unset($_SESSION['title']);
$_SESSION['title'] = "Add Organization";

$org_id="";
$org_name="";
$org_create="";
$check = "";

if(isset($_REQUEST['editOrg'])){
  $value = secured($_REQUEST['editOrg']);
  $check_org = new fetch();
  $res = $check_org->checkOrg($value);
  if($res){
    $row = $res->fetch();

    $org_id=$row['org_id']; 
    $org_name=$row['org_name']; 
    $org_create=$row['org_create_date'];

    $check = $row['org_brgy'];
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>HWFC  Management System|| <?php if(!empty($_REQUEST['editOrg'])){echo"Edit Organization";}else{echo"Add Organization";}?></title>
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
              <h3 class="page-title"> <?php if(!empty($_REQUEST['editOrg'])){echo"Edit Organization";}else{echo"Add Organization";}?> </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> <?php if(!empty($_REQUEST['editOrg'])){echo"Edit Organization";}else{echo"Add Organization";}?></li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;"><?php if(!empty($_REQUEST['editOrg'])){echo"Edit Organization";}else{echo"Add Organization";}?></h4>
                   
                    <form class="forms-sample" method="post" action="inputConfig.php">
                      <input type="hidden" name="function" value="add_org">
                      <div class="form-group">
                        <label for="">Organization Name: </label>
                        <input type="text" name="org_name" value="<?=$org_name?>" <?php if($check=="All"){echo"disabled";}?> class="form-control" required='true'>
                      </div>                      
                      <div class="form-group">
                        <label for="">Established Date: </label>
                        <input type="date" name="org_date" value="<?=$org_create?>"<?php if($check=="All"){echo"disabled";}?> class="form-control" required='true'>
                      </div>
                      <?php
                        if(empty($_REQUEST['editOrg'])){
                          ?>
                            <button type="submit" class="btn btn-primary mr-2" name="add_org">Add</button>
                          <?php
                        }
                        else if($check=="All"){
                          ?>
                            <a href="manage-organization.php" class="btn btn-primary mr-2">Back</a>
                          <?php
                        }else{
                            ?>
                              <input type="hidden" name="org_id" value="<?=$org_id?>">
                              <button type="submit" class="btn btn-success mr-2" name="update_org">Update</button>
                            <?php
                        }
                      ?>                     
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