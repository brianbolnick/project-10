<?php

require_once '../models/model.php';

// $obj = new ListingsModel();

// $listing_id = $_GET['listing_id'];
// $listing = $obj->delete("`listings`.`listing_id` = " . $listing_id);

$obj = new ListingsModel();

$listing_id = $_GET['listing_id'];
$obj->delete("`listings`.`listing_id` = " . $listing_id);
session_start();
header("Location: ../views/profile.php?message=Listing deleted successfully.");
exit();
?>