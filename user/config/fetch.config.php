<?php

class fetch extends controller{

	public function fecthJobOffers(){
		$stmt = $this->fecth_job_offers();
		return $stmt;
	}

	public function fecthLivelihoodProgram(){
		$stmt = $this->fecth_livelihood_program();
		return $stmt;
	}

	public function fecthBarangay(){
		$stmt = $this->fecth_barangay();
		return $stmt;
	}

	public function fetchAnnounce($announce_id){
		$stmt = $this->fetch_announce($announce_id);
		return $stmt;
	}
	
	public function fetchUserAcc($view_id){
		$stmt = $this->fetch_user_acc($view_id);
		return $stmt;
	}
}