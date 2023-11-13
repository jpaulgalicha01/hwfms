<?php
class insert extends controller{
    public function addOrg($org_name,$org_date){
        $stmt = $this->add_org($org_name,$org_date);
    }

    public function addOrgMem($org_name, $org_pos, $org_mem_name){
        $stmt = $this->add_org_mem($org_name, $org_pos, $org_mem_name);
        return $stmt;
    }
    
    public function addNotice($notice_org,$notice_title,$notice_date,$notice_message){
        $stmt = $this->add_notice($notice_org,$notice_title,$notice_date,$notice_message);
        return $stmt;
    }

    public function addServices($notice_org,$notice_title,$notice_date,$notice_sponsor,$notice_message){
        $stmt = $this->add_service($notice_org,$notice_title,$notice_date,$notice_sponsor,$notice_message);
        return $stmt;
    }

    public function addServicesUser($service_name,$service_sponsor,$add_user_services,$date_get_ser){
        $stmt = $this->add_services_user($service_name,$service_sponsor,$add_user_services,$date_get_ser);
        return $stmt;
    }

    public function addPreElect($pre_elect_year,$pre_elect_starting,$pre_elect_end){
        $stmt = $this->add_pre_elect($pre_elect_year,$pre_elect_starting,$pre_elect_end);
        return $stmt;
    }
}
?>