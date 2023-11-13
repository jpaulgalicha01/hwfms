<?php
include 'include/autoload.inc.php';

if(isset($_POST['pre_reg']) && $_POST['function'] == "pre_reg"){
    $pre_name = secured($_POST['pre_name']);
    $pre_reg_post = secured($_POST['pre_reg_post']);

    $pre_reg = new insert();
    $pre_reg->pre_reg($pre_name,$pre_reg_post);
}elseif(isset($_POST['withdraw_candi']) && $_POST['function'] == "withdraw_candi"){
    $election_year = secured($_POST['election_year']);
    $election_status = secured($_POST['election_status']);

    $withdrawal_candi = new delete();
    $withdrawal_candi->withdrawalCandi($election_year,$election_status);

}else{
    header("Location: index.php");
}
?>