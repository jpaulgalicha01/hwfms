<?php
include_once 'config/security.php';

spl_autoload_register('Autoload');

function Autoload($classname){
	$full_path = 'config/'.$classname.'.config.php';

	if(!file_exists($full_path)){
		return false;
	}
	include_once($full_path);
}

$info_user = new fetch();
$res_info_user = $info_user->fetchUser();
if($res_info_user->rowCount()==1){
	$fetch_info_user = $res_info_user->fetch();

	$user_name = $fetch_info_user['acc_type'];
}


$count_brgy = 0;
$fetch_brgy = new fetch();

$res_fetch_brgy = $fetch_brgy->fetchBrgy();
if($res_fetch_brgy->rowCount()>0){
	$count_brgy = $res_fetch_brgy->rowCount();
}

$count_admin = 0;

$count_admin_acc = new fetch();
$res_count_admin_acc  = $count_admin_acc->countAdminAcc();
if ($res_count_admin_acc->rowCount()) {
	$count_admin = $res_count_admin_acc->rowCount();
}

$count_users = 0;

$count_users_acc = new fetch();
$res_count_users_acc  = $count_users_acc->countUserAcc();
if ($res_count_users_acc->rowCount()) {
	$count_users = $res_count_users_acc->rowCount();
}

$count_livelihood_program = 0;

$count_announce_livelihood = new fetch();
$res_count_announce_livelihood = $count_announce_livelihood->countAnnounceLivelihood();

if($res_count_announce_livelihood->rowCount()){
	$count_livelihood_program = $res_count_announce_livelihood->rowCount();
}

$count_job_offers = 0;
$count_announce_job = new fetch();
$res_count_announce_job = $count_announce_job->countAnnounceJob();

if($res_count_announce_job->rowCount()){
	$count_job_offers = $res_count_announce_job->rowCount();
}
