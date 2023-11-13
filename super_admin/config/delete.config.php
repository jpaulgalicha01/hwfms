<?php
class delete extends controller{
    public function deleteAdmin($value){
        $stmt = $this->delete_admin_user($value);
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

    public function deletePreReg($value){
        $stmt = $this->delete_pre_reg($value);
        return $stmt;
    }
}
?>