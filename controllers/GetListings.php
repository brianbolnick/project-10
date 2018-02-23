<?php

//2. include model.php
require_once '../models/model.php';

//code to create book list 
$obj = new ListingsModel();
$list = $obj->selectAll();

// echo $obj->select("listing_id = 3");
// $list = $obj->listings;

// $list = $obj->bookList;

//TEST
// print_r($list);

//add list to session
session_start();

$_SESSION['listings'] = $list;

//forward to view page
header("Location: ../views/listings.php");
exit();


?>