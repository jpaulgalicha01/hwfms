<?php

include 'includes/autoload.inc.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
	if(isset($_POST['acc_login']) && secured($_POST['function'])=="acc_login"){
		$acc_uname = secured($_POST['acc_uname']);
		$acc_pass = secured($_POST['acc_pass']);

		$login_acc = new fetch();
		$login_acc->accLogin($acc_uname,$acc_pass);
	}elseif (isset($_POST['create_user']) && secured($_POST['function']) == "create_user") {
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
		$acc_pass = secured($_POST['acc_pass']);

		$create_admin = new insert();
		$create_admin->createAdmin($acc_profile, $acc_lname, $acc_fname, $acc_mname, $acc_birth, $acc_birth_place, $acc_complete_add, $acc_brgy, $acc_martial_status, $acc_education,$acc_education_highest, $acc_eco_status, $acc_eco_status_others, $acc_contact, $acc_religion, $acc_email, $acc_uname,$acc_pass);
	}
	else{
		ob_end_flush(header("Location: index.php"));
	}
}
return false;