<?php 

class controller extends db{

	protected function fecth_job_offers(){
		$stmt = $this->connect()->query("SELECT * FROM `tbl_announcement` WHERE `announce_brgy`='City' AND `announce_type`='Job Offers' ");
		return $stmt;
	}

	protected function fecth_livelihood_program(){
		$stmt = $this->connect()->query("SELECT * FROM `tbl_announcement` WHERE `announce_brgy`='City' AND `announce_type`='Livelihood Program' ");
		return $stmt;
	}

	protected function fecth_barangay(){
		// Fetch info user
		$fetch_info_user = $this->connect()->prepare("SELECT *FROM `tbl_accounts` WHERE `acc_rand_id`=? ");
		$fetch_info_user->execute([$_COOKIE['user_id']]);

		if($fetch_info_user->rowCount()==1){
			$fetch_info = $fetch_info_user->fetch();

			$stmt = $this->connect()->query("SELECT * FROM `tbl_announcement` WHERE `announce_brgy`='".$fetch_info['acc_brgy']."' ");
			return $stmt;
		}
	}

	protected function fetch_announce($announce_id){
		// Fetch info user
		$fetch_info_user = $this->connect()->prepare("SELECT *FROM `tbl_accounts` WHERE `acc_rand_id`=? ");
		$fetch_info_user->execute([$_COOKIE['user_id']]);
		if($fetch_info_user->rowCount()==1){
			$fetch_info = $fetch_info_user->fetch();

			$stmt = $this->connect()->prepare("SELECT * FROM `tbl_announcement` WHERE `announce_id`=? AND `announce_brgy`=? OR `announce_id`=? AND `announce_brgy`=? ");
			$stmt->execute([$announce_id,$fetch_info['acc_brgy'],$announce_id,"City"]);

			return $stmt;
		}
	}

	protected function fetch_user_acc($view_id){
		$stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_rand_id`=? ");
		$stmt->execute([$view_id]);
		return $stmt;
	}

	protected function change_profile($change_img){

		$target_dir = "../uploads/";
        $target_file = $target_dir . basename($change_img);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    	// Checking Image File Type
        if($imageFileType !== "png" && $imageFileType !== "jpeg" && $imageFileType !=="jpg" ){
			$status_message = "Please select jpg, jpeg and png image file type";
			return $status_message;
        }

        // Update Image
        $update_profile = $this->connect()->prepare("UPDATE `tbl_accounts` SET `acc_profile`=? WHERE `acc_rand_id`=? ");
        $update_profile->execute([$change_img,$_COOKIE['user_id']]);
        
        move_uploaded_file($_FILES["change_img"]["tmp_name"], $target_file);
        return 1;
	}
}