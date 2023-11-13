<?php
include 'includes/autoload.inc.php';

if(isset($_POST['add_admin']) && $_POST['function'] == "add_admin"){
    $profile_img = $_FILES["profile_img"]["name"];
    $fname = secured($_POST['fname']);
    $mname = secured($_POST['mname']);
    $lname = secured($_POST['lname']);
    $email = secured($_POST['email']);
    $phone = secured($_POST['phone']);
    $birthdate = secured($_POST['birthdate']);
    $address = secured($_POST['address']);
    $uname = secured($_POST['uname']);
    $password = secured($_POST['password']);

    $add_user = new insert();
    $add_user->addAdmin($profile_img,$fname,$mname,$lname,$email,$phone,$birthdate,$address,$uname,$password);

}elseif(isset($_POST['add_org']) && $_POST['function'] == "add_org"){
    $org_name = secured($_POST['org_name']);
    $org_date = secured($_POST['org_date']);
    $address = secured($_POST['address']);

    $add = new insert();
    $add->addOrg($org_name,$org_date,$address);
}elseif(isset($_POST['update_org']) && $_POST['function'] == "add_org"){
    $org_id = secured($_POST['org_id']);
    $org_name = secured($_POST['org_name']);
    $org_date = secured($_POST['org_date']);
    $brgy = secured($_POST['address']);

    $add_org = new update();
    $add_org->updateOrg($org_id,$org_name,$org_date,$brgy);
}elseif(isset($_REQUEST['deleteUser'])){
    $value = secured($_REQUEST['deleteUser']);

    $delete_user = new delete();
    $delete_user->deleteAdmin($value);
}elseif(isset($_REQUEST['accept_org'])){
    $value = secured($_REQUEST['accept_org']);

    $accept_org = new update();
    $accept_org->acceptOrg($value);
}elseif(isset($_REQUEST['declined_org'])){
    $value = secured($_REQUEST['declined_org']);

    $declined_org = new update();
    $declined_org->declinedOrg($value);
}elseif(isset($_POST['add_notice']) && $_POST['function'] == "add_notice"){
    $notice_title = secured($_POST['notice_title']);
    $notice_date = secured($_POST['notice_date']);
    $notice_message = secured($_POST['notice_message']);

    $add_notice = new insert();
    $add_notice->addNotice($notice_title,$notice_date,$notice_message);
}elseif(isset($_POST['update_notice']) && $_POST['function'] == "update_notice"){
    $notice_id = secured($_POST['notice_id']);
    $notice_title = secured($_POST['notice_title']);
    $notice_date = secured($_POST['notice_date']);
    $notice_message = secured($_POST['notice_message']);

    $add_notice = new update();
    $add_notice->updateNotice($notice_id,$notice_title,$notice_date,$notice_message);
}elseif(isset($_REQUEST['delete_notice'])){
    $value = secured($_REQUEST['delete_notice']);

    $delete_notice = new delete();
    $delete_notice->deleteNotice($value);
}elseif(isset($_POST['value']) && $_POST["function"]=="Show Appointment"){
    $value = secured($_POST['value']);

    $show_appointment = new fetch();
    $show_appointment->show_appointment($value);

}elseif(isset($_REQUEST['accept_appointment'])){
    $value = secured($_REQUEST['accept_appointment']);

    $accept_appointment = new update();
    $accept_appointment->acceptAppointment($value);
}elseif(isset($_REQUEST['declined_appointment'])){
    $value = secured($_REQUEST['declined_appointment']);

    $declined_appointment = new update();
    $declined_appointment->declinedAppointment($value);
}elseif(isset($_REQUEST['delete_appointment'])){
    $value = secured($_REQUEST['delete_appointment']);


    $delete_appointment = new delete();
    $delete_appointment->deleteAppointment($value);
}elseif(isset($_POST['value_brgy']) && $_POST['function'] == "fetch_org"){
    $value_brgy = secured($_POST['value_brgy']);

    $fetch_org_list = new fetch();
    $fetch_org_list->fetchOrgList($value_brgy);
    

}elseif(isset($_POST['update_admin_info']) && $_POST['function'] == "update_admin_info"){
    $user_id = secured($_POST['user_id']);
    $profile_img = $_FILES['profile_img']['name'];
    $fname = secured($_POST['fname']);
    $mname = secured($_POST['mname']);
    $lname = secured($_POST['lname']);
    $email = secured($_POST['email']);
    $uname = secured($_POST['uname']);
    $cpass = secured($_POST['cpass']);
    $npass = secured($_POST['npass']);

    $update_user_info = new update();
    $update_user_info->updateUserInfo($user_id,$profile_img,$fname,$mname,$lname,$email,$uname,$cpass,$npass);
}elseif(isset($_POST['add_pre_regis']) && $_POST['function'] == "add_pre_regis"){
    $pre_elect_year = secured($_POST['pre_elect_year']);
    $pre_elect_starting = secured($_POST['pre_elect_starting']);
    $pre_elect_end = secured($_POST['pre_elect_end']);

    $add_pre_elect = new insert();
    $add_pre_elect->addPreElect($pre_elect_year,$pre_elect_starting,$pre_elect_end);
}elseif(isset($_REQUEST['delete_pre_reg'])){
    $value = secured($_REQUEST['delete_pre_reg']);

    $delete_pre_reg = new delete();
    $delete_pre_reg->deletePreReg($value);
}elseif(isset($_POST['sysDef']) && $_POST['function'] == "sysDef"){
    $sysDef_id = secured($_POST['sysDef_id']);

    $changeSysDef = new update();
    $changeSysDef->changeSysDef($sysDef_id);
}elseif(isset($_POST['update_election_status']) && $_POST['function'] == "update_election_status"){
    $election_id = secured($_POST['election_id']);
    $election_status = secured($_POST['election_status']);

    $update_status_election = new update();
    $update_status_election->updateStatusElection($election_id,$election_status);
}elseif(isset($_REQUEST['set_admin'])){
    $candidate_id = secured($_REQUEST['set_admin']);
    $address = secured($_REQUEST['address']);
    $year = secured($_REQUEST['year']);

    
    $setAdmin = new update();
    $setAdmin->setAdmin($candidate_id,$address,$year);
}elseif(isset($_POST['add_service']) && $_POST['function'] == "add_service"){
    $notice_title = secured($_POST['notice_title']);
    $notice_date = secured($_POST['notice_date']);
    $notice_sponsor = secured($_POST['notice_sponsor']);
    $notice_message = secured($_POST['notice_message']);

    $add_service = new insert();
    $add_service->addServices($notice_title,$notice_date,$notice_sponsor,$notice_message);
}elseif(isset($_POST['update_service']) && $_POST['function'] == "update_service"){
    $notice_id = secured($_POST['notice_id']);
    $notice_title = secured($_POST['notice_title']);
    $notice_date = secured($_POST['notice_date']);
    $notice_message = secured($_POST['notice_message']);

    $add_notice = new update();
    $add_notice->updateService($notice_id,$notice_title,$notice_date,$notice_message);
}elseif(isset($_POST['add_user_services']) && $_POST['function'] == "add_user_services"){
    $service_name = secured($_POST['service_name']);
    $service_sponsor = secured($_POST['service_sponsor']);
    $add_user_services = secured($_POST['user_name_get_ser']);
    $date_get_ser = secured($_POST['date_get_ser']);

    $add_services_user = new insert();
    $add_services_user->addServicesUser($service_name,$service_sponsor,$add_user_services,$date_get_ser);

}elseif(isset($_GET['function']) && $_GET['function'] == "fetch brgy"){
    $brgy_name = "";
    $brgy_list = new fetch();
    $res = $brgy_list->brgyList();

    $data = array();
    foreach ($res as $row) { 
     $brgy_name = $row['brgy_name'];
        $active_user = new fetch ();
        $result = $active_user->fetchActiveUser($brgy_name);

        $data[] = array(
                "count_active" => $result->rowCount(),
                "brgy_name" => $row['brgy_name'],
                "color" => '#'.rand(100000,999999).''
            );
    }
    
    echo json_encode($data);

}else{
    header("Location: index.php");
}
?>


