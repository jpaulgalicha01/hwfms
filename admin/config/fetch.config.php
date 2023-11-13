<?php
class fetch extends controller{

    public function countUserNew(){
        $stmt = $this->count_user_new();     
        return $stmt;
    }
    public function fetchUserInfo($user_id){
        $stmt = $this->fetch_user_info($user_id);
        return $stmt;
    }

    public function fetchOrg($value){
        $stmt = $this->fetch_org($value);
        
        return $stmt;
        
    }

    public function checkOrg($value){
        $stmt = $this->check_org($value);
        if($stmt){
            return $stmt;
        }else{
            return false;
        }
    }
    public function fetchUser($value){
        $stmt = $this->fetch_user($value);
        return $stmt;
    }
    public function viewUser($value){
        $stmt = $this->view_user($value);

        if($stmt->rowCount()==1){
            return $stmt;
        }else{
            header("Location: index.php");
        }
    }

    public function checkOrgMem($value){
        $stmt = $this->check_org_mem($value);

        if($stmt->rowCount()>0){
            return $stmt;
        }else{
            header("Location: index.php");
        }
    }

    public function orgMem($value){
        $stmt = $this->org_mem($value);
        return $stmt;
    }

    public function fetchOrgMem($value){
        $stmt = $this->fetch_org_mem($value);
        return $stmt;
    }

    public function fetchNotice(){
        $stmt = $this->fetch_notice();
        return $stmt;
    }

    public function fetch_updateNotice($value){
        $stmt = $this->fetch_update_notice($value);
        if($stmt){
            return $stmt;
        }else{
            header("Location: index.php");
        }
    }

    public function fetchOrgNonMem($value){
        $stmt = $this->fetch_org_non_mem($value);
        return $stmt;
    }

    public function fetchAppointment($value){
        $stmt = $this->fetch_appointment($value);
        if($stmt->rowCount()){
            return $stmt;
        }else{
            return false;
        }
    }

    public function show_appointment($value){
        $stmt = $this->showAppointment($value);

        if($stmt->rowCount()==1){
            while($row = $stmt->fetch()){
                $data = [
                    'status' => 200,
                    'data' => $row,
                ];
                echo json_encode($data);
                return false;
            }
        }else{
            return false;
        }
    }

    public function fetchOrgList(){
        $stmt = $this->fetch_org_list();
        return $stmt;
    }

        public function fetch_updateService($value){
        $stmt = $this->fetch_update_service($value);
        if($stmt){
            return $stmt;
        }else{
            header("Location: index.php");
        }
    }

    public function fetchService(){
        $stmt = $this->fetch_service();
        return $stmt;
    }

    public function checkingServices($services_id){
    $stmt = $this->checking_services($services_id);
    if($stmt->rowCount()==1){
        return $stmt;
        }else{
            // header("Location: index.php");
        }
    }

    public function fetchName($name_user){
        $stmt = $this->fetch_name($name_user);
        return $stmt;
    }

    public function fetchServicesUser($services_id){
        $stmt = $this->fetch_services_user($services_id);
        return $stmt;
    }

    public function fetchPreRegis(){
        $stmt = $this->fetch_pre_regis();
        return $stmt;
    }

    public function countCandidateYear($year){
        $stmt = $this->count_candidate_year($year);
        return $stmt;
    }

    public function checkPreRegis($date){
        $stmt = $this->check_pre_regis($date);
        return $stmt;
    }
    
    public function checkYear($year_election){
        $stmt = $this->check_year($year_election);

        if($stmt->rowCount()!==1){
            header("Location: index.php");
        }
    }

    public function brgyList(){
        $stmt = $this->brgy_list();
        return $stmt;
    }

    public function candidateCount($year_election,$org_name){
        $stmt = $this->candidate_count($year_election,$org_name);
        return $stmt;
    }

    public function fetchElectionList($value,$year){
        $stmt = $this->fetch_election_list($value,$year);
        return $stmt;
    }

    public function checkElectionPeriod(){
        $stmt = $this->check_election_period();
        return $stmt;
    }

        public function checkingElectionPeriod($election_id){
        $stmt = $this->checking_election_period($election_id);
        if($stmt){
            return $stmt;
        }else{
            header("Location: index.php");
        }
    }

        public function countVote($value,$year,$candidate_id){
        $stmt = $this->count_vote($value,$year,$candidate_id);
        return $stmt;
    }

    public function changeAdmin($value){
        $stmt = $this->change_admin($value);
        return $stmt;
    }

    public function countUser($status){
        $stmt = $this->count_user($status);
        if($stmt->rowCount()){
            echo $stmt->rowCount();
        }else{
           echo"0";
        }
    }

      public function countOrg($status_org){
        $stmt = $this->count_org($status_org);
        if($stmt->rowCount()){
            echo $stmt->rowCount();
        }else{
           echo"0";
        }
    }

    public function checkAppToday($date){
        $stmt = $this->check_ap_today($date);
        return $stmt;
    }

    public function fetchBrgyServ($acc_id){
        $stmt = $this->fetch_brgy_serv($acc_id);
        return $stmt;
    }

    
    public function accountInfo(){
        $stmt = $this->account_info();
        return $stmt;
    }

}
?>