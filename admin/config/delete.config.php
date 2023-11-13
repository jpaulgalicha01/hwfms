<?php
class delete extends controller{
    public function deleteOrg($value){
        $stmt = $this->delete_org($value);
        return $stmt;
    }

    public function deleteUser($value){
        $stmt = $this->delete_user($value);
        return $stmt;
    }
    public function deleteNotice($value){
        $stmt = $this->delete_notice($value);
        return $stmt;
    }
    public function deleteAppointment($value){
        $stmt = $this->delete_appointment($value);
        return $stmt;
    }

    public function deleteMem($delete_mem_org){
        $stmt = $this->delete_mem($delete_mem_org);
        return $stmt;
    }
    public function deletePreReg($value){
        $stmt = $this->delete_pre_reg($value);
        return $stmt;
    }
}
?>