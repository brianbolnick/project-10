<?php
require '../vendor/autoload.php';
require_once '../models/model.php';

$obj = new ListingsModel();

$listing_id = $_POST['listing_id'];
$listing = $obj->select("listing_id = $listing_id");

$listing_title = $listing['title'];
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$phone = $_POST['phone'];
$title = $_POST['title'];
$body = $_POST['message'];
$seller_email = $_POST['seller-email'];
$apiKey = isset($_ENV['SENDGRID_API_KEY']) ? $_ENV['SENDGRID_API_KEY'] : "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";

$from = new SendGrid\Email($name, $email);
$subject = "(Sellout - $listing_title) $subject";
$to = new SendGrid\Email("Sellout User", $seller_email);
$content = new SendGrid\Content("text/html", "<html><body><h1>From: $name </h1><strong>Message:</strong><br/><p>$body</p><br/><p> Phone: $phone </p></body></html>");
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
session_start();

if ($response->statusCode() == 202) {
    header("Location: ../controllers/GetListings.php?message=Thank you, your email has been sent.");
    exit();
} else {
    header("Location: " . reset((explode('?', $_SERVER['HTTP_REFERER']))) . "?message=There was an error sending your message ($response->statusCode())");
    exit();
}

?>