<?php
require_once '../PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->CharSet = 'UTF-8';

$mail->Host       = "smtp.gmail.com"; // SMTP server example
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
$mail->Username   = "jerlendelosreyes7@gmail.com";  // SMTP account username example
$mail->Password   = "qwumijvpgicmprvu";        // SMTP account password example


$account_info = new fetch();
$res_account = $account_info->accountInfo();

if($res_account->rowCount()){
    $res_account_fetch = $res_account->fetch();

    $mail->clearAddresses();
    $mail->setFrom('jerlendelosreyes7@gmail.com','HWFMS - Hinigaran Womens Fedration Managament System');
    $mail->addAddress($res_account_fetch['acc_email']);
    
    //The subject of the message.
    $mail->Subject = 'Election For Officer Oranization (Closed)';
    $message = '
        Thank you for your cooperation. God Bless everyone.
    ';
    $mail->Body = $message;
    $mail->isHTML(true);
    $mail->send();

}else{
    return false;
}
    


?>