<?php

class controller extends db{

	protected function fetch_brgy(){
		$stmt = $this->connect()->query("SELECT * FROM `tbl_brgy` ");
		return $stmt;
	}

	protected function acc_login($acc_uname,$acc_pass){
		$stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_uname`=? AND `acc_password`=? ");
		$stmt->execute([$acc_uname, md5($acc_pass)]);
		return $stmt;
	}

	protected function fetch_org($brgy_list){
		$stmt = $this->connect()->prepare("SELECT * FROM `tbl_organization` WHERE `org_brgy`=? AND `org_status`=? OR `org_brgy`=? AND `org_status`=? ");
		$stmt ->execute([$brgy_list,"Accept","All","Accept"]);
		return $stmt;
	}

	protected function create_admin($acc_profile, $acc_lname, $acc_fname, $acc_mname, $acc_birth, $acc_birth_place, $acc_complete_add, $acc_brgy, $acc_martial_status, $acc_education,$acc_education_highest, $acc_eco_status, $acc_eco_status_others, $acc_contact, $acc_religion, $acc_email, $acc_uname,$acc_pass){

		// checking email if exist
		$checking_email = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_email`=? ");
		$checking_email->execute([$acc_email]);

		if($checking_email->rowCount()>=1){
			$status_message = "Email is already added.";
			return $status_message;
		}

		// checking username if exist
		$checking_uname = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_uname`=? ");
		$checking_uname->execute([$acc_uname]);

		if($checking_uname->rowCount()>=1){
			$status_message = "Username is already added.";
			return $status_message;
		}

		// Checking picture type
		$target_dir = "uploads/";
        $target_file = $target_dir . basename($acc_profile);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    	// Checking Image File Type
        if($imageFileType !== "png" && $imageFileType !== "jpeg" && $imageFileType !=="jpg" ){
			$status_message = "Please select jpg, jpeg and png image file type";
			return $status_message;
        }

        // Insert Data
        $insert_acc = $this->connect()->prepare("INSERT INTO `tbl_accounts`(`acc_rand_id`, `acc_lname`, `acc_fname`, `acc_mname`, `acc_birth`, `acc_birth_place`, `acc_complete_add`, `acc_brgy`, `acc_martial_status`, `acc_education`, `acc_education_highest`, `acc_eco_status`, `acc_eco_status_other`, `acc_contact`, `acc_religion`, `acc_email`, `acc_profile`, `acc_uname`, `acc_password`,`acc_type`,`acc_status`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $insert_acc->execute([rand(),$acc_lname,$acc_fname,$acc_mname,$acc_birth,$acc_birth_place,$acc_complete_add,$acc_brgy,$acc_martial_status,$acc_education,$acc_education_highest,$acc_eco_status,$acc_eco_status_others,$acc_contact,$acc_religion,$acc_email,$acc_profile,$acc_uname,md5($acc_uname),"user","Pending"]);

        move_uploaded_file($_FILES["acc_profile"]["tmp_name"], $target_file);
        return 1;
	}
}