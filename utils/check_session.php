<?php
session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    $message = 'You must be signed in to access that page.';
    header("Location: ./login.php?message=You must be signed in to access that page.");
    $first_name = $_SESSION['username'];
    exit();
    // $last_name = $_SESSION['last_name'];
    // $email = $_SESSION['username'];
    // $phone = $_SESSION['phone'];
    // $institution_id = $_SESSION['institution_id'];
}

?>