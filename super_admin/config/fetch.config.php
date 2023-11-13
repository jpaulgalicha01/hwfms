<?php
class fetch extends controller{

    public function brgyList(){
        $stmt = $this->brgy_list();
        return $stmt;
    }
    public function fetchUserInfo($user_id){
        $stmt = $this->fetch_user_info($user_id);
        return $stmt;
    }
    public function fetchAdmin($value){
        $stmt = $this->fetch_admin($value);

        if($stmt){
            return $stmt;
        }else{
            return false;
        }
    }

    public function countUserNew(){
        $stmt = $this->count_user_new();     
        return $stmt;
    }

    public function viewAdmin($value){
        $stmt = $this->view_admin($value);

        if($stmt){
            return $stmt;
        }else{
            return false;
        }
    }

    public function fetchOrg($org_brgy,$org_status){
        $stmt = $this->fetch_org($org_brgy,$org_status);
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

    public function fetchUser($value_brgy,$value){
        $stmt = $this->fetch_user($value_brgy,$value);

        if($stmt){
            return $stmt;
        }else{
            return false;
        }
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

    public function fetchOrgList($value_brgy){
        if($value_brgy=="All"){
            ?>
                <option selected>All</option>
            <?php
        }
        $stmt = $this->fetch_org_list($value_brgy);
        if($stmt->rowCount()){
            ?>
                <option selected>All</option>
            <?php
            while($row = $stmt->fetch()){
                ?>
                    <option><?=$row['org_name']?></option>
                <?php
            }
        }
    }

    public function countAdmin(){
        $stmt = $this->count_admin();
        if($stmt->rowCount()){
            echo $stmt->rowCount();
        }else{
           echo"0";
        }
    }

    public function countUser(){
        $stmt = $this->count_user();
        if($stmt->rowCount()){
            echo $stmt->rowCount();
        }else{
           echo"0";
        }
    }

    public function countOrg(){
        $stmt = $this->count_org();
        if($stmt->rowCount()){
            echo $stmt->rowCount();
        }else{
           echo"0";
        }
    }
    public function pendingOrg(){
        $stmt = $this->pending_org();
        if($stmt->rowCount()){
            echo $stmt->rowCount();
        }else{
           echo"0";
        }
    }

    public function pendingApp(){
        $stmt = $this->pending_app();
        if($stmt->rowCount()){
            echo $stmt->rowCount();
        }else{
           echo"0";
        }
    }

    public function todayAppointment($date){
        $stmt = $this->today_appointment($date);
        if($stmt->rowCount()){
            echo $stmt->rowCount();
        }else{
           echo"0";
        }
    }

    public function checkPreRegis($date){
        $stmt = $this->check_pre_regis($date);
        return $stmt;
    }

    public function fetchPreRegis(){
        $stmt = $this->fetch_pre_regis();
        return $stmt;
    }

    public function checkYear($year_election){
        $stmt = $this->check_year($year_election);

        if($stmt->rowCount()!==1){
            header("Location: index.php");
        }
    }

    public function orgMemList(){
        $stmt = $this->org_mem_list();
        return $stmt;
    }

    public function accountInfo($value_id_num){
        $stmt = $this->account_info($value_id_num);
        return $stmt;
    }

    public function checkElectionPeriod(){
        $stmt = $this->check_election_period();
        return $stmt;
    }

    public function countCandidateYear($year){
        $stmt = $this->count_candidate_year($year);
        return $stmt;
    }
    public function candidateCount($year_election,$brgy_name){
        $stmt = $this->candidate_count($year_election,$brgy_name);
        return $stmt;
    }

    public function fetchElectionList($value,$year){
        $stmt = $this->fetch_election_list($value,$year);
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

    public function fetchService(){
        $stmt = $this->fetch_service();
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

    public function activeUser(){
        $stmt = $this->active_user();
        return $stmt;
    }

    public function activeAdmin(){
        $stmt = $this->active_admin();
        return $stmt;
    }

    public function totalAcc(){
        $stmt = $this->total_acc();
        return $stmt;
    }

    public function checkingServices($services_id){
        $stmt = $this->checking_services($services_id);
        if($stmt->rowCount()==1){
            return $stmt;
        }else{
            header("Location: index.php");
        }
    }

    public function fetchServicesUser($brgy,$service_id){
        $stmt = $this->fetch_services_user($brgy,$service_id);
        return $stmt;
    }

    public function fetchName($name_user){
        $stmt = $this->fetch_name($name_user);
        return $stmt;
    }

    public function fetchCityServ($acc_id,$brgy){
        $stmt = $this->fetch_city_serv($acc_id,$brgy);
        return $stmt;
    }

    public function fetchBrgyServ($acc_id,$brgy){
        $stmt = $this->fetch_brgy_serv($acc_id,$brgy);
        return $stmt;
    }

    public function checkAppToday($date){
        $stmt = $this->check_ap_today($date);
        return $stmt;
    }

        public function checkOrgMem($value){
        $stmt = $this->check_org_mem($value);

        if($stmt->rowCount()>0){
            return $stmt;
        }else{
            header("Location: index.php");
        }
    }

    public function fetchOrgMem($value){
        $stmt = $this->fetch_org_mem($value);
        return $stmt;
    }

    public function fetchActiveUser($brgy_name){
        $stmt = $this->fetch_active_user($brgy_name);
        return $stmt;
    }

    public function fetchPreOrg(){
        $stmt = "jpaulgalicha01@gmail.com";
        return $stmt;
    }
}
?>