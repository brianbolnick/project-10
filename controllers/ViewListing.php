<?php

require_once '../models/model.php';

$obj = new ListingsModel();

$listing_id = $_GET['listing_id'];
$listing = $obj->select("listing_id = $listing_id");

session_start();
$_SESSION['listing'] = $listing;

header("Location: ../views/item-details.php");
exit();
?>