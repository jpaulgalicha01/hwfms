<?php
include 'includes/autoload.inc.php';
unset($_SESSION['title']);
$_SESSION['title'] = "Election Period";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>HWFC  Management System|||Election Period</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
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
              <h3 class="page-title"> Election Period</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Election Period</li>
                </ol>
              </nav>
            </div>

            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Election Period</h4>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>

                            <th class="font-weight-bold">Year</th>
                            <th class="font-weight-bold">Sys. Default</th>
                            <th class="font-weight-bold">Status</th>
                            <th class="font-weight-bold text-center">Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            $check_election_period = new fetch();
                            $res = $check_election_period->checkElectionPeriod();
                            if($res->rowCount()>0){
                                while($row = $res->fetch()){
                                ?>
                                    <tr>
                                        <td><?=$row['pre_election_year']?></td>
                                        <td>
                                            <?php
                                                if($row['pre_election_sysDef']=="Yes"){
                                                    ?>
                                                        <button class="btn btn-primary btn-sm">Yes</button>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <button id="sysDef" value="<?=$row["pre_election_id"]?>" class="btn btn-danger btn-sm">No</button>
                                                    <?php
                                                }
                                            ?>
                                        </td>
                                        <td>
                                          <?php
                                            switch($row["pre_election_period"]){
                                              case "Pending";
                                              ?>
                                                <span class="p-1 bg-secondary text-white text-center">Pending</span>
                                              <?php
                                              break;
                                              case "Open";
                                              ?>
                                                <span class="p-1 bg-success text-white text-center">Open</span>
                                              <?php
                                              break;
                                              default:
                                              ?>
                                                <span class="p-1 bg-danger text-white text-center">Closed</span>
                                              <?php
                                            }
                                          ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="election-period-update-status.php?update_id=<?=$row["pre_election_id"]?>"><i class="icon-settings"></i></a> 
                                            || <a href="view-result.php?year_election=<?=$row['pre_election_year']?>" ><i class="icon-eye"></i></a>
                                        </td>
                                    </tr>

                                    
                                <?php 
                                }
                            }else{
                                echo"<tr><td colspan='5' class='text-center'>No Data Found</td></tr>";
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

  <div class="modal fade" id="sysDefModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="background-color:whitesmoke">
        <div class="modal-header">
          <h4 class="modal-title">Confirmation</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="inputConfig.php" method="POST">
            <input type="hidden" name="function" value="sysDef">
            <input type="hidden" id="sysDef_id" name="sysDef_id">
            <div class="modal-body">
                <p>Are you sure to make this system default ?</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" name="sysDef">Save</button>
            </div>
        </form>

      </div>
      
    </div>
  </div>



<script>
    $(document).on("click","#sysDef",function(){
        var value = $(this).val();
        // alert(value);
        if(value!=""){
            $("#sysDefModal").modal("show");
            $("#sysDef_id").val(value);
        }else{
            return false;
        }
    });

</script>


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
