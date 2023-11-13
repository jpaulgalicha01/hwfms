<?php

class fetch extends controller{

    public function fetchAppointment(){
        $stmt = $this->fetch_appointment();
        return $stmt;
    }

    public function fetchOrgMem(){
        $stmt = $this->fetch_org_mem();
        return $stmt;
    }

    public function fetchImg($name){
        $stmt = $this->fetch_img($name);

        if($stmt){
            $row = $stmt->fetch();
            ?>
                <img src="../../uploads/<?=$row['acc_profile']?>" alt="" width="200" height="200">
            <?php
        }else{
            return false;
        }
    }
    public function checkElectionbrgy(){
        $stmt = $this->check_election_brgy();
        return $stmt;
    }

    public function checkElectionorg(){
        $stmt = $this->check_election_org();
        return $stmt;
    }

    public function checkBrgyElection(){
        $stmt = $this->check_brgy_election();
        return $stmt;
    }

    public function checkBrgyOrganization(){
        $stmt = $this->check_brgy_organization();
        return $stmt;
    }

    public function fecthCandidates($year_election){
        $stmt = $this->fecth_candidates($year_election);
        return $stmt;
    }

    public function checkingElection($year_election,$user_id){
        $stmt = $this->checking_election($year_election,$user_id);
        return $stmt;
    }

    public function checkingElectionOrg($year_election,$user_id){
        $stmt = $this->checking_election_org($year_election,$user_id);
        return $stmt;
    }

    public function fetchPres($year_election){
        $stmt = $this->fetch_pres($year_election);
        return $stmt;
    }
    public function fetchVPres($year_election){
        $stmt = $this->fetch_vpres($year_election);
        return $stmt;
    }

    public function fetchSecretary($year_election){
        $stmt = $this->fetch_secretary($year_election);
        return $stmt;
    }

    public function fetchTreasurer($year_election){
        $stmt = $this->fetch_treasurer($year_election);
        return $stmt;
    }

    public function fetchPIO($year_election){
        $stmt = $this->fetch_pio($year_election);
        return $stmt;
    }

    public function fetchBM($year_election){
        $stmt = $this->fetch_bm($year_election);
        return $stmt;
    }

    public function fetchAuditor($year_election){
        $stmt = $this->fetch_auditor($year_election);
        return $stmt;
    }

    public function fetchRepresent($year_election){
        $stmt = $this->fetch_represent($year_election);
        return $stmt;
    }

    public function fetchUser(){
        $stmt = $this->fetch_user();
        return $stmt;
    }

        public function fetchCityServ($status){
        $stmt = $this->fetch_city_serv($status);
        return $stmt;
    }
}

?>