<?php
    include 'includes/autoload.inc.php';

    unset($_SESSION['page_title']);
    $_SESSION['page_title'] = "List Of Barangay Admin"; 

    include 'includes/header.php';
?>
<main>
	<div class="container-fluid px-4">
	    <h1 class="mt-4">List of Administrator</h1>
	    <div class="card mb-4">
	        <div class="card-header">
	            <i class="fas fa-table me-1"></i>
	            Table list
	        </div>
	        <div class="card-body">
	            <div class="table-responsive">
	            	<table id="table" class="table table-striped">
					    <thead>
					        <tr>
					            <th><small>No. </small></th>
					            <th><small>Name <small class="fst-italic">(Last Name, First Name, Middle Name)</small> </small></th>
					            <th><small>Email </small></th>
					            <th><small>Contact Number </small></th>
					            <th><small>Barangay</small></th>
					            <th class="text-center">Action </th></th>
					        </tr>
					    </thead>
					    <tbody>
					    	<?php
					    		$i = 0;
					    		$fetch_brgy_admin = new fetch();
					    		$res_fetch_brgy_admin = $fetch_brgy_admin->fetchBrgyAdmin();
					    		if($res_fetch_brgy_admin->rowCount()>0){
					    			while($row = $res_fetch_brgy_admin->fetch()){
					    				$get_age = date_diff(date_create($row['acc_birth']), date_create(date('Y-m-d')));;
					    				?>
					    					<tr>
									    		<td><?= ++$i;?></td>
									    		<td><?= $row['acc_lname'].", ".$row['acc_fname']." ".$row['acc_mname']?></td>
									    		<td><?= $row['acc_contact']?></td>
									    		<td><?= $row['acc_email']?></td>
									    		<td><?= $row['acc_brgy']?></td>
									    		<td class="text-center">
									    			<a href="add-admin.php?view_id=<?=$row['acc_rand_id']?>" class="btn btn-success" style="--bs-btn-padding-y: .20rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .70rem;" title="view"><i class="fa-solid fa-eye"></i></a>

						                			<a href="inputConfig.php?delete_admin=<?=$row['acc_rand_id']?>" class="btn btn-danger" style="--bs-btn-padding-y: .20rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .70rem;" title="delete" onclick="return confirm('Are you sure to delete this?')"><i class="fa-solid fa-trash"></i></a>
									    		</td>
									    	</tr>
					    				<?php
					    			}
					    		}
					    	?>
					    	
					    </tbody>
					</table>
	            </div>
	        </div>
	    </div>
	</div>
</main>
<?php
include 'includes/footer.php';
?>