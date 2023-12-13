<?php

class controller extends db{

	protected function fetch_user(){
		$stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_rand_id`=? ");
		$stmt->execute([$_COOKIE['user_id']]);
		return $stmt;
	}

	protected function fetch_user_list($user_status, $martial_status, $eco_status){
		$stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_rand_id`=? ");
		$stmt->execute([$_COOKIE['user_id']]);

		if($stmt->rowCount()>0){
			$fetch_user = $stmt->fetch();

			if($user_status=="All" && $eco_status=="All"){
				$user_list = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_brgy`=? AND `acc_martial_status`=? AND `acc_type`=? ");
				$user_list->execute([$fetch_user['acc_brgy'], $martial_status,"user"]);
				return $user_list;
			}
			if($user_status !=="All" && $eco_status=="All"){
				$user_list = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_brgy`=? AND `acc_martial_status`=? AND `acc_type`=? AND `acc_status`=? ");
				$user_list->execute([$fetch_user['acc_brgy'], $martial_status,"user",$user_status]);
				return $user_list;
			}

			if($user_status =="All" && $eco_status !=="All"){
				$user_list = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_brgy`=? AND `acc_martial_status`=? AND `acc_eco_status`=? AND `acc_type`=? ");
				$user_list->execute([$fetch_user['acc_brgy'], $martial_status,$eco_status,"user"]);
				return $user_list;
			}

			$user_list = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_brgy`=? AND `acc_martial_status`=? AND `acc_eco_status`=? AND `acc_type`=? AND`acc_status`=?");
			$user_list->execute([$fetch_user['acc_brgy'], $martial_status,$eco_status,"user",$user_status]);
			return $user_list;

		}
	}

	protected function fetch_user_acc($view_id){
		$stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_rand_id`=? ");
		$stmt->execute([$view_id]);
		return $stmt;
	}

	protected function update_status($user_id,$status_select){
		$stmt = $this->connect()->prepare("UPDATE `tbl_accounts` SET `acc_status`=? WHERE `acc_rand_id`=? ");
		$stmt->execute([$status_select,$user_id]);
		return $stmt;
	}

	protected function count_user(){
		$stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_rand_id`=? ");
		$stmt->execute([$_COOKIE['user_id']]);
		if($stmt->rowCount()>0){
			$fetch = $stmt->fetch();

			$stmt1 = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_brgy`=? AND `acc_type`=? ");
			$stmt1->execute([$fetch['acc_brgy'],'user']);
			return $stmt1;
		}
		
	}

	protected function insert_announcemnt($What,$When,$Who,$Where){
		$stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_rand_id`=? ");
		$stmt->execute([$_COOKIE['user_id']]);
		if($stmt->rowCount()>0){
			$fetch = $stmt->fetch();

			// Checking if Already Exist
			$check_announce = $this->connect()->prepare("SELECT * FROM `tbl_announcement` WHERE `announce_what`=? AND `announce_when`=? AND `announce_who`=? AND `announce_where`=?	AND `announce_brgy`=? ");
			$check_announce->execute([$What,$When,$Who,$Where,$fetch['acc_brgy']]);

			if($check_announce->rowCount()>=1){
				return $message = "Already Exist Data";
			}

			// Insert Data
			$insert = $this->connect()->prepare("INSERT INTO `tbl_announcement`(`announce_what`, `announce_when`, `announce_who`, `announce_where`, `announce_brgy`) VALUES (?,?,?,?,?) ");
			$insert->execute([$What,$When,$Who,$Where,$fetch['acc_brgy']]);

			return 1;

		}
	}

	protected function fetch_announcement(){
		$stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_rand_id`=? ");
		$stmt->execute([$_COOKIE['user_id']]);
		if($stmt->rowCount()>0){
			$fetch = $stmt->fetch();

			$fetch_announce = $this->connect()->prepare("SELECT * FROM `tbl_announcement` WHERE `announce_brgy`=? ");
			$fetch_announce->execute([$fetch['acc_brgy']]);
			return $fetch_announce;
		}
	}

	protected function delete_announcement($announce_id){
		$stmt = $this->connect()->prepare("SELECT * FROM `tbl_accounts` WHERE `acc_rand_id`=? ");
		$stmt->execute([$_COOKIE['user_id']]);
		if($stmt->rowCount()>0){
			$fetch = $stmt->fetch();

			$delete_announcement = $this->connect()->prepare("DELETE FROM `tbl_announcement` WHERE `announce_id`=? AND `announce_brgy`=? ");
			$delete_announcement->execute([$announce_id,$fetch['acc_brgy']]);

			return 1;
		}
	}

}