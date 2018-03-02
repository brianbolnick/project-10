<?php

require_once '../models/model.php';

$user_id = $_GET['user_id'];

$obj = new UsersModel();

// $listing_id = $_GET['listing_id'];
$user = $obj->select("user_id = $user_id");
$inst_id = $user['institution_id'];

$inst = "Select * from institutions where institution_id = '$inst_id' ";

$inst_result = $conn->query($inst);
if (!$inst_result) {
    die("<div class='flash-message' style='position: relative;'>$conn->error</div>");
}

$inst_data = $inst_result->fetch_assoc();

session_start();
$_SESSION['user'] = $user; 
$_SESSION['institution'] = $inst_data;

header("Location: ../views/user.php");
exit();
?>