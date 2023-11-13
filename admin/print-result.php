<?php
include 'includes/autoload.inc.php';

if(isset($_GET["val"]) && isset($_GET["year"])){
$value = secured($_GET['val']);
$year = secured($_GET['year']);
?>
<!DOCTYPE html>
<html>
  <head>
   
    <title>HWFC  Management System|||View Result</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="./css/style.css">
    <!-- End layout styles -->
   
  </head>
<body>
<div class="container-fluid">
	<div class="row py-5">
		<div class="col-12">
			<p class="text-center">Election Result For Officer Organization (<?=$_GET['val']?>)</p>

			<div class="table-responsive border rounded p-1">
              <table class="table">
              	<thead>
              		<tr>
              			<th>Name</th>
              			<th>No. of Votes</th>
              			<th>Position</th>
              		</tr>
              	</thead>
              	<tbody>
              		<?php
                                    $fetch_election_list = new fetch();
                                    $res = $fetch_election_list->fetchElectionList($value,$year);

                                    if($res->rowCount()){
                                        while($row = $res->fetch()){
                                            $candidate_id = $row['election_list_rand_id'];
                                            ?>
                                                <tr>
                                                    <td><?=$row['election_list_name']?></td>
                                                    
                                                    <td>
                                                        <?php
                                                            $count_vote = new fetch();
                                                            $count_vote->countVote($value,$year,$candidate_id);
                                                        ?>
                                                    </td>
                                                    <td><?=$row['election_list_position']?></td>
                                                    
                                                </tr>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                            <tr>
                                                <td colspan="4" class="text-center">No Data Found</td>
                                            </tr>
                                        <?php
                                    }
                                ?>
              	</tbody>
              </table>
          </div>
		</div>
	</div>
</div>

 <script>
window.print('pdf');
window.onafterprint = function(event) {
window.close();
};
</script> 



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

	</body>
</html>


<?php
}else{
	header("Location: index.php");
}
?>


