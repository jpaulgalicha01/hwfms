<?php
    include 'includes/autoload.inc.php';

    unset($_SESSION['page_title']);
    $_SESSION['page_title'] = "Add Announcement"; 

    include 'includes/header.php';
?>
<main>
	<div class="container-fluid px-4">
	    <h1 class="mt-4">Add Announcement</h1>
	    <div class="card mb-4 shadow">
	        <div class="card-header">
	          Announcement
	        </div>
	        <div class="card-body">
	        	<form class="form-group" action="inputConfig.php" method="POST">
	        		<input type="hidden" name="function" value="add_announce">
	        		<div class="row">
		            	<div class="col-md-6 py-2">
				            <label for="inputWhat">What :</label>
				            <input type="text" name="inputWhat" class="form-control" id="inputWhat" placeholder="Title of Announcement/Programs/Activities" required />
				        </div>
				        <div class="col-md-6 py-2">
				            <label for="inputWhen">When :</label>
				            <input type="date" name="inputWhen" class="form-control" id="inputWhen" required />
				        </div>
				        <div class="col-md-6 py-2">
				            <label for="inputWho">Who :</label>
				            <input type="text" name="inputWho" class="form-control" id="inputWho" placeholder="Involve of this Programs or Activities" required />
				        </div>
				        <div class="col-md-6 py-2">
				            <label for="inputWhere">Where :</label>
				            <input type="text" name="inputWhere" class="form-control" id="inputWhere" placeholder="Place of Programs or Activities" required />
				        </div>
				        <div class="col-md-6 py-2">
				            <label for="inputWhere">Type of Announcement :</label>
				            <select class="form-select" name="type_announce" required />
				            	<option value="" disabled selected>---Please Select---</option>
				            	<option>Livelihood Program</option>
				            	<option>Job Offers</option>
				            </select>
				        </div>
				        <div class="py-2">
				        	<button class="btn btn-primary btn-sm" type="submit" name="add_announce">
				        		Add Announement
				        	</button>
				        </div>
		            </div>
	        	</form>
	        </div>
	    </div>
	</div>
</main>
<?php
include 'includes/footer.php';
?>