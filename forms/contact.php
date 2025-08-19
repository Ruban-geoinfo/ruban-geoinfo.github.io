<?php
// Simple PHP mail() based contact form

$receiving_email_address = 'rubangeoinfo@gmail.com';

$name = isset($_POST['name']) ? strip_tags($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$subject = isset($_POST['subject']) ? strip_tags($_POST['subject']) : '';
$message = isset($_POST['message']) ? strip_tags($_POST['message']) : '';

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo 'Invalid email address';
  exit;
}

$headers = "From: {$name} <{$email}>\r\n";
$headers .= "Reply-To: {$email}\r\n";
$headers .= "Content-Type: text/plain; charset=utf-8\r\n";

if (mail($receiving_email_address, $subject, $message, $headers)) {
  echo 'OK';
} else {
  echo 'Error sending email.';
}
?>
