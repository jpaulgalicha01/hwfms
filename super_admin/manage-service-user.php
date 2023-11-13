<?php
include 'includes/autoload.inc.php';
unset($_SESSION['title']);
$_SESSION['title'] = "View Service Certificate";

$services_id = secured($_REQUEST['id']);
$service_name = "";
$service_sponsor = "";
$checking_services = new fetch();
$res = $checking_services->checkingServices($services_id);

if($res){
  $row = $res->fetch();
  $service_name = $row['sched_events_title'];
  $service_sponsor = $row['sched_events_sponsor'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>HWFC  Management System|||Manage Services</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
    <!-- endinject -->
    <!-- Plugin css for this page -->
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
              <h3 class="page-title"> Manage Services </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Manage Services</li>
                </ol>
              </nav>
            </div>
            <div class="form-group">
              <label for="">Barangay:</label>
              <select  name="address" class="custom-select" id="brgy">
                          <option selected>All</option>
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
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Manage Services </h4>
                    </div>
                    <div class="d-flex justify-content-end pb-3">
                        <button type="button" title="Add" class="btn btn-primary rounded btn-sm" data-toggle="modal" data-target="#add_pre_reg"><i class="icon-plus" ></i></button>
                    </div>
                     
                    <div class="table-responsive border rounded p-1" id="result">

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <?php include_once('includes/footer.php');?>

           <!-- Modal -->
  <div class="modal fade" id="add_pre_reg" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="background-color:whitesmoke">
        <div class="modal-header">
          <h4 class="modal-title">Getting Services</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="inputConfig.php" method="POST">
            <input type="hidden" name="function" value="add_user_services">
            <input type="hidden" name="service_sponsor" value="<?=$service_sponsor?>">
            <input type="hidden" name="service_name" value="<?=$service_name?>">
            <div class="modal-body">
                <div class="form-group">
                    <div class="py-2">
                        <label for="">Acc ID Number:</label>
                        <input type="text" name="user_name_get_ser" id="user_name" class="form-control rounded" placeholder="Search the name ex.(Juan..)">
                        <div class="card rounded" style="height:max-content; max-height:100px;" id="card">
                            <div style="overflow-y: auto;" id="result_name">
                              
                            </div>
                        </div>
                    </div>
                    <div class="py-2">
                        <label for="">Date:</label>
                        <input type="date" class="form-control" name="date_get_ser">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" name="add_user_services">Add</button>
            </div>
        </form>

      </div>
      
    </div>
  </div>

  <script>
        // Selection For Brgy
        $(document).ready(function(){
            $("#brgy").change(function(){
                const brgy = $(this).val();
                // alert(brgy);
                $.ajax({
                    method:"POST",
                    url:"fetchServicesUser.php",
                    data:{brgy:brgy,service_id:"<?=$services_id ?>",function:"fetchServicesUser"},
                    success:function(response){
                        $("#result").html(response);
                    }
                });
            });
            $("#brgy").trigger("change");
        });

        $(document).ready(function(){
            $("#user_name").keyup(function(){
                var user_name = $(this).val();
                // alert(user_name);
                $.ajax({
                    method:"POST",
                    url:"fetchName.php",
                    data:{user_name:user_name},
                    success:function(response){
                        if(user_name !==""){
                            $("#card").show();
                            $("#result_name").html(response);

                        }else{
                            $("#card").hide();
                        }
                    }
                })
                
            });
            $("#user_name").trigger("keyup");
        });
        
        $(document).on('click','#btn_user_name',function(){
          var value = $(this).attr('value');
          // alert(value);
          $("#user_name").val(value);
          $("#card").hide();
        });

        $(document).on('click','#add_pre_reg',function(){
          $("#card").hide();
        })
    </script>

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