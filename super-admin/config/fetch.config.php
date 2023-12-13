<?php

class fetch extends controller{
	public function fetchUser(){
		$stmt = $this->fetch_user();
		return $stmt;
	}

	public function fetchBrgy(){
		$stmt = $this->fetch_brgy();
		return $stmt;
	}

	public function fetchBrgyAdmin(){
		$stmt = $this->fetch_brgy_admin();
		return $stmt;
	}

	public function fetchUserAcc($view_id){
		$stmt = $this->fetch_user_acc($view_id);
		return $stmt;
	}

	public function fetchMemberCount($brgy_name){
		$stmt = $this->fetch_member_ount($brgy_name);

		if($stmt->rowCount()<0){
			echo 0;
		}
		echo $stmt->rowCount(); 
	}

	public function fetchAssocMem($brgy,$martial_status,$eco_status){
		$stmt = $this->fetch_assoc_mem($brgy,$martial_status,$eco_status);
		return $stmt;
	}

	public function countAdminAcc(){
		$stmt = $this->count_admin_acc();
		return $stmt;
	}

	public function countUserAcc(){
		$stmt = $this->count_user_acc();
		return $stmt;
	}

	public function fetchAnnouncement($type){
		$stmt = $this->fetch_announcement($type);
		return $stmt;
	}

	public function countAnnounceLivelihood(){
		$stmt = $this->count_announce_livelihood();
		return $stmt;
	}
	public function countAnnounceJob(){
		$stmt = $this->count_announce_job();
		return $stmt;
	}

}