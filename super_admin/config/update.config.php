<?php
class update extends controller{

    public function updateOrg($org_id,$org_name,$org_date,$brgy){
        $stmt = $this->update_org($org_id,$org_name,$org_date,$brgy);
        return $stmt;
    }

    public function acceptOrg($value){
        $stmt = $this->accept_org($value);
        return $stmt;
    }
    public function declinedOrg($value){
        $stmt = $this->declined_org($value);
        return $stmt;
    }

    public function updateNotice($notice_id,$notice_title,$notice_date,$notice_message){
        $stmt = $this->update_notice($notice_id,$notice_title,$notice_date,$notice_message);
        return $stmt;
    }

    public function acceptAppointment($value){
        $stmt = $this->accept_appointment($value);

        return $stmt;
    }

    public function declinedAppointment($value){
        $stmt = $this->declined_appointment($value);

        return $stmt;
    }

    public function updateUserInfo($user_id,$profile_img,$fname,$mname,$lname,$email,$uname,$cpass,$npass){
        $check = 0;
        $stmt = $this->update_user_info($user_id,$profile_img,$fname,$mname,$lname,$email,$uname,$cpass,$npass,$check);
        return $stmt;
    }

    public function changeSysDef($sysDef_id){
        $stmt = $this->change_sys_def($sysDef_id);
        return $stmt;
    }

    public function updateStatusElection($election_id,$election_status){
        $stmt = $this->update_status_election($election_id,$election_status);
        return $stmt;
    }

    public function setAdmin($candidate_id,$address,$year){
        $stmt = $this->set_admin($candidate_id,$address,$year);
        return $stmt;
    }

    
    public function updateService($notice_id,$notice_title,$notice_date,$notice_message){
        $stmt = $this->update_service($notice_id,$notice_title,$notice_date,$notice_message);
        return $stmt;
    }
}
?>