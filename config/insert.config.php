<?php
class insert extends controller{
    public function addData($profile_img,$fname,$mname,$lname,$email,$phone,$birthdate,$address,$org,$uname,$password){
        $stmt = $this->create_acount($profile_img,$fname,$mname,$lname,$email,$phone,$birthdate,$address,$org,$uname,$password);
        return $stmt;
    }
}
?>