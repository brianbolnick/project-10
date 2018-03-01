<?php

require_once '../models/model.php';

$obj = new ListingsModel();

$searchterm = $_POST['search_term'];
$listings = $obj->filter("title like '%{$searchterm}%' or description like '%{$searchterm}%'");

session_start();
$_SESSION['listings'] = $listings;

header("Location: ../views/listings.php");
exit();



?>