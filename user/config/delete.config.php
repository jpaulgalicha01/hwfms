<?php

class delete extends controller{
	public function withdrawalCandi($election_year,$election_status){
		$stmt = $this->withdrawal_candi($election_year,$election_status);
		return $stmt;
	}
}
?>