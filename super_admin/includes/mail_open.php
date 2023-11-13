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


  
$value_id_num = "";
$account_info = new fetch();
$res_account = $account_info->accountInfo($value_id_num);

if($res_account->rowCount()){
    while ($res_account_fetch = $res_account->fetch()) {
        $mail->clearAddresses();
        $mail->setFrom('jerlendelosreyes7@gmail.com','HWFMS - Hinigaran Womens Fedration Managament System');
        $mail->addAddress($res_account_fetch['acc_email']);
        
        //The subject of the message.
        $mail->Subject = 'Election For Admin Position (Open)';
        $message = '
            Please Log in using your account to vote candidate
        ';
        $mail->Body = $message;
        $mail->isHTML(true);
        $mail->send();

    };

}else{
    return false;
}


?>