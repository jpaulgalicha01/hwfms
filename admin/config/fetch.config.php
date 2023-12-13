<?php

class fetch extends controller{
	public function fetchUser(){
		$stmt = $this->fetch_user();
		return $stmt;
	}

	public function fetchUserList($user_status, $martial_status, $eco_status){
		$stmt = $this->fetch_user_list($user_status, $martial_status, $eco_status);
		return $stmt;
	}

	public function fetchUserAcc($view_id){
		$stmt = $this->fetch_user_acc($view_id);
		return $stmt;
	}

	public function countUser(){
		$stmt = $this->count_user();
		return $stmt;
	}

	public function fetchAnnouncement(){
		$stmt = $this->fetch_announcement();
		return $stmt;
	}

}