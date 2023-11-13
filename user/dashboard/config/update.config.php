<?php

class update extends controller{
    public function logoutUser(){
        $stmt = $this->logout_user();
        return $stmt;
    }

     public function updateUserInfo($user_id,$profile_img,$fname,$mname,$lname,$birth,$contact,$email,$uname,$cpass,$npass){
        $check = 0;
        $stmt = $this->update_user_info($user_id,$profile_img,$fname,$mname,$lname,$birth,$contact,$email,$uname,$cpass,$npass,$check);
        return $stmt;
    }
}

?>