<?php
include 'includes/autoload.inc.php';

$view_id = secured($_COOKIE['user_id']);

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


unset($_SESSION['page_title']);
$_SESSION['page_title'] ="View User";

include 'includes/header.php';

?>
<main>
	<div class="container">
		<h1 class="mt-4">Profile Account</h1>
		<div class="row">
        	<div class="col-xl-4 col-lg-4 col-12 pb-xl-0 pb-lg-0 pb-4">
        		<div class="text-center py-2">
        			<img src="../uploads/<?=$acc_profile;?>" id="output" width="250" height="250">
        		</div>
        		<div id="change_prof" class="d-none">
        			<form action="inputConfig.php" method="POST" enctype="multipart/form-data">
        				<input type="hidden" name="function" value="change_profile">
        				<div class="mb-3">
						  <input class="form-control" type="file" name="change_img" accept=".png, .jpg, .jpeg, .svg">
						</div>
						<button type="submit" class="btn btn-primary form-control" name="change_profile">Save Changes</button>
        			</form>
        		</div>
        		<button class="btn btn-primary form-control" id="change_prof_btn">Change Profile</button>
        	</div>
        	<div class="col-xl-8 col-lg-8 col-12">
				<form action="inputConfig.php" method="POST" enctype="multipart/form-data">
			        <div class="card mb-4 shadow">
			            <div class="card-header">
			              Profile Information
			            </div>
			            <div class="card-body">
			            	<small>ID NO: <?=$view_id?></small>
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
		                                <select class="form-select" id="selectMartialStatus" name="acc_martial_status" disabled required>
                                			<option value="" selected disabled><?=$acc_martial_status?></option>
		                                </select>
		                                <label for="selectMartialStatus">Martial Status</label>
		                            </div>
		                        </div>
		                        <div class="col-md-6">
		                            <div class="form-floating mb-3">
		                                <input type="text" name="acc_religion" class="form-control" id="inputReligion" placeholder="Enter your religion" value="<?=$acc_religion?>" disabled required />
		                                <label for="inputReligion">Religion</label>
		                            </div>
		                        </div>
		                    </div>
		                    <i class="fs-6"><u>Residence Address</u></i>
		                    <div class="row mb-3 pt-2">
		                    	<div class="col-md-6">
		                        	<div class="form-floating mb-3 mb-md-0">
		                                <input class="form-control" id="inputStreet" name="acc_complete_add" type="text" placeholder="Enter your first name" value="<?=$acc_complete_add?>" disabled required />
		                                <label for="inputStreet">House No. / Purok / Street</label>
		                            </div>
		                        </div>
		                        <div class="col-md-6">
		                            <div class="form-floating mb-3 mb-md-0">
		                                <select class="form-select" id="selectBrgy" name="acc_brgy" disabled required />
                                			<option value="" selected disabled><?=$acc_brgy?></option>
		                                </select>
		                                <label for="selectBrgy">Barangay</label>
		                            </div>
		                        </div>
		                    </div>
		                    <i class="fs-6"><u>Educational Attainment</u></i>
		                    <div class="form-floating mb-3 pt-2">
		                        <select class="form-select" id="selectEducationHighest" name="acc_education_highest" disabled required>
                        			<option value="" selected disabled><?=$acc_education_highest?></option>
		                        </select>
		                        <label for="selectEducationHighest">Education (highest degree completed)</label>
		                    </div>
		                    <div class="form-floating mb-3">
		                        <input class="form-control" id="inputEducation" type="text" name="acc_education" placeholder="Enter Highest Educational Attainment"  value="<?=$acc_education_highest?>" disabled equired />
		                        <label for="inputEducation">What is the name of latest school that you have completed?</label>
		                    </div>

		                    <i class="fs-6"><u>Occupation</u></i>
		                    <div class="row  mb-3 pt-2">
		                        <div class="col-md-6">
		                            <div class="form-floating mb-3">
		                                <select class="form-select" id="acc_eco_status" name="acc_eco_status" disabled required>
                                				<option value="" selected disabled><?=$acc_eco_status?></option>
				                        </select>
				                        <label for="acc_eco_status">Economics Status</label>
		                            </div>
		                        </div>
		                         
		                        <div class="col-md-6">
		                            <div class="form-floating mb-3">
		                                <input type="text" name="acc_eco_status_others" class="form-control" id="inputOccupation" placeholder="Enter your occputation" value="<?=$acc_eco_status_others?>" disabled required/>
		                                <label for="inputOccupation"><small>If you not select others answer "N/A"</small></label>
		                            </div>
		                        </div>
		                    </div>

		                    <i class="fs-6"><u>Contact Details</u></i>
		                    <div class="row  mb-3 pt-2">
		                        <div class="col-md-6">
		                            <div class="form-floating mb-3">
		                                <input type="text" name="acc_contact" class="form-control" id="inputContact" placeholder="Enter your contact number" value="<?=$acc_contact?>" disabled required />
		                                <label for="inputContact">Contact Number</label>
		                            </div>
		                        </div>
		                        <div class="col-md-6">
		                        	<div class="form-floating mb-3">
				                        <input class="form-control" name="acc_email" id="inputEmail" type="email" placeholder="name@example.com" value="<?=$acc_email?>" disabled required />
				                        <label for="inputEmail">Email address</label>
				                    </div>
		                        </div>
		                    </div>
		                    
		                    <div class="mt-4 mb-0">
		                        <div class="d-grid">
            						<button href="<?=$_SERVER['HTTP_REFERER']?>" type="submit" class="btn btn-success btn-block"  name="create_admin">Change</button>
		                        </div>
		                    </div>
			    		</div>
			    	</div>
				</form>
        	</div>
		</div>
    </div>
</main>
<script type="text/javascript">
	$(document).on('click','#change_prof_btn',function(){
		$("#change_prof_btn").addClass("d-none");
		$("#change_prof").removeClass("d-none");
	});
</script>
<?php
include 'includes/footer.php';
?>
