<?php
include 'includes/autoload.inc.php';

if(isset($_POST['user_login']) && $_POST['function']=="user_login" ){
$uname = secured($_POST['uname']);
$pass = secured($_POST['pass']);

$check = new fetch();
$check->loggin($uname,$pass);
}elseif(isset($_POST['create_user']) && secured($_POST['function'] == "create_user")){
    $profile_img = $_FILES['profile_img']['name'];
    $fname = secured($_POST['fname']);
    $mname = secured($_POST['mname']);
    $lname = secured($_POST['lname']);
    $email = secured($_POST['email']);
    $phone = secured($_POST['phone']);
    $birthdate = secured($_POST['birth']);
    $address = secured($_POST['address']);
    $org = secured($_POST['org']);
    $uname = secured($_POST['uname']);
    $password = secured($_POST['password']);

    $create_user = new insert();
    $create_user->addData($profile_img,$fname,$mname,$lname,$email,$phone,$birthdate,$address,$org,$uname,$password);
}elseif(isset($_POST['value']) && $_POST['function']=="fetch_org" ){
    $value = secured($_POST['value']);

    $fetch_org = new fetch();
    $res = $fetch_org->fetchOrg($value);

    if($res){
        while($row=$res->fetch()){
            echo"<option>".$row['org_name']."</option>";
        }
    }else{
        echo"<option value=''selected disabled>--- NO DATA FOUND ---</option>";
    }

}elseif(isset($_POST["res_pass"]) && $_POST['function'] == "reset_pass"){
   $email_add = secured($_POST['email_add']);

    $reset_email = new fetch();
    $reset_email->resetEmail($email_add);
}elseif(isset($_POST['verify_otp_code']) && $_POST['function']=="verify_otp" ){
    $acc_id = secured($_POST['acc_id']);
    $otp_code = secured($_POST['otp_code']);

    $verify_otp = new fetch();
    $verify_otp->verifyOtp($acc_id,$otp_code);

}elseif(isset($_POST['change_pass']) && $_POST['function']=="change_pass" ){
    $acc_id = secured($_POST['acc_id']);
    $npass = secured($_POST['npass']);

    $change_pass = new update();
    $change_pass->changePass($acc_id,$npass);
}else{
    header("Location: index.php");
}

?>