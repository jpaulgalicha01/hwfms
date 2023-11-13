<?php
session_start();
function secured($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = str_replace("'", "\'", $data);
    return $data;
  }

if(!isset($_SESSION['user_id'])){
    header("Location: ../index.php");
}

if(isset($_SESSION['user_id']) && $_SESSION['user_type']=="admin"){
    header("Location: ../super_admin/index.php");
}
elseif(isset($_SESSION['user_id']) && $_SESSION['user_type']=="sub_admin"){
    header("Location: ../admin/index.php");
}
?>