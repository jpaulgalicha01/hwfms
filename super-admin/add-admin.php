<?php
include 'includes/autoload.inc.php';

$acc_type ="";
$acc_profile="";
$acc_lname="";
$acc_fname="";
$acc_mname="";
$acc_birth="";
$acc_birth_place="";
$acc_complete_add="";
$acc_brgy="";
$acc_martial_status="";
$acc_education="";
$acc_education_highest="";
$acc_eco_status="";
$acc_eco_status_others = "";
$acc_contact="";
$acc_religion="";
$acc_email="";
$acc_uname="";


if(isset($_GET['view_id'])){
	$view_id = secured($_GET['view_id']);

	$fetch_user = new fetch();
	$res_fetch_user = $fetch_user->fetchUserAcc($view_id);

	if($res_fetch_user->rowCount()==1){
		$fetch_user = $res_fetch_user->fetch();
		$acc_type = $fetch_user['acc_type'];

		$acc_profile= $fetch_user['acc_profile'];
		$acc_lname= $fetch_user['acc_lname'];
		$acc_fname= $fetch_user['acc_fname'];
		$acc_mname= $fetch_user['acc_mname'];
		$acc_birth= $fetch_user['acc_birth'];
		$acc_birth_place= $fetch_user['acc_birth_place'];
		$acc_complete_add= $fetch_user['acc_complete_add'];
		$acc_brgy= $fetch_user['acc_brgy'];
		$acc_martial_status= $fetch_user['acc_martial_status'];
		$acc_education= $fetch_user['acc_education'];
		$acc_education_highest= $fetch_user['acc_education_highest'];
		$acc_eco_status= $fetch_user['acc_eco_status'];
		$acc_eco_status_others= $fetch_user['acc_eco_status_other'];
		$acc_contact= $fetch_user['acc_contact'];
		$acc_religion= $fetch_user['acc_religion'];
		$acc_email= $fetch_user['acc_email'];
		$acc_uname= $fetch_user['acc_uname'];

	}else{
		ob_end_flush(header("Location: index.php"));
	}
}

unset($_SESSION['page_title']);
if($acc_type=="admin"){
	$_SESSION['page_title'] ="View Administrator";
}elseif($acc_type=="user"){
	$_SESSION['page_title'] ="View User";
}else{
	$_SESSION['page_title'] = "Add Barangay Administrator";
}

include 'includes/header.php';


