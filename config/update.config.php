<?php

class update extends controller{
    public function changePass($acc_id,$npass){
        $stmt = $this->change_pass($acc_id,$npass);
        
        if($stmt){
            $_SESSION['decline'] = 'You can log in now';
            $_SESSION['icon'] = 'success';
            $_SESSION['title'] = 'Reset Password';
            header('location: index.php');
        }else{
            $_SESSION['decline'] = 'Please try again';
            $_SESSION['icon'] = 'error';
            $_SESSION['title'] = 'Failed';
            header('location: '.$_SERVER['HTTP_REFERER'].'');
        }
    }
}

?>