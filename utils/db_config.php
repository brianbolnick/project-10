<?php

if (isset($_ENV['DB_HN'])) {
    $hn = $_ENV['DB_HN'];
    $un = $_ENV['DB_UN'];
    $pw = $_ENV['DB_PW'];
    $db = $_ENV['DB_DB'];
} else {
    $hn = "localhost";
    $db = "sellout";
    $un = "root";
    $pw = "root";
}
?>