?>
<main>
	<div class="container-fluid px-4">
		<h1 class="mt-4"><?php if($acc_type=="admin"){echo"View Administrator";}elseif($acc_type=="user"){echo"View User";}else{echo"Add Barangay Administrator";}?></h1>
    	<br>
		<form action="inputConfig.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="function" value="create_admin">
			<div class="row">
	        	<div class="col-xl-4 col-lg-4 col-12 pb-xl-0 pb-lg-0 pb-4">
	        		<div class="text-center py-2">
	        			<img src="../uploads/<?php if(empty($acc_profile)){echo"default-profile.png";}echo $acc_profile;?>" id="output" width="250" height="250">
	        		</div>
	        		<?php
	        			if(!isset($_GET['view_id'])){
	        				?>
	        					<div class="pt-2">
				                	<input name="acc_profile" type="file" class="form-control" accept=".png, .jpg, .jpeg" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" >
				        		</div>
	        				<?php
	        			}
	        		?>
	        		
	        	</div>
	        	<div class="col-xl-8 col-lg-8 col-12">
			        <div class="card mb-4 shadow">
			            <div class="card-header">
			              <?php if($acc_type=="admin"){echo"View Administrator";}elseif($acc_type=="user"){echo"View User";}else{echo"Add Barangay Administrator";}?>
			            </div>
			            <div class="card-body">
		                    <h5>Personal Information <span class="text-danger">*</span></h5>
		                    <div class="row mb-3">
		                        <div class="col-md-4">
		                            <div class="form-floating mb-3 mb-md-0">
		                                <input class="form-control" id="inputFirstName" name="acc_lname" type="text" placeholder="Enter your first name" value="<?=$acc_lname?>" <?php if(!empty($acc_lname)){echo"disabled";}?> required />
		                                <label for="inputFirstName">Last name</label>
		                            </div>
		                        </div>
		                        <div class="col-md-4">
		                            <div class="form-floating mb-3 mb-md-0">
		                                <input class="form-control" id="inputFirstName" name="acc_fname" type="text" placeholder="Enter your first name" value="<?=$acc_fname?>" <?php if(!empty($acc_fname)){echo"disabled";}?> required />
		                                <label for="inputFirstName">First name</label>
		                            </div>
		                        </div>
		                        <div class="col-md-4">
		                            <div class="form-floating mb-3 mb-md-0">
		                                <input class="form-control" id="inputLastName" name="acc_mname" type="text" placeholder="Enter your last name" value="<?=$acc_mname?>" <?php if(!empty($acc_mname)){echo"disabled";}?> required />
		                                <label for="inputLastName">Middle name</label>
		                            </div>
		                        </div>
		                    </div>                            
		                    <div class="row mb-3">
		                        <div class="col-md-4">
		                            <div class="form-floating mb-3 mb-md-0">
		                                <input class="form-control" id="inputBirthDate" name="acc_birth" type="date" placeholder="Enter your Birthdate" value="<?=$acc_birth?>" <?php if(!empty($acc_birth)){echo"disabled";}?> required />
		                                <label for="inputBirthDate">Birthdate</label>
		                            </div>
		                        </div>
		                        <div class="col-md-8">
		                            <div class="form-floating mb-3 mb-md-0">
		                                <input class="form-control" id="inputBirthplace" name="acc_birth_place" type="text" placeholder="Enter your birth place" value="<?=$acc_birth_place?>" <?php if(!empty($acc_birth_place)){echo"disabled";}?> required />
		                                <label for="inputBirthplace">Birth Place</label>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="row mb-3">
		                        <div class="col-md-6">
		                            <div class="form-floating mb-3">
		                                <select class="form-select" id="selectMartialStatus" name="acc_martial_status"  <?php if(!empty($acc_martial_status)){echo"disabled";}?>  required>
		                                    <?php if(!empty($acc_martial_status)){
		                                		?>
		                                			<option value="" selected disabled><?=$acc_martial_status?></option>
		                                		<?php
		                                	}else{
		                                		?>
		                                			<option value="" selected disabled>---Please Select---</option>
		                                		<?php
		                                	}?>
		                                    <option>Single</option>
		                                    <option>Married</option>
		                                    <option>Divorce</option>
		                                    <option>Widowed</option>
		                                </select>
		                                <label for="selectMartialStatus">Martial Status</label>
		                            </div>
		                        </div>
		                        <div class="col-md-6">
		                            <div class="form-floating mb-3">
		                                <input type="text" name="acc_religion" class="form-control" id="inputReligion" placeholder="Enter your religion" value="<?=$acc_religion?>" <?php if(!empty($acc_religion)){echo"disabled";}?> required />
		                                <label for="inputReligion">Religion</label>
		                            </div>
		                        </div>
		                    </div>
		                    <i class="fs-6"><u>Residence Address</u></i>
		                    <div class="row mb-3 pt-2">
		                    	<div class="col-md-6">
		                        	<div class="form-floating mb-3 mb-md-0">
		                                <input class="form-control" id="inputStreet" name="acc_complete_add" type="text" placeholder="Enter your first name" value="<?=$acc_complete_add?>" <?php if(!empty($acc_complete_add)){echo"disabled";}?> required />
		                                <label for="inputStreet">House No. / Purok / Street</label>
		                            </div>
		                        </div>
		                        <div class="col-md-6">
		                            <div class="form-floating mb-3 mb-md-0">
		                                <select class="form-select" id="selectBrgy" name="acc_brgy" <?php if(!empty($acc_brgy)){echo"disabled";}?> required />
		                                	<?php if(!empty($acc_brgy)){
		                                		?>
		                                			<option value="" selected disabled><?=$acc_brgy?></option>
		                                		<?php
		                                	}else{
		                                		?>
		                                			<option value="" selected disabled>---Please Select---</option>
		                                		<?php
		                                	}?>
		                                    
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
		                                <label for="selectBrgy">Barangay</label>
		                            </div>
		                        </div>
		                    </div>
		                    <i class="fs-6"><u>Educational Attainment</u></i>
		                    <div class="form-floating mb-3 pt-2">
		                        <select class="form-select" id="selectEducationHighest" name="acc_education_highest" <?php if(!empty($acc_education_highest)){echo"disabled";}?> required>
		                            <?php if(!empty($acc_education_highest)){
		                                		?>
		                                			<option value="" selected disabled><?=$acc_education_highest?></option>
		                                		<?php
		                                	}else{
		                                		?>
		                                			<option value="" selected disabled>---Please Select---</option>
		                                		<?php
		                                	}?>
		                           <option>12th Grade or less</option>
		                           <option>Graduate high school or equivalent</option>
		                           <option>Some college, no degree</option>
		                           <option>Associate degree</option>
		                           <option>Bachelor's degree</option>
		                           <option>Post-graduate degree</option>
		                        </select>
		                        <label for="selectEducationHighest">Education (highest degree completed)</label>
		                    </div>
		                    <div class="form-floating mb-3">
		                        <input class="form-control" id="inputEducation" type="text" name="acc_education" placeholder="Enter Highest Educational Attainment"  value="<?=$acc_education_highest?>" <?php if(!empty($acc_education_highest)){echo"disabled";}?> required />
		                        <label for="inputEducation">What is the name of latest school that you have completed?</label>
		                    </div>

		                    <i class="fs-6"><u>Occupation</u></i>
		                    <div class="row  mb-3 pt-2">
		                        <div class="col-md-6">
		                            <div class="form-floating mb-3">
		                                <select class="form-select" id="acc_eco_status" name="acc_eco_status" <?php if(!empty($acc_eco_status)){echo"disabled";}?> required>
		                                	<?php if(!empty($acc_eco_status)){
		                                		?>
		                                			<option value="" selected disabled><?=$acc_eco_status?></option>
		                                		<?php
		                                	}else{
		                                		?>
		                                			<option value="" selected disabled>---Please Select---</option>
		                                		<?php }?>
				                           <option>Employed</option>
				                           <option>Unemployed</option>
				                           <option>Others</option>
				                        </select>
				                        <label for="acc_eco_status">Economics Status</label>
		                            </div>
		                        </div>
		                         
		                        <div class="col-md-6">
		                            <div class="form-floating mb-3">
		                                <input type="text" name="acc_eco_status_others" class="form-control" id="inputOccupation" placeholder="Enter your occputation" value="<?=$acc_eco_status_others?>" <?php if(!empty($acc_eco_status_others)){echo"disabled";}?> required/>
		                                <label for="inputOccupation"><small>If you not select others answer "N/A"</small></label>
		                            </div>
		                        </div>
		                    </div>

		                    <i class="fs-6"><u>Contact Details</u></i>
		                    <div class="row  mb-3 pt-2">
		                        <div class="col-md-6">
		                            <div class="form-floating mb-3">
		                                <input type="text" name="acc_contact" class="form-control" id="inputContact" placeholder="Enter your contact number" value="<?=$acc_contact?>" <?php if(!empty($acc_contact)){echo"disabled";}?> required />
		                                <label for="inputContact">Contact Number</label>
		                            </div>
		                        </div>
		                        <div class="col-md-6">
		                        	<div class="form-floating mb-3">
				                        <input class="form-control" name="acc_email" id="inputEmail" type="email" placeholder="name@example.com" value="<?=$acc_email?>" <?php if(!empty($acc_email)){echo"disabled";}?> required />
				                        <label for="inputEmail">Email address</label>
				                    </div>
		                        </div>
		                    </div>
		                    
		                    <?php
                        		if(!isset($_GET['view_id'])){
                        			?>
                        				<h5 class="pt-4">Login Creadentials <span class="text-danger">*</span></h5>
					                    <div class="form-floating mb-3">
					                        <input class="form-control" name="acc_uname" id="inputUsername" type="text" placeholder="username" required />
					                        <label for="inputUsername">Username</label>
					                    </div>
                        			<?php
                        		}
                        	?>
		                    <div class="mt-4 mb-0">
		                        <div class="d-grid">
		                        	<?php
		                        		if(!isset($_GET['view_id'])){
		                        			?>
		                        				<button type="submit" class="btn btn-primary btn-block"  name="create_admin">Create Admin</button>
		                        			<?php
		                        		}else{
		                        			?>
		                        				<a href="<?=$_SERVER['HTTP_REFERER']?>" type="submit" class="btn btn-success btn-block"  name="create_admin">Back</a>
		                        			<?php
		                        		}
		                        		
		                        	?>
		                        	
		                        </div>
		                    </div>
			    		</div>
			    	</div>
	        	</div>
			</div>
    	</form>
    </div>
</main>
<?php
include 'includes/footer.php';
?>
