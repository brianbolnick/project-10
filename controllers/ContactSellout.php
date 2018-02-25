<?php
$name = $_POST['name'];
$email = $_POST['email'];
$reason = $_POST['reason'];
$description = $_POST['description'];
$formcontent = " From: $name \n Message: $description";
$recipient = "brianbolnick@gmail.com";
$subject = "Sellout Contact Form: $reason";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
session_start();
header("Location: ../views/index.php?message=Thank you, your email has been sent.");
exit();
?>