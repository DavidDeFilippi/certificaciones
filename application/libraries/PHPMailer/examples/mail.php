<?php


require '../PHPMailerAutoload.php';


$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.office365.com';
$mail->Port       = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth   = true;
$mail->Username = 'no-responder@edutecno.com';
$mail->Password = 'Edutecno1';
$mail->SetFrom('no-responder@edutecno.com', 'No Respondas');
$mail->addAddress('cespinoza@edutecno.com', 'Cristian Espinoza');
$mail->addAddress('ljarpa@edutecno.com', 'Luis Jarpa');
//$mail->SMTPDebug  = 3;
//$mail->Debugoutput = function($str, $level) {echo "debug level $level; message: $str";}; //$mail->Debugoutput = 'echo';
$mail->IsHTML(true);

$mail->Subject = 'Prueba 2.0';
$mail->Body    = 'Funciona :|  Saludos.';
//$mail->AltBody = 'Wena Wena';

if(!$mail->send()) {
    echo 'Mensaje no pudo ser enviado.';
    echo 'Error: ' . $mail->ErrorInfo;
} else {
    echo 'Mensaje Enviado';
}