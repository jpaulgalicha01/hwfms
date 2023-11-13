<?php
include 'includes/autoload.inc.php';
unset($_SESSION['title']);
$_SESSION['title'] = "View Result";

$year_election = secured($_REQUEST['year_election']);

$check_year = new fetch();
$check_year->checkYear($year_election);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>HWFC  Management System|||View Result</title>
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
              <h3 class="page-title"> View Result (<?=$_REQUEST['year_election']?>)</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> View Result</li>
                </ol>
              </nav>
            </div>

            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">View Result (<?=$_REQUEST['year_election']?>)</h4>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>

                            <th class="font-weight-bold">Organization Name</th>
                            <th class="font-weight-bold">No. of Candidates</th>
                            <th class="font-weight-bold text-center">Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $brgy_list = new fetch();
                            $res = $brgy_list->brgyList();

                            if($res->rowCount()>0){
                              while($row = $res->fetch()){
                                ?>
                                    <tr>
                                        <td><?=$row['org_name']?></td>
                                        <td>
                                            <?php
                                              $brgy_name = $row['org_name'];
                                              $candidate_count = new fetch();
                                              $count = $candidate_count->candidateCount($year_election,$brgy_name);
                                              if($count){
                                                echo $count->rowCount();
                                              }else{
                                                echo"0";
                                              }
                                            ?>                                        </td>
                                        <td class="text-center">
                                            <button type="button" id="fetch_candidates" class="btn btn-outline-none btn-sm"  value="<?=$row['org_name']?>" style="color:#0056b3">
                                              <i class="icon-eye"></i>
                                            </button>

                                            <a href="print-result.php?val=<?=$row['org_name']?>&year=<?=$year_election?>" target="__blank" class="btn btn-outline-none btn-sm" style="color:#0056b3"><i class="icon-printer"></i></a>
                                        </td>
                                    </tr>
                                <?php
                              }
                            }else{
                              echo"<tr><td class='text-center' colspan='3'>No Data Found</td</tr>";
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

  </div>
  <script>
      $(document).on("click","#fetch_candidates",function(){
        var value = $(this).val();
        var year = <?=$year_election?>;
        // alert(value);
         $.ajax({
          type:"GET",
          url:"fetchElectionRes.php",
          data:{val:value, year:year, function:"fetchPreRegList"},
          success:function(response){
            $("#add_pre_reg").html(response);
            $("#add_pre_reg").modal("show");
          }
        });
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
