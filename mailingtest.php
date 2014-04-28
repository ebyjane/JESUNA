<?php
$email_address_to = "mailtestingserver@gmail.com";
$subject = "Test email subject";
$message_contents = "Hi! This is the content of the test message.";
$header = "From: sender@godwelling.com\r\n";
mail($email_address_to,$subject,$message_contents,$header);
?>