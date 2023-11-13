<?php
date_default_timezone_set('Asia/Manila');

include '../config/db.config.php';
include 'config/security.php';

spl_autoload_register("Autoload");

function Autoload($classname){
    $path="config/";
    $extension=".config.php";
    $fullpath = $path.$classname.$extension;

    if(!file_exists($fullpath)){
        return false;
    }else{
        include_once $fullpath;
    }
}

$date = date('Y-m-d');

$user_id = $_SESSION['user_id'];
$name ="";
$fname ="";
$mname ="";
$lname ="";
$user_profile="";
$email = "";
$uname = "";

$fetch_user_info = new fetch();
$res = $fetch_user_info->fetchUserInfo($user_id);

if($res->rowCount()){
    $row = $res->fetch();

    $user_profile = $row["acc_profile"];
    $name = $row["acc_fname"]." ".$row["acc_mname"]." ".$row["acc_lname"];
    $fname = $row["acc_fname"];
    $mname = $row["acc_mname"];
    $lname = $row["acc_lname"];
    $email = $row["acc_email"];
    $uname = $row["acc_uname"];
}

// Checking Pre Register 
$check_pre_regis = new fetch();
$check_pre_regis->checkPreRegis($date);


// Sending Email
if(isset($_SESSION['pre_reg_status']) && $_SESSION['pre_reg_status'] == "Start"){
    ?>
        <script>
            alert("The Pre Registration for Admin is Now Open");
        </script>
    <?php
    require 'mail_start.php';
    unset($_SESSION['pre_reg_status']);
}elseif(isset($_SESSION['pre_reg_status']) && $_SESSION['pre_reg_status'] == "End"){
    ?>
        <script>
            alert("The Pre Registration for Admin is Closed");
        </script>
    <?php
    require 'mail_end.php';
    unset($_SESSION['pre_reg_status']);
}



// election Status
if(isset($_SESSION['election_status']) && $_SESSION['election_status'] == "Election Period is Open"){
    ?>
      <script>
        alert("<?=$_SESSION['election_status']?>");
      </script>
    <?php
    require 'mail_open.php';
    unset($_SESSION['election_status']);

  }elseif(isset($_SESSION['election_status']) && $_SESSION['election_status'] == "Election Period is Close"){
    ?>
      <script>
        alert("<?=$_SESSION['election_status']?>");
      </script>
    <?php
    require 'mail_close.php';
    unset($_SESSION['election_status']);

  }
  $count_active_user="";
  $count_active_admin="";
  $count_total_acc = "";

  // Checking Active User
  $active_user = new fetch();
  $res_active_user = $active_user->activeUser();

  if($res_active_user){
    $count_active_user = $res_active_user->rowCount();
  }else{
    $count_active_user = "0";
  }

// Checking Active Admin
  $active_admin = new fetch();
  $res_active_admin = $active_admin->activeAdmin();

  if($res_active_admin){
    $count_active_admin = $res_active_admin->rowCount();
  }else{
    $count_active_admin = "0";
  }
// Total Account
  $total_acc = new fetch();
  $res_total_acc = $total_acc->totalAcc();

  if($res_total_acc){
    $count_total_acc = $res_total_acc->rowCount();
  }else{
    $count_total_acc = "0";
  }
?>