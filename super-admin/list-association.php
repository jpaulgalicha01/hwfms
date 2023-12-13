<?php
    include 'includes/autoload.inc.php';

    unset($_SESSION['page_title']);
    $_SESSION['page_title'] = "List Of Organization"; 

    include 'includes/header.php';
?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Womens Association List</h1>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Baranagay list
        </div>
        <div class="card-body">
    		
            <div id="result" class="table-responsive">
    			<table id="table" class="table table-striped">
				    <thead>
				        <tr>
				            <th><small>Barangay</small></th>
				            <th><small>Total Member</small></th>
				            <th class="text-center">Action</th>
				        </tr>
				    </thead>
				    <tbody>
				    	<?php
                            $fetch_brgy = new fetch();
                            $res_fetch_brgy = $fetch_brgy->fetchBrgy();
                            
                            if($res_fetch_brgy->rowCount()){
                                while ($fetch_res = $res_fetch_brgy->fetch()) {
                                	$brgy_name = $fetch_res['brgy_name'];
                                    ?>
                                        <tr>
								    		<td><?= $brgy_name?></td>
								    		<td>
								    			<?php
								    				$fetch_member_count = new fetch();
								    				$fetch_member_count->fetchMemberCount($brgy_name);
								    			?>
								    		</td>
								    		<td class="text-center">
								    			<a href="list-association-brgy.php?brgy=<?=$brgy_name?>" class="btn btn-success" style="--bs-btn-padding-y: .20rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .70rem;" title="view"><i class="fa-solid fa-eye"></i></a>
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

<?php
include 'includes/footer.php';
?>