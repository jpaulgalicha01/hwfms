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

	$user_name =  $fetch_info_user['acc_lname'].", ".$fetch_info_user['acc_fname'];
	$user_type = $fetch_info_user['acc_type'];
	$user_address = $fetch_info_user['acc_brgy'];
}

$account_total = 0;
$account_accept = 0;
$account_declined = 0;
$account_pending = 0;
$count_user = new fetch();
$res_count = $count_user->countUser();
if($res_count->rowCount()>0){
	
	$account_total = $res_count->rowCount();

	while($row = $res_count->fetch()){
		switch ($row['acc_status']) {
			case 'Accept':
				$account_accept = $res_count->rowCount();
				break;
			
			case 'Declined':
				$account_declined = $res_count->rowCount();
				break;

			default:
				$account_pending = $res_count->rowCount();
				break;
		}
	}
}

$announce_count = 0;
$count_announce = new fetch();
$res_count_announce = $count_announce->fetchAnnouncement();
if($res_count_announce->rowCount()>0){
	$announce_count = $res_count_announce->rowCount();
}