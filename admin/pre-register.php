<?php
include 'includes/autoload.inc.php';
unset($_SESSION['title']);
$_SESSION['title'] = "Pre Registration";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>HWFC  Management System|||Pre Registration</title>
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
              <h3 class="page-title"> Pre Registration </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Pre Registration</li>
                </ol>
              </nav>
            </div>

            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Pre Registration</h4>
                    </div>
                    <div class="py-2">
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_pre_reg">
                            Add New
                        </button>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>

                            <th class="font-weight-bold">Election Year</th>
                            <th class="font-weight-bold">Starting Date</th>
                            <th class="font-weight-bold">End Date</th>
                            <th class="font-weight-bold">No. of Candidates</th>
                            <th class="font-weight-bold">Status</th>
                            <th class="font-weight-bold text-center">Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                $fetch_pre_regis = new fetch();
                                $res = $fetch_pre_regis->fetchPreRegis();

                                if($res->rowCount()>0){
                                    while($row = $res->fetch()){
                                        ?>
                                            <tr>
                                                <td><?=$row['pre_election_year']?></td>
                                                <td><?=$row['pre_election_statrting']?></td>
                                                <td><?=$row['pre_election_end']?></td>
                                                <td>
                                                  <?php
                                                    $year = $row['pre_election_year'];
                                                    $count_candidate_year = new fetch();
                                                    $res_count = $count_candidate_year->countCandidateYear($year);
                                                    
                                                    if($res_count){
                                                      echo $res_count->rowCount();
                                                    }else{
                                                      echo"0";
                                                    }
                                                  ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if($row['pre_election_status'] == "Start"){
                                                            ?>
                                                                <p class="bg-success text-center align-items-center">
                                                                    <span class="text-white">Open</span>
                                                                </p>
                                                            <?php
                                                        }
                                                        elseif($row['pre_election_status'] == "End"){
                                                            ?>
                                                                <p class="bg-danger text-center align-items-center">
                                                                    <span class="text-white">Closed</span>
                                                                </p>
                                                            <?php
                                                        }
                                                        else{
                                                            ?>
                                                                <p class="bg-secondary text-center align-items-center">
                                                                    <span class="text-white">Pending</span>
                                                                </p>
                                                            <?php
                                                        }
                                                    ?>
                                                    
                                                </td>
                                                <td class="text-center">
                                                    <div>
                                                        <a href="pre-register-list.php?year_election=<?=$row['pre_election_year']?>"><i class="icon-eye"></i></a> || 
                                                        <a href="inputConfig.php?delete_pre_reg=<?=$row['pre_election_id']?>" onclick="return confirm('Do you really want to Delete ?')"><i class="icon-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                }else{
                                    echo"<tr><td class='text-center' colspan='6'>No Data Found</td></tr>";
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

  <!-- Modal -->
  <div class="modal fade" id="add_pre_reg" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="background-color:whitesmoke">
        <div class="modal-header">
          <h4 class="modal-title">Pre Registration</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="inputConfig.php" method="POST">
            <input type="hidden" name="function" value="add_pre_regis">
            <div class="modal-body">
                <div class="form-group">
                    <div class="py-1">
                        <label for="">Election Year:</label>
                        <input type="text" name="pre_elect_year" class="form-control" id="datepicker" required>
                    </div>
                    <div class="py-1">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label for="">Starting Date:</label>
                                        <input type="date" name="pre_elect_starting" class="form-control" required>
                                    </div> 
                                    <div class="col-xl-6 col-lg-6 col-12">
                                        <label for="">End Date:</label>
                                        <input type="date" name="pre_elect_end" class="form-control" required>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" name="add_pre_regis">Save</button>
            </div>
        </form>

      </div>
      
    </div>
  </div>

        <script>
            $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
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
