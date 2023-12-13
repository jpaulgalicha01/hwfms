<?php

class insert extends controller{
	
	public function addOrg($org_name,$org_date,$org_brgy){
		$stmt = $this->add_org($org_name,$org_date,$org_brgy);

		if(!$stmt){
			echo "There's something wrong. Please try again";
			ob_end_flush(header("Location: ".$_SERVER['HTTP_REFERER'].""));
		}

		if($stmt !== 1){
			$_SESSION['message'] = $stmt;
			$_SESSION['message_color'] = "danger";
			ob_end_flush(header("Location: ".$_SERVER['HTTP_REFERER'].""));

		}
		else{
			$_SESSION['message'] = "Successfully insert data.";
			$_SESSION['message_color'] = "success";
			ob_end_flush(header("Location: list-organization.php"));

		}
	}

	public function createAdmin($acc_profile, $acc_lname, $acc_fname, $acc_mname, $acc_birth, $acc_birth_place, $acc_complete_add, $acc_brgy, $acc_martial_status, $acc_education,$acc_education_highest, $acc_eco_status, $acc_eco_status_others, $acc_contact, $acc_religion, $acc_email, $acc_uname){
		$stmt = $this->create_admin($acc_profile, $acc_lname, $acc_fname, $acc_mname, $acc_birth, $acc_birth_place, $acc_complete_add, $acc_brgy, $acc_martial_status, $acc_education,$acc_education_highest, $acc_eco_status, $acc_eco_status_others, $acc_contact, $acc_religion, $acc_email, $acc_uname);

		if(!$stmt){
			echo "There's something wrong. Please try again";
			ob_end_flush(header("Location: ".$_SERVER['HTTP_REFERER'].""));
		}

		if($stmt !== 1){
			$_SESSION['message'] = $stmt;
			$_SESSION['message_color'] = "danger";
			ob_end_flush(header("Location: ".$_SERVER['HTTP_REFERER'].""));

		}
		else{
			$_SESSION['message'] = "Successfully insert data.";
			$_SESSION['message_color'] = "success";
			ob_end_flush(header("Location: admin-list.php"));

		}
	}

	public function insertAnnouncemnt($What,$When,$Who,$Where,$type_announce){
		$stmt = $this->insert_announcemnt($What,$When,$Who,$Where,$type_announce);

		if(!$stmt){
			echo "There's something wrong. Please try again";
			ob_end_flush(header("Location: ".$_SERVER['HTTP_REFERER'].""));
		}

		if($stmt !== 1){
			$_SESSION['message'] = $stmt;
			$_SESSION['message_color'] = "danger";
			ob_end_flush(header("Location: ".$_SERVER['HTTP_REFERER'].""));

		}
		else{
			$_SESSION['message'] = "Successfully insert data.";
			$_SESSION['message_color'] = "success";
			switch ($type_announce) {
				case 'Livelihood Program':
					ob_end_flush(header("Location: list-livelihood-program.php"));
					break;
				
				default:
					ob_end_flush(header("Location: list-job-offers.php"));
					break;
			}
		}
	}
}