<?php
require_once("log.php");

$email = $_POST['email'];
$message = $_POST['message'];
$headers = 'From: support@vierware.com' . "\r\n" .
 'X-Mailer: PHP/' . phpversion();

if (!mail("jmking92@gmail.com", "Vier Development Contact Query", "Message Recieved from: ".$email."\n".$message,$headers)) {
	log_to_sql("[Mail Send : Error] From Email: $email, Message: $message");
	die("Could not send mail");
}

quicklog_to_sql("[Mail Send : Success] From Email: $email",$username);
echo "Mail delivered successfully";

?>