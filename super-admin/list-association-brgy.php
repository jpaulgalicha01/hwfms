<?php
    include 'includes/autoload.inc.php';

    unset($_SESSION['page_title']);
    $_SESSION['page_title'] = "List Of Organization"; 

    include 'includes/header.php';

    if($_SERVER['REQUEST_METHOD'] == "GET"){
    	if(isset($_GET['brgy'])){
    		?>

    			<div class="container-fluid px-4">
				    <h1 class="mt-4"><?= $_GET['brgy']?> Womens Association</h1>
				    <div class="py-2 row">
				    	<div class="col-md-12 pb-5">
				    		<div class="card">
				    			<div class="card-header">
						            <i class="fas fa-table me-1"></i>
						            List of Officers
						        </div>
						        <div class="card-body">
						        	<div class="row pb-4">
						        		<div class="col-xl-4 col-lg-6 col-md-6 col-12">
						        			<div class="shadow p-3">
							        			<p class="fs-4">President:</p>
							        			<div class="row d-flex align-items-center">
							        				<div class="col-xl-4 col-lg-4 col-md-4 col-6">
							        					<img src="../images/hwfms-logo.png" width="100" height="100" style="border-radius: 50%; fit: ;">
							        				</div>
							        				<div class="col-xl-8 col-lg-8 col-md-8 col-6">
							        					<label>Name </label>
							        					<p>Name Name Nameasdddd</p>
							        				</div>
							        			</div>
							        		</div>
						        		</div>
						        	</div>
						        </div>
				    		</div>
				    	</div>
				    </div>
				    <div class="card mb-4">
				        <div class="card-header">
				            <i class="fas fa-table me-1"></i>
				            Table list
				        </div>
				        <div class="card-body">
				    		<div class="row pb-4" id="product">
					    		<div class="col-md-4 pb-1">
					    			<label for="orgStatus">Martial Status</label>
					    			<select class="form-select" id="martial_status">
						    			<option>Single</option>
						    			<option>Married</option>
						    			<option>Divorced</option>
						    			<option>Widowed</option>
						    		</select>
					    		</div>
					    		<div class="col-md-4 pb-1">
					    			<label for="orgStatus">Economics Status</label>
					    			<select class="form-select" id="eco_status">
						    			<option>All</option>
						    			<option>Employed</option>
						    			<option>Unemployed</option>
						    			<option>Others</option>
						    		</select>
					    		</div>
				    		</div>
				            <div id="result" class="table-responsive">
				            	
				            </div>
				        </div>
				    </div>
				</div>
				<script type="text/javascript">
					$(document).ready(function(){
						
						$('#product').change(function(){
							$('#product option:selected').each(function() {
						        var data1 = "<?= $_GET['brgy']?>";
						        var data2 = document.getElementById('martial_status').value;
						        var data3 = document.getElementById('eco_status').value;


						        $("#result").html("<div class='spinner-border spinner-border-sm' role='status'><span class='visually-hidden'></span></div>Loading...");

						    	$.post('fetchAssoc.php',{data1:data1, data2:data2, data3:data3},function(data,status){
						    		$("#result").html(data)
						        })
						    });
						});
						$('#product').trigger('change');
					});
				</script>
				<?php
				include 'includes/footer.php';
				?>

    		<?php
    	}else{
    		ob_end_flush(header("Location: index.php"));
    	}
    }else{
    	return false;
    }
?>
