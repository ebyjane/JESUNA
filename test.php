<?php
include("/usr/local/lib/php/Mail.php");
/* mail setup recipients, subject etc */
$recipients = "activespartans@yahoo.in";
$headers["From"] = "info@jesuna.com";
$headers["To"] = "activespartans@yahoo.in";
$headers["Subject"] = "User feedback";
$mailmsg = "Hello, This is a test mail from support.";
/* SMTP server name, port, user/passwd */
$smtpinfo["host"] = "mail.jesuna.com";
$smtpinfo["port"] = "25";
$smtpinfo["auth"] = true;
$smtpinfo["username"] = "info@jesuna.com";
$smtpinfo["password"] = "12345";
/* Create the mail object using the Mail::factory method */
$mail_object =& Mail::factory("smtp", $smtpinfo);
/* Ok send mail */
$mail_object->send($recipients, $headers, $mailmsg);
?>
