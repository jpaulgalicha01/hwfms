<?php
ob_start();
session_start();

function secured($data){
	$data = htmlspecialchars($data);
	$data = stripslashes($data);
	$data = trim($data);
	$data = str_replace("'", "\'", $data);
	return $data;
}

if(!isset($_COOKIE['user_id']) || !isset($_COOKIE['user_type'])){
	ob_end_flush(header("Location: ../index.php"));
}
if(isset($_COOKIE['user_id']) && $_COOKIE['user_type'] == "admin"){
	ob_end_flush(header("Location: ../admin/index.php"));
}

if(isset($_COOKIE['user_id']) && $_COOKIE['user_type'] == "user"){
	ob_end_flush(header("Location: ../user/index.php"));
}