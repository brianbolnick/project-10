<?php

require_once '../models/model.php';

$obj = new ListingsModel();

$category_id = $_POST['category_id'];
$listings = $obj->filter("`listings`.`category_id` = " . $category_id);

session_start();
$_SESSION['filteredListings'] = $listings;

header("Location: ../views/listings.php?category=$category_id");
exit();
?>