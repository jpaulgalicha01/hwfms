<?php
include '../config/db.config.php';
include 'config/security.php';
spl_autoload_register("Autoload");

function Autoload($classname){
    $path= "config/";
    $extenstion = ".config.php";
    $fullpath = $path.$classname.$extenstion;
    if(!file_exists($fullpath)){
        return false;
    }else{
        include_once $fullpath;

    }

}
$_SESSION['election_type']="";
$_SESSION['user_name']="";
$_SESSION['user_img']="";
$check_pre_elect = new fetch();
$check_pre_elect->checkPreElect();
?>
