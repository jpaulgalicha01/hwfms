<?php
include 'include/autoload.inc.php';

if(isset($_POST['add_appointment']) && secured($_POST['function'])=="add_appointment"){
    $type_appointment = secured($_POST['type_appointment']);
    $subject_appointment = secured($_POST['subject_appointment']);
    $date_appointment = secured($_POST['date_appointment']);
    $time_appointment = secured($_POST['time_appointment']);
    $message_appointment = secured($_POST['message_appointment']);

    $add_appointment = new insert();
    $add_appointment->addAppointment($type_appointment,$subject_appointment,$date_appointment,$time_appointment,$message_appointment);

}elseif(isset($_POST['elect_admin']) && secured($_POST['function'])=="elect_admin"){
    $elect_year = secured($_POST['elect_year']);
    $name_candidate = secured($_POST['name_candidate']);

    $voting_brgy = new insert();
    $voting_brgy->votingBrgy($elect_year,$name_candidate);
}elseif(isset($_POST['elect_org']) && secured($_POST['function'])=="elect_org"){
    $elect_year = secured($_POST['elect_year']);
    $pres = secured($_POST['pres']);
    $vpres = secured($_POST['vpres']);
    $sec = secured($_POST['sec']);
    $tre = secured($_POST['tre']);
    $pio = secured($_POST['pio']);
    $bm = secured($_POST['bm']);
    $audi = secured($_POST['audi']);
    $rep = secured($_POST['rep']);

    $voting_brgy = new insert();
    $voting_brgy->votingOrg($elect_year,$pres,$vpres,$sec,$tre,$pio,$bm,$audi,$rep);
}elseif(isset($_POST['update_admin_info']) && $_POST['function'] == "update_admin_info"){
    $user_id = secured($_POST['user_id']);
    $profile_img = $_FILES['profile_img']['name'];
    $fname = secured($_POST['fname']);
    $mname = secured($_POST['mname']);
    $lname = secured($_POST['lname']);
    $birth = secured($_POST['birth']);
    $contact = secured($_POST['contact']);
    $email = secured($_POST['email']);
    $uname = secured($_POST['uname']);
    $cpass = secured($_POST['cpass']);
    $npass = secured($_POST['npass']);

    $update_user_info = new update();
    $update_user_info->updateUserInfo($user_id,$profile_img,$fname,$mname,$lname,$birth,$contact,$email,$uname,$cpass,$npass);
}else{
    header("Location: index.php");
}
?>