<?php
include 'includes/autoload.inc.php';


if(isset($_POST['add_org']) && $_POST['function'] == "add_org"){
    $org_name = secured($_POST['org_name']);
    $org_date = secured($_POST['org_date']);

    $add_org = new insert();
    $add_org->addOrg($org_name,$org_date);
}elseif(isset($_POST['update_org']) && $_POST['function'] == "add_org"){
    $org_id = secured($_POST['org_id']);
    $org_name = secured($_POST['org_name']);
    $org_date = secured($_POST['org_date']);

    $add_org = new update();
    $add_org->updateOrg($org_id,$org_name,$org_date);
}elseif(isset($_REQUEST['deleteOrg'])){
    $value = secured($_REQUEST['deleteOrg']);

    $delete_org = new delete();
    $delete_org->deleteOrg($value);
}elseif(isset($_REQUEST['approved_user'])){
    $value=secured($_REQUEST['approved_user']);

    $approved_user = new update();
    $approved_user->approvedUser($value);
}elseif(isset($_REQUEST['disapproved_user'])){
    $value=secured($_REQUEST['disapproved_user']);

    $disapproved_user = new update();
    $disapproved_user->disapprovedUser($value);
}elseif(isset($_REQUEST['deleteUser'])){
    $value=secured($_REQUEST['deleteUser']);

    $deleteUser = new delete();
    $deleteUser->deleteUser($value);
}elseif(isset($_POST['add_member_org']) && $_POST['function'] == "add_member_org"){
    $org_name = secured($_POST['org_name']);
    $org_pos = secured($_POST['org_pos']); 
    $org_mem_name = secured($_POST['org_mem_name']);
    
    $add_org_mem = new insert();
    $add_org_mem->addOrgMem($org_name, $org_pos, $org_mem_name);

}elseif(isset($_POST['add_notice']) && $_POST['function'] == "add_notice"){
    $notice_org = secured($_POST['notice_org']);
    $notice_title = secured($_POST['notice_title']);
    $notice_date = secured($_POST['notice_date']);
    $notice_message = secured($_POST['notice_message']);

    $add_notice = new insert();
    $add_notice->addNotice($notice_org,$notice_title,$notice_date,$notice_message);
}elseif(isset($_POST['update_notice']) && $_POST['function'] == "update_notice"){
    $notice_id = secured($_POST['notice_id']);
    $notice_org = secured($_POST['notice_org']);
    $notice_title = secured($_POST['notice_title']);
    $notice_date = secured($_POST['notice_date']);
    $notice_message = secured($_POST['notice_message']);

    $add_notice = new update();
    $add_notice->updateNotice($notice_id,$notice_org,$notice_title,$notice_date,$notice_message);
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
}elseif(isset($_REQUEST['delete_mem_org'])){
    $delete_mem_org = secured($_REQUEST['delete_mem_org']);

    $delete_mem = new delete();
    $delete_mem->deleteMem($delete_mem_org);
}elseif(isset($_POST['add_service']) && $_POST['function'] == "add_service"){
    $notice_org = secured($_POST['notice_org']);
    $notice_title = secured($_POST['notice_title']);
    $notice_date = secured($_POST['notice_date']);
    $notice_sponsor = secured($_POST['notice_sponsor']);
    $notice_message = secured($_POST['notice_message']);

    $add_service = new insert();
    $add_service->addServices($notice_org,$notice_title,$notice_date,$notice_sponsor,$notice_message);
}elseif(isset($_POST['update_service']) && $_POST['function'] == "update_service"){
    $notice_id = secured($_POST['notice_id']);
    $notice_org = secured($_POST['notice_org']);
    $notice_title = secured($_POST['notice_title']);
    $notice_date = secured($_POST['notice_date']);
    $notice_message = secured($_POST['notice_message']);

    $add_notice = new update();
    $add_notice->updateService($notice_id,$notice_org ,$notice_title,$notice_date,$notice_message);
}elseif(isset($_POST['add_user_services']) && $_POST['function'] == "add_user_services"){
    $service_name = secured($_POST['service_name']);
    $service_sponsor = secured($_POST['service_sponsor']);
    $add_user_services = secured($_POST['user_name_get_ser']);
    $date_get_ser = secured($_POST['date_get_ser']);

    $add_services_user = new insert();
    $add_services_user->addServicesUser($service_name,$service_sponsor,$add_user_services,$date_get_ser);

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
}elseif(isset($_POST['update_election_status']) && $_POST['function'] == "update_election_status"){
    $election_id = secured($_POST['election_id']);
    $election_status = secured($_POST['election_status']);

    $update_status_election = new update();
    $update_status_election->updateStatusElection($election_id,$election_status);
}elseif(isset($_POST['sysDef']) && $_POST['function'] == "sysDef"){
    $sysDef_id = secured($_POST['sysDef_id']);

    $changeSysDef = new update();
    $changeSysDef->changeSysDef($sysDef_id);
}else{  
    header("Location: index.php");
}
?>