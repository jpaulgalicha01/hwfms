<?php
include 'includes/autoload.inc.php';

unset($_SESSION['page_title']);
$_SESSION['page_title'] = "Add Organization";

include 'includes/header.php';

?>

<main>
	<div class="container-fluid px-4">
		<div class="row">
	        <h1 class="mt-4">Add Organization</h1>
        	<br>
	        <div class="card mb-4">
	            <div class="card-header">
	                Adding organization
	            </div>
	            <div class="card-body">
	            	<form action="inputConfig.php" method="POST" enctype="multipart/form-data">
	            		<input type="hidden" name="function" value="add_org">
	            		<div class="py-2">
						  <label for="inputOrgName" class="form-label">Organization Name:</label>
						  <input class="form-control" type="text" name="org_name" id="inputOrgName" required>
	            		</div>
	            		<div class="py-2">
						  <label for="inputEstablishDate" class="form-label">Establish Date:</label>
						  <input class="form-control" type="date" name="org_date" id="inputEstablishDate" required>
	            		</div>
	            		<div class="py-2">
						  <label for="inputEstablishDate" class="form-label">Baranagay:</label>
						   <select class="form-select" id="inputBrgy" name="org_brgy" required>
	                            <option value="" selected disabled>---Please Select---</option>
	                            <option>All</option>
	                            <?php
	                                $fetch_brgy = new fetch();
	                                $res_fetch_brgy = $fetch_brgy->fetchBrgy();
	                                
	                                if($res_fetch_brgy->rowCount()){
	                                    while ($fetch_res = $res_fetch_brgy->fetch()) {
	                                        ?>
	                                            <option><?= $fetch_res['brgy_name']?></option>
	                                        <?php
	                                    }
	                                }else{
	                                    ?>
	                                        <option disabled value="" selected>No Data Found</option>
	                                    <?php
	                                }
	                            ?>
	                        </select>
	            		</div>
	            		 <button class="btn btn-success btn-sm" type="submit" name="add_org">Submit</button>
	            	</form>
	    		</div>
	    	</div>
		</div>
    </div>
</main>


<?php
include 'includes/footer.php';
?>
