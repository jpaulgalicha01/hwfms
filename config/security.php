<?php
session_start();

function secured($data){
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripcslashes($data);
    $data = str_replace("'", "\'", $data);
    return $data;
}

if(isset($_SESSION['user_id']) && $_SESSION['user_type']=="admin"){
    header("Location: super_admin/index.php");
}
if(isset($_SESSION['user_id']) && $_SESSION['user_type']=="sub_admin"){
    header("Location: admin/index.php");
}if(isset($_SESSION['user_id']) && $_SESSION['user_type']=="user"){
    header("Location: user/index.php");
}
?>