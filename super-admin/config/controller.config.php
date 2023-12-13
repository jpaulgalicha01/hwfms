<?php

class controller extends db{

	protected function fetch_user(){
		$stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_rand_id`=? ");
		$stmt->execute([$_COOKIE['user_id']]);
		return $stmt;
	}

	protected function fetch_brgy(){
		$stmt = $this->connect()->query("SELECT * FROM `tbl_brgy` ");
		return $stmt;
	}

	protected function create_admin($acc_profile, $acc_lname, $acc_fname, $acc_mname, $acc_birth, $acc_birth_place, $acc_complete_add, $acc_brgy, $acc_martial_status, $acc_education,$acc_education_highest, $acc_eco_status, $acc_eco_status_others, $acc_contact, $acc_religion, $acc_email, $acc_uname){

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

        // Checking if have admin in barangay
        $checking_brgy_exist = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_brgy`=? AND `acc_type`=? ");
        $checking_brgy_exist->execute([$acc_brgy,"admin"]);

        if($checking_brgy_exist->rowCount()>=1){
        	$status_message = "Only 1 admin each Barangay";
			return $status_message;
        }

		// Checking picture type
		$target_dir = "../uploads/";
        $target_file = $target_dir . basename($acc_profile);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Default Profile Image
        if($acc_profile < 0){
        	$acc_profile = "default-profile.png";
        }
        else{
        	// Checking Image File Type
	        if($imageFileType !== "png" && $imageFileType !== "jpeg" && $imageFileType !=="jpg" ){
				$status_message = "Please select jpg, jpeg and png image file type";
				return $status_message;
	        }
        }

        // Insert Data
        $insert_acc = $this->connect()->prepare("INSERT INTO `tbl_accounts`(`acc_rand_id`, `acc_lname`, `acc_fname`, `acc_mname`, `acc_birth`, `acc_birth_place`, `acc_complete_add`, `acc_brgy`, `acc_martial_status`, `acc_education`, `acc_education_highest`, `acc_eco_status`, `acc_eco_status_other`, `acc_contact`, `acc_religion`, `acc_email`, `acc_profile`, `acc_uname`, `acc_password`,`acc_status`,`acc_checking_pass`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $insert_acc->execute([rand(),$acc_lname,$acc_fname,$acc_mname,$acc_birth,$acc_birth_place,$acc_complete_add,$acc_brgy,$acc_martial_status,$acc_education,$acc_education_highest,$acc_eco_status,$acc_eco_status_others,$acc_contact,$acc_religion,$acc_email,$acc_profile,$acc_uname,md5($acc_uname),"admin","not change"]);

        move_uploaded_file($_FILES["acc_profile"]["tmp_name"], $target_file);
        return 1;
	}

	protected function fetch_brgy_admin(){
		$stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_type`=? ");
		$stmt->execute(["admin"]);
		return $stmt;
	}

	protected function fetch_user_acc($view_id){
		$stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_rand_id`=? ");
		$stmt->execute([$view_id]);
		return $stmt;
	}

	protected function delete_admin($admin_id){
		$stmt = $this->connect()->prepare("DELETE FROM `tbl_accounts` WHERE `acc_rand_id`=? ");
		$stmt->execute([$admin_id]);
		return $stmt;
	}

	protected function fetch_member_ount($brgy_name){
		$stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_brgy`=? AND `acc_type`=? AND `acc_status`=? ");
		$stmt->execute([$brgy_name,"user","Accept"]);
		return $stmt;
	}

	protected function fetch_assoc_mem($brgy,$martial_status,$eco_status){
		if($brgy !== "All" && $eco_status !== "All"){
			$stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_brgy`=? AND `acc_martial_status`=? AND `acc_eco_status`=? AND `acc_type`=? AND `acc_status`=? ");
			$stmt->execute([$brgy, $martial_status, $eco_status,"user",'Accept']);
			return $stmt;
		}elseif($brgy !== "All" && $eco_status == "All"){
			$stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_brgy`=? AND `acc_martial_status`=? AND `acc_type`=? AND `acc_status`=? ");
			$stmt->execute([$brgy, $martial_status,"user",'Accept']);
			return $stmt;
		}elseif($brgy == "All" && $eco_status !== "All"){
			$stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_martial_status`=? AND `acc_eco_status`=? AND `acc_type`=? AND `acc_status`=? ");
			$stmt->execute([$martial_status,$eco_status,"user",'Accept']);
			return $stmt;
		}
		$stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_martial_status`=? AND `acc_type`=? AND `acc_status`=? ");
		$stmt->execute([$martial_status,"user",'Accept']);
		return $stmt;
	}

	protected function count_admin_acc(){
		$stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_type`=? AND `acc_status`=? ");
		$stmt->execute(["admin","Accept"]);
		return $stmt;
	}

	protected function count_user_acc(){
		$stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_type`=? AND `acc_status`=? ");
		$stmt->execute(["user","Accept"]);
		return $stmt;
	}

	protected function insert_announcemnt($What,$When,$Who,$Where,$type_announce){
		// Checking if Already Exist
		$check_announce = $this->connect()->prepare("SELECT * FROM `tbl_announcement` WHERE `announce_what`=? AND `announce_when`=? AND `announce_who`=? AND `announce_where`=?	AND `announce_brgy`=? AND `announce_type`=? ");
		$check_announce->execute([$What,$When,$Who,$Where,"City",$type_announce]);

		if($check_announce->rowCount()>=1){
			return $message = "Already Exist Data";
		}

		// Insert Data
		$insert = $this->connect()->prepare("INSERT INTO `tbl_announcement`(`announce_what`, `announce_when`, `announce_who`, `announce_where`, `announce_brgy`, `announce_type`) VALUES (?,?,?,?,?,?) ");
		$insert->execute([$What,$When,$Who,$Where,"City",$type_announce]);

		return 1;
	}

	protected function fetch_announcement($type){
		$fetch_announce = $this->connect()->prepare("SELECT * FROM `tbl_announcement` WHERE `announce_brgy`=? AND `announce_type`=? ");
		$fetch_announce->execute(["City",$type]);
		return $fetch_announce;
	}

	protected function count_announce_livelihood(){
		$stmt = $this->connect()->prepare("SELECT * FROM `tbl_announcement` WHERE `announce_brgy`=? AND `announce_type`=? ");
		$stmt->execute(["City","Livelihood Program"]);
		return $stmt;
	}

	protected function count_announce_job(){
		$stmt = $this->connect()->prepare("SELECT * FROM `tbl_announcement` WHERE `announce_brgy`=? AND `announce_type`=? ");
		$stmt->execute(["City","Job Offers"]);
		return $stmt;
	}

	protected function delete_announcement($announce_id){

		$delete_announcement = $this->connect()->prepare("DELETE FROM `tbl_announcement` WHERE `announce_id`=? AND `announce_brgy`=? ");
		$delete_announcement->execute([$announce_id,"City"]);

		return 1;
		
	}

}