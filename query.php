<?php 
    require_once 'db_config.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    echo $hn;
    echo $un;
    echo $pw;
    echo $db;
    if ($conn->connect_error) die($conn->connect_error);
    $query = "CREATE DATABASE `sellout`;";
    // $query = "CREATE TABLE `order_line` ( `order_id` INT NOT NULL, `product_id` INT NOT NULL) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
    // $query = "ALTER TABLE `order_line` ADD KEY `product_id` (`product_id`), ADD KEY `order_id` (`order_id`);";
    // $query = "CREATE TABLE `payment` (`payment_id` INT NOT NULL,`cc_number` varchar(32) NOT NULL DEFAULT '',`exp_date` datetime DEFAULT NULL,`cvc` varchar(4) NOT NULL DEFAULT '', PRIMARY KEY AUTOINCREMENT (`payment_id`)) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
    // $query = "ALTER TABLE `payment` ADD PRIMARY KEY AUTOINCREMENT (`payment_id`);";
    // $query = "ALTER TABLE `payment` CHANGE `payment_id` `payment_id` INT(11) NOT NULL AUTO_INCREMENT;";
    $result = $conn->query($query);
    if (!$result) die($conn->error);

    $conn->close();
?>