<?php

// Define some constants
define("RECIPIENT_NAME", "KITCHEN");
define("RECIPIENT_EMAIL", "info@qtcmedia.com");

// Read the form values
$success = false;
$senderName = isset($_POST['name']) ? preg_replace("/[^\.\-\' a-zA-Z0-9]/", "", $_POST['name']) : "";
$senderPhone = isset($_POST['phone']) ? preg_replace("/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['phone']) : "";
$senderSubject = isset($_POST['subject']) ? preg_replace("/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['subject']) : "";
//email subject
$emailSubject = "Mail from Kitchen";
$comment = isset($_POST['comment']) ? preg_replace("/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['comment']) : "";

// If all values exist, send the email
if ($senderName && $senderPhone && $senderSubject && $comment) {
   $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
   $headers = "From: " . $senderName . " <" . $senderSubject . ">";
   $success = mail($recipient, $emailSubject, $comment, $headers);
   echo "<p class='success'>Thanks for contacting us. We will contact you ASAP!</p>";
}
?>