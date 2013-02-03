<?php
/* @var $this AnswerController */
// include_once('c:\wamp\www\email\protected\extensions\phpmailer\class.phpmailer.php');

$this->breadcrumbs=array(
	'Answer',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>

<?php

// CHANGE THE TWO LINES BELOW
require("class.phpmailer.php");
 
$mail = new PHPMailer();
 
$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "smtp.secureserver.net";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "a_saberzadeh@yahoo.com";  // SMTP username
$mail->Password = "ccc1234"; // SMTP password
 
$mail->From = "info@coastalcatclinicpacifica.com";
$mail->FromName = "info@coastalcatclinicpacifica.com";
$mail->AddAddress("sonhuytran@gmail.com", "Son-Huy");
$mail->AddAddress("quoccuong88@gmail.com");                  // name is optional
 
$mail->WordWrap = 50;                                 // set word wrap to 50 characters
$mail->IsHTML(true);                                  // set email format to HTML
 
$mail->Subject = "Here is the subject";
$mail->Body    = "This is the HTML message body <b>in bold!</b>";
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
 
if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}
 
echo "Message has been sent";

?>