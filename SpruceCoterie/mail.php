<?php 
	require_once('PHPMailer/PHPMailerAutoLoad.php');
	require('PHPMailer/class.phpmailer.php');
	require('PHPMailer/class.smtp.php');
	
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = '465';
	$mail->isHTML();
	$mail->Username = 'sprucecoterie@gmail.com';
	$mail->Password = 'Spruce@Coterie12';
	$mail->SetFrom('no-reply@howcode.org');
	$mail->Subject = 'HI';
	$mail->Body = 'HI there';
	$mail->AddAddress('bhavsarsamprat@gmail.com');
	
	$mail->Send();
if(!$mail->send()) {
    echo 'Message could not be sent. </br>';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}	
?>