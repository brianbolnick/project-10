<?php
$active = 'listings';
require_once '../models/model.php';
require_once '../utils/db_config.php';
session_start();

$data = $_SESSION['listing'];

?>
<!doctype html>
<html>
    <?php include "head.php"?>
    <body>
        <?php include "header.php";?>
        <div class="container item-container">
            <div class="item-details-container">
                <h1 class="listing-title"><?php echo $data['title'] ?></h1>
                <div class="row">
                    <div class="col-6">
                        <img src=<?php echo $data['image_url'] ?>  alt="" width='100%'>
                        <br>
                        <a href="contact-seller.php?seller_id=<?php echo $data['user_id'] ?>">
                            <button type="button" class="btn btn-outline-dark home-listing-button">
                                <span style="font-size: 1rem; margin-right: 10px;">Contact Seller</span>
                            </button>
                        </a>
                    </div>
                    <div class="col">
                        <div class="listing-description">
                            <div class="description-title">Description:</div>
                            <div class="description"><?php echo $data['description'] ?></div>
                        </div>
                        <div class="listing-description">
                            <div class="description-title">Price:</div>
                            <div class="description">$<?php echo $data['price'] ?></div>
                        </div>
                        <div class="listing-description">
                            <div class="description-title">List Date:</div>
                            <div class="description"><?php echo $data['list_date'] ?></div>
                        </div>
                    </div>
            </div>
        </div>
    </body>
    <?php include "footer.php";?>
</html>