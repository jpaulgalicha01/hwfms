<?php
include 'includes/autoload.inc.php';

if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "GET" ){
	if(isset($_POST['create_admin']) && secured($_POST['function']) == "create_admin"){
		$acc_profile = $_FILES['acc_profile']['name'];
		$acc_lname = secured($_POST['acc_lname']);
		$acc_fname = secured($_POST['acc_fname']);
		$acc_mname = secured($_POST['acc_mname']);
		$acc_birth = secured($_POST['acc_birth']);
		$acc_birth_place = secured($_POST['acc_birth_place']);
		$acc_complete_add = secured($_POST['acc_complete_add']);
		$acc_brgy = secured($_POST['acc_brgy']);
		$acc_martial_status = secured($_POST['acc_martial_status']);
		$acc_education = secured($_POST['acc_education']);
		$acc_education_highest = secured($_POST['acc_education_highest']);
		$acc_eco_status = secured($_POST['acc_eco_status']);
		$acc_eco_status_others = secured($_POST['acc_eco_status_others']);
		$acc_contact = secured($_POST['acc_contact']);
		$acc_religion = secured($_POST['acc_religion']);
		$acc_email = secured($_POST['acc_email']);
		$acc_uname = secured($_POST['acc_uname']);

		$create_admin = new insert();
		$create_admin->createAdmin($acc_profile, $acc_lname, $acc_fname, $acc_mname, $acc_birth, $acc_birth_place, $acc_complete_add, $acc_brgy, $acc_martial_status, $acc_education,$acc_education_highest, $acc_eco_status, $acc_eco_status_others, $acc_contact, $acc_religion, $acc_email, $acc_uname);

	}elseif(isset($_GET['delete_admin'])){
		$admin_id = $_GET['delete_admin'];

		$delete_admin = new delete();
		$delete_admin->deleteAdmin($admin_id);
	}elseif(isset($_POST['function']) && $_POST['function'] == "fetch_active_user"){
		
		$fetch_brgy = new fetch();
        $res_fetch_brgy = $fetch_brgy->fetchBrgy();
        $data = array();

        foreach ($res_fetch_brgy as $brgy_list) {
        	$data [] = array(
        		'brgy_name' => $brgy_list['brgy_name']
        	);
        }
        echo json_encode($data);

	}elseif(isset($_POST['add_announce']) && secured($_POST['function']) == "add_announce" ){
		$What = secured($_POST['inputWhat']);
		$When = secured($_POST['inputWhen']);
		$Who = secured($_POST['inputWho']);
		$Where = secured($_POST['inputWhere']);
		$type_announce = secured($_POST['type_announce']);

		$insert_announcement = new insert();
		$insert_announcement->insertAnnouncemnt($What,$When,$Who,$Where,$type_announce);
	}elseif($_GET['delete_annoncement']){
		$announce_id = secured($_GET['delete_annoncement']);

		$delete_announcement = new delete();
		$delete_announcement->deleteAnnouncement($announce_id);
	}else{
		ob_end_flush(header("Location: index.php"));
	}
}
return false;