<?php
include 'includes/autoload.inc.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
	if(isset($_POST['data1']) && isset($_POST['data2']) && isset($_POST['data3'])){
		$brgy = $_POST['data1'];
		$martial_status = $_POST['data2'];
		$eco_status = $_POST['data3'];
		?>
		<table id="table" class="table table-striped">
		    <thead>
		        <tr>
		            <th><small>No. </small></th>
		            <th><small>Name <small class="fst-italic">(Last Name, First Name, Middle Name)</small> </small></th>
		            <th><small>Age </small></th>
		            <th><small>Date of Birth </small></th>
		            <th><small>Civil Status </small></th>
		            <th><small>Address </small></th>
		            <th><small>Contact Number </small></th>
		            <th><small>Economic Status</small></th>
		            <th class="text-center">Action</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php
		    		$fetch_assoc_mem = new fetch();
		    		$res = $fetch_assoc_mem->fetchAssocMem($brgy,$martial_status,$eco_status);

		    		if($res->rowCount()>0){
		    			$i = 0;
		    			while($row = $res->fetch()){
							$get_age = date_diff(date_create($row['acc_birth']), date_create(date('Y-m-d')));;
	    				?>
	    					<tr>
					    		<td><?= ++$i;?></td>
					    		<td><?= $row['acc_lname'].", ".$row['acc_fname']." ".$row['acc_mname']?></td>
					    		<td><?= $get_age->format('%y')?></td>
					    		<td><?= date('M-d-Y',strtotime($row['acc_birth']))?></td>
					    		<td><?= $row['acc_martial_status']?></td>
					    		<td><?= $row['acc_complete_add'].", ".$row['acc_brgy']?></td>
					    		<td><?= $row['acc_contact']?></td>
					    		<?php
					    			if($row['acc_eco_status'] == "Others"){
					    				?>
					    					<td><?= $row['acc_eco_status']?> (<?= $row['acc_eco_status_other']?>)</td>
					    				<?php
					    			}else{
					    				?>
					    					<td><?= $row['acc_eco_status']?></td>
					    				<?php
					    			}
					    		?>
					    		<td class="text-center">
					    			<a href="add-admin.php?view_id=<?=$row['acc_rand_id']?>" class="btn btn-success" style="--bs-btn-padding-y: .20rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .70rem;" title="view"><i class="fa-solid fa-eye"></i></a>

					    		</td>
					    	</tr>
	    				<?php
		    		}}
		    	?>
		    </tbody>
		</table>
		<?php

	}else{
		ob_end_flush(header("Location: index.php"));
	}
}else{
	return false;
}
?>

<script type="text/javascript">
    $(document).ready( function () {
        $('#table').DataTable();
         responsive: true
    } );
</script>