<?php
require_once 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->CharSet = 'UTF-8';

$mail->Host       = "smtp.gmail.com"; // SMTP server example
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
$mail->Username   = "jerlendelosreyes7@gmail.com"; 	// SMTP account username example
$mail->Password   = "qwumijvpgicmprvu";        // SMTP account password example


$mail->clearAddresses();
$mail->setFrom('jerlendelosreyes7@gmail.com','HWFMS - Hinigaran Womens Fedration Managament System');
$mail->addAddress($email);

//The subject of the message.
$mail->Subject = 'Confirmation to reset Password';
$message = '
OTP Code for reset password ('.$acc_otp.'). <br>

';
$mail->Body = $message;
$mail->isHTML(true);

if($mail->send()){
    $status = 1;
    return true;
}else{
    $status = 0;
    return true;
}


?>