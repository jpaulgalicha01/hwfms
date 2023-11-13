<?php
include 'includes/autoload.inc.php';
$org_name = secured($_REQUEST['name_org']);
$value="";
if($_REQUEST['name_org']){
    $value = secured($_REQUEST['name_org']);

    $check_org = new fetch();
    $res = $check_org->checkOrgMem($value);
    if($res->rowCount()){
        $row = $res->fetch();
        $org_name = $row['org_name'];
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>HWFC  Management System|||View Officer(<?=$org_name?>)</title>
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
              <h3 class="page-title"> View Officer(<?=$org_name?>) </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> View Officer(<?=$org_name?>)</li>
                </ol>
              </nav>
            </div>

            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="mb-4">
                      <h4 class="card-title mb-sm-0">Officer List (<?=$org_name?>)</h4>
                    </div>
                    <div class="table-responsive border rounded p-1" id="result">
                        <table class="table">
                        <thead>
                        <tr>
                        <th class="font-weight-bold">Name</th>
                        <th class="font-weight-bold">Barangay</th>
                        <th class="font-weight-bold">Position</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                $fetch_org_mem = new fetch();
                                $res = $fetch_org_mem->fetchOrgMem($value);

                                if($res->rowCount()){
                                    while($row = $res->fetch()){
                                      $org_name_id= $row["org_mem_name_id"];
                                        ?>
                                            <tr>
                                                <td><?=$row['org_mem_name']?></td>
                                                <td><?=$row['org_mem_brgy']?></td>
                                                <td><?=$row['org_mem_pos']?></td>
                                            </tr>
                                        <?php
                                    }
                                }else{
                                    echo"<tr><td colspan='3' class='text-center'>No Data Found</td></tr>";
                                }
                            ?>

                        </tbody>
                        </table>
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

       <!-- Modal -->
   <div class="modal fade" id="addMemeber" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title">Add Member</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="inputConfig.php" method="POST">
                    <input type="hidden" name="function" value="add_member_org">
                    <input type="hidden" name="org_name" value="<?=$org_name?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Position :</label>
                            <select name="org_pos" id=""class="custom-select text-center" required>
                                <option value="" disabled selected>---Please Select---</option>
                                <option>President</option>
                                <option>V-President</option>
                                <option>Secretary</option>
                                <option>Treasurer</option>
                                <option>P.I.O</option>
                                <option>Business Manager</option>
                                <option>Auditor</option>
                                <option>Representative</option>
                            </select>
                            <label for="">Name :</label>
                            <select name="org_mem_name" id="" class="custom-select text-center" required>
                            <option selected disabled value="">---Please Select---</option>
                                <?php
                                    $org_mem = new fetch();
                                    $res = $org_mem->orgMem($value);

                                    if($res->rowCount()){
                                        while($row = $res->fetch()){
                                            ?>
                                                <option value="<?=$row['acc_admin_id']?>"><?=$row['acc_fname']?> <?=$row['acc_fname']?> <?=$row['acc_fname']?></option>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                            <option selected disabled value="">--No Data Found--</option>
                                        <?php
                                    }
                                ?>
                            </select>

                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="add_member_org" class="btn btn-success">Add</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <script>

    </script>

  </body>
</html>