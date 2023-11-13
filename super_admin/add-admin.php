<?php
include 'includes/autoload.inc.php';

$fname="";
$mname="";
$lname="";
$birthdate="";
$brgy="";
$org="";
$phone="";
$email="";
$uname="";
$acc_type="";
$acc_id = "";

if(!empty($_REQUEST['editid'])){
  $value = secured($_REQUEST['editid']);

  $fetch_admin = new fetch();
  $res = $fetch_admin->viewAdmin($value);

  if($res){
    $row = $res->fetch();
    $profile_img = $row['acc_profile'];
    $fname = $row['acc_fname'];
    $mname = $row['acc_mname'];
    $lname = $row['acc_lname'];
    $birthdate = $row['acc_birth'];
    $brgy = $row['acc_address'];
    $org = $row['acc_org'];
    $phone = $row['acc_phone'];
    $email = $row['acc_email'];
    $uname = $row['acc_uname'];
    $acc_type = $row['acc_type'];
    $acc_id = $row['acc_admin_id'];
  }
}

unset($_SESSION['title']);

if(isset($_REQUEST['editid'])){ 
  if($acc_type=="user"){
    $_SESSION['title'] = "View User";
  }else{
    $_SESSION['title'] = "View Admin";
  }}else{
    $_SESSION['title'] = "Add Admin";
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>HWFC  Management System|| <?php if(isset($_REQUEST['editid'])){ if($acc_type=="user"){echo"View User";}else{echo"View Admin";}} else{echo"Add Admin";}?></title>
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
              <h3 class="page-title"> <?php if(isset($_REQUEST['editid'])){ if($acc_type=="user"){echo"View User";}else{echo"View Admin";}} else{echo"Add Admin";}?> </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> <?php if(isset($_REQUEST['editid'])){ if($acc_type=="user"){echo"View User";}else{echo"View Admin";}} else{echo"Add Admin";}?></li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;"><?php if(isset($_REQUEST['editid'])){ if($acc_type=="user"){echo"View User";}else{echo"View Admin";}} else{echo"Add Admin";}?></h4>
                   
                    <form class="forms-sample" action="inputConfig.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="function" value="add_admin">
                    <?php
                      if(!empty($profile_img)){
                        ?>
                        <input type="hidden" name="user_id" value="<?=$_REQUEST['editid']?>">
                        <div class="form-goup text-center">
                          <img src="../uploads/<?=$profile_img?>" alt="" width="250" height="250">
                        </div>
                        <?php
                      }
                    ?>
                    <?php 
                    if(!!empty($profile_img))
                    {
                     ?>
                        <div class="form-group">
                            <label for=""><?php if($_SESSION['title']=="View User"){echo"User"; }else{echo "Admin";}?> Photo</label>
                            <input type="file" name="profile_img" accept=".jpg, .png, .jpeg" class="form-control">
                        </div>
                     <?php
                    }
                    ?>
                      <div class="form-group">
                        <label for=""><?php if($_SESSION['title']=="View User"){echo"User"; }else{echo "Admin";}?> First Name</label>
                        <input type="text" name="fname" class="form-control" value="<?=$fname?>" <?php if(!empty($fname)){echo"disabled";}?> required='true'>
                      </div>
                      <div class="form-group">
                        <label for=""><?php if($_SESSION['title']=="View User"){echo"User"; }else{echo "Admin";}?> Middle Name</label>
                        <input type="text" name="mname" value="<?=$mname?>" <?php if(!empty($mname)){echo"disabled";}else{?>placeholder="Optional"<?php }?> class="form-control">
                      </div>
                      <div class="form-group">
                        <label for=""><?php if($_SESSION['title']=="View User"){echo"User"; }else{echo "Admin";}?> Last Name</label>
                        <input type="text" name="lname" class="form-control" value="<?=$lname?>" <?php if(!empty($lname)){echo"disabled";}?> required='true'>
                      </div>
                      <div class="form-group">
                        <label for="">Date of Birth</label>
                        <input type="date" name="birthdate" value="<?=$birthdate?>" <?php if(!empty($birthdate)){echo"disabled";}?> class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3"><?php if($_SESSION['title']=="View User"){echo"User"; }else{echo "Admin";}?> Barangay</label>
                        <select  name="address" class="form-control" required='true' <?php if(!empty($brgy)){echo"disabled";}?>>
                          <?php
                            if(!empty($brgy)){
                              echo "<option selected>".$brgy."</option>";
                            }else{
                              echo "<option disabled selected>Choose Barangay</option>";
                            }
                          ?>
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
                      <?php
                      if($acc_type=="user"){
                        ?>
                          <div class="form-group">
                            <label for="">Organization</label>
                            <input type="text" name="phone" class="form-control" required='true' value="<?=$org?>" disabled maxlength="10" pattern="[0-9]+">
                          </div>
                        <?php
                      }
                      ?> 
                      <div class="form-group">
                        <label for="">Contact Number</label>
                        <input type="text" name="phone" class="form-control" placeholder="09xxxxxxxxx" required='true' value="<?=$phone?>" <?php if(!empty($phone)){echo"disabled";}?> maxlength="11" pattern="[0-9]{2}[0-9]{9}+">
                      </div>          
                      <div class="form-group">
                        <label for=""><?php if($_SESSION['title']=="View User"){echo"User"; }else{echo "Admin";}?> Email</label>
                        <input type="text" name="email" class="form-control" placeholder="example@asd.com" value="<?=$email?>" <?php if(!empty($email)){echo"disabled";}?>  required='true'>
                      </div>
                      <h3>Login details</h3>
                      <div class="form-group">
                        <label for="">User Name</label>
                        <input type="text" name="uname"value="<?=$uname?>" <?php if(!empty($uname)){echo"disabled";}?>  class="form-control" required='true'>
                      </div>
                      <?php
                          if(empty($uname)){
                            ?>
                          <div class="form-group">
                            <label for="">Password</label>
                            <input type="Password" name="password" class="form-control" required='true'>
                          </div>
                            <?php
                          }

                          if($acc_type !==""){
                            ?>
                              <h3>Services (City)</h3>
                              <div class="form-group">
                                  <div class="py-2">
                                      <ul class="list-group">
                                        <?php
                                          $fetch_city_serv = new fetch();
                                          $res_serv_city = $fetch_city_serv->fetchCityServ($acc_id,$brgy);

                                          if($res_serv_city->rowCount()>0){
                                            while ($row_serv_city = $res_serv_city->fetch()) {
                                              ?>
                                                  <li class="list-group-item"><?=$row_serv_city['ser_name']?> (<?=$row_serv_city['ser_date']?>)</li>
                                              <?php
                                            }
                                          }else{
                                            ?>
                                                <li class="list-group-item">No Data Found</li>
                                            <?php
                                          }
                                        ?>
                                      </ul>
                                  </div>
                              </div>
                                <h3>Barangay (City)</h3>
                                  <div class="form-group">
                                      <div class="py-2">
                                          <ul class="list-group">
                                            <?php
                                          $fetch_brgy_serv = new fetch();
                                          $res_serv_brgy = $fetch_brgy_serv->fetchBrgyServ($acc_id,$brgy);

                                          if($res_serv_brgy->rowCount()>0){
                                            while ($row_serv_brgy = $res_serv_brgy->fetch()) {
                                              ?>
                                                  <li class="list-group-item"><?=$row_serv_brgy['ser_name']?> (<?=$row_serv_brgy['ser_date']?>)</li>
                                              <?php
                                            }
                                          }else{
                                            ?>
                                                <li class="list-group-item">No Data Found</li>
                                            <?php
                                          }
                                        ?>
                                          </ul>
                                      </div>
                                  </div>
                            <?php
                          }

                          if(!empty($acc_type)){
                            if($acc_type == "user"){
                              ?>
                                <a href="manage-user.php" class="btn btn-success mr-2">Back</a>
                            <?php
                            }else{
                            ?>
                                <a href="manage-admin.php" class="btn btn-success mr-2">Back</a>
                            <?php }
                          }else{
                            ?>
                                <button type="submit" class="btn btn-primary mr-2" name="add_admin">Add</button>
                            
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