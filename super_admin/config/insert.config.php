<?php

class insert extends controller{
    public function addAdmin($profile_img,$fname,$mname,$lname,$email,$phone,$birthdate,$address,$uname,$password){
        $stmt = $this->add_admin_user($profile_img,$fname,$mname,$lname,$email,$phone,$birthdate,$address,$uname,$password);

        return $stmt;
    }

    public function addOrg($org_name,$org_date,$address){
        $stmt = $this->add_org($org_name,$org_date,$address);
        return $stmt;
    }

    public function addNotice($notice_title,$notice_date,$notice_message){
        $stmt = $this->add_notice($notice_title,$notice_date,$notice_message);
        return $stmt;
    }

    public function addPreElect($pre_elect_year,$pre_elect_starting,$pre_elect_end){
        $stmt = $this->add_pre_elect($pre_elect_year,$pre_elect_starting,$pre_elect_end);
        return $stmt;
    }

    public function addServices($notice_title,$notice_date,$notice_sponsor,$notice_message){
        $stmt = $this->add_service($notice_title,$notice_date,$notice_sponsor,$notice_message);
        return $stmt;
    }

    public function addServicesUser($service_name,$service_sponsor,$add_user_services,$date_get_ser){
        $stmt = $this->add_services_user($service_name,$service_sponsor,$add_user_services,$date_get_ser);
        return $stmt;
    }
}
?>