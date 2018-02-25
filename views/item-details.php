<?php
$active = 'listings';
require_once '../models/model.php';
require_once '../utils/db_config.php';
session_start();

$data = $_SESSION['listing'];
$listing_id = $data['listing_id'];

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->error) {
    die("<div class='flash-message' style='position: relative;'>$conn->error</div>");
}

$joinQuery = "SELECT listings.*, users.first_name, users.last_name, users.institution_id, users.email FROM listings, users WHERE listings.user_id = users.user_id AND listings.listing_id=$listing_id;";

$joinResult = $conn->query($joinQuery);

if (!$joinResult) {
    die("<div class='flash-message' style='position: relative;'>$conn->error</div>");
}

$joinData = $joinResult->fetch_assoc();
$institution_id = $joinData['institution_id'];

$inst = "Select * from institutions where institution_id = '$institution_id' ";

$inst_result = $conn->query($inst);
if (!$inst_result) {
    die("<div class='flash-message' style='position: relative;'>$conn->error</div>");
}

$inst_data = $inst_result->fetch_assoc();
$institution = $inst_data['name'];
$city = $inst_data['city'];
$state = $inst_data['state'];
?>

<!doctype html>
<html>
    <?php include "head.php"?>
    <body>
        <?php include "header.php";?>
         <div class="container item-container hide-on-mobile">
            <div class="item-left" style='background: url(<?php echo $data['image_url'] ?>);'></div>
            <div class="item-right">
                <div class="item-title">
                    <?php echo $data['title'] ?>
                </div>
                <div class="item-date">
                    Posted on <?php echo $data['list_date'] ?>
                </div>
                <div class="item-price">
                    $<?php echo $data['price'] ?>
                </div>

                <div class="item-description">
                    <div class="description-title">DESCRIPTION</div>
                    <?php echo $data['description'] ?>
                </div>

                <div class="item-footer">
                    <div><a href="contact-seller.php?listing_id=<?php echo $listing_id ?>&seller_email=<?php echo $joinData['email'] ?>">
                        <button type="button" class="btn btn-outline-dark contact-seller-button">
                            <i class="fas fa-envelope "></i>
                            <span style="font-size: 1rem; margin-right: 10px;">Contact Seller</span>
                        </button>
                    </a></div>
                    <div class="item-location">
                    <i class="fas fa-map-marker"></i> <?php echo "$city, $state" ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container item-container-mobile hide-on-med-and-up">
            <div class="item-top" style='background: url(<?php echo $data['image_url'] ?>);'></div>
            <div class="item-bottom">
                <div class="item-title">
                    <?php echo $data['title'] ?>
                </div>
                <div class="item-date">
                    Posted on <?php echo $data['list_date'] ?>
                </div>
                <div class="item-price">
                    $<?php echo $data['price'] ?>
                </div>

                <div class="item-description">
                    <div class="description-title">DESCRIPTION</div>
                    <?php echo $data['description'] ?>
                </div>

                <div class="item-footer">
                    <div><a href="contact-seller.php?listing_id=<?php echo $listing_id ?>&seller_email=<?php echo $joinData['email'] ?>">
                        <button type="button" class="btn btn-outline-dark contact-seller-button">
                            <i class="fas fa-envelope "></i>
                            <span style="font-size: 1rem; margin-right: 10px;">Contact Seller</span>
                        </button>
                    </a></div>
                    <div class="item-location">
                    <i class="fas fa-map-marker"></i> <?php echo "$city, $state" ?>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>