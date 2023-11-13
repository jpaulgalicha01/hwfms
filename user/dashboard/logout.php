<?php
include 'include/autoload.inc.php';

$logoutUser = new update();
$res = $logoutUser->logoutUser();
if($res){
    session_unset();
    session_destroy();
    header('location: ../index.php');
}else{
    echo "There's Something Wrong";
}
session_unset();
session_destroy();
header("Location: ../../index.php");
?>