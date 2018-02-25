<?php
require '../vendor/autoload.php';
$name = $_POST['name'];
$email = $_POST['email'];
$reason = $_POST['reason'];
$description = $_POST['description'];
$apiKey = isset($_ENV['SENDGRID_API_KEY']) ? $_ENV['SENDGRID_API_KEY'] : "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";

$from = new SendGrid\Email($name, $email);
$subject = "Sellout Contact Form: $reason";;
$to = new SendGrid\Email("Sellout", "brianbolnick@gmail.com");
$content = new SendGrid\Content("text/html", "<html><body><h1>From: $name</h1><strong>Message:</strong><br/><p>$description</p></body></html>");
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
session_start();

if ($response->statusCode() == 202) {
    header("Location: " . $_SERVER['HTTP_REFERER'] . "?message=Thank you, your email has been sent.");
    exit();
} else {
    header("Location: " . $_SERVER['HTTP_REFERER'] . "?message=There was an error sending your message ($response->statusCode())");
    exit();
}

?>