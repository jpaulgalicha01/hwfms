<?php
    include '../../config/db.config.php';
    include '../config/security.php';

    spl_autoload_register("Autoload");

    function Autoload($classname){
        $path = "config/";
        $extension = ".config.php";
        $fullpath = $path.$classname.$extension;

        if(!file_exists($fullpath)){
            return false;
        }
        include_once $fullpath;
    }

    $user_id = $_SESSION['user_id'];

    $name ="";
    $fname ="";
    $mname ="";
    $lname ="";
    $profile="";
    $contact = "";
    $birth = "";
    $email = "";
    $uname = "";
    $user_brgy = "";

    $fetch_user = new fetch();
    $res = $fetch_user->fetchUser();

    if($res->rowCount()){
        $row = $res->fetch();

        $profile = $row["acc_profile"];
        $name = $row["acc_fname"]." ".$row["acc_mname"]." ".$row["acc_lname"];
        $fname = $row["acc_fname"];
        $mname = $row["acc_mname"];
        $lname = $row["acc_lname"];
        $email = $row["acc_email"];
        $uname = $row["acc_uname"];
        $contact = $row["acc_phone"];
        $birth = $row["acc_birth"];
        $user_brgy = $row["acc_address"];
        $organization_name = $row['acc_org'];

    }
?>